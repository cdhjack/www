/*
MySQL Data Transfer
Source Host: bdm135157175.my3w.com
Source Database: bdm135157175_db
Target Host: bdm135157175.my3w.com
Target Database: bdm135157175_db
Date: 2017/6/2 22:59:08
*/

SET FOREIGN_KEY_CHECKS=0;
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
-- Records 
-- ----------------------------
INSERT INTO `group` VALUES ('1', '管理员', '0');
