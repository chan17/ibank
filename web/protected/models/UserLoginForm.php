<?php

/**
 * LoginForm class.
 * LoginForm is the data structure for keeping
 * user login form data. It is used by the 'login' action of 'SiteController'.
 */
class UserLoginForm extends CFormModel
{
	public $Phone;
	public $Password;
	public $rememberMe=true;

	private $_identity;

	/**
	 * Declares the validation rules.
	 * The rules state that Phone and Password are required,
	 * and Password needs to be authenticated.
	 */
	public function rules()
	{
		return array(
			// Phone and Password are required
			array('Phone, Password', 'required'),
			array('Phone','match','pattern'=>'/^1\d{10}$/','message'=>'手机填写不正确'),
			// rememberMe needs to be a boolean
			array('rememberMe', 'boolean'),
			// Password needs to be authenticated
			array('Password', 'authenticate'),
		);
	}

	public function safeAttributes()
	{
	    return array(
	        parent::safeAttributes(),
	        'login' => 'Phone, Password',
	    );
	}

	/**
	 * Declares attribute labels.
	 */
	public function attributeLabels()
	{
		return array(
			'Phone'=>'手机',
			'Password'=>'密码',
			'rememberMe'=>'下次自动登陆',
		);
	}

	/**
	 * Authenticates the Password.
	 * This is the 'authenticate' validator as declared in rules().
	 */
	public function authenticate($attribute,$params)
	{
		if(!$this->hasErrors())	{
			$this->_identity=new UserIdentity($this->Phone,$this->Password);
			// var_dump('LoginForm',$this->_identity->authenticate;exit();
			if(!$this->_identity->authenticate()){
				$this->addError('errorFromIdentity',$this->_identity->errorMessage);
			}
		}
	}

	/**
	 * Logs in the user using the given Phone and Password in the model.
	 * @return boolean whether login is successful
	 */
	public function login()
	{
		if($this->_identity===null)
		{
			$this->_identity=new UserIdentity($this->Phone,$this->Password);
			$this->_identity->authenticate();
		}
		if($this->_identity->errorCode===UserIdentity::ERROR_NONE)
		{
			$duration=$this->rememberMe ? SessionKey::EXPIRE_TIME : 0; // 30 days
			Yii::app()->user->login($this->_identity,$duration);
			return true;
		}
		else
			return false;
	}
}
