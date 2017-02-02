<?php
/**
 * 我要借款发布第三步Form
 * FileName:LoanUserProveForm
 * @author   hushangming
 */
class LoanUserProveForm extends CFormModel{
	public $LoanId;
	public $Uid;
	public $Auth_mobile;
	public $Contact_one_name;
	public $Contact_one_rel;
	public $Contact_one_mobile;
	public $Contact_two_name;
	public $Contact_two_rel;
	public $Contact_two_mobile;
	public $Idcard_url;
	public $House_card_url;
	public $Driving_license_url;
	public $House_add_url;
	public $Income_prove_url;
	public $Job_prove_url;
	public $Wage_prove_url;
	public $Create_time;
	public $Update_time;

	/**
	 * 验证规则
	 * @see CModel::rules()
	 */
	public function rules(){
		return array(
			array('LoanId, Uid', 'required'),
			array('LoanId, Uid, Contact_one_rel, Contact_two_rel, Create_time, Update_time', 'numerical', 'integerOnly'=>true),
			array('Idcard_url, House_card_url, Driving_license_url, House_add_url, Income_prove_url, Job_prove_url, Wage_prove_url', 'length', 'max'=>200),
			array('Contact_one_name, Contact_one_mobile, Contact_two_name, Contact_two_mobile', 'length', 'max'=>20),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('LoanId, Uid, Auth_mobile, Contact_one_name, Contact_one_rel, Contact_one_mobile, Contact_two_name, Contact_two_rel, Contact_two_mobile, Idcard_url, House_card_url, Driving_license_url, House_add_url, Income_prove_url, Job_prove_url, Wage_prove_url, Create_time, Update_time', 'safe', 'on'=>'search'),
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
			'LoanId' => '借款ID',
			'Uid' => '发布人ID',
			'Auth_mobile'=>'手机号码', 
			'Contact_one_name'=>'直系联系人姓名',
			'Contact_one_rel'=>'关系',
			'Contact_one_mobile'=>'直系联系人手机',
			'Contact_two_name'=>'其他联系人姓名',
			'Contact_two_rel'=>'关系',
			'Contact_two_mobile'=>'其他联系人手机',
			'Idcard_url' => '身份证地址',
			'House_card_url' => '房产证地址',
			'Driving_license_url' => '行驶证地址',
			'House_add_url' => '住址证明地址',
			'Income_prove_url' => '收入证明地址',
			'Job_prove_url' => '工作证明地址',
			'Wage_prove_url' => '工资流水地址',
			'Create_time' => '入库时间',
			'Update_time' => '修改时间',
		);
	}
}