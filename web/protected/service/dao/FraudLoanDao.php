<?php

class FraudLoanDao extends BaseDao {

	protected $table = '`fraud_loan`';

	function __construct()
	{
		parent::__construct();
	}


	public function getLoan($id)
	{
		$sql = "SELECT * from {$this->table} WHERE LoanId= :LoanId";
	    $bindParam['singleParam'] = true;
	    $bindParam['value'] = array(":LoanId",$id,PDO::PARAM_INT);
	    $CDbDataReaderMethod = 'queryRow';

	    return $this->packSql($sql, $bindParam, $CDbDataReaderMethod );
	}

	public function getTopLoan($topNum)
	{
		// SELECT * FROM `loan` ORDER BY Income ASC LIMIT 1,5
		$sql = "SELECT * FROM {$this->table} ORDER BY Income DESC LIMIT {$topNum};";
	    $bindParam = null;

	    return $this->packSql($sql, $bindParam);
	}

	public function getRandomLoan($amount)
	{
		$sql = "SELECT  *  FROM {$this->table} order by rand() limit {$amount};";
	    $bindParam = null;

	    return $this->packSql($sql, $bindParam);
	}

	public function pagingLoan()
	{
	    $sql = "SELECT * FROM `loan` ORDER BY Create_time DESC";
        $criteria=new CDbCriteria();
        $resultSql = Yii::app()->db->createCommand($sql)->query();

        $pages=new CPagination($resultSql->rowCount);
        $pages->pageSize=4; 
        $pages->applyLimit($criteria); 
        $resultSql=Yii::app()->db->createCommand($sql." LIMIT :offset,:limit"); 
        $resultSql->bindValue(':offset', $pages->currentPage*$pages->pageSize); 
        $resultSql->bindValue(':limit', $pages->pageSize); 
        $posts=$resultSql->query();

        return $result=array('pages'=>$pages,'posts'=>$posts);
	}
}