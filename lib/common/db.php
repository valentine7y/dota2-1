<?php
require_once('config.php');
include('db_mysqli.php');
include('db_pdo.php');
include('db_mysql.php');


class DB
{
	private $_db;

	public function __construct()
	{
		switch(DB_DRIVER)
		{
			case 0:
				$this->_db = new DB_mysqli();
			break;

			case 1:
				$this->_db = new DB_mysql();
			break;

			case 2:
				$this->_db = new DB_pdo('mysql');
			break;


			default:
				die('Not supported db driver');
			break;
		}
	}	


	public function __destruct()
	{
	}


	public function query($str)
	{
		return $this->_db->query($str);
	}

	public function row_count($result)
	{
		return $this->_db->row_count($result);
	}


	public function fetch($result)
	{
		return $this->_db->fetch($result);
	}

	public function fetch_all($result)
	{
		return $this->_db->fetch_all($result);
	}

	public function escape($str)
	{
		return $this->_db->escape($str);
	}


	public function close()
	{
		return $this->_db->close();
	}

	public function errno()
	{
		return $this->_db->errno();
	}

	public function error()
	{
		return $this->_db->error();
	}

	//prepare statement
	public function execute($sql, $params)
	{
		return $this->_db->execute($sql, $params); 
	}

	public function last_insert_id()
	{
		return $this->_db->last_insert_id();
	}
}



?>
