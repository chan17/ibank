<?php

class UserAuthIdentity extends CUserIdentity
{

    private $_id;
    private $_nikeName;
    private $_purview;

    public function __construct($openid,$password='')
    {
        // parent::__construct();
        $this->username=$openid;
        $this->password=$password;
    }

    public function authenticate()  
    {
        $record=User::model()->findByAttributes(array('Qqopenid'=>$this->username));
        if (empty($record)) {
            throw new Exception("关键参数未获取".$user->getErrors(), 1);
        }

        if($record==null){
            $this->errorCode=self::ERROR_USERNAME_INVALID;
            $this->errorMessage  ="此账号未在本网站注册";
        }
        if ($record->IsBlack == 1) {
            $this->errorCode = self::ERROR_USERNAME_INVALID;
            $this->errorMessage  = "依据用户管理细则，此帐号已被永久停用。附注:如有疑问，请发送邮件到help@51ibank.com";
        }
        if ($record != null) {
            $this->_id=$record->Uid;
            $this->_nikeName=$record->Nickname;

            //存session
            $this->setState('nickname', $record->Nickname);
            $this->setState('purview', $record->Purview);
            $this->errorCode=self::ERROR_NONE;  
            $this->errorMessage  ="登陆成功";
        }
        return !$this->errorCode;
    }
 
    public function getId()  
    {
        return $this->_id;  
    }

    public function getPurview()  
    {
        return $this->_purview;  
    }

    public function getNikeName()  
    {
        return $this->_nikeName;  
    }
}