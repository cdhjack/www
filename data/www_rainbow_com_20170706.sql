/*
MySQL Data Transfer
Source Host: localhost
Source Database: www_rainbow_com
Target Host: localhost
Target Database: www_rainbow_com
Date: 2017/7/6 18:01:38
*/

SET FOREIGN_KEY_CHECKS=0;
-- ----------------------------
-- Table structure for admin
-- ----------------------------
CREATE TABLE `admin` (
  `ID` smallint(4) unsigned NOT NULL auto_increment,
  `Name` varchar(30) NOT NULL default '',
  `Passwd` varchar(32) NOT NULL default '',
  `RealName` varchar(30) NOT NULL default '',
  `Sex` tinyint(1) NOT NULL default '1',
  `Mail` varchar(50) NOT NULL default '',
  `Rnd` varchar(32) NOT NULL default '',
  `GroupID` smallint(4) unsigned NOT NULL default '0',
  `Checked` tinyint(1) NOT NULL default '1',
  `LoginTime` int(11) unsigned NOT NULL default '0',
  `LoginIp` varchar(16) NOT NULL default '',
  `UserFlag` tinyint(1) NOT NULL default '0',
  `OrderNum` smallint(4) NOT NULL default '0' COMMENT '排序值',
  PRIMARY KEY  (`ID`),
  UNIQUE KEY `Name` (`Name`),
  KEY `GroupID` (`GroupID`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for group
-- ----------------------------
CREATE TABLE `group` (
  `ID` smallint(4) unsigned NOT NULL auto_increment,
  `Name` varchar(30) NOT NULL default '',
  `Number` smallint(4) unsigned NOT NULL default '0',
  PRIMARY KEY  (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for match_home
-- ----------------------------
CREATE TABLE `match_home` (
  `id` int(11) unsigned NOT NULL auto_increment COMMENT '自增ID',
  `owner_id` int(11) unsigned NOT NULL default '0' COMMENT '房主ID',
  `red_packet_amount` int(11) unsigned NOT NULL default '0' COMMENT '房间开赛红包金额',
  `red_packet_num` int(11) unsigned NOT NULL default '0' COMMENT '房间开赛红包数',
  `status` tinyint(1) NOT NULL default '1' COMMENT '1:开赛中2：已结束',
  `start_time` int(11) unsigned NOT NULL default '0' COMMENT '开赛时间',
  `end_time` int(11) unsigned NOT NULL default '0' COMMENT '结束时间',
  PRIMARY KEY  (`id`),
  KEY `owner_id` (`owner_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for match_home_member
-- ----------------------------
CREATE TABLE `match_home_member` (
  `id` int(11) unsigned NOT NULL auto_increment COMMENT '自增ID',
  `home_id` int(11) unsigned NOT NULL default '0' COMMENT '房间ID',
  `owner_id` int(11) unsigned NOT NULL default '0' COMMENT '房主ID',
  `member_id` int(11) unsigned NOT NULL default '0' COMMENT '玩家ID',
  `pay_amount` varchar(50) NOT NULL default '0' COMMENT '玩家支付币',
  `win_amount` varchar(50) NOT NULL default '0' COMMENT '玩家赢得的币',
  `add_time` int(11) unsigned NOT NULL default '0' COMMENT '现家参赛时间',
  PRIMARY KEY  (`id`),
  KEY `home_id` (`home_id`),
  KEY `owner_id` (`owner_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for member
-- ----------------------------
CREATE TABLE `member` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `nickname` varchar(100) NOT NULL default '' COMMENT '昵称',
  `rname` varchar(100) NOT NULL default '' COMMENT '真实姓名',
  `mobile` varchar(11) NOT NULL default '' COMMENT '手机号',
  `email` varchar(100) NOT NULL default '' COMMENT '邮箱',
  `pwd` varchar(32) NOT NULL default '' COMMENT '密码',
  `paypwd` varchar(32) NOT NULL default '' COMMENT '支付密码',
  `tx` varchar(255) NOT NULL default '/uploadfile/avatar.jpg' COMMENT '头像url',
  `sex` tinyint(1) unsigned NOT NULL default '0' COMMENT '性别1：男2:女',
  `birth` date NOT NULL default '1987-01-01' COMMENT '出生日期',
  `identity` varchar(30) NOT NULL default '' COMMENT '身份证号',
  `reg_time` int(11) NOT NULL default '0' COMMENT '注册时间',
  `login_time` int(11) NOT NULL default '0' COMMENT '登录时间',
  `login_ip` varchar(30) NOT NULL default '' COMMENT '登录IP',
  `status` tinyint(1) NOT NULL default '0' COMMENT '审核是否通过,0:不通过1：通过',
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for member_agent
-- ----------------------------
CREATE TABLE `member_agent` (
  `id` int(11) unsigned NOT NULL auto_increment COMMENT '表自增ID',
  `member_id` int(11) unsigned NOT NULL default '0' COMMENT '房主ID',
  `member_agent_id` int(11) unsigned NOT NULL default '0' COMMENT '代理商ID',
  `balance` varchar(100) NOT NULL default '0' COMMENT '该房主在该代理商下的余额',
  `add_time` int(11) unsigned NOT NULL default '0' COMMENT '关系添加时间',
  PRIMARY KEY  (`id`),
  UNIQUE KEY `member_agent_relation` (`member_id`,`member_agent_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for member_info
-- ----------------------------
CREATE TABLE `member_info` (
  `id` int(11) unsigned NOT NULL auto_increment COMMENT '表自增ID',
  `member_id` int(11) unsigned NOT NULL default '0' COMMENT '会员关联id',
  `identity_pic` varchar(255) NOT NULL default '' COMMENT '身份证或手持身份证照片',
  `wx_nick` varchar(100) NOT NULL default '' COMMENT '微信昵称',
  `wx_tx` varchar(255) NOT NULL default '' COMMENT '微信头像',
  `wx_pay_qrcode` varchar(255) NOT NULL default '' COMMENT '微信收款二维码图片',
  `add_time` int(11) unsigned NOT NULL default '0' COMMENT '添加时间',
  PRIMARY KEY  (`id`),
  UNIQUE KEY `member_id` (`member_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for member_owner
-- ----------------------------
CREATE TABLE `member_owner` (
  `id` int(11) unsigned NOT NULL auto_increment COMMENT '表自增ID',
  `member_id` int(11) unsigned NOT NULL default '0' COMMENT '玩家ID',
  `member_owner_id` int(11) unsigned NOT NULL default '0' COMMENT '房主ID',
  `balance` varchar(100) NOT NULL default '0' COMMENT '该玩家在该房主下的余额',
  `add_time` int(11) unsigned NOT NULL default '0' COMMENT '关系添加时间',
  PRIMARY KEY  (`id`),
  UNIQUE KEY `member_owne_relation` (`member_id`,`member_owner_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for member_type
-- ----------------------------
CREATE TABLE `member_type` (
  `id` int(11) unsigned NOT NULL auto_increment COMMENT '表自增ID',
  `member_id` int(11) unsigned NOT NULL default '0' COMMENT '会员关联id',
  `member_type` tinyint(1) unsigned NOT NULL default '1' COMMENT '会员类型，1：玩家，2：房主，3：代理商',
  `invite_code` char(6) NOT NULL default '' COMMENT '当会员是房主时的6位邀请码',
  `balance` varchar(100) NOT NULL default '0' COMMENT '用户为该身份类型的余额',
  `friend_count` int(11) unsigned NOT NULL default '0' COMMENT '当会员是房主或代理商时，他的下属数量',
  `wx_group_qrcode` varchar(255) NOT NULL default '' COMMENT '当会员是房主或代理商时，他的微信群二维码图片',
  `add_time` int(11) unsigned NOT NULL default '0' COMMENT '添加时间',
  PRIMARY KEY  (`id`),
  KEY `member_id` (`member_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for news
-- ----------------------------
CREATE TABLE `news` (
  `ID` int(11) unsigned NOT NULL auto_increment COMMENT '表自增ID',
  `ClassID` smallint(4) NOT NULL default '0' COMMENT '新闻类别关联ID',
  `Title` varchar(255) NOT NULL default '' COMMENT '新闻标题',
  `Author` varchar(30) NOT NULL default '' COMMENT '新闻作者',
  `Source` varchar(60) NOT NULL default '' COMMENT '新闻来源',
  `Introduce` text NOT NULL COMMENT '新闻简介',
  `Content` text NOT NULL COMMENT '新闻内容',
  `NewsPic` text NOT NULL,
  `IsHot` tinyint(1) NOT NULL default '0' COMMENT '是否热点',
  `IsIndex` tinyint(1) NOT NULL default '0' COMMENT '是否首页',
  `Onclick` int(6) unsigned NOT NULL default '0' COMMENT '点击数',
  `SubmitDate` date default NULL COMMENT '发布日期',
  `IsShow` tinyint(1) NOT NULL default '0' COMMENT '是否显示',
  `AddUser` varchar(30) NOT NULL default '' COMMENT '管理员',
  `AddTime` int(11) unsigned NOT NULL default '0' COMMENT '添加时间',
  PRIMARY KEY  (`ID`),
  KEY `ClassID` (`ClassID`)
) ENGINE=InnoDB AUTO_INCREMENT=44 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for newsclass
-- ----------------------------
CREATE TABLE `newsclass` (
  `ID` smallint(4) unsigned NOT NULL auto_increment COMMENT '表自增ID',
  `Name` varchar(50) NOT NULL default '' COMMENT '类别名称',
  `Introduce` text NOT NULL COMMENT '类别介绍',
  `OrderNum` smallint(4) NOT NULL default '0' COMMENT '排序值',
  `IsShow` tinyint(1) NOT NULL default '0' COMMENT '是否显示',
  `AddUser` varchar(30) NOT NULL default '' COMMENT '管理员',
  `AddTime` int(11) unsigned NOT NULL default '0' COMMENT '添加时间',
  PRIMARY KEY  (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for order_exchange_owner
-- ----------------------------
CREATE TABLE `order_exchange_owner` (
  `id` int(11) unsigned NOT NULL auto_increment COMMENT '订单ID',
  `member_id` int(11) unsigned NOT NULL default '0' COMMENT '玩家ID',
  `amount` varchar(100) NOT NULL default '0' COMMENT '提现金币数',
  `status` tinyint(1) NOT NULL default '0' COMMENT '0:未处理1：已处理，2：已取消',
  `owner_id` int(11) unsigned NOT NULL default '0' COMMENT '房主ID',
  `add_time` int(11) unsigned NOT NULL default '0' COMMENT '添加订单时间',
  `pay_time` int(11) unsigned NOT NULL default '0' COMMENT '处理订单时间',
  PRIMARY KEY  (`id`),
  KEY `member_id` (`member_id`),
  KEY `owner_id` (`owner_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for order_pay_admin
-- ----------------------------
CREATE TABLE `order_pay_admin` (
  `id` int(11) unsigned NOT NULL auto_increment COMMENT '订单ID',
  `member_id` int(11) unsigned NOT NULL default '0' COMMENT '代理商ID',
  `amount` varchar(100) NOT NULL default '0' COMMENT '充值数',
  `status` tinyint(1) NOT NULL default '0' COMMENT '0:未处理1：已处理，2：已取消',
  `admin_id` int(11) unsigned NOT NULL default '0' COMMENT '充值处理管理员ID',
  `add_time` int(11) unsigned NOT NULL default '0' COMMENT '添加订单时间',
  `pay_time` int(11) unsigned NOT NULL default '0' COMMENT '处理订单充值时间',
  PRIMARY KEY  (`id`),
  KEY `member_id` (`member_id`),
  KEY `admin_id` (`admin_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for order_pay_agent
-- ----------------------------
CREATE TABLE `order_pay_agent` (
  `id` int(11) unsigned NOT NULL auto_increment COMMENT '订单ID',
  `member_id` int(11) unsigned NOT NULL default '0' COMMENT '房主ID',
  `amount` varchar(100) NOT NULL default '0' COMMENT '充值数',
  `status` tinyint(1) NOT NULL default '0' COMMENT '0:未处理1：已处理，2：已取消',
  `agent_id` int(11) unsigned NOT NULL default '0' COMMENT '代理商ID',
  `add_time` int(11) unsigned NOT NULL default '0' COMMENT '添加订单时间',
  `pay_time` int(11) unsigned NOT NULL default '0' COMMENT '处理订单充值时间',
  PRIMARY KEY  (`id`),
  KEY `member_id` (`member_id`),
  KEY `agent_id` (`agent_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for order_pay_owner
-- ----------------------------
CREATE TABLE `order_pay_owner` (
  `id` int(11) unsigned NOT NULL auto_increment COMMENT '订单ID',
  `member_id` int(11) unsigned NOT NULL default '0' COMMENT '玩家ID',
  `amount` varchar(100) NOT NULL default '0' COMMENT '充值数',
  `status` tinyint(1) NOT NULL default '0' COMMENT '0:未处理1：已处理，2：已取消',
  `owner_id` int(11) unsigned NOT NULL default '0' COMMENT '房主ID',
  `add_time` int(11) unsigned NOT NULL default '0' COMMENT '添加订单时间',
  `pay_time` int(11) unsigned NOT NULL default '0' COMMENT '处理订单充值时间',
  PRIMARY KEY  (`id`),
  KEY `member_id` (`member_id`),
  KEY `owner_id` (`owner_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for power
-- ----------------------------
CREATE TABLE `power` (
  `ID` int(11) unsigned NOT NULL auto_increment,
  `Code` smallint(4) unsigned NOT NULL default '0',
  `View` tinyint(1) NOT NULL default '0',
  `Edit` tinyint(1) NOT NULL default '0',
  `GroupID` smallint(4) unsigned NOT NULL default '0',
  PRIMARY KEY  (`ID`),
  UNIQUE KEY `GroupID_Code` (`GroupID`,`Code`)
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records 
-- ----------------------------
INSERT INTO `admin` VALUES ('1', 'admin', 'e10adc3949ba59abbe56e057f20f883e', 'admin', '1', 'chitu@chitugame.com', 'dQ6rifmx9dS5zMJcKbj', '1', '1', '1498316701', '192.168.1.108', '1', '0');
INSERT INTO `group` VALUES ('1', '管理员', '0');
INSERT INTO `member` VALUES ('1', '我的昵称', '张三', '13810959694', 'chitu@chitugame.com', 'e10adc3949ba59abbe56e057f20f883e', '', '/uploadfile/avatar.jpg', '0', '1987-01-01', '360459198604064425', '1495254784', '1495254784', '192.168.1.108', '1');
INSERT INTO `member` VALUES ('8', '', '曹操', '', 'chitugame@163.com', '25d55ad283aa400af464c76d713c07ad', '', '/uploadfile/avatar.jpg', '0', '1987-01-01', '360428198004052219', '1495333318', '1495333318', '127.0.0.1', '1');
INSERT INTO `member` VALUES ('10', '', '刘德华', '13810848589', '', '25d55ad283aa400af464c76d713c07ad', '', '/uploadfile/avatar.jpg', '0', '1987-01-01', '360428198004052219', '1495350167', '1495350167', '127.0.0.1', '1');
INSERT INTO `member` VALUES ('12', '', '历史', '13701308723', '', 'ebcbf97ec1d80c0388d39bf508039baa', '', '/uploadfile/avatar.jpg', '0', '1987-01-01', '211322198509260317', '1495427989', '1495427989', '182.18.73.162', '1');
INSERT INTO `member` VALUES ('13', '', '陈卫卫', '', '360749732@qq.com', '333dd440808661f718c2daf12986e7d3', '', '/uploadfile/avatar.jpg', '0', '1987-01-01', '320404197605060633', '1495428210', '1495428210', '182.18.73.162', '1');
INSERT INTO `member` VALUES ('15', '', 'jack', '', 'cdhjack@sina.com', '25d55ad283aa400af464c76d713c07ad', '', '/uploadfile/avatar.jpg', '0', '1987-01-01', '360428198004052219', '1496409848', '1496409848', '101.243.66.248', '1');
INSERT INTO `member` VALUES ('16', '', '张涛', '13621210179', '', 'a4513b4ba5ea016d980533c59f16ce19', '', '/uploadfile/avatar.jpg', '0', '1987-01-01', '110108197705260018', '1496410017', '1496410017', '123.120.109.88', '1');
INSERT INTO `member` VALUES ('17', '', 'sdfsf', '18813126537', '', '25d55ad283aa400af464c76d713c07ad', '', '/uploadfile/avatar.jpg', '0', '1987-01-01', '360428198004052219', '1496413826', '1496413826', '101.243.66.248', '1');
INSERT INTO `member` VALUES ('18', '守株待狼', '曹操', '13810848484', '', '25d55ad283aa400af464c76d713c07ad', '', '/uploadfile/avatar.jpg', '0', '1987-01-01', '', '1498319391', '1499306116', '192.168.17.112', '1');
INSERT INTO `member` VALUES ('19', 'asfasfd', '', '13810848483', '', '52a0dbd10860ec52d587c2b65598cb94', '', '/uploadfile/avatar.jpg', '0', '1987-01-01', '360428198004052219', '1499086353', '1499086353', '192.168.17.112', '1');
INSERT INTO `member_agent` VALUES ('1', '19', '18', '0', '1499334670');
INSERT INTO `member_type` VALUES ('1', '18', '1', '', '1000', '0', '', '1498319391');
INSERT INTO `member_type` VALUES ('2', '18', '3', '', '1000', '1', '', '1498319391');
INSERT INTO `member_type` VALUES ('3', '19', '2', 'b9eaa7', '0', '0', '', '1499335227');
INSERT INTO `news` VALUES ('43', '1', '2017年度高校线下竞赛即将开始 敬请期待', '', '', '2017年5月起，胡了三国将在北京高校开展胡了三国线下比赛，比赛方式为三人局和四人局', '2017年5月起，胡了三国将在北京高校开展胡了三国线下比赛，比赛方式为三人局和四人局<br />', '', '0', '0', '0', '2017-05-21', '1', 'admin', '1495307127');
INSERT INTO `newsclass` VALUES ('1', '新闻中心', '', '1', '1', 'admin', '0');
INSERT INTO `power` VALUES ('29', '1', '1', '1', '1');
INSERT INTO `power` VALUES ('30', '3', '1', '1', '1');
INSERT INTO `power` VALUES ('31', '4', '1', '1', '1');
INSERT INTO `power` VALUES ('32', '5', '1', '1', '1');
INSERT INTO `power` VALUES ('33', '6', '1', '1', '1');
INSERT INTO `power` VALUES ('34', '7', '1', '1', '1');
