/*
MySQL Data Transfer
Source Host: bdm135157175.my3w.com
Source Database: bdm135157175_db
Target Host: bdm135157175.my3w.com
Target Database: bdm135157175_db
Date: 2017/6/2 22:58:57
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
-- Records 
-- ----------------------------
INSERT INTO `admin` VALUES ('1', 'admin', 'e10adc3949ba59abbe56e057f20f883e', 'admin', '1', 'chitu@chitugame.com', 'rsREApmKZyGWhBeUwtT', '1', '1', '1496408747', '101.243.66.248', '1', '0');
