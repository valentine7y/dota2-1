
<div id="content">
<div class="grid clearfix">
	<div class="article">
		<h1> 登录 </h1>
		<form id="loginForm" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="POST">

			<div class="item">
				<label for="email">邮箱</label>
				<input name="email" maxlength="40" type="email" id="email" value="<?php echo $email;?>" />
			</div>

			<div class="item">
				<label for="password">密码</label>
				<input name="password" maxlength="40" type="password" id="password" value="<?php echo $passwd;?>" />
			</div>

			<div>
				<input type="checkbox" name="remLogin" id="remLogin" value="1">
				<label class="" for="remLogin">下次自动登录(网吧用户不要选)</label>
			</div>
			
			<div>
				<input type="submit" title="登录" value="登录" name="login_submit" id="login_submit" />
				<a class="form-link" title="忘记密码" href="/user/resetpw.php/">忘记密码？</a>
			</div>

		</form>

	</div> <!-- content -->

	<div class="aside">
		<p> 还没有账号? <a rel="nofollow" href="signup.php">创建账号</a></p>
	</div> <!-- aside -->

	<div class="extra"> </div>
</div> <!-- grid -->
</div> <!-- content -->
