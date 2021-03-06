/*会员信息附属表*/
DROP TABLE IF EXISTS `member_info`;
CREATE TABLE `member_info`(
	`id` int(11) unsigned not null auto_increment COMMENT '表自增ID',
	`member_id` int(11) unsigned not null default 0 COMMENT '会员关联id',	
	`identity_pic` varchar(255) NOT NULL DEFAULT '' COMMENT '身份证或手持身份证照片',
	`wx_nick` varchar(100) NOT NULL DEFAULT '' COMMENT '微信昵称',
	`wx_tx` varchar(255) NOT NULL DEFAULT '' COMMENT '微信头像',
	`wx_pay_qrcode` varchar(255) NOT NULL DEFAULT '' COMMENT '微信收款二维码图片',
	`add_time` int(11) unsigned not null default 0 COMMENT '添加时间',
	PRIMARY KEY (`id`),UNIQUE KEY `member_id` (`member_id`)
)ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*会员类型表，一个会员可多个身份*/
DROP TABLE IF EXISTS `member_type`;
CREATE TABLE `member_type`(
	`id` int(11) unsigned not null auto_increment COMMENT '表自增ID',
	`member_id` int(11) unsigned not null default 0 COMMENT '会员关联id',
	`member_type` tinyint(1) unsigned not null default 1 COMMENT '会员类型，1：玩家，2：房主，3：代理商',
	`invite_code` char(6) not null default '' COMMENT '当会员是房主时的6位邀请码',
	`balance` varchar(100) NOT NULL DEFAULT '0' COMMENT '用户为该身份类型的余额',
	`friend_count` int(11) unsigned not null default 0 COMMENT '当会员是房主或代理商时，他的下属数量',	
	`wx_group_qrcode` varchar(255) NOT NULL DEFAULT '' COMMENT '当会员是房主或代理商时，他的微信群二维码图片',
	`add_time` int(11) unsigned not null default 0 COMMENT '添加时间',
	PRIMARY KEY (`id`),UNIQUE KEY `member_id_type_relation` (`member_id`,`member_type`)
)ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*房主与代理商关系表*/
DROP TABLE IF EXISTS `member_agent`;
CREATE TABLE `member_agent`(
	`id` int(11) unsigned not null auto_increment COMMENT '表自增ID',
	`member_id` int(11) unsigned not null default 0 COMMENT '房主ID',
	`member_agent_id` int(11) unsigned not null default 0 COMMENT '代理商ID',
	`balance` varchar(100) NOT NULL DEFAULT '0' COMMENT '该房主在该代理商下的余额',
	`add_time` int(11) unsigned not null default 0 COMMENT '关系添加时间',
	PRIMARY KEY (`id`),UNIQUE KEY `member_agent_relation` (`member_id`,`member_agent_id`)
)ENGINE=InnoDB DEFAULT CHARSET=utf8;


/*玩家与房主关系表*/
DROP TABLE IF EXISTS `member_owner`;
CREATE TABLE `member_owner`(
	`id` int(11) unsigned not null auto_increment COMMENT '表自增ID',
	`member_id` int(11) unsigned not null default 0 COMMENT '玩家ID',
	`member_owner_id` int(11) unsigned not null default 0 COMMENT '房主ID',
	`balance` varchar(100) NOT NULL DEFAULT '0' COMMENT '该玩家在该房主下的余额',
	`add_time` int(11) unsigned not null default 0 COMMENT '关系添加时间',
	PRIMARY KEY (`id`),UNIQUE KEY `member_owne_relation` (`member_id`,`member_owner_id`)
)ENGINE=InnoDB DEFAULT CHARSET=utf8;


/*管理员充值或收到的充值订单（代理商向管理员发起充币订单）*/
DROP TABLE IF EXISTS `order_pay_admin`;
CREATE TABLE `order_pay_admin`(
	`id` int(11) unsigned not null auto_increment COMMENT '订单ID',
	`member_id` int(11) unsigned not null default 0 COMMENT '代理商ID',
	`amount` varchar(100) NOT NULL DEFAULT '0' COMMENT '充值数',	
	`status` tinyint(1) NOT NULL DEFAULT '0' COMMENT '0:未处理1：已处理，2：已取消',
	`admin_id` int(11) unsigned not null default 0 COMMENT '充值处理管理员ID',
	`add_time` int(11) unsigned not null default 0 COMMENT '添加订单时间',
	`pay_time` int(11) unsigned not null default 0 COMMENT '处理订单充值时间',
	PRIMARY KEY (`id`),INDEX `member_id` (`member_id`),INDEX `admin_id` (`admin_id`)
)ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*代理商充值或收到的充值订单（房主向代理商发起充币订单）*/
DROP TABLE IF EXISTS `order_pay_agent`;
CREATE TABLE `order_pay_agent`(
	`id` int(11) unsigned not null auto_increment COMMENT '订单ID',
	`member_id` int(11) unsigned not null default 0 COMMENT '房主ID',
	`amount` varchar(100) NOT NULL DEFAULT '0' COMMENT '充值数',	
	`status` tinyint(1) NOT NULL DEFAULT '0' COMMENT '0:未处理1：已处理，2：已取消',
	`agent_id` int(11) unsigned not null default 0 COMMENT '代理商ID',
	`add_time` int(11) unsigned not null default 0 COMMENT '添加订单时间',
	`pay_time` int(11) unsigned not null default 0 COMMENT '处理订单充值时间',
	PRIMARY KEY (`id`),INDEX `member_id` (`member_id`),INDEX `agent_id` (`agent_id`)
)ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*房主充值或收到的充值订单（玩家向房主发起充币订单）*/
DROP TABLE IF EXISTS `order_pay_owner`;
CREATE TABLE `order_pay_owner`(
	`id` int(11) unsigned not null auto_increment COMMENT '订单ID',
	`member_id` int(11) unsigned not null default 0 COMMENT '玩家ID',
	`amount` varchar(100) NOT NULL DEFAULT '0' COMMENT '充值数',	
	`status` tinyint(1) NOT NULL DEFAULT '0' COMMENT '0:未处理1：已处理，2：已取消',
	`owner_id` int(11) unsigned not null default 0 COMMENT '房主ID',
	`add_time` int(11) unsigned not null default 0 COMMENT '添加订单时间',
	`pay_time` int(11) unsigned not null default 0 COMMENT '处理订单充值时间',
	PRIMARY KEY (`id`),INDEX `member_id` (`member_id`),INDEX `owner_id` (`owner_id`)
)ENGINE=InnoDB DEFAULT CHARSET=utf8;


