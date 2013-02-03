
<script type="text/javascript">
	window.onload = function()
	{
		initSignup1Event();
	}
</script>

<script src="<?php echo DOMAIN_JS;?>/util.js"> </script>
<script src="<?php echo DOMAIN_JS;?>/reg.js"> </script>


<div id="content">
 <div class="main">
		<div class="form-title">
			<h1> 注册 </h1>
		</div>

		<form id="regForm" class="basic-form" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="POST">
			<h1> 注册 </h1>
			<div class="field">
				<label for="email" class="field-label">邮箱</label>
				<input name="email" maxlength="40" type="text" id="email" class="basic-input" 
							 value="<?php if(isset($_POST['email'])) echo $_POST['email'];?>" />
				<span class="field-desc" id="email_desc"></span>
			</div>

			<div class="field">
				<label for="passwd1" class="field-label">密码</label>
				<input name="passwd1" maxlength="20" type="password" id="passwd1"  class="basic-input"  
							 value="<?php if(isset($_POST['passwd1'])) echo $_POST['passwd1']; ?>" />
				<span class="field-desc" id="passwd1_desc"></span>
			</div>
			
			<div class="field">
				<label for="passwd2" class="field-label">确认密码</label>
				<input name="passwd2" maxlength="20" type="password" id="passwd2" class="basic-input" 
							 value="<?php if(isset($_POST['passwd2'])) echo $_POST['passwd2']; ?>" />
				<span class="field-desc" id="passwd2_desc"></span>
			</div>
			
			<div class="field">
				<label for="username" class="field-label">昵称</label>
				<input name="username" maxlength="16" type="text" id="username" class="basic-input"  
							 value="<?php if(isset($_POST['username'])) echo $_POST['username']; ?>" />
				<span class="field-desc", id="username_desc"></span>
			</div>
			
			<div class="field clearfix">
				<label for="captcha" class="field-label">验证码</label>
				<input name="captcha" maxlength="4" type="text" class="basic-input"  id="captcha" />
				<img id="captcha_img" src="./captcha.php?width=100&height=40&characters=4" />
				<span class="field-desc">看不清?<a href="#" id="changeCaptcha">换一张</a></span>
				<span class="field-desc", id="captcha_desc"></span>
			</div>

			<div class="form-submit">
				<input type="submit" value="注册" name="signup1_submit" id="signup1_submit"  class="form-submit-btn"/>
			</div>
			
			<?php
				if(isset($err_msg))
				{
					echo '<div class="form-error">' .  $err_msg[$ret]  . '</div>';
				}
			?>
		</form>
	</div>

	<div class="aside">
		<div class="item">
			<p> 已经有账号? <a rel="nofollow" href="login.php">直接登录</a></p>
		</div>
	</div> <!-- aside -->

	<div class="extra clearfix"> </div>
</div> <!-- content -->

