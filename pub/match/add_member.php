<?php

$title = "添加队员";
if(isset($_POST['member_submit']))
{
	include ('../../lib/controller/member.php');
	include ('../../lib/view/header.php');
	if(add_member() != false)
	{
		echo "添加队伍成员成功";
	}
	else
	{
		echo "添加队伍成员失败";
	}
	include ('../../lib/view/footer.php');
}
else
{
	include ('../../lib/view/header.php');
	include ('../../lib/view/add_member.php');
	include ('../../lib/view/footer.php');
}

?>



