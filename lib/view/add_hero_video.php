
<div id="content">
	<div class="main">
		<h1> 添加英雄视频 </h1>

		<form method="POST" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>">
			<div>
				<label for="hero_id">英雄</label>
				<input id="hero_id" name="hero_id" type="text" maxlength="8" />	
			</div>
			
			<div>
				<label for="narrator_id">解说</label>
				<select id="narrator_id" name="narrator_id" />	
					<option value="1">小苍</option>
					<option value="2">JY</option>
					<option value="3">JokeR</option>
					<option value="4">小楼</option>
					<option value="5">南风</option>
					<option value="6">海公公</option>
					<option value="7">枪炮</option>
					<option value="8">虎妞</option>
				</select>
			</div>

			<div>
				<label for="hero_video_title">标题</label>
				<input id="hero_video_title" name="hero_video_title" type="text" maxlength="64" />	
			</div>

			
			<div>
				<label for="hero_video_url">视频链接</label>
				<input id="hero_video_url" name="hero_video_url" type="text" maxlength="128" />	
			</div>
			
			<div>
				<label for="hero_video_date">创建时间</label>
				<input id="hero_video_date" name="hero_video_date" type="text" maxlength="128" />	
			</div>
			
			<div>
				<label for="hero_video_desc">视频描述</label>
				<textarea id="hero_video_desc" name="hero_video_desc" maxlength="1024" > </textarea>	
			</div>

			<div>
				 <input type="submit" value="提交" name="hero_video_submit">
			</div>

		</form>
	</div> <!-- main -->

	<div class="aside">
	</div> <!-- aside -->

	<div class="extra"> </div>

</div> <!-- content -->

