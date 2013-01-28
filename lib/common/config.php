<?php

date_default_timezone_set('Asia/Chongqing');

define('BASE_URL', "http://" . $_SERVER['HTTP_HOST'] . "/");
define ('DOMAIN_MAIN', "http://" . $_SERVER['HTTP_HOST'] . "/");
define ('DOMAIN_IMAGES', "http://" . $_SERVER['HTTP_HOST'] . "/");
define ('DOMAIN_JS', "http://". $_SERVER['HTTP_HOST'] . "/js/");
define ('DOMAIN_CSS', "http://". $_SERVER['HTTP_HOST'] . "/css/");

$zone_list = array('电信一' => '艾欧尼亚 电信一', '电信二' => '祖安 电信二', '电信三' => '诺克萨斯 电信三', 
				   '电信四' => '班德尔城 电信四', '电信五' => '皮尔特沃夫 电信五', '电信六' => '战争学院 电信六', 
				   '电信七' => '巨神峰 电信七',   '电信八' => '雷瑟守备 电信八', '电信九' => '裁决之地 电信九', 
				   '电信十' => '黑色玫瑰 电信十', '电信十一' => '暗影岛 电信十一', '电信十二' =>  '钢铁烈阳 电信十二', 
				   '电信十三' => '均衡教派 电信十三', '电信十四' => '水晶之痕 电信十四', '电信十五' => '影流 电信十五', 
				   '网通一' => '比尔吉沃特 网通一', '网通二' => '德玛西亚 网通二', '网通三' => '弗雷尔卓德 网通三', 
				   '网通四' => '无畏先锋 网通四',  '网通五' => '恕瑞玛 网通五', '教育一' => '教育网专区');

$position_list = array(1 => "ADC", 2 => "APC", 3 => "上单", 4 => "打野", 5 => "辅助");

//DB setting
define('DB_HOST', "localhost");
define('DB_USER', "dota2_dev");
define('DB_PASSWD', "ilove2dato");
define('DB_SCHEMA', "dota2");
define('DB_DRIVER', 0); //0:mysqli 1:mysql 2:pdo_mysql
define('DB_PERSIST', 0); //tbd


//Cache setting
define('CACHE_DRIVER', 0);	//0:php-memcache 1:php-memcached 2:redis
define('CACHE_HOST', '127.0.0.1');
define('MEMCACHE_PORT', 11211);	//memcache default port
define('REDIS_PORT', 6379);	//redis port
define('USE_CACHE', 1);		//whether use cache


//Log
define('LOG_LEVEL', 0);
define('LOG_OUTPUT', 0);

?>
