<?php

class LogGainClickDao extends BaseDao {

	protected $table = '`log_gain_click`';

	function __construct()
	{
		parent::__construct();
	}

	public function getSingleIncomeByLoanId($loanId)
	{
		$sql = "SELECT * FROM {$this->table} WHERE LoanId=:LoanId ORDER BY Create_time DESC LIMIT 1";
	    $bindParam['singleParam'] = true;
	    $bindParam['value'] = array(":LoanId",$loanId,PDO::PARAM_INT);
	    $CDbDataReaderMethod = 'queryRow';

	    return $this->packSql($sql, $bindParam,$CDbDataReaderMethod);
	}

	public function getSingleIncomeByUserId($userId)
	{
		$sql = "SELECT * FROM {$this->table} WHERE Uid=:Uid ORDER BY Create_time DESC LIMIT 1";
	    $bindParam['singleParam'] = true;
	    $bindParam['value'] = array(":Uid",$id,PDO::PARAM_INT);
	    $CDbDataReaderMethod = 'queryRow';

	    return $this->packSql($sql, $bindParam,$CDbDataReaderMethod);
	}

	public function getLoanIdsByUserId($userId)
	{
		$sql = "SELECT * FROM {$this->table} WHERE Uid=:Uid ORDER BY Create_time DESC";
	    $bindParam['singleParam'] = true;
	    $bindParam['value'] = array(":Uid",$userId,PDO::PARAM_INT);
	    $CDbDataReaderMethod = 'queryAll';

	    return $this->packSql($sql, $bindParam,$CDbDataReaderMethod);
	}

	public  function getlogByUserLoan($loanId,$userId)
	{
		$sql = "SELECT * FROM {$this->table} WHERE LoanId=:LoanId AND Uid=:Uid ORDER BY Create_time DESC LIMIT 1";
	    $bindParam['singleParam'] = false;
	    $bindParam['value'][] = array(":LoanId",$loanId,PDO::PARAM_INT);
	    $bindParam['value'][] = array(":Uid",$userId,PDO::PARAM_INT);
	    $CDbDataReaderMethod = 'execute';

	    return $this->packSql($sql, $bindParam,$CDbDataReaderMethod);
	}
}