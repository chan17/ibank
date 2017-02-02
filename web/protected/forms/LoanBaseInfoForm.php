<?php
/**
 * 我要借款发布第二步Form
 * FileName:LoanBaseInfoForm
 * @author   hushangming
 */
class LoanBaseInfoForm extends CFormModel{
	public $LoanId;
	public $Status;
	public $Uid;
	public $Loan_effect_type;
	public $Loan_title;
	public $Loan_amount;
	public $Loan_tern_type;
	public $Income;
	public $Loan_description;
	public $Create_time;
	public $Update_time;

	/**
	 * 验证规则
	 * @see CModel::rules()
	 */
	public function rules(){
		return array(
			array('Loan_effect_type, Loan_title, Loan_amount, Loan_tern_type, Loan_description', 'required'),
			array('Loan_effect_type, Loan_amount, Loan_tern_type', 'numerical', 'integerOnly'=>true),
			array('Loan_title', 'length', 'max'=>100),
			array('Loan_description', 'length', 'max'=>1000),
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
			'LoanId'=>'借款ID',
			'Uid'=>'用户ID',
			'Status'=>'状态',
			'Loan_effect_type'=>'借款用途',
			'Loan_title'=>'借款标题',
			'Loan_amount'=>'借款金额',
			'Loan_tern_type'=>'借款期限',
			'Income'=>'点击收益',
			'Loan_description'=>'借款描述',
			'Create_time'=>'入库时间',
			'Update_time'=>'修改时间',
		);
	}
}