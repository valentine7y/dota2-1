<?php
$title = "添加解说";
include ('../../lib/common/header.php');
include ('../../lib/narrator.php');
?>

<?php 
	if(isset($_POST['narrator_submit']))
	{
		$ret = Narrator::add_narrator();
		if($ret == true)
		{
			echo "添加解说成功";
		}
		else
		{
			echo "添加解说失败";
		}
		include ('../../lib/common/footer.php');
		exit();
	}
?>

<div id="content">
	<div class="main">
		<h1> 添加解说 </h1>
		
		<form method="POST" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>">
			<div>
				<label for="narrator_name">解说名字</label>
				<input id="narrator_name" name="narrator_name" type="text" maxlength="8" />	
			</div>
			
			<div>
				<label for="narrator_nickname">解说昵称</label>
				<input id="narrator_nickname" name="narrator_nickname" type="text" maxlength="32" />	
			</div>

			<div>
				<label for="narrator_pic">解说图片</label>
				<input id="narrator_pic" name="narrator_pic" type="text" maxlength="32" />	
			</div>

			<div>
				<label for="narrator_weibo">解说微博</label>
				<input id="narrator_weibo" name="narrator_weibo" type="text" maxlength="64" />	
			</div>
			
			<div>
				<label for="narrator_qq">解说QQ</label>
				<input id="narrator_qq" name="narrator_qq" type="text" maxlength="16" />	
			</div>
			
			<div>
				<label for="narrator_yy">解说YY</label>
				<input id="narrator_yy" name="narrator_yy" type="text" maxlength="16" />	
			</div>
			
			<div>
				<label for="narrator_intro">解说介绍</label>
				<textarea id="narrator_intro" name="narrator_intro" maxlength="1024" > </textarea>	
			</div>

			<div>
				 <input type="submit" value="提交" name="narrator_submit">
			</div>

		</form>
	</div> <!-- main -->


	<div class="aside">
	</div> <!-- aside -->

	<div class="extra"> </div>

</div> <!-- content -->

<?php
include ('../../lib/common/footer.php');
?>
