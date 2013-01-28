
<div id="content">
	<div class="main">
		<h1> 添加技能 </h1>
		
		<form method="POST" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>">
			<div>
				<label for="hero_id">英雄id</label>
				<input id="hero_id" name="hero_id" type="text" maxlength="8" />	
			</div>

			<div>
				<label for="skill_name">技能名字</label>
				<input id="skill_name" name="skill_name" type="text" maxlength="32" />	
			</div>

			<div>
				<label for="skill_icon">技能图标</label>
				<input id="skill_icon" name="skill_icon" type="text" maxlength="128" />	
			</div>
			
			<div>
				<label for="skill_seq">技能序列</label>
				<input id="skill_seq" name="skill_seq" type="text" maxlength="8" />	
			</div>
			
			<div>
				<label for="skill_type">技能类型</label>
				<select id="skill_type" name="skill_type">
					<option value="1">主动技能</option>
					<option value="2">被动技能</option>
				</select>
			</div>

			<div>
				<label for="skill_mp">技能耗蓝</label>
				<input id="skill_mp" name="skill_mp" type="text" maxlength="64" > 
			</div>
			
			<div>
				<label for="skill_cd">技能cd</label>
				<input id="skill_cd" name="skill_cd" type="text" maxlength="64" > 
			</div>
			
			<div>
				<label for="skill_scope">作用范围</label>
				<input id="skill_scope" name="skill_scope" type="text" maxlength="64" > 
			</div>

			<div>
				<label for="skill_target">作用目标</label>
				<input id="skill_target" name="skill_target" type="text" maxlength="64" > 
			</div>
			
			<div>
				<label for="skill_dmg_type">伤害类型</label>
				<input id="skill_dmg_type" name="skill_dmg_type" type="text" maxlength="64" > 
			</div>
			
			<div>
				<label for="skill_desc">技能描述</label>
				<textarea id="skill_desc" name="skill_desc" maxlength="1024" ></textarea>	
			</div>
			
			<div>
				<label for="skill_effect">技能效果</label>
				<textarea id="skill_effect" name="skill_effect" maxlength="1024" ></textarea>	
			</div>
			
			<div>
				<label for="skill_hint">技能提示</label>
				<textarea id="skill_hint" name="skill_hint" maxlength="1024" ></textarea>	
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

