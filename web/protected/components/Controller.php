<?php
/**
 * Controller is the customized base controller class.
 * All controller classes for this application should extend from this base class.
 */
class Controller extends CController
{
	/**
	 * @var string the default layout for the controller view. Defaults to '//layouts/column1',
	 * meaning using a single column layout. See 'protected/views/layouts/column1.php'.
	 */
	public $layout='//layouts/column1';
	/**
	 * @var array context menu items. This property will be assigned to {@link CMenu::items}.
	 */
	public $menu=array();
	/**
	 * @var array the breadcrumbs of the current page. The value of this property will
	 * be assigned to {@link CBreadcrumbs::links}. Please refer to {@link CBreeadcrumbs::links}
	 * for more details on how to specify this property.
	 */
	public $breadcrumbs=array();

	/**
	*  以下代码非系统生成, 非重写ccontroller
	*/
	protected function getCurrentUser()
	{
		$userId = Yii::app()->user->id;
		// var_dump($userId);exit();
		if (empty($userId)) {
			return array('status'=>false,'content'=>'请先登录');
		}else{
			return array('status'=>true,'content'=>$userId);
		}

	}

	public function getUserService()
	{
		$regSer = $this->creatService('User');

		return $regSer;
	}

	public function getFraudLoanService()
	{
		$result = $this->creatService('FraudLoan');

		return $result;
	}

	public function getInfoCityService()
	{
		$result = $this->creatService('InfoCity');

		return $result;
	}

	public function getLogGainClickService()
	{
		$result = $this->creatService('LogGainClick');

		return $result;
	}

	public function getLoanService()
	{
		$result = $this->creatService('Loan');

		return $result;
	}
	
	public function getInfoService()
	{
		$result = $this->creatService('Info');

		return $result;
	}

	public function getRechargeService()
	{
		$result = $this->creatService('Recharge');

		return $result;
	}

	public function getSendSMSService()
	{
		$result = $this->creatService('SendSMS');

		return $result;
	}

	protected function creatService($serviceName)
	{
		$serviceName = $serviceName.'Service';
		try {
			$result = new $serviceName;
		} catch (Exception $e) {
		    echo 'service实例化发生错误: ',  $e->getMessage(), "\n";
		}

		return $result;
	}
}