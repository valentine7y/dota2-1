<?php
include '../../lib/model/user.php';

if($_REQUEST['email'] == '')
{
	echo "other";
	exit();
}

if(User::isEmailExist($_REQUEST['email']))
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
