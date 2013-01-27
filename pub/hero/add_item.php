<?php
$title = "添加物品";
include ('../../lib/common/header.php');
include ('../../lib/item.php');

if(isset($_POST['item_submit']))
{
	$ret = Item::add_item();
	if($ret == true)
	{
		echo "添加物品成功";
	}
	else
	{
		echo "添加物品失败";
	}
}
else 
{
	include ('../../lib/template/add_item.php');
}

include ('../../lib/common/footer.php');
?>
