<?php

class LoanBaseInfoDao extends BaseDao {

	protected $table = '`loan_base_info`';

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

	public function getTopLoan($topNum)
	{
		// SELECT * FROM `loan` ORDER BY Income ASC LIMIT 1,5
		$sql = "SELECT * FROM {$this->table} ORDER BY Income DESC LIMIT 0,{$topNum};";
	    $bindParam = null;
	    $CDbDataReaderMethod = 'queryAll';

	    return $this->packSql($sql, $bindParam,$CDbDataReaderMethod);
	}

	public function getRandomLoan($amount)
	{
		$sql = "SELECT  *  FROM {$this->table} order by rand() limit {$amount};";
	    $bindParam = null;
	    $CDbDataReaderMethod = 'queryAll';

	    return $this->packSql($sql, $bindParam,$CDbDataReaderMethod);
	}
	
	// public function vvvv()
	// {
	// 	$sql="SELECT username, email FROM tbl_user";
	// 	$dataReader=$connection->createCommand($sql)->query();
	// 	// 使用 $username 变量绑定第一列 (username) 
	// 	$dataReader->bindColumn(1,$username);
	// }

	// TODO 加个总数 $amount
	public function pagingLoan($cityId,$pageSize)
	{
		$sql = "SELECT * FROM {$this->table} WHERE CityId={$cityId} and Source=1 and Status<>0 ORDER BY Create_time DESC";
		// $sqlFindId = "SELECT LoanId FROM {$this->table} ORDER BY Create_time DESC";
		// $sqlFindUserId = "SELECT Uid FROM {$this->table} ORDER BY Create_time DESC";
        $resultSql = Yii::app()->db->createCommand($sql)->query();

        $criteria=new CDbCriteria();
        $pages=new CPagination($resultSql->rowCount);
        $pages->pageSize=$pageSize;
        $pages->applyLimit($criteria); 

        $resultSql=Yii::app()->db->createCommand($sql." LIMIT :offset,:limit"); 
        $resultSql->bindValue(':offset', $pages->currentPage*$pages->pageSize); 
        $resultSql->bindValue(':limit', $pages->pageSize); 
        $posts=$resultSql->queryAll();

        // // 当前ID集合  可以考虑用循环提取上面的loanid
        // $resultSqlFindId=Yii::app()->db->createCommand($sqlFindId." LIMIT :offset,:limit"); 
        // $resultSqlFindId->bindValue(':offset', $pages->currentPage*$pages->pageSize); 
        // $resultSqlFindId->bindValue(':limit', $pages->pageSize); 
        // $setId=$resultSqlFindId->queryColumn();

        // // 当前userID集合 
        // $resultSqlFindUserId=Yii::app()->db->createCommand($sqlFindUserId." LIMIT :offset,:limit"); 
        // $resultSqlFindUserId->bindValue(':offset', $pages->currentPage*$pages->pageSize); 
        // $resultSqlFindUserId->bindValue(':limit', $pages->pageSize); 
        // $setUserId=$resultSqlFindUserId->queryColumn();

        return $result=array('pages'=>$pages,'posts'=>$posts);
	}
}