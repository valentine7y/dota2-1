<script type="text/javascript">
	window.onload = function()
	{
		initSignup2Event();
	}
</script>

<script src="<?php echo DOMAIN_JS;?>/util.js"> </script>
<script src="<?php echo DOMAIN_JS;?>/reg.js"> </script>

<h2> 恭喜你！账号注册成功，请尽快到你的邮箱激活你的账号 </h2>

<div id="content">
	<div class="grid clearfix">
		<div class="article" style="margin-top:20px">
		<h1> 补充信息 - <span style="font-size:70%">第一步</span></h2>

		<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="POST">
			<div class="item">
				<label for="gender">性别</label>
				<span>男<input id="gender_male" type="radio" name="gender" value="1" /></span>
				<span>女<input id="gender_female" type="radio" name="gender" value="2" /></span>
				<span class="item_desc" id="email_desc"></span>
			</div>
			
			<div class="item">
				<label for="address">住址</label>
				<select id="province" name="province"> 
					<?php 
					  require('../../lib/location.php');
					  createProvince(); 
					?>
				</select>

				<select id="province_city" name="province_city"> 
					<option value="0">城市</option>
				</select>
			</div>
			
			<div class="item" style="margin-top:50px" >
				<input type="submit" value="下一步" name="signup2_submit" id="signup2_submit" />
				<input type="submit" value="跳过" name="signup2_skip" id="signup2_skip" />
			</div>

		</form>
		</div> <!-- article -->

		<div class="aside">
		</div> <!-- aside -->

	</div> <!-- grid -->
</div> <!-- content -->

