<?php
/**
 * 我要借款发布第一步Form
 * FileName:LoanUserInfoForm
 * @author   hushangming
 */
class LoanUserInfoForm extends CFormModel{
	public $LoanId;
	public $Uid;
	public $Publisher_type;
	public $True_name;
	public $Nike_name;
	public $QQ;
	public $Email;
	public $Mobile;
	public $Edu_type;
	public $Id_card;
	public $Marry_type;
	public $House_type;
	public $House_address;
	public $House_tel;
	public $Checkin_years;
	public $Have_car;
	public $Job_type;
	public $Year_revenue;
	public $Income_type;
	public $Company_type;
	public $Work_experience;
	public $Company_name;
	public $Office;
	public $Company_address;
	public $Company_tel;
	public $Create_time;
	public $Update_time;
	
	

	/**
	 * 验证规则
	 * @see CModel::rules()
	 */
	public function rules(){
		return array(

			// 必填字段
			array('Id_card', 'idCard'),
			// 身份证号码
			array('Id_card', 'idCard'),
			// 必填字段
			array('Publisher_type, True_name, QQ, Mobile, Edu_type, Year_revenue', 'required'),
			array('Marry_type, House_type, House_address, House_tel, Checkin_years, Have_car, Job_type, Income_type', 'required'),
			array('Company_type, Work_experience, Company_name, Office, Company_address, Company_tel', 'required'),
			// 值必须为整形字段
			array('LoanId, Uid, Publisher_type, Edu_type, Marry_type, House_type, Checkin_years, Have_car', 'numerical', 'integerOnly'=>true),
			array('Job_type, Income_type, Company_type, Work_experience', 'numerical', 'integerOnly'=>true),
			// 长度限制
			array('True_name', 'length', 'max'=>10),
			array('QQ, House_tel, Office, Company_tel', 'length', 'max'=>20),
			array('Company_name', 'length', 'max'=>100),
			array('House_address, Company_address', 'length', 'max'=>200),

			// 身份证号码

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
			'Publisher_type'=>'发布者类型',
			'True_name'=>'真实姓名',
			'Nike_name'=>'昵称',
			'QQ'=>'QQ号码',
			'Email'=>'邮箱',
			'Mobile'=>'手机号码',
			'Edu_type'=>'教育程度',
			'Id_card'=>'身份证号',
			'Marry_type'=>'婚姻状况',
			'House_type'=>'住宅情况',
			'House_address'=>'住宅地址',
			'House_tel'=>'住宅电话',
			'Checkin_years'=>'入住年数',
			'Have_car'=>'是否购车',
			'Job_type'=>'就业状态',
			'Year_revenue'=>'年收入',
			'Income_type'=>'收入发放方式',
			'Company_type'=>'单位性质',
			'Work_experience'=>'工作年限',
			'Company_name'=>'单位名称',
			'Office'=>'任职部门',
			'Company_address'=>'单位地址',
			'Company_tel'=>'单位电话',
			'Create_time'=>'入库时间',
			'Update_time'=>'修改时间',
		);
	}
	
	/**
	 * 验证身份证号码
	 * 这个是在rules()中定义的idCard方法
	 */
	public function idCard($attribute, $params){
		if(!$this->hasErrors()){
			$idCard = new IDCard();
			if(!$idCard->checkIdCardIsValid($this->Id_card)){
				$this->addError('Id_card', '不是有效的身份证号码');
			}
		}
	}
}