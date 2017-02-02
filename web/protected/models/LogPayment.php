<?php

/**
 * This is the model class for table "log_payment".
 *
 * The followings are the available columns in table 'log_payment':
 * @property integer $Id
 * @property integer $Uid
 * @property integer $LoanId
 * @property string $PayOrderId
 * @property string $Type
 * @property string $Money
 * @property integer $Update_time
 * @property integer $Create_time
 */
class LogPayment extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'log_payment';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('Uid, LoanId, Update_time, Create_time', 'numerical', 'integerOnly'=>true),
			array('PayOrderId', 'length', 'max'=>50),
			array('Type', 'length', 'max'=>64),
			array('Money', 'length', 'max'=>10),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('Id, Uid, LoanId, PayOrderId, Type, Money, Update_time, Create_time', 'safe', 'on'=>'search'),
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
			'Id' => 'ID',
			'Uid' => 'Uid',
			'LoanId' => 'Loan',
			'PayOrderId' => 'Pay Order',
			'Type' => 'Type',
			'Money' => 'Money',
			'Update_time' => 'Update Time',
			'Create_time' => 'Create Time',
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

		$criteria->compare('Id',$this->Id);
		$criteria->compare('Uid',$this->Uid);
		$criteria->compare('LoanId',$this->LoanId);
		$criteria->compare('PayOrderId',$this->PayOrderId,true);
		$criteria->compare('Type',$this->Type,true);
		$criteria->compare('Money',$this->Money,true);
		$criteria->compare('Update_time',$this->Update_time);
		$criteria->compare('Create_time',$this->Create_time);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return LogPayment the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
