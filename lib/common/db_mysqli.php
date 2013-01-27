<?php
require_once('config.php');
require_once('util.php');


class DB_mysqli
{
	private $_mysqli;

	public function __construct()
	{
		$this->_mysqli = new mysqli(DB_HOST, DB_USER, DB_PASSWD, DB_SCHEMA);

		if($this->_mysqli->connect_error)
		{
			die('Connect Error (' . $_mysqli->connect_errno . ')' . $_mysqli->connect_error);
		}
	}


	public function query($str)
	{
		return $this->_mysqli->query($str);
	}

	public function row_count($result)
	{
		return $result->num_rows;
	}

	public function fetch($result)
	{
		if($result instanceof mysqli_stmt)
		{
			$result->store_result();
			
			$row = array();
			$variables = array();
			$data = array();
			
			$meta = $result->result_metadata();
			if($meta == false) return false;

			while($field = $meta->fetch_field())
			{
				$variables[] = &$data[$field->name];
			}
			
			call_user_func_array(array($result, 'bind_result'), $variables);

			if($result->fetch())
			{
				foreach($data as $k => $v)
					$row[$k] = $v;

				return $row;
			}
			return false;
		}
		else if($result instanceof mysqli_result)
		{
			return $result->fetch_assoc();
		}
		
		return false;
	}

	public function fetch_all($result)
	{
		$array = array();
		if($result instanceof mysqli_stmt)
		{
			$result->store_result();
			
			$row = array();
			$variables = array();
			$data = array();
			
			$meta = $result->result_metadata();
			if($meta == false) return false;

			while($field = $meta->fetch_field())
			{
				$variables[] = &$data[$field->name];
			}
			
			call_user_func_array(array($result, 'bind_result'), $variables);

			$i = 0;
			while($result->fetch())
			{
				$array[$i] = array();
				foreach($data as $k => $v)
				{
					$array[$i][$k] = $v;
				}
				++$i;
			}

			return $array;
		}
		else if($result instanceof mysqli_result)
		{
			while($row = $result->fetch_assoc())
			{
				$array[] = $row;
			}
			return $array;
		}
		
		return false;
	}

	public function escape($str)
	{
		return $this->_mysqli->real_escape_string($str);
	}

	public function close()
	{
		return $this->_mysqli->close();
	}

	public function errno()
	{
		return $this->_mysqli->errno;
	}
	
	public function error()
	{
		return $this->_mysqli->error;
	}

	//prepare statement
	public function execute($sql, $params)
	{
		$stmt = $this->_mysqli->prepare($sql);
		if($stmt == false) 
		{
			log_error(LOG_DEBUG, 'mysqli prepare error: (' . $this->_mysqli->errno . ')' . $this->_mysqli->error);
			return false;
		}

		if(!empty($params))
		{
			call_user_func_array(array($stmt, 'bind_param'), get_array_ref($params));
		}

		$ret = $stmt->execute();
		if($ret == false) 
		{
			log_error(LOG_DEBUG, 'mysqli execute error: (' . $stmt->errno . ')' . $stmt->error);
			return false;
		}
		return $stmt;
	}

	public function last_insert_id()
	{
		return $this->_mysqli->insert_id;
	}
}



?>
