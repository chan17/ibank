<?php

/**
 * This is the model class for table "loan_user_prove".
 *
 * The followings are the available columns in table 'loan_user_prove':
 * @property integer $LoanId
 * @property integer $Uid
 * @property string $Auth_mobile
 * @property string $Contact_one_name
 * @property integer $Contact_one_rel
 * @property string $Contact_one_mobile
 * @property string $Contact_two_name
 * @property integer $Contact_two_rel
 * @property string $Contact_two_mobile
 * @property string $Idcard_url
 * @property string $House_card_url
 * @property string $Driving_license_url
 * @property string $House_add_url
 * @property string $Income_prove_url
 * @property string $Job_prove_url
 * @property string $Wage_prove_url
 * @property integer $Create_time
 * @property integer $Update_time
 */
class LoanUserProveModel extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'loan_user_prove';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
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
		$criteria->compare('Auth_mobile',$this->Auth_mobile);
		$criteria->compare('Contact_one_mobile',$this->Contact_one_mobile);
		$criteria->compare('Contact_one_name',$this->Contact_one_name);
		$criteria->compare('Contact_one_rel',$this->Contact_one_rel);
		$criteria->compare('Contact_two_mobile',$this->Contact_two_mobile);
		$criteria->compare('Contact_two_name',$this->Contact_two_name);
		$criteria->compare('Contact_two_rel',$this->Contact_two_rel);
		$criteria->compare('Idcard_url',$this->Idcard_url,true);
		$criteria->compare('House_card_url',$this->House_card_url,true);
		$criteria->compare('Driving_license_url',$this->Driving_license_url,true);
		$criteria->compare('House_add_url',$this->House_add_url,true);
		$criteria->compare('Income_prove_url',$this->Income_prove_url,true);
		$criteria->compare('Job_prove_url',$this->Job_prove_url,true);
		$criteria->compare('Wage_prove_url',$this->Wage_prove_url,true);
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
	 * @return LoanUserProveModel the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
