<?php

/**
 * This is the model class for table "user_admin".
 *
 * The followings are the available columns in table 'user_admin':
 * @property integer $Uid
 * @property string $UserName
 * @property string $Password
 * @property integer $Purview
 * @property integer $salt
 * @property integer $LastTime
 * @property integer $LastIp
 */
class UserAdmin extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'user_admin';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('UserName, Password', 'required'),
			array('Purview, salt, LastTime, LastIp', 'numerical', 'integerOnly'=>true),
			array('UserName, Password', 'length', 'max'=>64),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('Uid, UserName, Password, Purview, salt, LastTime, LastIp', 'safe', 'on'=>'search'),
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
			'UserName' => 'User Name',
			'Password' => 'Password',
			'Purview' => 'Purview',
			'salt' => 'Salt',
			'LastTime' => 'Last Time',
			'LastIp' => 'Last Ip',
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
		$criteria->compare('UserName',$this->UserName,true);
		$criteria->compare('Password',$this->Password,true);
		$criteria->compare('Purview',$this->Purview);
		$criteria->compare('salt',$this->salt);
		$criteria->compare('LastTime',$this->LastTime);
		$criteria->compare('LastIp',$this->LastIp);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return UserAdmin the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