/*玩家向房主发起的提现订单*/
DROP TABLE IF EXISTS `order_exchange_owner`;
CREATE TABLE `order_exchange_owner`(
	`id` int(11) unsigned not null auto_increment COMMENT '订单ID',
	`member_id` int(11) unsigned not null default 0 COMMENT '玩家ID',
	`amount` varchar(100) NOT NULL DEFAULT '0' COMMENT '提现金币数',	
	`status` tinyint(1) NOT NULL DEFAULT '0' COMMENT '0:未处理1：已处理，2：已取消',
	`owner_id` int(11) unsigned not null default 0 COMMENT '房主ID',
	`add_time` int(11) unsigned not null default 0 COMMENT '添加订单时间',
	`pay_time` int(11) unsigned not null default 0 COMMENT '处理订单时间',
	PRIMARY KEY (`id`),INDEX `member_id` (`member_id`),INDEX `owner_id` (`owner_id`)
)ENGINE=InnoDB DEFAULT CHARSET=utf8;


/*房主发起的比赛房间*/
DROP TABLE IF EXISTS `match_home`;
CREATE TABLE `match_home`(
	`id` int(11) unsigned not null auto_increment COMMENT '自增ID',
	`owner_id` int(11) unsigned not null default 0 COMMENT '房主ID',
	`red_packet_amount` int(11) unsigned not null default 0 COMMENT '房间开赛红包金额',
	`red_packet_num` int(11) unsigned not null default 0 COMMENT '房间开赛红包数',
	`status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '1:开赛中2：已结束',
	`start_time` int(11) unsigned not null default 0 COMMENT '开赛时间',
	`end_time` int(11) unsigned not null default 0 COMMENT '结束时间',
	PRIMARY KEY (`id`),INDEX `owner_id` (`owner_id`)
)ENGINE=InnoDB DEFAULT CHARSET=utf8;


/*房间比赛中的参赛玩家（玩家可买多次）*/
DROP TABLE IF EXISTS `match_home_member`;
CREATE TABLE `match_home_member`(
	`id` int(11) unsigned not null auto_increment COMMENT '自增ID',
	`home_id` int(11) unsigned not null default 0 COMMENT '房间ID',
	`owner_id` int(11) unsigned not null default 0 COMMENT '房主ID',
	`member_id` int(11) unsigned not null default 0 COMMENT '玩家ID',
	`pay_amount` varchar(50) NOT NULL DEFAULT '0' COMMENT '玩家支付币',
	`win_amount` varchar(50) NOT NULL DEFAULT '0' COMMENT '玩家赢得的币',
	`add_time` int(11) unsigned not null default 0 COMMENT '现家参赛时间',
	PRIMARY KEY (`id`),INDEX `home_id` (`home_id`),INDEX `owner_id` (`owner_id`)
)ENGINE=InnoDB DEFAULT CHARSET=utf8;


/*房间比赛开始后的房主及玩家的流水记录*/
DROP TABLE IF EXISTS `match_home_bill`;
CREATE TABLE `match_home_bill`(
	`id` int(11) unsigned not null auto_increment COMMENT '自增ID',
	`home_id` int(11) unsigned not null default 0 COMMENT '房间ID',
	`member_id` int(11) unsigned not null default 0 COMMENT '房主ID或玩家ID',
	`introduce` varchar(500) NOT NULL DEFAULT '0' COMMENT '房主或玩家流水描述内容',
	`amount` varchar(50) NOT NULL DEFAULT '0' COMMENT '房主或玩家增加或扣减的币，扣减为负数',
	`add_time` int(11) unsigned not null default 0 COMMENT '记录时间',
	PRIMARY KEY (`id`),INDEX `home_id` (`home_id`),INDEX `member_id` (`member_id`)
)ENGINE=InnoDB DEFAULT CHARSET=utf8;



























