drop database dota2;
create database dota2;
use dota2;

CREATE TABLE user 
(
	user_id int unsigned not null auto_increment,
	email varchar(64) not null,
	password char(40) not null,
	username varchar(20) not null,
	nickname varchar(32),
	active	tinyint(1) not null default 0,
	create_date timestamp not null default current_timestamp,
	gender tinyint not null default 0,
	city tinyint unsigned not null default 0,
	avastar varchar(128),
	qq_num varchar(16),
	yy_num varchar(16),

	primary key(user_id),
	unique(email)
) engine=innodb default charset=utf8;

CREATE TABLE user_token
(
    user_id int unsigned not null,
    token char(32) not null,
    create_date timestamp not null default current_timestamp,
    primary key(user_id)
) engine=innodb default charset=utf8;

CREATE TABLE user_resetpw
(
    user_id int unsigned not null,
    email varchar(64) not null,
    code char(32) not null,
    create_date timestamp not null default current_timestamp,
    primary key(user_id),
    unique(email)
) engine=innodb default charset=utf8;


CREATE TABLE item
(
	item_id int unsigned not null,
	item_type int ,
	item_ename varchar(32) not null,
	item_cname varchar(32) not null,
	item_icon varchar(128) not null,
	price int unsigned not null,
	total_price int unsigned not null,
	effect_desc varchar(256) not null,
	special_effect varchar(256),
	
	primary key(item_id)

) engine=innodb default charset=utf8;


CREATE TABLE item_compose
(
	item_id1 int unsigned not null,
	item_id2 int unsigned not null,

	foreign key(item_id1) references item(item_id),
	foreign key(item_id2) references item(item_id)

) engine=innodb default charset=utf8;


CREATE TABLE hero 
(
	hero_id int unsigned not null,
	hero_name char(24) not null,
	hero_nickname char(24) not null,
	hero_enickname char(24) not null,
	hero_cname char(24) not null,
	hero_ename char(24) not null,
	hero_icon char(128) not null,
	hero_prop_icon char(128) not null,

	hero_hp	int not null default 0,
	hero_mp	int not null default 0,
	hero_str int not null default 0,
	hero_lvlup_str float not null,
	hero_agi int not null default 0,
	hero_lvlup_agi float  not null,
	hero_int int not null default 0,
	hero_lvlup_int float not null,
	hero_attack_min int not null default 0,
	hero_attack_max int not null default 0,
	hero_armor float not null,
	hero_attack_range int not null default 0,
	hero_sight_day int not null default 0,
	hero_sight_night int not null default 0,
	hero_move_speed int not null default 0, 
	hero_missile_speed int not null default 0,
	hero_attack_anim1 float not null,
	hero_attack_anim2 float not null,
	hero_cast_anim1 float not null,
	hero_cast_anim2 float not null,
	hero_attack_time float not null,
	
	hero_motto char(128) not null, 
	hero_story varchar(2048) not null,

	unique(hero_name),
	primary key(hero_id)
) engine=innodb default charset=utf8;

CREATE TABLE hero_tag
(
	hero_id int unsigned not null,
	tag_id tinyint unsigned not null,

	foreign key(hero_id) references hero(hero_id),
	primary key(hero_id, tag_id)
) engine=innodb default charset=utf8;


CREATE TABLE hero_skill
(
	skill_id int unsigned not null auto_increment,
	hero_id int unsigned not null,
	
	skill_name char(64) not null,
	skill_icon char(128) not null,
	skill_seq tinyint not null default 0,
	skill_type tinyint not null default 0,
	skill_mp char(32) not null,
	skill_cd char(32) not null,
	skill_scope char(32) not null, 
	skill_target char(32) not null, 
	skill_dmg_type char(36) not null,

	skill_desc varchar(1024) not null,
	skill_effect varchar(2048) not null,
	skill_hint varchar(2048) not null,
	
	foreign key(hero_id) references hero(hero_id),
	primary key(skill_id)
) engine=innodb default charset=utf8;



CREATE TABLE hero_comment
(
	hero_comment_id int unsigned not null auto_increment,
	hero_id int unsigned not null,
	user_id int unsigned not null,
	comment_content varchar(1024) not null,
	create_date timestamp NOT NULL default CURRENT_TIMESTAMP,

	foreign key(hero_id) references hero(hero_id),
	foreign key(user_id) references user(user_id),
	primary key(hero_comment_id)
) engine=innodb default charset=utf8;


CREATE TABLE hero_recommend
(
	hero_id int unsigned not null,
	user_id int unsigned not null,
	
	skill_upgrade varchar(64) not null,
	skill_upgrade_comment varchar(1024) not null,

	equip_suite1 varchar(32) not null,
	equip_suite2 varchar(32) not null,
	equip_suite3 varchar(32) not null,
	
	equip_suite1_comment varchar(2048) not null,
	equip_suite2_comment varchar(2048) not null,
	equip_suite3_comment varchar(2048) not null,

	primary key(hero_id, user_id),
	foreign key(hero_id) references hero(hero_id),
	foreign key(user_id) references user(user_id)
) engine=innodb default charset=utf8;


