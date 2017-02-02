<?php

/**
 * LoginForm class.
 * LoginForm is the data structure for keeping
 * user login form data. It is used by the 'login' action of 'SiteController'.
 */
class AdminLoginForm extends CFormModel
{
	public $UserName;
	public $Password;

	private $_identity;

	public function rules()
	{
		return array(
			// UserName and Password are required
			array('UserName, Password', 'required'),
			array('Password', 'authenticate'),
		);
	}

	public function safeAttributes()
	{
	    return array(
	        parent::safeAttributes(),
	        'login' => 'UserName, Password',
	    );
	}

	/**
	 * Declares attribute labels.
	 */
	public function attributeLabels()
	{
		return array(
			'UserName'=>'用户名',
			'Password'=>'密码',
		);
	}

	/**
	 * Authenticates the Password.
	 * This is the 'authenticate' validator as declared in rules().
	 */
	public function authenticate($attribute,$params)
	{
		if(!$this->hasErrors())	{
			$this->_identity=new UserAdminIdentity($this->UserName,$this->Password);

			if(!$this->_identity->authenticate()){
				$this->addError('errorFromIdentity',$this->_identity->errorMessage);
			}
		}
	}

	/**
	 * Logs in the user using the given UserName and Password in the model.
	 * @return boolean whether login is successful
	 */
	public function login()
	{
		if($this->_identity===null)
		{
			$this->_identity=new UserAdminIdentity($this->UserName,$this->Password);
			$this->_identity->authenticate();
		}
		if($this->_identity->errorCode===UserAdminIdentity::ERROR_NONE)
		{
			Yii::app()->user->login($this->_identity,0);
			return true;
		}
		else
			return false;
	}
}
