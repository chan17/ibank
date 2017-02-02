<?php

class InfoCityDao extends BaseDao
{

	protected $table = '`info_city`';

	function __construct()
	{
		parent::__construct();
	}

	public function getCityById($id)
	{
		$sql = "SELECT * from {$this->table} WHERE CityId=:CityId";
	    $bindParam['singleParam'] = true;
	    $bindParam['value'] = array(":CityId",$id,PDO::PARAM_INT);
	    $CDbDataReaderMethod = 'queryRow';

	    return $this->packSql($sql, $bindParam,$CDbDataReaderMethod);
	}

	public function getCityByParentId($id)
	{
		$sql = "SELECT * from {$this->table} WHERE ParentId=:ParentId";
	    $bindParam['singleParam'] = true;
	    $bindParam['value'] = array(":ParentId",$id,PDO::PARAM_INT);
	    $CDbDataReaderMethod = 'queryAll';

	    return $this->packSql($sql, $bindParam,$CDbDataReaderMethod);
	}

	public function findCityNameByIdarray($setId)
	{

		$sql = "SELECT CityId,Name FROM {$this->table} WHERE CityId in ({$setId})";
	    $bindParam = null;
	    $CDbDataReaderMethod = 'query';

	    return $this->packSql($sql, $bindParam,$CDbDataReaderMethod);	
	}
	
	public function getAllCity()
	{
		$sql = "SELECT * FROM {$this->table}";
	    $bindParam = null;
	    $CDbDataReaderMethod = 'queryAll';

	    return $this->packSql($sql, $bindParam,$CDbDataReaderMethod);
	}
}