CREATE TABLE narrator
(
	narrator_id int unsigned not null auto_increment,
	narrator_name varchar(32) not null,
	narrator_nickname varchar(32) not null,
	narrator_pic varchar(128) not null,
	narrator_weibo varchar(128) not null,
	narrator_qq varchar(64), 
	narrator_yy varchar(64), 
	narrator_intro varchar(2048) not null,

	primary key(narrator_id)
) engine=innodb default charset=utf8;


CREATE TABLE hero_video
(
	hero_video_id int unsigned not null auto_increment,
	hero_id int unsigned not null,
	hero_video_narrator_id int unsigned not null,
	hero_video_type int not null,
	hero_video_url varchar(128) not null,
	hero_video_title varchar(64) not null,
	hero_video_desc varchar(1024) not null,
	hero_video_hit int unsigned not null default 0,
	hero_video_date datetime NOT NULL, 
	create_date timestamp NOT NULL default CURRENT_TIMESTAMP,
	
	primary key(hero_video_id),
	foreign key(hero_id) references hero(hero_id),
	foreign key(hero_video_narrator_id) references narrator(narrator_id)

) engine=innodb default charset=utf8;

CREATE TABLE hero_video_comment
(
	hero_video_comment_id int unsigned not null auto_increment,
	hero_video_id int unsigned not null,
	user_id int unsigned not null,
	comment_content varchar(1024) not null,
	create_date timestamp NOT NULL default CURRENT_TIMESTAMP,

	primary key(hero_video_comment_id),
	foreign key(hero_video_id) references hero_video(hero_video_id),
	foreign key(user_id) references user(user_id)
) engine=innodb default charset=utf8;


CREATE TABLE team
(	
	team_id int unsigned not null  auto_increment,
	team_name varchar(128) not null,
	team_fullname varchar(128),
	team_icon varchar(128),
	team_desc varchar(2048) not null,

	team_country varchar(32) not null,
	team_weibo varchar(128),
	team_yy	varchar(32),
	
	team_createtime date,

	team_flower_count int unsigned not null default 0, 
	team_support_count int unsigned not null default 0,

	create_date timestamp NOT NULL default CURRENT_TIMESTAMP,
	primary key(team_id)
) engine=innodb default charset=utf8;


CREATE TABLE team_comment
(
	team_comment_id int unsigned not null auto_increment,
	team_id int unsigned not null,
	user_id int unsigned not null,
	comment_content varchar(1024) not null,
	create_date timestamp NOT NULL default CURRENT_TIMESTAMP,

	primary key(team_comment_id),
	foreign key(team_id) references team(team_id),
	foreign key(user_id) references user(user_id)
) engine=innodb default charset=utf8;

CREATE TABLE team_fans
(
	team_id int unsigned not null,
	user_id int unsigned not null,

	comment_content varchar(128) not null,
	create_date timestamp NOT NULL default CURRENT_TIMESTAMP,

	primary key(team_id, user_id),
	foreign key(team_id) references team(team_id),
	foreign key(user_id) references user(user_id)
) engine=innodb default charset=utf8;

CREATE TABLE team_photo
(
	team_photo_id int unsigned not null auto_increment,
	team_id int unsigned not null,
	upload_user_id int unsigned not null,
	
	photo_title varchar(128) not null,
	photo_desc varchar(1028) not null,
	photo_url varchar(128) not null,

	primary key(team_photo_id),
	foreign key(team_id) references team(team_id),
	foreign key(upload_user_id) references user(user_id)
) engine=innodb default charset=utf8;



CREATE TABLE team_photo_comment
(
	team_photo_comment_id int unsigned not null auto_increment,
	team_photo_id int unsigned not null,
	user_id int unsigned not null,
	comment_content varchar(1024) not null,
	create_date timestamp NOT NULL default CURRENT_TIMESTAMP,

	primary key(team_photo_comment_id),
	foreign key(team_photo_id) references team_photo(team_photo_id),
	foreign key(user_id) references user(user_id)
) engine=innodb default charset=utf8;

CREATE TABLE team_member
(
	member_id int unsigned not null auto_increment,
	team_id int unsigned not null,
	member_type tinyint not null default 0,
	member_name varchar(128) not null,
	member_match_name varchar(128) not null,
	member_rname varchar(128) not null,
	member_ename	varchar(128) not null,
	member_icon varchar(32),
	member_account_zone varchar(32) not null,
	member_account_name varchar(128) not null,
    member_position tinyint not null default 0,
	member_desc varchar(1028) not null,
	member_weibo varchar(128),
	
	primary key(member_id),
	foreign key(team_id) references team(team_id)
) engine=innodb default charset=utf8;


