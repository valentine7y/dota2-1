
<div id="content">
	<div class="main">
		<h1> 添加比赛视频 </h1>

		<form method="POST" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>">
			<div>
				<label for="match_round_id">场次id</label>
				<input id="match_round_id" name="match_round_id" type="text" maxlength="64" />	
			</div>

			<div>
				<label for="match_video_title">标题</label>
				<input id="match_video_title" name="match_video_title" type="text" maxlength="64" />	
			</div>
			

			<div>
				<label for="match_video_url">视频链接</label>
				<input id="match_video_url" name="match_video_url" type="text" maxlength="128" />	
			</div>
			
			<div>
				<label for="match_video_date">比赛时间</label>
				<input id="match_video_date" name="match_video_date" type="text" maxlength="128" />	
			</div>
			
			<div>
				<label for="match_video_desc">视频描述</label>
				<textarea id="match_video_desc" name="match_video_desc" maxlength="1024" ></textarea>	
			</div>

			<div>
				 <input type="submit" value="提交" name="match_video_submit">
			</div>

		</form>
	</div> <!-- main -->

	<div class="aside">
	</div> <!-- aside -->

	<div class="extra"> </div>

</div> <!-- content -->

