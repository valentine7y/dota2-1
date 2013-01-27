<?php
require_once('common/db.php');

class Item 
{
	public $item_id;
	public $item_ename;
	public $item_cname;
	public $item_icon;
	public $item_price;
	public $item_total_price;
	public $item_desc;
	public $item_special_desc;

	public static function add_item()
	{
		if(!isset( $_POST['item_id']) || !isset( $_POST['item_ename']) || !isset($_POST['item_cname']) 
				|| !isset($_POST['item_icon']) || !isset( $_POST['item_price']) || !isset($_POST['item_tprice']) 
				|| !isset($_POST['item_desc']) || !isset($_POST['item_effect']))
		{
			return false;
		}	

		if(empty( $_POST['item_id']) || empty( $_POST['item_ename']) || empty($_POST['item_cname']) 
				|| empty($_POST['item_icon']) || empty( $_POST['item_price']) || empty($_POST['item_tprice']) 
				|| empty($_POST['item_desc']) || empty($_POST['item_effect']))
		{
			return false;
		}	

		$item_id = intval($_POST['item_id']);
		$item_ename = $_POST['item_ename'];
		$item_cname = $_POST['item_cname'];
		$item_icon = $_POST['item_icon'];
		$item_price = intval($_POST['item_price']);
		$item_tprice = intval($_POST['item_tprice']);
		$item_desc = $_POST['item_desc'];
		$item_effect = $_POST['item_effect'];

		if(!is_int($item_id) || !is_int($item_price) || !is_int($item_tprice))
		{
			return false;
		}

		$db = new DB();
		$db_link = $db->connect();
		if($db_link != false)
		{
			$query = sprintf('insert into item(item_id, item_ename, item_cname, item_icon, price, total_price, effect_desc, special_effect)
					values(%d, "%s", "%s", "%s", %d, %d, "%s", "%s")',
					$item_id, 
					mysql_real_escape_string($item_ename),
					mysql_real_escape_string($item_cname),
					mysql_real_escape_string($item_icon),
					$item_price,  
					$item_tprice,  
					mysql_real_escape_string($item_desc),
					mysql_real_escape_string($item_effect));

			if(mysql_query($query, $db_link))
			{
				return true;
			}
			else
			{
				return false;
			}
		}
		return false;
	}

	public function load($item_id)
	{
		$db = new DB();
		$db_link = $db->connect();
		if($db_link != false)
		{
			$query = sprintf('select item_ename, item_cname, item_icon, price, total_price, effect_desc, special_effect from item where item_id = %d', $item_id);
		
			$result = mysql_query($query, $db_link);
			if(mysql_num_rows($result))
			{
				$row = mysql_fetch_assoc($result);

				$this->item_id = $item_id; 
				$this->item_ename = $row['item_ename'];
				$this->item_cname = $row['item_cname'];
				$this->item_icon = $row['item_icon'];
				$this->item_price = $row['price'];
				$this->item_total_price = $row['total_price'];
				$this->item_desc = $row['effect_desc'];
				$this->item_special_desc = $row['special_effect'];
				return true;
			}
		}
		return false;
	}

	//tbd: 检查物品是否存在, 最好是从cache(redis)中load数据
	//
	public static function check_item_exist($item_id)
	{
		return true;
	}

}


?>
