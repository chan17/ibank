<?php

/**
 * RegisterForm class.
 * RegisterForm is the data structure for keeping
 * user login form data. It is used by the 'login' action of 'SiteController'.
 */
class RegisterForm extends CFormModel
{
	public $Nickname;
	public $Phone;
	public $Password;
	public $phoneVerified;
	public $confirmPassword;
	public $agree;
	public $purview;
	protected $siteName = '融金工场';


	private $_identity;

	/**
	 * Declares the validation rules.
	 * The rules state that Phone and Password are required,
	 * and Password needs to be authenticated.
	 */
	public function rules()
	{
		return array(
			array('Nickname,phoneVerified,Phone, Password,confirmPassword,agree,purview', 'required'),
			array('Phone','match','pattern'=>'/^1\d{10}$/','message'=>'请填写正确的手机号'),
			array('purview', 'numerical', 'integerOnly'=>true),

			// array('Password', 'authenticate'),
			array('confirmPassword', 'compare', 'compareAttribute'=>'Password','message'=>'两次输入密码不同'),
		);
	}

	// 暂时放着，以后加token时写
	public function safeAttributes()
	{
	    // return array(
	    //     parent::safeAttributes(),
	    //     'login' => 'username, password',
	    // );
	}

	/**
	 * Declares attribute labels.
	 */
	public function attributeLabels()
	{
		return array(
			'Nickname'=>'昵称',
			'Phone'=>'手机',
			'phoneVerified'=>'手机验证码',
			'Password'=>'密码',
			'confirmPassword'=>'再次输入密码',
			'agree'=>"我已阅读并同意《{$this->siteName}网站服务协议》",
			'purview'=>'选择角色',
		);
	}

}
