
<div id="content">
	<div class="main">
		<div class="form-title">
			<h2> 补充信息 - 第二步</h2>
		</div>

		<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" enctype="multipart/form-data" method="POST" class="basic-form">
			<div class="field">
				<h2> 上传图片 </h2>
				<input id="avastar" type="file" name="avastar">
			</div>
			
			<div class="form-submit"> 
				<input type="submit" value="完成" name="signup3_submit" id="signup3_submit" class="form-submit-btn" />
				<input type="submit" value="跳过" name="signup3_skip" id="signup3_skip" class="form-submit-btn" />
			</div>

		</form>
	</div>

	<div class="aside">
	</div> <!-- aside -->

	<div class="extra clearfix"> </div>
</div> <!-- content -->


