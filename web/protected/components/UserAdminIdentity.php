<?php

/**
 * UserIdentity represents the data needed to identity a user.
 * It contains the authentication method that checks if the provided
 * data can identity the user.
 */
class UserAdminIdentity extends CUserIdentity
{
	/**4
	 * Authenticates a user.
	 * The example implementation makes sure if the username and password
	 * are both 'demo'.
	 * In practical applications, this should be changed to authenticate
	 * against some persistent user identity storage (e.g. database).
	 * @return boolean whether authentication succeeds.
	 */
   	private $_id;
    private $_username;
    private $_purview;

    public function authenticate()
    {
    	//空了再写salt 
        $record=UserAdmin::model()->findByAttributes(array('UserName'=>$this->username));
//         $record=UserAdmin::model()->find('UserName=:UserName', array(':UserName'=>$this->username));
// var_dump($this->username);exit();
        if (empty($record)) {
            $this->errorCode=self::ERROR_USERNAME_INVALID;
            $this->errorMessage  ="没有此用户";
        }
        if($record===null){
            $this->errorCode=self::ERROR_USERNAME_INVALID;
            $this->errorMessage  ="没有此用户";
        }elseif($record->Password != md5($this->password)){
            $this->errorCode=self::ERROR_USERNAME_INVALID;;
            $this->errorMessage  ="用户名或者密码错误";
        }else{
            $this->_id=$record->Uid;
            $this->_username=$record->UserName;

            //存session
            $this->setState('site', 'admin');
            $this->setState('username', $record->UserName);
            $this->setState('purview', $record->Purview);
            $this->errorCode=self::ERROR_NONE;  
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

    public function getUserName()  
    {
        return $this->_username;  
    }
}