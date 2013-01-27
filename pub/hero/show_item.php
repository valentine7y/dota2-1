<?php
$title = "物品";
include ('../../lib/common/header.php');
include ('../../lib/item.php');
?>

<?php
if(isset($_GET['item_id']) && !empty($_GET['item_id']) && is_int(intval($_GET['item_id'])))
{
	$item = new Item();
	$ret = $item->load($_GET['item_id']);
	if(!$ret)
	{
		echo "cannot find the item data";
		include ('../../lib/common/footer.php');
		exit();
	}
}
else
{
		echo "wrong url";
		include ('../../lib/common/footer.php');
		exit();
}

?>


<div id="content">
	<div class="main">
		<h1> <?php echo $item->item_cname ?></h1>

		<div>
			<label>英文名字</label>: <?php echo $item->item_ename ?>
		</div>
		
		<div>
			<label>物品图标</label>: <?php echo $item->item_icon?>
		</div>
		
		<div>
			<label>合成价格</label>: <?php echo $item->item_price?>
		</div>

		<div>
			<label>物品总价</label>: <?php echo $item->item_total_price?>
		</div>
		
		<div>
			<label>物品描述</label>: <?php echo $item->item_desc?>
		</div>

		<div>
			<label>物品特效</label>: <?php echo $item->item_special_desc?>
		</div>

	</div> <!-- main -->


	<div class="aside">
	</div> <!-- aside -->

	<div class="extra"> </div>

</div> <!-- content -->

<?php
include ('../../lib/common/footer.php');
?>
