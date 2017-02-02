<?php
/**
 * 切换城市
 * @author   chan17
 */

class CityListForm extends CFormModel{
	public $province;
	public $city;

	/**
	 * 验证规则
	 * @see CModel::rules()
	 */
	public function rules(){
		return array(
			array('province, province', 'required'),
		);
	}

	/**
	 * Declares customized attribute labels.
	 * If not declared here, an attribute would have a label that is
	 * the same as its name with the first letter in upper case.
	 */
	public function attributeLabels()
	{
		return array(
			'province'=>'按省份选择',
			'city' => '选择城市',
		);
	}
}