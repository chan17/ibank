<?php

/**
 * This is the model class for table "Loan_base_info".
 *
 * The followings are the available columns in table 'Loan_base_info':
 * @property integer $LoanId
 * @property integer $Uid
 * @property integer $Loan_effect_type
 * @property string $Loan_title
 * @property integer $Loan_amount
 * @property integer $Loan_tern_type
 * @property string $Loan_description
 * @property integer $Create_time
 * @property integer $Update_time
 */
class LoanBaseInfoModel extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'loan_base_info';
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
			array('LoanId, Uid, Loan_effect_type, Loan_amount, Loan_tern_type, Create_time, Update_time', 'numerical', 'integerOnly'=>true),
			array('Loan_title', 'length', 'max'=>100),
			array('Loan_description', 'length', 'max'=>1000),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('LoanId, Uid, Loan_effect_type, Loan_title, Loan_amount, Loan_tern_type, Loan_description, Create_time, Update_time', 'safe', 'on'=>'search'),
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
			'Loan_effect_type' => '借款用途',
			'Loan_title' => '借款标题',
			'Loan_amount' => '借款金额',
			'Loan_tern_type' => '借款期限',
			'Loan_description' => '借款描述',
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

		$criteria->compare('LoanId',$this->loanId);
		$criteria->compare('Uid',$this->Uid);
		$criteria->compare('Loan_effect_type',$this->Loan_effect_type);
		$criteria->compare('Loan_title',$this->Loan_title,true);
		$criteria->compare('Loan_amount',$this->Loan_amount);
		$criteria->compare('Loan_tern_type',$this->Loan_tern_type);
		$criteria->compare('Loan_description',$this->Loan_description,true);
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
	 * @return loanBaseInfoModel the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
