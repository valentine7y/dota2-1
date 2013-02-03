<script type="text/javascript">
	window.onload = function()
	{
		initSignup2Event();
	}
</script>

<script src="<?php echo DOMAIN_JS;?>/util.js"> </script>
<script src="<?php echo DOMAIN_JS;?>/reg.js"> </script>


<div id="content">
	<div class="main">
		<div class="form-title">
			<h2> 恭喜你！账号注册成功，请尽快到你的邮箱激活你的账号 </h2>
			<h2> 补充信息 - 第一步</h2>
		</div>

		<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="POST" class="basic-form">

			<div class="field">
				<label for="gender" class="field-label">性别</label>
				<span>男<input id="gender_male" type="radio" name="gender" value="1" /></span>
				<span>女<input id="gender_female" type="radio" name="gender" value="2" /></span>
				<span class="field-desc" id="email_desc"></span>
			</div>
			
			<div class="field">
				<label for="address" class="field-label">住址</label>
				<select id="province" name="province"> 
					<?php 
					  require_once('../../lib/common/location.php');
					  createProvince(); 
					?>
				</select>

				<select id="province_city" name="province_city"> 
					<option value="0">城市</option>
				</select>
			</div>
			
			<div class="form-submit"> 
				<input type="submit" value="下一步" name="signup2_submit" id="signup2_submit" class="form-submit-btn"/>
				<input type="submit" value="跳过" name="signup2_skip" id="signup2_skip" class="form-submit-btn" />
			</div>

		</form>

	</div>

	<div class="aside">
		<div class="item">
			<p> 已经有账号? <a rel="nofollow" href="login.php">直接登录</a></p>
		</div>
	</div> <!-- aside -->

	<div class="extra clearfix"> </div>
</div> <!-- content -->

