<?php
require_once('../../lib/common/config.php');
require_once('../../lib/common/util.php');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title> <?php echo $title; ?> </title>
  <link href="<?php echo DOMAIN_CSS;?>common.css" rel="stylesheet" type="text/css" />
  <link rel="shortcut icon" href="<?php echo DOMAIN_MAIN;?>favicon.ico" type="image/x-icon" /> 
<!--  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js" type="text/javascript"></script>
	  <script src="http://code.jquery.com/ui/1.8.21/jquery-ui.min.js" type="text/javascript"></script>
-->

</head>

<body>
  <div class="top-nav">
	  <div class="top-nav-logo">
		<a id="logo" href="/"></a>
	  </div>

	  <div class="top-nav-items">
	    <ul>
		  <li> <a href="<?php echo DOMAIN_MAIN;?>match"> 赛事</a> </li>
		  <li> <a href="<?php echo DOMAIN_MAIN;?>live"> 直播 </a> </li>
		  <li> <a href="<?php echo DOMAIN_MAIN;?>video"> 视频</a> </li>
		  <li> <a href="<?php echo DOMAIN_MAIN;?>hero"> 英雄 </a> </li>
		  <li> <a href="<?php echo DOMAIN_MAIN;?>player">玩家</a> </li>
		</ul>
	  </div>
	  
	  <div class="top-nav-user">
		<?php  try_login() ?> 
	  </div>

	  <div class="top-nav-serach">
	  </div>
  </div>

  <div id="wrapper">
    <div id="header">
	</div> <!--header -->

