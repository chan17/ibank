<?php

/**
 * UserIdentity represents the data needed to identity a user.
 * It contains the authentication method that checks if the provided
 * data can identity the user.
 */
class UserIdentity extends CUserIdentity
{
	/**4
	 * Authenticates a user.
	 * The example implementation makes sure if the Phone and Password
	 * are both 'demo'.
	 * In practical applications, this should be changed to authenticate
	 * against some persistent user identity storage (e.g. database).
	 * @return boolean whether authentication succeeds.
	 */
    private $_id;
    private $_nikeName;
    private $_purview;

    public function authenticate()  
    {
    	//空了再写salt 
        $record=User::model()->findByAttributes(array('Phone'=>$this->username));

        if (empty($record)) {
            $this->errorCode=self::ERROR_USERNAME_INVALID;
            $this->errorMessage  ="没有此用户";
        }
        if($record===null){
            $this->errorCode=self::ERROR_USERNAME_INVALID;
            $this->errorMessage  ="没有此用户";
        }elseif($record->Password == 'qqlogin'){
            $this->errorCode=self::ERROR_USERNAME_INVALID;
            $this->errorMessage  ="您之前使用QQ登陆，请继续使用QQ登陆本平台";
        }elseif($record->Password!==md5($this->password)){
            $this->errorCode=self::ERROR_USERNAME_INVALID;;
            $this->errorMessage  ="用户名或者密码错误";
        }elseif ($record->IsBlack == 1) {
            $this->errorCode = self::ERROR_USERNAME_INVALID;
            $this->errorMessage  = "依据用户管理细则，此帐号已被永久停用。附注:如有疑问，请发送邮件到help@51ibank.com";
        }else{
            $this->_id=$record->Uid;
            $this->_nikeName=$record->Nickname;
            // $this->_purview=$record->Purview;
            //存session
            $this->setState('site', 'web');
            $this->setState('nickname', $record->Nickname);
            $this->setState('purview', $record->Purview);
            $this->errorCode=self::ERROR_NONE;  
            // $this->errorMessage  ="登陆成功";
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