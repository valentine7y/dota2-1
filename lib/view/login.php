
<div id="content">
	<div class="main">

		<div class="form-title">
			<h1> 登录 </h1>
		</div>

		<form id="loginForm" class="basic-form" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="POST">

			<div class="field">
				<label for="email" class="field-label">邮箱</label>
				<input name="email" maxlength="40" type="email" id="email" class="basic-input" value="<?php echo $email;?>" />
			</div>

			<div class="field">
				<label for="password" class="field-label">密码</label>
				<input name="password" maxlength="40" type="password" id="password" class="basic-input" value="<?php echo $passwd;?>" />
			</div>

			<div class="field pl120">
				<input type="checkbox" name="remLogin" id="remLogin" value="1" />
				<label class="" for="remLogin">下次自动登录(网吧用户不要选)</label>
			</div>
			
			<div class="form-submit">
				<input type="submit" title="登录" value="登录" name="login_submit" id="login_submit" class="form-submit-btn" />
				<a class="form-link" title="忘记密码" href="/user/resetpw.php/">忘记密码？</a>
			</div>

			<?php
				if(isset($err_msg))
				{
					echo '<div class="form-error">' .  $err_msg  . '</div>';
				}
			?>

		</form>

	</div> <!-- main -->

	<div class="aside">
		<div class="item">
			<p> 还没有账号? <a rel="nofollow" href="signup.php">创建账号</a></p>
		</div>
	</div> <!-- aside -->

	<div class="extra clearfix"> </div>
</div> <!-- content -->
