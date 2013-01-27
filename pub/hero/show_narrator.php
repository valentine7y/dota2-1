<?php
$title = "解说";
include ('../../lib/common/header.php');
include ('../../lib/narrator.php');
?>

<?php
if(isset($_GET['narrator_id']) && !empty($_GET['narrator_id']) && is_int(intval($_GET['narrator_id'])))
{
	$narrator = new Narrator();
	$ret = $narrator->load($_GET['narrator_id']);
	if(!$ret)
	{
		echo "cannot find the narrator data";
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
		<h1> <?php echo $narrator->narrator_name?></h1>

		<div>
			<label>解说昵称</label>: <?php echo $narrator->narrator_nickname?>
		</div>
		
		<div>
			<label>解说图片</label>: <?php echo $narrator->narrator_pic?>
		</div>
		
		<div>
			<label>解说微博</label>: <?php echo $narrator->narrator_weibo?>
		</div>

		<div>
			<label>解说QQ</label>: <?php echo $narrator->narrator_qq?>
		</div>

		<div>
			<label>解说YY</label>: <?php echo $narrator->narrator_yy?>
		</div>
		
		<div>
			<label>解说简介</label>: <?php echo $narrator->narrator_intro?>
		</div>
	</div> <!-- main -->


	<div class="aside">
	</div> <!-- aside -->

	<div class="extra"> </div>

</div> <!-- content -->

<?php
include ('../../lib/common/footer.php');
?>
