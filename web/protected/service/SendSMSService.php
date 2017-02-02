<?php
/**
* 
*/
class SendSMSService extends BaseService
{
	function __construct()
	{
	}

	/*
		
	*/
	public function saveRecord($UserId, $Action, $Code ,$phone,$SmsMessageSid ,$Message ,$SendTime)
	{
		if (empty($UserId) or empty($Action) or empty($Code)or empty($phone)or empty($SmsMessageSid) or empty($Message) or empty($SendTime) ){
			throw new Exception("未获得关键参数", 1);
		}
		// 正在注册，不知道用户ID
		if ($UserId == 'unknown') {
			$UserId = 0000;
		}

		$result = $this->getLogSendSMSDao()->creatRecord($UserId, $Action, $Code,$phone,$SmsMessageSid ,$Message ,$SendTime);

		return $result;
	}

	public function getCodeByPhone($phone)
	{
		if (empty($phone)) {
			throw new Exception("未获得关键参数", 1);
		}

		$result = $this->getLogSendSMSDao()->getCodeByPhone($phone);
		if ($result == null) {
			$result = NUll; 
		}
		return $result;
	}

}