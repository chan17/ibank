<?php
/**
* 
*/
Yii::import("application.service.dao.*"); 

class BaseService
{

	function __construct($argument)
	{
		
	}

	public function getFraudLoanDao()
	{
		return $this->creatDao('FraudLoan');
	}
	
	public function getLogSendSMSDao()
	{
		return $this->creatDao('LogSendSMS');
	}

	public function getRecordClickDao()
	{
		return $this->creatDao('RecordClick');
	}

	public function getLoanBaseInfoDao()
	{
		return $this->creatDao('LoanBaseInfo');
	}

	public function getLoanUserInfoDao()
	{
		return $this->creatDao('LoanUserInfo');
	}

	public function getLoanUserProveDao()
	{
		return $this->creatDao('LoanUserProve');
	}

	public function getLogGainClickDao()
	{
		return $this->creatDao('LogGainClick');
	}

	public function getInfoCityDao()
	{
		return $this->creatDao('InfoCity');
	}

	private function creatDao($daoName)
	{
		$daoName = $daoName.'Dao';
		try {
			$result = new $daoName;
			if (empty($result)) {
				var_dump($e->getMessage());
			}
		} catch (Exception $e) {
		    echo 'dao实例化发生错误: ',  $e->getMessage(), "\n";
		}

		return $result;
	}

// creat  service ******************************************************************
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

	public function getLoanService()
	{
		$result = $this->creatService('Loan');

		return $result;
	}

	public function getSendSMSService()
	{
		$result = $this->creatService('SendSMS');

		return $result;
	}
	
	public function getLogGainClickService()
	{
		$result = $this->creatService('LogGainClick');

		return $result;
	}

	public function getRecordClickService()
	{
		$result = $this->creatService('RecordClick');

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

?>