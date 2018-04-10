/*
MySQL Data Transfer
Source Host: localhost
Source Database: www_rainbow_com
Target Host: localhost
Target Database: www_rainbow_com
Date: 2017/6/13 6:59:38
*/

SET FOREIGN_KEY_CHECKS=0;
-- ----------------------------
-- Table structure for admin
-- ----------------------------
CREATE TABLE `admin` (
  `ID` smallint(4) unsigned NOT NULL AUTO_INCREMENT,
  `Name` varchar(30) NOT NULL DEFAULT '',
  `Passwd` varchar(32) NOT NULL DEFAULT '',
  `RealName` varchar(30) NOT NULL DEFAULT '',
  `Sex` tinyint(1) NOT NULL DEFAULT '1',
  `Mail` varchar(50) NOT NULL DEFAULT '',
  `Rnd` varchar(32) NOT NULL DEFAULT '',
  `GroupID` smallint(4) unsigned NOT NULL DEFAULT '0',
  `Checked` tinyint(1) NOT NULL DEFAULT '1',
  `LoginTime` int(11) unsigned NOT NULL DEFAULT '0',
  `LoginIp` varchar(16) NOT NULL DEFAULT '',
  `UserFlag` tinyint(1) NOT NULL DEFAULT '0',
  `OrderNum` smallint(4) NOT NULL DEFAULT '0' COMMENT '排序值',
  PRIMARY KEY (`ID`),
  UNIQUE KEY `Name` (`Name`),
  KEY `GroupID` (`GroupID`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for group
-- ----------------------------
CREATE TABLE `group` (
  `ID` smallint(4) unsigned NOT NULL AUTO_INCREMENT,
  `Name` varchar(30) NOT NULL DEFAULT '',
  `Number` smallint(4) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for member
-- ----------------------------
CREATE TABLE `member` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nickname` varchar(100) NOT NULL DEFAULT '' COMMENT '昵称',
  `rname` varchar(100) NOT NULL DEFAULT '' COMMENT '真实姓名',
  `mobile` varchar(11) NOT NULL DEFAULT '' COMMENT '手机号',
  `email` varchar(100) NOT NULL DEFAULT '' COMMENT '邮箱',
  `pwd` varchar(32) NOT NULL DEFAULT '' COMMENT '密码',
  `paypwd` varchar(32) NOT NULL DEFAULT '' COMMENT '支付密码',
  `tx` varchar(255) NOT NULL DEFAULT '/uploadfile/avatar.jpg' COMMENT '头像url',
  `sex` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '性别1：男2:女',
  `birth` date NOT NULL DEFAULT '1987-01-01' COMMENT '出生日期',
  `identity` varchar(30) NOT NULL DEFAULT '' COMMENT '身份证号',
  `reg_time` int(11) NOT NULL DEFAULT '0' COMMENT '注册时间',
  `login_time` int(11) NOT NULL DEFAULT '0' COMMENT '登录时间',
  `login_ip` varchar(30) NOT NULL DEFAULT '' COMMENT '登录IP',
  `balance` varchar(100) NOT NULL DEFAULT '0' COMMENT '余额',
  `status` tinyint(1) NOT NULL DEFAULT '0' COMMENT '审核是否通过,0:不通过1：通过',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for news
-- ----------------------------
CREATE TABLE `news` (
  `ID` int(11) unsigned NOT NULL AUTO_INCREMENT COMMENT '表自增ID',
  `ClassID` smallint(4) NOT NULL DEFAULT '0' COMMENT '新闻类别关联ID',
  `Title` varchar(255) NOT NULL DEFAULT '' COMMENT '新闻标题',
  `Author` varchar(30) NOT NULL DEFAULT '' COMMENT '新闻作者',
  `Source` varchar(60) NOT NULL DEFAULT '' COMMENT '新闻来源',
  `Introduce` text NOT NULL COMMENT '新闻简介',
  `Content` text NOT NULL COMMENT '新闻内容',
  `NewsPic` text NOT NULL,
  `IsHot` tinyint(1) NOT NULL DEFAULT '0' COMMENT '是否热点',
  `IsIndex` tinyint(1) NOT NULL DEFAULT '0' COMMENT '是否首页',
  `Onclick` int(6) unsigned NOT NULL DEFAULT '0' COMMENT '点击数',
  `SubmitDate` date DEFAULT NULL COMMENT '发布日期',
  `IsShow` tinyint(1) NOT NULL DEFAULT '0' COMMENT '是否显示',
  `AddUser` varchar(30) NOT NULL DEFAULT '' COMMENT '管理员',
  `AddTime` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '添加时间',
  PRIMARY KEY (`ID`),
  KEY `ClassID` (`ClassID`)
) ENGINE=InnoDB AUTO_INCREMENT=44 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for newsclass
-- ----------------------------
CREATE TABLE `newsclass` (
  `ID` smallint(4) unsigned NOT NULL AUTO_INCREMENT COMMENT '表自增ID',
  `Name` varchar(50) NOT NULL DEFAULT '' COMMENT '类别名称',
  `Introduce` text NOT NULL COMMENT '类别介绍',
  `OrderNum` smallint(4) NOT NULL DEFAULT '0' COMMENT '排序值',
  `IsShow` tinyint(1) NOT NULL DEFAULT '0' COMMENT '是否显示',
  `AddUser` varchar(30) NOT NULL DEFAULT '' COMMENT '管理员',
  `AddTime` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '添加时间',
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for power
-- ----------------------------
CREATE TABLE `power` (
  `ID` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `Code` smallint(4) unsigned NOT NULL DEFAULT '0',
  `View` tinyint(1) NOT NULL DEFAULT '0',
  `Edit` tinyint(1) NOT NULL DEFAULT '0',
  `GroupID` smallint(4) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`ID`),
  UNIQUE KEY `GroupID_Code` (`GroupID`,`Code`)
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records 
-- ----------------------------
INSERT INTO `admin` VALUES ('1', 'admin', 'e10adc3949ba59abbe56e057f20f883e', 'admin', '1', 'chitu@chitugame.com', 'wiJ9Diiv5QxhqNEpRhU', '1', '1', '1496415847', '192.168.1.108', '1', '0');
INSERT INTO `group` VALUES ('1', '管理员', '0');
INSERT INTO `member` VALUES ('1', '我的昵称', '张三', '13810959694', 'chitu@chitugame.com', 'e10adc3949ba59abbe56e057f20f883e', '', '/uploadfile/avatar.jpg', '0', '1987-01-01', '360459198604064425', '1495254784', '1495254784', '192.168.1.108', '0', '1');
INSERT INTO `member` VALUES ('8', '', '曹操', '', 'chitugame@163.com', '25d55ad283aa400af464c76d713c07ad', '', '/uploadfile/avatar.jpg', '0', '1987-01-01', '360428198004052219', '1495333318', '1495333318', '127.0.0.1', '0', '1');
INSERT INTO `member` VALUES ('10', '', '刘德华', '13810848589', '', '25d55ad283aa400af464c76d713c07ad', '', '/uploadfile/avatar.jpg', '0', '1987-01-01', '360428198004052219', '1495350167', '1495350167', '127.0.0.1', '0', '1');
INSERT INTO `member` VALUES ('12', '', '历史', '13701308723', '', 'ebcbf97ec1d80c0388d39bf508039baa', '', '/uploadfile/avatar.jpg', '0', '1987-01-01', '211322198509260317', '1495427989', '1495427989', '182.18.73.162', '0', '1');
INSERT INTO `member` VALUES ('13', '', '陈卫卫', '', '360749732@qq.com', '333dd440808661f718c2daf12986e7d3', '', '/uploadfile/avatar.jpg', '0', '1987-01-01', '320404197605060633', '1495428210', '1495428210', '182.18.73.162', '0', '1');
INSERT INTO `member` VALUES ('14', '', 'jack', '13810848484', '', '25d55ad283aa400af464c76d713c07ad', '', '/uploadfile/avatar.jpg', '0', '1987-01-01', '360428198004052219', '1496408840', '1496408840', '101.243.66.248', '0', '1');
INSERT INTO `member` VALUES ('15', '', 'jack', '', 'cdhjack@sina.com', '25d55ad283aa400af464c76d713c07ad', '', '/uploadfile/avatar.jpg', '0', '1987-01-01', '360428198004052219', '1496409848', '1496409848', '101.243.66.248', '0', '1');
INSERT INTO `member` VALUES ('16', '', '张涛', '13621210179', '', 'a4513b4ba5ea016d980533c59f16ce19', '', '/uploadfile/avatar.jpg', '0', '1987-01-01', '110108197705260018', '1496410017', '1496410017', '123.120.109.88', '0', '1');
INSERT INTO `member` VALUES ('17', '', 'sdfsf', '18813126537', '', '25d55ad283aa400af464c76d713c07ad', '', '/uploadfile/avatar.jpg', '0', '1987-01-01', '360428198004052219', '1496413826', '1496413826', '101.243.66.248', '0', '1');
INSERT INTO `news` VALUES ('43', '1', '2017年度高校线下竞赛即将开始 敬请期待', '', '', '2017年5月起，胡了三国将在北京高校开展胡了三国线下比赛，比赛方式为三人局和四人局', '2017年5月起，胡了三国将在北京高校开展胡了三国线下比赛，比赛方式为三人局和四人局<br />', '', '0', '0', '0', '2017-05-21', '1', 'admin', '1495307127');
INSERT INTO `newsclass` VALUES ('1', '新闻中心', '', '1', '1', 'admin', '0');
INSERT INTO `power` VALUES ('29', '1', '1', '1', '1');
INSERT INTO `power` VALUES ('30', '3', '1', '1', '1');
INSERT INTO `power` VALUES ('31', '4', '1', '1', '1');
INSERT INTO `power` VALUES ('32', '5', '1', '1', '1');
INSERT INTO `power` VALUES ('33', '6', '1', '1', '1');
INSERT INTO `power` VALUES ('34', '7', '1', '1', '1');
