<?php
require_once('config.php');


class DB_mysql
{
	private $_db_link;

	public function __construct()
	{
		$this->_db_link = mysql_connect(DB_HOST, DB_USER, DB_PASSWD);

		if(!$this->_db_link)
		{
			die('Connect Error (' . mysql_errno() . ')' . mysql_error());
		}

		if(!mysql_select_db(DB_SCHEMA, $this->_db_link))
		{
			die('Connect Error (' . mysql_errno() . ')' . mysql_error());
		}
	}


	public function query($str)
	{
		return mysql_query($str, $this->_db_link);
	}


	public function row_count($result)
	{
		return mysql_num_rows($result); 
	}

	public function fetch($result)
	{
		return mysql_fetch_assoc($result);
	}

	public function fetch_all($result)
	{
		$array = array();
		while($row = mysql_fetch_assoc($result))
		{
			$array[] = $row;
		}
		return $array;
	}

	public function escape($str)
	{
		return mysql_real_escape_string($str, $this->_db_link);
	}

	public function close()
	{
		mysql_close($this->_db_link);
	}
	
	public function errno()
	{
		return mysql_errno($this->_db_link);
	}

	public function error()
	{
		return mysql_error($this->_db_link);
	}

	//prepare statement, not supported
	public function execute($sql, $params)
	{
		die('Not supported prepare statement');
	}

	public function last_insert_id()
	{
		return mysql_insert_id($this->_db_link);	
	}
}



?>















