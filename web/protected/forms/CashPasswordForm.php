<?php

class CashPasswordForm extends CFormModel
{
	public $oldpwd;
	public $newpwd;
	public $chkpwd;

	private $_identity;

	public function rules()
	{
		return array(
			array('oldpwd, newpwd,chkpwd', 'required'),
			array('chkpwd', 'compare', 'compareAttribute'=>'newpwd','message'=>'两次输入密码不同'),
		);
	}

	public function attributeLabels()
	{
		return array(
			'oldpwd'=>'原提现密码',
			'newpwd'=>'新提现密码',
			'chkpwd'=>'确认提现密码',
		);
	}

}
