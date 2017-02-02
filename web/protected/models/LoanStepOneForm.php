<?php
/**
 * 我要借款发布第一步Form
 * FileName:LoanStepOneForm
 * @author   hushangming
 * @Date	 2014-5-9 下午02:23:42
 */
class LoanStepOneForm extends CFormModel{
	public $nickname;
	public $phone;
	public $icardstring;

	/**
	 * 验证规则
	 * @see CModel::rules()
	 */
	public function rules(){
		return array(
			array('nickname, phone, icardstring', 'required'),
			array('nickname', 'length', 'max'=>64),
			array('phone', 'numerical'),
			array('icardstring', 'idCard'),
		);
	}

	/**
	 * Declares customized attribute labels.
	 * If not declared here, an attribute would have a label that is
	 * the same as its name with the first letter in upper case.
	 */
	public function attributeLabels()
	{
		return array(
			'nickname'=>'昵称',
			'phone'=>'电话号码',
			'icardstring'=>'身份证'
		);
	}
	
	/**
	 * 验证身份证号码
	 * 这个是在rules()中定义的idCard方法
	 */
	public function idCard($attribute, $params){
		if(!$this->hasErrors()){
			$idCard = new IDCard();
			if(!$idCard->checkIdCardIsValid($this->icardstring)){
				$this->addError('icardstring', '不是有效的身份证号码');
			}
		}
	}
}