<?php
include ('../../lib/controller/member.php');

if(isset($_GET['member_id']) && !empty($_GET['member_id']) && is_int(intval($_GET['member_id'])))
{
	if(($member = get_member($_GET['member_id'])) != false)
	{
		$title= $member->member_name;
		include ('../../lib/view/header.php');
		include ('../../lib/view/show_member.php');
		include ('../../lib/view/footer.php');
		exit();
	}
}

error_page();
?>


