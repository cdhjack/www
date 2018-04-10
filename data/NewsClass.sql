/*
MySQL Data Transfer
Source Host: bdm135157175.my3w.com
Source Database: bdm135157175_db
Target Host: bdm135157175.my3w.com
Target Database: bdm135157175_db
Date: 2017/6/2 22:59:42
*/

SET FOREIGN_KEY_CHECKS=0;
-- ----------------------------
-- Table structure for NewsClass
-- ----------------------------
CREATE TABLE `NewsClass` (
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
-- Records 
-- ----------------------------
INSERT INTO `NewsClass` VALUES ('1', '新闻中心', '', '1', '1', 'admin', '0');
