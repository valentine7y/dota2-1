<?php 
require_once('config.php');

class DB_pdo
{
	private $_pdo;

	public function __construct($str)
	{
		$dsn = $str . ':dbname=' . DB_SCHEMA . ';host=' . DB_HOST;

		try
		{
			$this->_pdo = new PDO($dsn, DB_USER, DB_PASSWD);
		}
		catch(PDOException $e)
		{
			die('Connect Error: ' . $e->getMessage());
		}
	}

	public function query($str)
	{
		return $this->_pdo->query($str);
	}

	public function row_count($result)
	{
		return $result->rowCount();
	}

	public function fetch($result)
	{
		return $result->fetch(PDO::FETCH_ASSOC);
	}

	public function fetch_all($result)
	{
		return $result->fetchAll(PDO::FETCH_ASSOC);
	}

	public function escape($str)
	{
		return $this->_pdo->quote($str);
	}

	public function close()
	{
	}	

	public function errno()
	{
		$error_info = $this->_pdo->errorInfo();
		return $error_info[0];
	}
	
	public function error()
	{
		$error_info = $this->_pdo->errorInfo();
		return $error_info[2];
	}

	public function execute($sql, $params)
	{
		$stmt = $this->_pdo->prepare($sql);
		if($stmt == false) return false;

		if(!empty($params))
		{
			$param_type = $params[0];
			for($i =1; $i < count($params); $i++)
			{
				$type = $this->conv_type($param_type[$i-1]);
				$stmt->bindParam($i, $params[$i], $type);
			}
		}
		$ret = $stmt->execute();
		if($ret == false) return false;

		return $stmt;
	}

	private function conv_type($str_type)
	{
		switch($str_type)
		{
			case 's':
				return PDO::PARAM_STR;

			case 'i':
				return PDO::PARAM_INT;
			
			case 'd':
				return PDO::PARAM_INT;

			default:
				return PDO::PARAM_STR;
		}
	}
	
	public function last_insert_id()
	{
		return $this->_pdo->lastInsertId(); 
	}
}
