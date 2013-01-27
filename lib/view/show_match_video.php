
<div id="content">
	<div class="main">
		<h1> <?php echo $match_video->match_video_title ?> </h1>
		
		<div>
			<label>比赛时间: <?php echo $match_video->match_video_date?> </label>
		</div>

		<div>
			<center>
				<embed width="610" height="500" quality="high" allowfullscreen="true" allowscriptaccess="always" allownetworking="internal" wmode="opaque" flashvars="MMControl=false&MMout=false;winType=interior;isShowRelatedVideo=false;showAd=0" src="<?php echo $match_video->match_video_url?>" type="application/x-shockwave-flash">
			</center>
		</div>

		<div>
			<?php echo $match_video->match_video_desc ?> 
		</div>

	</div> <!-- main -->


	<div class="aside">
	</div> <!-- aside -->

	<div class="extra"> </div>

</div> <!-- content -->

