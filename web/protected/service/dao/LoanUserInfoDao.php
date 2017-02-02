<?php

class LoanUserInfoDao extends BaseDao {

	protected $table = '`loan_user_info`';

	function __construct()
	{
		parent::__construct();
	}

	public function getLoan($id)
	{
		$sql = "SELECT * from {$this->table} WHERE LoanId=:LoanId";
	    $bindParam['singleParam'] = true;
	    $bindParam['value'] = array(":LoanId",$id,PDO::PARAM_INT);
	    $CDbDataReaderMethod = 'queryRow';

	    return $this->packSql($sql, $bindParam,$CDbDataReaderMethod);
	}

	public function findLoanByIdarray($setId)
	{

		$sql = "SELECT * FROM {$this->table} WHERE LoanId in ({$setId})";
	    $bindParam = null;
	    $CDbDataReaderMethod = 'query';

	    return $this->packSql($sql, $bindParam,$CDbDataReaderMethod);	
	}

	public function findYearrevenueByUid($Uid)
	{
		$sql = "SELECT LoanId,Uid,Year_revenue FROM {$this->table} ORDER BY Create_time DESC LIMIT 1";
	    $bindParam['singleParam'] = true;
	    $bindParam['value'] = array(":Uid",$Uid,PDO::PARAM_INT);
	    $CDbDataReaderMethod = 'queryRow';

	    return $this->packSql($sql, $bindParam,$CDbDataReaderMethod);	
	}

	public function getRandomLoan($amount)
	{
		$sql = "SELECT  *  FROM {$this->table} order by rand() limit {$amount};";
	    $bindParam = null;

	    return $this->packSql($sql, $bindParam);
	}


	public function creatFraudLoan()
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
}