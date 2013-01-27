<?php
include '../../lib/user.php';

if($_REQUEST['email'] == '')
{
	echo "other";
	exit();
}

$db = new DB();
$db_link = $db->connect();
if($db_link == false)
{
	echo "other";
	exit();
}

$user = User::getByUserMail($_REQUEST['email'], $db_link);
if($user->uid)
{
	echo "deny"; 
	exit();
}
else
{
	echo "ok";
	exit();
}

?>
