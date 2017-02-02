<?php

class CashForm extends CFormModel
{
	public $WithdrawAmount;
	public $WithdrawPassword;

	private $_identity;

	/**
	 * Declares the validation rules.
	 * The rules state that Phone and Password are required,
	 * and Password needs to be authenticated.
	 */
	public function rules()
	{
		return array(
			array('WithdrawAmount, WithdrawPassword', 'required'),
			array('WithdrawAmount', 'numerical'),
		);
	}


	/**
	 * Declares attribute labels.
	 */
	public function attributeLabels()
	{
		return array(
			'WithdrawAmount'=>'提现金额',
			'WithdrawPassword'=>'提现密码',
		);
	}

}
