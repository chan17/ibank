<?php

class RecordClickDao extends BaseDao {

	protected $table = '`record_click`';

	function __construct()
	{
		parent::__construct();
	}

	public function getSingleIncomeByLoanId($loanId)
	{
		$sql = "SELECT LoanId,SingleIncome from {$this->table} WHERE loanId=:loanId";
	    $bindParam['singleParam'] = true;
	    $bindParam['value'] = array(":loanId",$loanId,PDO::PARAM_INT);
	    $CDbDataReaderMethod = 'queryRow';

	    return $this->packSql($sql, $bindParam,$CDbDataReaderMethod);
	}
}