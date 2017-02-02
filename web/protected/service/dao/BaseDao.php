<?php
class BaseDao{
	public $connection;

	function __construct()
	{
		$this->connection=Yii::app()->db;
	}

	/*
	*	$command->bindParam 方法的参数放zai  $bindParam 里;;

		$sql = "SELECT * from {$this->table} WHERE LoanId= :LoanId";
	    $bindParam['singleParam'] = true;
	    $bindParam['value'] = array(":LoanId",$id,PDO::PARAM_INT);
	*/
	protected function packSql($sql, $bindParam,$CDbDataReaderMethod = 'query')
	{
		// 用法：$bindParam == null直接运行参数内的SQL。
			// $bindParam != null 开始运行bindParam里的条件
		$transaction=$this->connection->beginTransaction();
		try{
			// $sql = "SELECT * from {$table} WHERE LoanId= :LoanId";

		    $command = $this->connection->createCommand($sql);
		    // $bindParam = $command->bindParam(":LoanId",$id,PDO::PARAM_INT);
		    if ($bindParam != null) {
			    if ($bindParam['singleParam'] == false) {
			    	// $bindParam['value'] = array();
			    	foreach ($bindParam['value'] as $key => $value) {
					    $command->bindParam($value[0],$value[1],$value[2]);
			    	}
			    }else{
				    $command->bindParam($bindParam['value'][0],$bindParam['value'][1],$bindParam['value'][2]);
			    }
		    }

		    $result = $command->$CDbDataReaderMethod();
		    $transaction->commit();
		    
		    return $result;
		}
		catch(Exception $e){ // 如果有一条查询失败，则会抛出异常
		    $transaction->rollBack();
			echo 'sql执行发生错误: ',  $e->getMessage(), "\n";
		}
	}
}