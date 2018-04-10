/*
MySQL Data Transfer
Source Host: bdm135157175.my3w.com
Source Database: bdm135157175_db
Target Host: bdm135157175.my3w.com
Target Database: bdm135157175_db
Date: 2017/6/2 22:59:21
*/

SET FOREIGN_KEY_CHECKS=0;
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
-- Records 
-- ----------------------------
INSERT INTO `member` VALUES ('1', '我的昵称', '张三', '13810959694', 'chitu@chitugame.com', 'e10adc3949ba59abbe56e057f20f883e', '', '/uploadfile/avatar.jpg', '0', '1987-01-01', '360459198604064425', '1495254784', '1495254784', '192.168.1.108', '0', '1');
INSERT INTO `member` VALUES ('8', '', '曹操', '', 'chitugame@163.com', '25d55ad283aa400af464c76d713c07ad', '', '/uploadfile/avatar.jpg', '0', '1987-01-01', '360428198004052219', '1495333318', '1495333318', '127.0.0.1', '0', '1');
INSERT INTO `member` VALUES ('10', '', '刘德华', '13810848589', '', '25d55ad283aa400af464c76d713c07ad', '', '/uploadfile/avatar.jpg', '0', '1987-01-01', '360428198004052219', '1495350167', '1495350167', '127.0.0.1', '0', '1');
INSERT INTO `member` VALUES ('12', '', '历史', '13701308723', '', 'ebcbf97ec1d80c0388d39bf508039baa', '', '/uploadfile/avatar.jpg', '0', '1987-01-01', '211322198509260317', '1495427989', '1495427989', '182.18.73.162', '0', '1');
INSERT INTO `member` VALUES ('13', '', '陈卫卫', '', '360749732@qq.com', '333dd440808661f718c2daf12986e7d3', '', '/uploadfile/avatar.jpg', '0', '1987-01-01', '320404197605060633', '1495428210', '1495428210', '182.18.73.162', '0', '1');
INSERT INTO `member` VALUES ('14', '', 'jack', '13810848484', '', '25d55ad283aa400af464c76d713c07ad', '', '/uploadfile/avatar.jpg', '0', '1987-01-01', '360428198004052219', '1496408840', '1496408840', '101.243.66.248', '0', '1');
INSERT INTO `member` VALUES ('15', '', 'jack', '', 'cdhjack@sina.com', '25d55ad283aa400af464c76d713c07ad', '', '/uploadfile/avatar.jpg', '0', '1987-01-01', '360428198004052219', '1496409848', '1496409848', '101.243.66.248', '0', '1');
INSERT INTO `member` VALUES ('16', '', '张涛', '13621210179', '', 'a4513b4ba5ea016d980533c59f16ce19', '', '/uploadfile/avatar.jpg', '0', '1987-01-01', '110108197705260018', '1496410017', '1496410017', '123.120.109.88', '0', '1');
INSERT INTO `member` VALUES ('17', '', 'sdfsf', '18813126537', '', '25d55ad283aa400af464c76d713c07ad', '', '/uploadfile/avatar.jpg', '0', '1987-01-01', '360428198004052219', '1496413826', '1496413826', '101.243.66.248', '0', '1');
