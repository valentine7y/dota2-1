<?php
include ('../../lib/common/header.php');
include ('../../lib/hero_video.php');
?>

<div id="content">
	<div class="main">

<?php
if(isset($_GET['hero_id']) && !empty($_GET['hero_id']) && is_int(intval($_GET['hero_id'])))
{
		$db = new DB();
		$db_link = $db->connect();
		if($db_link != false)
		{
			$query = sprintf('select cv.narrator_id, narrator_name, video_url, title, cv.hero_id, c_name, video_desc, create_date from hero_video cv inner join hero ch on cv.hero_id = ch.hero_id inner join narrator na on cv.narrator_id = na.narrator_id where cv.hero_id = %d', $_GET['hero_id']); 
		
			$result = mysql_query($query, $db_link);
			if(mysql_num_rows($result))
			{
				while($row = mysql_fetch_array($result))
				{
					echo "<h1>" . $row["title"] ." </h1>";
					echo "<div>";
					echo "	<label>解说</label>:" . $row["narrator_name"];
					echo "</div>";

					echo "<div>";
					echo "	<label>英雄</label>:" . $row["c_name"];
					echo "</div>";

					echo "<div>";
					echo "<label>介绍</label>:" . $row["video_desc"]; 
					echo "</div>";

				}
			}
		}
}
else if(isset($_GET['video_id']) && !empty($_GET['video_id']) && is_int(intval($_GET['video_id'])))
{
	$hero_video = new Hero_video();
	$ret = $hero_video->load($_GET['video_id']);
	if(!$ret)
	{
		echo "cannot find the hero video data";
		include ('../../lib/common/footer.php');
		exit();
	}
	else
	{
		echo "<h1> $hero_video->video_title </h1>";
		echo "<div>";
		echo "	<label>解说</label>: $hero_video->narrator_name";
		echo "</div>";

		echo "<div>";
		echo "	<label>英雄</label>: $hero_video->hero_name";
		echo "</div>";

		echo "<div>";
		echo "<label>介绍</label>: $hero_video->video_desc"; 
		echo "</div>";
	}
}
else
{
		echo "wrong url";
		include ('../../lib/common/footer.php');
		exit();
}

?>

	</div> <!-- main -->


	<div class="aside">
	</div> <!-- aside -->

	<div class="extra"> </div>

</div> <!-- content -->

<?php
include ('../../lib/common/footer.php');
?>
