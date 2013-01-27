
<div id="content">
	<div class="main">
		<h1> 添加英雄 </h1>

		<form method="POST" class="basic-form" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>">
			<fieldset>
			<div>
				<label for="hero_id">英雄ID</label>
				<input id="hero_id" name="hero_id" type="text" maxlength="4" />	
			</div>
			
			<div>
				<label for="hero_name">名字缩写</label>
				<input id="hero_name" name="hero_name" type="text" maxlength="8" />	
			</div>
			
			<div>
				<label for="hero_nickname">昵称</label>
				<input id="hero_nickname" name="hero_nickname" type="text" maxlength="64" />	
			</div>
			
			<div>
				<label for="hero_enickname">英文昵称</label>
				<input id="hero_enickname" name="hero_enickname" type="text" maxlength="64" />	
			</div>
			
			<div>
				<label for="hero_cname">中文名字</label>
				<input id="hero_cname" name="hero_cname" type="text" maxlength="64" />	
			</div>
			
			<div>
				<label for="hero_ename">英文名字</label>
				<input id="hero_ename" name="hero_ename" type="text" maxlength="64" />	
			</div>
			
			<div>
				<label for="hero_icon">图标</label>
				<input id="hero_icon" name="hero_icon" type="text" maxlength="64" />	
			</div>

			<div>
				<label for="hero_prop_icon">属性图标</label>
				<input id="hero_prop_icon" name="hero_prop_icon" type="text" maxlength="64" />	
			</div>
			</fieldset>
			
			<fieldset>
			<div>
				<label for="hero_hp">初始生命</label>
				<input id="hero_hp" name="hero_hp" type="text" maxlength="8" />	
			</div>
			
			<div>
				<label for="hero_mp">初始魔法</label>
				<input id="hero_mp" name="hero_mp" type="text" maxlength="8" />	
			</div>

			<div>
				<label for="hero_str">力量(成长力量)</label>
				<input id="hero_str" name="hero_str" type="text" maxlength="8" />	
				<input id="hero_lvlup_str" name="hero_lvlup_str" type="text" maxlength="8" />	
			</div>

			<div>
				<label for="hero_agi">敏捷(成长敏捷)</label>
				<input id="hero_agi" name="hero_agi" type="text" maxlength="8" />	
				<input id="hero_lvlup_agi" name="hero_lvlup_agi" type="text" maxlength="8" />	
			</div>

			
			<div>
				<label for="hero_int">智慧(成长智慧)</label>
				<input id="hero_int" name="hero_int" type="text" maxlength="8" />	
				<input id="hero_lvlup_int" name="hero_lvlup_int" type="text" maxlength="8" />	
			</div>

			<div>
				<label for="hero_attack_min">初始攻击小/大</label>
				<input id="hero_attack_min" name="hero_attack_min" type="text" maxlength="8" />	
				<input id="hero_attack_max" name="hero_attack_max" type="text" maxlength="8" />	
			</div>
			
			<div>
				<label for="hero_armor">初始护甲</label>
				<input id="hero_armor" name="hero_armor" type="text" maxlength="8" />	
			</div>
			
			<div>
				<label for="hero_attack_range">攻击范围</label>
				<input id="hero_attack_range" name="hero_attack_range" type="text" maxlength="8" />	
			</div>
			
			<div>
				<label for="hero_sight_day">视野白天/晚上</label>
				<input id="hero_sight_day" name="hero_sight_day" type="text" maxlength="8" />	
				<input id="hero_sight_night" name="hero_sight_night" type="text" maxlength="8" />	
			</div>
			
			<div>
				<label for="hero_move_speed">移动速度</label>
				<input id="hero_move_speed" name="hero_move_speed" type="text" maxlength="8" />	
			</div>
			
			<div>
				<label for="hero_missile_speed">弹道速度</label>
				<input id="hero_missile_speed" name="hero_missile_speed" type="text" maxlength="8" />	
			</div>
			
			<div>
				<label for="hero_attack_anim1">攻击前摇/后摇</label>
				<input id="hero_attack_anim1" name="hero_attack_anim1" type="text" maxlength="8" />	
				<input id="hero_attack_anim2" name="hero_attack_anim2" type="text" maxlength="8" />	
			</div>
			
			<div>
				<label for="hero_cast_anim1">施法前摇/后摇</label>
				<input id="hero_cast_anim1" name="hero_cast_anim1" type="text" maxlength="8" />	
				<input id="hero_cast_anim2" name="hero_cast_anim2" type="text" maxlength="8" />	
			</div>
			
			<div>
				<label for="hero_attack_time">攻击间隔</label>
				<input id="hero_attack_time" name="hero_attack_time" type="text" maxlength="8" />	
			</div>
			
			</fieldset>
			
			<div>
				<label for="hero_story">英雄背景</label>
				<textarea id="hero_story" name="hero_story" class="basic-textarea" maxlength="2048" ></textarea>	
			</div>

			<div>
				<label for="hero_motto">英雄格言</label>
				<input id="hero_motto" name="hero_motto" type="text" maxlength="128" />	
			</div>

			<div>
				 <input type="submit" value="提交" name="hero_submit">
			</div>

		</form>
	</div> <!-- main -->


	<div class="aside">
	</div> <!-- aside -->

	<div class="extra"> </div>

</div> <!-- content -->

