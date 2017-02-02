<?php

/**
 * LoginForm class.
 * LoginForm is the data structure for keeping
 * user login form data. It is used by the 'login' action of 'SiteController'.
 */
class RechangeForm extends CFormModel
{
	public $Method;
	public $Amount;

	private $_identity;

	/**
	 * Declares the validation rules.
	 * The rules state that Phone and Password are required,
	 * and Password needs to be authenticated.
	 */
	public function rules()
	{
		return array(
			// array('Method, Amount', 'required'),
			array('Method, Amount', 'numerical'),
		);
	}


	/**
	 * Declares attribute labels.
	 */
	public function attributeLabels()
	{
		return array(
			'Method'=>'充值方式',
			'Amount'=>'充值金额',
		);
	}

}
