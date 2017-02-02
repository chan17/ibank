<?php

/**
 * This is the model class for table "loan_user_info".
 *
 * The followings are the available columns in table 'loan_user_info':
 * @property integer $LoanId
 * @property integer $Uid
 * @property integer $Publisher_type
 * @property string $True_name
 * @property string $QQ
 * @property string $Mobile
 * @property integer $Edu_type
 * @property string $Id_card
 * @property integer $Marry_type
 * @property integer $House_type
 * @property string $House_address
 * @property string $House_tel
 * @property integer $Checkin_years
 * @property integer $Have_car
 * @property integer $Job_type
 * @property integer $Year_revenue
 * @property integer $Income_type
 * @property integer $Company_type
 * @property integer $Work_experience
 * @property string $Company_name
 * @property string $Office
 * @property string $Company_address
 * @property string $Company_tel
 * @property integer $Create_time
 * @property integer $Update_time
 */
class LoanUserInfoModel extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'loan_user_info';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules(){
		return array(
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
			array('Create_time, Update_time', 'safe'),
		);
	}
	/*public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('Uid', 'required'),
			array('Uid, Publisher_type, Edu_type, Marry_type, House_type, Checkin_years, Have_car, Job_type, Income_type, Company_type, Work_experience, Create_time, Update_time', 'numerical', 'integerOnly'=>true),
			array('True_name', 'length', 'max'=>10),
			array('QQ, Mobile, House_tel, Office, Company_tel', 'length', 'max'=>20),
			array('Id_card', 'length', 'max'=>18),
			array('House_address, Company_address', 'length', 'max'=>200),
			array('Company_name', 'length', 'max'=>100),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('LoanId, Uid, Publisher_type, True_name, QQ, Mobile, Edu_type, Id_card, Marry_type, House_type, House_address, House_tel, Checkin_years, Have_car, Job_type, Income_type, Company_type, Work_experience, Company_name, Office, Company_address, Company_tel, Create_time, Update_time', 'safe', 'on'=>'search'),
		);
	}*/

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'LoanId'=>'借款ID',
			'Uid'=>'用户ID',
			'Publisher_type'=>'发布者类型',
			'True_name'=>'真实姓名',
			'QQ'=>'QQ号码',
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
	/*public function attributeLabels()
	{
		return array(
			'LoanId' => '借款信息ID',
			'Uid' => '用户ID',
			'Publisher_type' => '发布者类型，1自己发布2代人发布',
			'True_name' => '真实姓名',
			'QQ' => 'QQ号码',
			'Mobile' => '手机号码',
			'Edu_type' => '教育程度',
			'Id_card' => '身份证号码',
			'Marry_type' => '婚姻状况',
			'House_type' => '住宅状况',
			'House_address' => '住宅地址',
			'House_tel' => '住宅电话',
			'Checkin_years' => '入住年数',
			'Have_car' => '是否购车，1未购车2已购车',
			'Job_type' => '就业状态',
			'Income_type' => '收入发放方式，1银行卡2现金',
			'Company_type' => '单位性质',
			'Work_experience' => '工作年限',
			'Company_name' => '单位名称',
			'Office' => '任职部门',
			'Company_address' => '单位地址',
			'Company_tel' => '单位电话',
			'Create_time' => '入库时间',
			'Update_time' => '修改时间',
		);
	}*/

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('LoanId',$this->LoanId);
		$criteria->compare('Uid',$this->Uid);
		$criteria->compare('Publisher_type',$this->Publisher_type);
		$criteria->compare('True_name',$this->True_name,true);
		$criteria->compare('QQ',$this->QQ,true);
		$criteria->compare('Mobile',$this->Mobile,true);
		$criteria->compare('Edu_type',$this->Edu_type);
		$criteria->compare('Id_card',$this->Id_card,true);
		$criteria->compare('Marry_type',$this->Marry_type);
		$criteria->compare('House_type',$this->House_type);
		$criteria->compare('House_address',$this->House_address,true);
		$criteria->compare('House_tel',$this->House_tel,true);
		$criteria->compare('Checkin_years',$this->Checkin_years);
		$criteria->compare('Have_car',$this->Have_car);
		$criteria->compare('Job_type',$this->Job_type);
		$criteria->compare('Income_type',$this->Income_type);
		$criteria->compare('Company_type',$this->Company_type);
		$criteria->compare('Work_experience',$this->Work_experience);
		$criteria->compare('Company_name',$this->Company_name,true);
		$criteria->compare('Office',$this->Office,true);
		$criteria->compare('Company_address',$this->Company_address,true);
		$criteria->compare('Company_tel',$this->Company_tel,true);
		$criteria->compare('Create_time',$this->Create_time);
		$criteria->compare('Update_time',$this->Update_time);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return LoanUserInfo the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
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
