<?php

/**
 * This is the model class for table "record_click".
 *
 * The followings are the available columns in table 'record_click':
 * @property integer $LoanId
 * @property integer $LoanUid
 * @property integer $Uid
 * @property double $SingleIncome
 * @property integer $Create_time
 * @property integer $Update_time
 * @property string $Version
 */
class RecordClick extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'record_click';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('LoanUid, Uid, SingleIncome, Create_time, Update_time, Version', 'required'),
			array('LoanUid, Uid, Create_time, Update_time', 'numerical', 'integerOnly'=>true),
			array('SingleIncome', 'numerical'),
			array('Version', 'length', 'max'=>64),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('LoanId, LoanUid, Uid, SingleIncome, Create_time, Update_time, Version', 'safe', 'on'=>'search'),
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
			'LoanId' => '发布的信息唯一id主键',
			'LoanUid' => '发布者id ',
			'Uid' => '点击者id',
			'SingleIncome' => '单次点击收益',
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

		$criteria->compare('LoanId',$this->LoanId);
		$criteria->compare('LoanUid',$this->LoanUid);
		$criteria->compare('Uid',$this->Uid);
		$criteria->compare('SingleIncome',$this->SingleIncome);
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
	 * @return RecordClick the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
