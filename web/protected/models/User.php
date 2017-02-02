<?php

/**
 * This is the model class for table "user".
 *
 * The followings are the available columns in table 'user':
 * @property integer $Uid
 * @property integer $Qqopenid
 * @property string $Nickname
 * @property string $Password
 * @property string $Salt
 * @property integer $Gender
 * @property string $Level
 * @property integer $Email
 * @property integer $Face
 * @property integer $Type
 * @property integer $Status
 * @property string $True_name
 * @property string $Phone
 * @property integer $PhoneVerified
 * @property string $Roles
 * @property string $City
 * @property integer $CityId
 * @property string $Id_number
 * @property integer $CheckidNum
 * @property integer $CheckTel
 * @property integer $CheckName
 * @property integer $CheckOutPwd
 * @property integer $OutMoneyPwd
 * @property integer $IsBlack
 * @property integer $Create_time
 * @property integer $Update_time
 * @property integer $Version
 */
class User extends CActiveRecord
{

	public $IsBlack = 0;
	public $Version='beta';
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'user';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			// array('Nickname, Password, Salt, Gender, Level, Email, Face, Type, Status, True_name, Phone, PhoneVerified, Roles, City, CityId, Id_number, CheckidNum, CheckTel, CheckName, CheckOutPwd, OutMoneyPwd, IsBlack, Create_time, Update_time, Version', 'required'),
			// array('Qqopenid, Gender, Email, Face, Type, Status, Phone, PhoneVerified, CityId, CheckidNum, CheckTel, CheckName, CheckOutPwd, OutMoneyPwd, IsBlack, Create_time, Update_time, Version', 'numerical', 'integerOnly'=>true),
			// array('Nickname, Password, City', 'length', 'max'=>64),
			// array('Salt', 'length', 'max'=>32),
			// array('Level', 'length', 'max'=>5),
			// array('True_name', 'length', 'max'=>7),
			// array('Roles', 'length', 'max'=>255),
			// array('Id_number', 'length', 'max'=>19),
			// // The following rule is used by search().
			// // @todo Please remove those attributes that should not be searched.
			// array('Uid, Qqopenid, Nickname, Password, Salt, Gender, Level, Email, Face, Type, Status, True_name, Phone, PhoneVerified, Roles, City, CityId, Id_number, CheckidNum, CheckTel, CheckName, CheckOutPwd, OutMoneyPwd, IsBlack, Create_time, Update_time, Version', 'safe', 'on'=>'search'),

			array('Nickname,Phone, Password', 'required'),
			array('Phone', 'length', 'max'=>11),
			array('Phone','match','pattern'=>'/^1\d{10}$/','message'=>'手机填写不正确'),
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
			'Uid' => '主键',
			'Qqopenid' => 'Qq登入成功返回的openid',
			'Nickname' => '用户名称',
			'Password' => '密码',
			'Salt' => 'Salt',
			'Gender' => '性别 男1，女0',
			'Level' => '等级 (AAAAA)',
			'Email' => 'Email',
			'Face' => '头像链接',
			'Type' => '用户类型',
			'Status' => '借款状态:0：未成交 1：已成交 2：已关闭 3：未审核',
			'True_name' => '真实姓名',
			'Phone' => '电话',
			'PhoneVerified' => '手机是否验证：0没，1已',
			'Roles' => 'Roles',
			'City' => '城市',
			'CityId' => '城市ID',
			'Id_number' => '身份证号',
			'CheckidNum' => '整型标示：身份证号码是否已认证',
			'CheckTel' => '整型标示：手机号码是否已认证',
			'CheckName' => '整型标示：姓名是否已认证',
			'CheckOutPwd' => '整型标示：提款密码是否已设置',
			'OutMoneyPwd' => '提款密码',
			'IsBlack' => '整型标示：是否黑名单',
			'Create_time' => '数据创建时间（系统设置，其他人不能更改）',
			'Update_time' => '数据更新时间（系统设置，其他人不能更改）',
			'Version' => '当前数据的版本号（系统设置，其他人不能更改）',
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
		$criteria->compare('Qqopenid',$this->Qqopenid);
		$criteria->compare('Nickname',$this->Nickname,true);
		$criteria->compare('Password',$this->Password,true);
		$criteria->compare('Salt',$this->Salt,true);
		$criteria->compare('Gender',$this->Gender);
		$criteria->compare('Level',$this->Level,true);
		$criteria->compare('Email',$this->Email);
		$criteria->compare('Face',$this->Face);
		$criteria->compare('Type',$this->Type);
		$criteria->compare('Status',$this->Status);
		$criteria->compare('True_name',$this->True_name,true);
		$criteria->compare('Phone',$this->Phone);
		$criteria->compare('PhoneVerified',$this->PhoneVerified);
		$criteria->compare('Roles',$this->Roles,true);
		$criteria->compare('City',$this->City,true);
		$criteria->compare('CityId',$this->CityId);
		$criteria->compare('Id_number',$this->Id_number,true);
		$criteria->compare('CheckidNum',$this->CheckidNum);
		$criteria->compare('CheckTel',$this->CheckTel);
		$criteria->compare('CheckName',$this->CheckName);
		$criteria->compare('CheckOutPwd',$this->CheckOutPwd);
		$criteria->compare('OutMoneyPwd',$this->OutMoneyPwd);
		$criteria->compare('IsBlack',$this->IsBlack);
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
	 * @return User the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
