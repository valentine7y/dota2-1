
<div id="content">
	<div class="grid clearfix">
		<div class="article" style="margin-top:20px">
		<h1> 补充信息 - <span style="font-size:70%">第二步</span></h2>

		<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" enctype="multipart/form-data" method="POST">
			<div class="item">
				<h2> 上传图片 </h2>
				<input id="avastar" type="file" name="avastar">
			</div>
			
			<div class="item" style="margin-top:50px" >
				<input type="submit" value="完成" name="signup3_submit" id="signup3_submit" />
				<input type="submit" value="跳过" name="signup3_skip" id="signup3_skip" />
			</div>

		</form>
		</div> <!-- article -->

		<div class="aside">
		</div> <!-- aside -->

	</div> <!-- grid -->
</div> <!-- content -->


