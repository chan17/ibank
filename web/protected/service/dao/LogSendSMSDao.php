<?php

class LogSendSMSDao extends BaseDao {

	protected $table = '`log_sendsms`';

	function __construct()
	{
		parent::__construct();
	}

	public function creatRecord($UserId, $Action, $Code ,$phone,$SmsMessageSid ,$Message ,$SendTime)
	{
		$sql = "INSERT INTO {$this->table} (UserId, Action, Code ,Phone,SmsMessageSid ,Message ,SendTime) VALUES(:UserId, :Action, :Code, :Phone ,:SmsMessageSid ,:Message ,:SendTime)";
	    $bindParam['singleParam'] = false;
	    $bindParam['value'][] = array(":UserId",$UserId,PDO::PARAM_INT);
	    $bindParam['value'][] = array(":Action",$Action,PDO::PARAM_INT);
	    $bindParam['value'][] = array(":Code",$Code,PDO::PARAM_INT);
	    $bindParam['value'][] = array(":Phone",$phone,PDO::PARAM_INT);
	    $bindParam['value'][] = array(":SmsMessageSid",$SmsMessageSid,PDO::PARAM_INT);
	    $bindParam['value'][] = array(":Message",$Message,PDO::PARAM_INT);
	    $bindParam['value'][] = array(":SendTime",$SendTime,PDO::PARAM_INT);
	    $CDbDataReaderMethod = 'execute';

	    return $this->packSql($sql, $bindParam,$CDbDataReaderMethod);
	}

	public function getCodeByPhone($phone)
	{
			throw new Exception("55555", 1);

		$sql = "SELECT * from {$this->table} WHERE Phone= :Phone ORDER BY SendTime DESC LIMIT 1;";
	    $bindParam['singleParam'] = true;
	    $bindParam['value'] = array(":Phone",$phone,PDO::PARAM_INT);
	    $CDbDataReaderMethod = 'queryRow';

	    return $this->packSql($sql, $bindParam, $CDbDataReaderMethod);
	}


}