<?php
	$province = array('省份', '北京', '上海', '黑龙江', '吉林', '辽宁', '天津', '安徽', '江苏', '浙江', '陕西', '湖北', '广东', '湖南', '甘肃', '四川', '山东', '福建', '河南', '重庆', '云南', '河北', '江西', '山西', '贵州', '广西', '内蒙古', '宁夏', '青海', '新疆', '海南', '西藏', '香港', '澳门', '台湾', '其他国家');


	$city = array(
			array(0 => '城市'),
			array(1 => '北京'),
			array(2 => '上海'),
			array(3 => '哈尔滨', '大庆', '齐齐哈尔', '牡丹江', '佳木斯', '鸡西', '绥化', '双鸭山', '黑河', '鹤岗', '伊春', '七台河', '大兴安岭'),
			array(16 =>'长春', '吉林', '四平', '延边', '通化', '松原', '白山', '白城', '辽源'),
			array(25 => '沈阳', '大连', '鞍山', '朝阳', '锦州', '营口', '抚顺', '丹东', '盘锦','葫芦岛', '铁岭', '辽阳', '本溪', '阜新'),
			array(39 => '天津'),
			array(40 => '合肥', '芜湖', '安庆', '阜阳', '蚌埠', '淮南', '马鞍山', '六安', '滁州', '宿州', '巢湖', '淮北', '宣城', '亳州', '黄山',
					'铜陵', '池州'),
			array(57 => '南京', '苏州', '无锡', '徐州', '常州', '南通', '扬州', '盐城', '连云港', '泰州', '镇江', '淮安', '宿迁', '昆山', '常熟', '吴江', '海安', '张家港'),
			array(75 => '杭州', '温州', '宁波', '台州', '金华', '嘉兴', '绍兴', '湖州', '丽水', '衢州', '舟山'),
			array(86 => '西安', '咸阳', '宝鸡', '渭南', '榆林', '汉中', '延安', '安康', '商洛', '铜川', '杨凌'),
			array(97 => '武汉', '宜昌', '荆州', '襄樊', '黄冈', '十堰', '孝感', '黄石', '荆门', '咸宁', '恩施', '随州', '仙桃', '鄂州', '天门',
					'潜江', '神农架林区'),
			array(114 => '广州', '深圳', '东莞', '佛山', '汕头', '珠海', '惠州', '江门', '中山', '揭阳', '湛江', '茂名', '潮州', '梅州', '肇庆', '韶关', '清远', '汕尾', '河源', '阳江', '云浮', '开平'),
			array(136 => '长沙','衡阳','株洲','湘潭','常德','岳阳','邵阳','郴州','怀化','益阳','娄底','永州','湘西','张家界'),
			array(150 => '兰州','天水','庆阳','酒泉','白银','平凉','武威','嘉峪关','张掖','陇南','金昌','定西','临夏','甘南'),
			array(164 => '成都','绵阳','南充','德阳','达州','乐山','宜宾','内江','自贡','泸州','遂宁','广安','眉山','广元','资阳','攀枝花','巴中','凉山','雅安','阿坝','甘孜'),
			array(185 => '青岛','济南','烟台','潍坊','临沂','淄博','济宁','威海','泰安','枣庄','聊城','菏泽','东营','日照','德州','滨州','莱芜'),
			array(202 => '福州','厦门','泉州','漳州','莆田','宁德','三明','龙岩','南平'),
			array(211 => '郑州','洛阳','新乡','南阳','平顶山','信阳','安阳','焦作','周口','商丘','开封','许昌','驻马店','濮阳','漯河','三门峡','鹤壁','济源'),
			array(229 => '重庆'),
			array(230 => '昆明','曲靖','大理','玉溪','红河','丽江','昭通','西双版纳','文山','楚雄','保山','德宏','临沧','普洱','思茅','迪庆','怒江','德宏景颇族'),
			array(247 => '石家庄','保定','唐山','邯郸','秦皇岛','沧州','邢台','廊坊','张家口','衡水','承德'),
			array(258 => '南昌','赣州','九江','上饶','宜春','吉安','景德镇','抚州','萍乡','新余','鹰潭'),
			array(269 => '太原','运城','大同','临汾','吕梁','晋中','长治','忻州','晋城','阳泉','朔州','大宁'),
			array(281 => '贵阳','遵义','六盘水','黔东南','毕节','安顺','黔南','铜仁','黔西南'),
			array(290 => '南宁','桂林','柳州','玉林','梧州','北海','贵港','百色','河池','钦州','贺州','防城港','来宾','崇左'),
			array(304 => '呼和浩特','包头','呼伦贝尔','赤峰','通辽','鄂尔多斯','巴彦淖尔','乌海','乌兰察布','锡林郭勒','兴安','锡林郭勒盟','阿拉善','兴安盟','阿拉善盟'),
			array(320 => '银川','石嘴山','吴忠','固原','中卫'),
			array(325 => '西宁','海西','海东','海南','海北','果洛','玉树','黄南'),
			array(333 => '乌鲁木齐','克拉玛依','石河子','伊犁','昌吉','阿克苏','巴音郭楞州','巴音郭楞','喀什','哈密','阿勒泰','塔城','吐鲁番','博尔塔拉','和田','博尔塔拉州','阿拉尔','克孜勒苏柯尔克孜','图木舒克','克孜勒苏'),
			array(353 => '海口','三亚','琼海','儋州'),
			array(357 => '拉萨','日喀则','昌都','林芝','阿里','那曲','山南'),
			array(364 => '香港'),
			array(365 => '澳门'),
			array(366 => '台湾'),
			array(367 => '美国', '日本', '韩国', '法国', '英国', '德国', '越南', '新加坡'),
			);

	function createProvince()
	{
		global $province;
		foreach($province as $key => $value)
		{
			echo '<option value="' . $key . '">' . $value . '</option>';
		}
	}

?>
