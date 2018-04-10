/*
MySQL Data Transfer
Source Host: bdm135157175.my3w.com
Source Database: bdm135157175_db
Target Host: bdm135157175.my3w.com
Target Database: bdm135157175_db
Date: 2017/6/2 22:59:52
*/

SET FOREIGN_KEY_CHECKS=0;
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
INSERT INTO `power` VALUES ('29', '1', '1', '1', '1');
INSERT INTO `power` VALUES ('30', '3', '1', '1', '1');
INSERT INTO `power` VALUES ('31', '4', '1', '1', '1');
INSERT INTO `power` VALUES ('32', '5', '1', '1', '1');
INSERT INTO `power` VALUES ('33', '6', '1', '1', '1');
INSERT INTO `power` VALUES ('34', '7', '1', '1', '1');
