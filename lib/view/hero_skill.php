
<div id="content">
	<div class="main">
		<h1> <?php echo $title?></h1>
		
		<form method="POST" class="basic-form" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>">

			<?php 
				if(isset($skill)){ 
					echo '<input id="skill_id" name="skill_id" type="hidden" value="' .  $skill->skill_id . '" /> ';
				}
			?>

			<div>
				<label for="hero_id">英雄id</label>
				<input id="hero_id" name="hero_id" type="text" maxlength="8" 
							value="<?php if(isset($skill))echo $skill->hero_id ?>"/>	
			</div>

			<div>
				<label for="skill_name">技能名字</label>
				<input id="skill_name" name="skill_name" type="text" maxlength="32"
							value="<?php if(isset($skill))echo $skill->skill_name ?>"/>	
			</div>

			<div>
				<label for="skill_icon">技能图标</label>
				<input id="skill_icon" name="skill_icon" type="text" maxlength="128"
							value="<?php if(isset($skill))echo $skill->skill_icon ?>"/>	
			</div>
			
			<div>
				<label for="skill_seq">技能序列</label>
				<input id="skill_seq" name="skill_seq" type="text" maxlength="8"
							value="<?php if(isset($skill))echo $skill->skill_seq ?>"/>	
			</div>
			
			<div>
				<label for="skill_type">技能类型</label>
				<select id="skill_type" name="skill_type">
					<option value="1" <?php if(isset($skill) && $skill->skill_type == 1) echo 'selected="selected"' ?> >主动技能</option>
					<option value="2" <?php if(isset($skill) && $skill->skill_type == 2) echo 'selected="selected"' ?> >被动技能</option>
				</select>
			</div>

			<div>
				<label for="skill_mp">技能耗蓝</label>
				<input id="skill_mp" name="skill_mp" type="text" maxlength="64"
							value="<?php if(isset($skill))echo $skill->skill_mp ?>"/>	
			</div>
			
			<div>
				<label for="skill_cd">技能cd</label>
				<input id="skill_cd" name="skill_cd" type="text" maxlength="64" 
							value="<?php if(isset($skill))echo $skill->skill_cd ?>"/>	
			</div>
			
			<div>
				<label for="skill_scope">作用范围</label>
				<input id="skill_scope" name="skill_scope" type="text" maxlength="64" 
							value="<?php if(isset($skill))echo $skill->skill_scope ?>"/>	
			</div>

			<div>
				<label for="skill_target">作用目标</label>
				<input id="skill_target" name="skill_target" type="text" maxlength="64"
							value="<?php if(isset($skill))echo $skill->skill_target?>" />
			</div>
			
			<div>
				<label for="skill_dmg_type">伤害类型</label>
				<input id="skill_dmg_type" name="skill_dmg_type" type="text" maxlength="64" 
							value="<?php if(isset($skill))echo $skill->skill_dmg_type?>" />
			</div>
			
			<div>
				<label for="skill_desc">技能描述</label>
				<textarea id="skill_desc" name="skill_desc" class="basic-textarea" maxlength="1024" ><?php if(isset($skill))echo $skill->skill_desc?></textarea>	
			</div>
			
			<div>
				<label for="skill_effect">技能效果</label>
				<textarea id="skill_effect" name="skill_effect" class="basic-textarea" maxlength="1024" ><?php if(isset($skill))echo $skill->skill_effect?></textarea>	
			</div>
			
			<div>
				<label for="skill_hint">技能提示</label>
				<textarea id="skill_hint" name="skill_hint" class="basic-textarea" maxlength="1024" ><?php if(isset($skill))echo $skill->skill_hint?></textarea>	
			</div>

			<div>
				 <input type="submit" value="提交" name="skill_submit">
			</div>

		</form>
	</div> <!-- main -->


	<div class="aside">
	</div> <!-- aside -->

	<div class="extra"> </div>

</div> <!-- content -->

