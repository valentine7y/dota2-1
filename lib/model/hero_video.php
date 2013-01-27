<?php
require_once('common/db.php');

class Hero_video
{
	public $video_id;
	public $video_url;
	public $video_title;
	public $hero_id;
	public $hero_name;
	public $narrator_id;
	public $narrator_name;
	public $video_desc;
	public $create_date;

	public static function add_video()
	{
		if(!isset( $_POST['hero_video_title']) || !isset( $_POST['narrator_id']) || !isset($_POST['hero_id']) 
				|| !isset($_POST['hero_video_url']) || !isset( $_POST['hero_video_date']) || !isset($_POST['hero_video_desc']))
		{
			return false;
		}	

		if(empty( $_POST['hero_video_title']) || empty( $_POST['narrator_id']) || empty($_POST['hero_id']) 
				|| empty($_POST['hero_video_url']) || empty( $_POST['hero_video_date']) || empty($_POST['hero_video_desc']))
		{
			return false;
		}	

		$hero_id = intval($_POST['hero_id']);
		$narrator_id = intval($_POST['narrator_id']);
		$hero_video_title = $_POST['video_title'];
		$hero_video_url = $_POST['hero_video_url'];
		$hero_video_date = $_POST['hero_video_date'];
		$hero_video_desc = $_POST['hero_video_desc'];

		if(!is_int($hero_id) || !is_int($narrator_id))
		{
			return false;
		}

		$db = new DB();
		$db_link = $db->connect();
		if($db_link != false)
		{
			$query = sprintf('insert into hero_video(hero_id, narrator_id, hero_video_url, hero_video_title, hero_video_desc, hero_video_date)
					values(%d, "%s", "%s", %d, "%s", "%s")',
					$hero_id,
					$narrator_id, 
					mysql_real_escape_string($hero_video_url),
					mysql_real_escape_string($hero_video_title),
					mysql_real_escape_string($hero_video_desc),
					mysql_real_escape_string($hero_video_date));

			if(mysql_query($query, $db_link))
			{
				return mysql_insert_id() ;
			}
			else
			{
				return false;
			}

		}
	}
 
	public function load($video_id)
	{
		$db = new DB();
		$db_link = $db->connect();
		if($db_link != false)
		{
			$query = sprintf('select cv.narrator_id, narrator_name, hero_video_url, hero_video_title, cv.hero_id, c_name, 
hero_video_desc, hero_video_date from hero_video cv inner join hero ch on cv.hero_id = ch.hero_id inner join narrator na on cv.narrator_id = na.narrator_id where hero_video_id = %d', $video_id); 
		
			$result = mysql_query($query, $db_link);
			if(mysql_num_rows($result))
			{
				$row = mysql_fetch_assoc($result);

				$this->video_id = $video_id;
				$this->hero_id = $row['hero_id'];
				$this->hero_name = $row['c_name'];
				$this->narrator_id = $row['narrator_id'];
				$this->narrator_name = $row['narrator_name'];
				$this->video_url = $row['hero_video_url'];
				$this->video_title = $row['hero_video_title'];
				$this->video_desc = $row['hero_video_desc'];
				$this->create_date = $row['hero_video_date'];
				return true;
			}
		}
		return false;
	}


	public static function load_hero_video($hero_id)
	{
		$db = new DB();
		$db_link = $db->connect();
		if($db_link != false)
		{
			$query = sprintf('select hero_video_id, cv.narrator_id, narrator_name, video_url, title, video_desc, create_date from hero_video cv inner join narrator na on cv.narrator_id = na.narrator_id where hero_id = %d', $hero_id); 
			
			$result = mysql_query($query, $db_link);
			if(mysql_num_rows($result))
			{
				$hero_videos = Array();
				while($row = mysql_fetch_assoc($result))
				{
					$hero_video = new Hero_video();

					$hero_video->video_id = $row['hero_video_id'];
					$hero_video->hero_id = $row['hero_id'];
					$hero_video->narrator_id = $row['narrator_id'];
					$hero_video->narrator_name = $row['narrator_name'];
					$hero_video->video_url = $row['hero_video_url'];
					$hero_video->video_title = $row['hero_video_title'];
					$hero_video->video_desc = $row['hero_video_desc'];
					$hero_video->create_date = $row['hero_video_date'];
					array_push($hero_videos, $hero_video);
				}
				return $hero_videos;
			}
		}
		return false;
	}

}

