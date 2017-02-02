<?php

/**
 * This is the model class for table "user_card".
 *
 * The followings are the available columns in table 'user_card':
 * @property integer $Uid
 * @property string $FullName
 * @property string $Job
 * @property string $Mobile
 * @property string $Business
 * @property string $LoanRate
 * @property integer $Org
 * @property integer $Create_time
 * @property integer $Update_time
 */
class UserCard extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'user_card';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('Uid', 'required'),
			array('Uid, Org, Create_time, Update_time', 'numerical', 'integerOnly'=>true),
			array('FullName, Job, Mobile, Business', 'length', 'max'=>20),
			array('LoanRate', 'length', 'max'=>10),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('Uid, FullName, Job, Mobile, Business, LoanRate, Org, Create_time, Update_time', 'safe', 'on'=>'search'),
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
			'Uid' => 'Uid',
			'FullName' => 'Full Name',
			'Job' => 'Job',
			'Mobile' => 'Mobile',
			'Business' => 'Business',
			'LoanRate' => 'Loan Rate',
			'Org' => 'Org',
			'Create_time' => 'Create Time',
			'Update_time' => 'Update Time',
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

		$criteria->compare('Uid',$this->Uid);
		$criteria->compare('FullName',$this->FullName,true);
		$criteria->compare('Job',$this->Job,true);
		$criteria->compare('Mobile',$this->Mobile,true);
		$criteria->compare('Business',$this->Business,true);
		$criteria->compare('LoanRate',$this->LoanRate,true);
		$criteria->compare('Org',$this->Org);
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
	 * @return UserCard the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
