<?php
include ('../../lib/controller/member.php');

$title = "修改队员资料"; 
if(isset($_POST['member_submit']) && isset($_POST['member_id']))
{
	$ret = update_member();

	include ('../../lib/view/header.php');
	if($ret == true)
	{
		echo "修改队伍成员信息成功";
	}
	else
	{
		echo "修改队伍成员信息失败";
	}
	include ('../../lib/view/footer.php');
	exit();
}
else if(isset($_GET['member_id']) && !empty($_GET['member_id']) && is_int(intval($_GET['member_id'])))
{
	$member = get_member($_GET['member_id']);
	if($member != false)
	{
		include ('../../lib/view/header.php');
		include ('../../lib/view/modify_member.php');
		include ('../../lib/view/footer.php');
		exit();
	}
}

error_page();

?>
