<?php

class InfoTalkDao extends BaseDao {

	protected $table = '`info_talk`';

	function __construct()
	{
		parent::__construct();
	}

	public function getLoanType()
	{
		$sql = "SELECT * from {$this->table}";
	    $bindParam = null;

	    return $this->packSql($sql, $bindParam);
	}
}