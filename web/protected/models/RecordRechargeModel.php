<?php

/**
 * This is the model class for table "record_recharge".
 *
 * The followings are the available columns in table 'record_recharge':
 * @property integer $id
 * @property integer $Uid
 * @property integer $Yue
 * @property string $ColdYue
 * @property integer $Create_time
 * @property integer $Update_time
 * @property string $Version
 */
class RecordRechargeModel extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'record_recharge';
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
			array('Yue, ColdYue, HandselYue, Create_time, Update_time', 'numerical'),
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
			'id' => 'Id',
			'Uid' => '用户ID',
			'Yue' => '余额',
			'ColdYue' => '冻结金额',
			'HandselYue' => '赠送金额',
			'Create_time' => '入库时间',
			'Update_time' => '修改时间',
			'Version' => '版本',
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
		$criteria->compare('Yue',$this->Yue);
		$criteria->compare('ColdYue',$this->ColdYue);
		$criteria->compare('HandselYue',$this->HandselYue);
		$criteria->compare('Create_time',$this->Create_time);
		$criteria->compare('Update_time',$this->Update_time);
		$criteria->compare('Version',$this->Version);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return LoanBaseInfoModel the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
