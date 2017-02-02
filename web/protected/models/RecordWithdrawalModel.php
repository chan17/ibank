<?php

/**
 * This is the model class for table "record_withdrawal".
 *
 * The followings are the available columns in table 'record_withdrawal':
 * @property integer $id
 * @property integer $Uid
 * @property integer $Status
 * @property double $YuE
 * @property double $ColdYuE
 * @property double $OutJinE
 * @property integer $OutCount
 * @property string $OutCountName
 * @property integer $Create_time
 * @property integer $Update_time
 * @property string $Version
 */
class RecordWithdrawalModel extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'record_withdrawal';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('Uid, YuE, ColdYuE, OutJinE, Create_time, Update_time', 'required'),
			array('Uid, Status, OutCount, Create_time, Update_time', 'numerical', 'integerOnly'=>true),
			array('YuE, ColdYuE, OutJinE', 'numerical'),
			array('OutCountName, Version', 'length', 'max'=>64),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, Uid, Status, YuE, ColdYuE, OutJinE, OutCount, OutCountName, Create_time, Update_time, Version', 'safe', 'on'=>'search'),
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
			'id' => 'ID',
			'Uid' => 'Uid',
			'Status' => 'Status',
			'YuE' => 'Yu E',
			'ColdYuE' => 'Cold Yu E',
			'OutJinE' => 'Out Jin E',
			'OutCount' => 'Out Count',
			'OutCountName' => 'Out Count Name',
			'Create_time' => 'Create Time',
			'Update_time' => 'Update Time',
			'Version' => 'Version',
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

		$criteria->compare('id',$this->id);
		$criteria->compare('Uid',$this->Uid);
		$criteria->compare('Status',$this->Status);
		$criteria->compare('YuE',$this->YuE);
		$criteria->compare('ColdYuE',$this->ColdYuE);
		$criteria->compare('OutJinE',$this->OutJinE);
		$criteria->compare('OutCount',$this->OutCount);
		$criteria->compare('OutCountName',$this->OutCountName,true);
		$criteria->compare('Create_time',$this->Create_time);
		$criteria->compare('Update_time',$this->Update_time);
		$criteria->compare('Version',$this->Version,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return RecordWithdrawalModel the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
