/*
MySQL Data Transfer
Source Host: bdm135157175.my3w.com
Source Database: bdm135157175_db
Target Host: bdm135157175.my3w.com
Target Database: bdm135157175_db
Date: 2017/6/2 22:59:31
*/

SET FOREIGN_KEY_CHECKS=0;
-- ----------------------------
-- Table structure for News
-- ----------------------------
CREATE TABLE `News` (
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
-- Records 
-- ----------------------------
INSERT INTO `News` VALUES ('43', '1', '2017年度高校线下竞赛即将开始 敬请期待', '', '', '2017年5月起，胡了三国将在北京高校开展胡了三国线下比赛，比赛方式为三人局和四人局', '2017年5月起，胡了三国将在北京高校开展胡了三国线下比赛，比赛方式为三人局和四人局<br />', '', '0', '0', '0', '2017-05-21', '1', 'admin', '1495307127');