CREATE TABLE team_member_comment
(
	team_member_comment_id int unsigned not null auto_increment,
	member_id int unsigned not null,
	user_id int unsigned not null,
	comment_content varchar(1024) not null,
	create_date timestamp NOT NULL default CURRENT_TIMESTAMP,

	primary key(team_member_comment_id),
	foreign key(member_id) references team_member(member_id),
	foreign key(user_id) references user(user_id)
) engine=innodb default charset=utf8;


CREATE TABLE team_member_fans
(
	member_id int unsigned not null,
	user_id int unsigned not null,

	comment_content varchar(128) not null,
	create_date timestamp NOT NULL default CURRENT_TIMESTAMP,

	primary key(member_id, user_id),
	foreign key(member_id) references team_member(member_id),
	foreign key(user_id) references user(user_id)
) engine=innodb default charset=utf8;


CREATE TABLE tournament
(
	tournament_id int unsigned not null auto_increment,
	tournament_name varchar(128) not null,
	tournament_fullname varchar(128) not null,
	tournament_icon varchar(128) not null,
	tournament_type tinyint not null default 0, 
	tournament_star tinyint not null,
	tournament_group_count tinyint not null default 0,
	tournament_country varchar(32), 
	tournament_city varchar(32), 
	tournament_date_begin date not null,
	tournament_date_end date not null,
	tournament_desc varchar(4096) not null,
	tournament_homepage varchar(128) not null,

	primary key(tournament_id)

)engine=innodb default charset=utf8;


CREATE TABLE tournament_team
(
	tournament_id int unsigned not null, 
	tournament_group_id int unsigned not null,
	team_id int unsigned not null,

	primary key(tournament_id, team_id),
	foreign key(tournament_id) references tournament(tournament_id),
	foreign key(team_id) references team(team_id)
)engine=innodb default charset=utf8;

CREATE TABLE tournament_prize
(
	tournament_id int unsigned not null, 
	tournament_prize_id int unsigned not null,
	tournament_prize_name varchar(32) not null,
	tournament_prize_num varchar(32) not null,
	tournament_prize_team_id int unsigned not null default 0,

	primary key(tournament_id, tournament_prize_id),
	foreign key(tournament_id) references tournament(tournament_id)
)engine=innodb default charset=utf8;

CREATE TABLE team_match
(
	match_id int unsigned not null auto_increment,
	tournament_id int unsigned, 

	match_seq tinyint unsigned not null,
	match_red_id int unsigned not null,
	match_purple_id int unsigned not null,

	match_red_support int unsigned not null default 0,
	match_purple_support int unsigned not null default 0,

	match_round tinyint unsigned not null default 0,
	match_date datetime not null,
	match_live varchar(128),

	primary key(match_id),
	foreign key(tournament_id) references tournament(tournament_id),
	foreign key(match_red_id) references team(team_id),
	foreign key(match_purple_id) references team(team_id)
) engine=innodb default charset=utf8;


CREATE TABLE team_match_round
(
	match_round_id int unsigned not null auto_increment,
	match_id int unsigned not null,

	match_round_seq int unsigned not null default 0,
	match_round_result tinyint not null default 0,
	match_round_map tinyint not null default 0,
	match_round_date datetime not null,
	match_round_comment text not null,

	primary key(match_round_id),
	unique(match_id, match_round_seq),
	foreign key(match_id) references team_match(match_id)
) engine=innodb default charset=utf8;


CREATE TABLE team_match_round_data
(
	match_round_id int unsigned not null,
	member_id int unsigned not null,
	hero_id int unsigned not null,

	primary key(match_round_id, member_id),
	foreign key(match_round_id) references team_match_round(match_round_id), 
	foreign key(member_id) references team_member(member_id),
	foreign key(hero_id) references hero(hero_id)
) engine=innodb default charset=utf8;


CREATE TABLE team_match_video
(
	match_video_id int unsigned not null auto_increment,
	
	match_round_id int unsigned not null,
	match_video_title varchar(128) not null,
	match_video_url varchar(128) not null,
	match_video_desc varchar(1024) not null,
	match_video_hit int unsigned not null,
	match_video_date datetime not null,

	create_date timestamp NOT NULL default CURRENT_TIMESTAMP,

	primary key(match_video_id),
	foreign key(match_round_id) references team_match_round(match_round_id)
) engine=innodb default charset=utf8;


CREATE TABLE team_match_video_comment
(
	match_video_comment_id int unsigned not null auto_increment,
	match_video_id int unsigned not null,
	user_id int unsigned not null,
	comment_content varchar(1024) not null,
	create_date timestamp NOT NULL default CURRENT_TIMESTAMP,

	primary key(match_video_comment_id),
	foreign key(match_video_id) references team_match_video(match_video_id),
	foreign key(user_id) references user(user_id)
) engine=innodb default charset=utf8;

