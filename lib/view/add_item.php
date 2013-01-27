
<div id="content">
	<div class="main">
		<h1> 添加物品 </h1>
		
		<form method="POST" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>">
			<div>
				<label for="item_id">物品ID</label>
				<input id="item_id" name="item_id" type="text" maxlength="8" />	
			</div>
			
			<div>
				<label for="item_ename">物品英文名字</label>
				<input id="item_ename" name="item_ename" type="text" maxlength="32" />	
			</div>

			<div>
				<label for="item_cname">物品中文名字</label>
				<input id="item_cname" name="item_cname" type="text" maxlength="32" />	
			</div>

			<div>
				<label for="item_icon">物品图标</label>
				<input id="item_icon" name="item_icon" type="text" maxlength="64" />	
			</div>
			
			<div>
				<label for="item_price">物品单价</label>
				<input id="item_price" name="item_price" type="text" maxlength="8" />	
			</div>
			
			<div>
				<label for="item_tprice">物品总价</label>
				<input id="item_tprice" name="item_tprice" type="text" maxlength="8" />	
			</div>
			
			<div>
				<label for="item_desc">物品描述</label>
				<textarea id="item_desc" name="item_desc" maxlength="1024" > </textarea>	
			</div>

			<div>
				<label for="item_effect">物品特效</label>
				<textarea id="item_effect" name="item_effect" maxlength="1024" > </textarea>	
			</div>
			
			<div>
				 <input type="submit" value="提交" name="item_submit">
			</div>

		</form>
	</div> <!-- main -->


	<div class="aside">
	</div> <!-- aside -->

	<div class="extra"> </div>

</div> <!-- content -->

