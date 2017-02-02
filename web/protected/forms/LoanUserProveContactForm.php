<?php
/**
 * 我要借款发布第三步Form
 * FileName:LoanUserProveContactForm
 * @author   hushangming
 */
class LoanUserProveContactForm extends CFormModel{
	public $Contact_one_name;
	public $Contact_one_rel;
	public $Contact_one_mobile;
	public $Contact_two_name;
	public $Contact_two_rel;
	public $Contact_two_mobile;

	/**
	 * 验证规则
	 * @see CModel::rules()
	 */
	public function rules(){
		return array(
			array('Contact_one_name, Contact_one_rel, Contact_one_mobile, Contact_two_name, Contact_two_rel, Contact_two_mobile', 'required'),
			array('Contact_one_name, Contact_one_mobile, Contact_two_name, Contact_two_mobile', 'length', 'max'=>20),
			array('Contact_one_rel, Contact_two_rel', 'numerical', 'integerOnly'=>true),
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
			'Contact_one_name'=>'直系联系人姓名',
			'Contact_one_rel'=>'关系',
			'Contact_one_mobile'=>'直系联系人手机',
			'Contact_two_name'=>'其他联系人姓名',
			'Contact_two_rel'=>'关系',
			'Contact_two_mobile'=>'其他联系人手机'
		);
	}
}