<?php
$title = "技能";
include ('../../lib/common/header.php');
include ('../../lib/skill.php');
?>

<?php
if(isset($_GET['skill_id']) && !empty($_GET['skill_id']) && is_int(intval($_GET['skill_id'])))
{
	$skill = new Skill();
	$ret = $skill->load($_GET['skill_id']);
	if(!$ret)
	{
		echo "cannot find the skill data";
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
		<h1> <?php echo $skill->skill_name ?></h1>

		<div>
			<label>技能图标</label>: <?php echo $skill->skill_icon?>
		</div>
		
		<div>
			<label>技能范围</label>: <?php echo $skill->skill_range?>
		</div>

		<div>
			<label>技能描述</label>: <?php echo $skill->skill_desc?>
		</div>
		
	</div> <!-- main -->


	<div class="aside">
	</div> <!-- aside -->

	<div class="extra"> </div>

</div> <!-- content -->

<?php
include ('../../lib/common/footer.php');
?>
