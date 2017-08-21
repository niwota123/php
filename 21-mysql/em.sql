/*
Navicat MySQL Data Transfer

Source Server         : mysq
Source Server Version : 50629
Source Host           : localhost:3306
Source Database       : test

Target Server Type    : MYSQL
Target Server Version : 50629
File Encoding         : 65001

Date: 2017-02-16 14:45:51
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `em`
-- ----------------------------
DROP TABLE IF EXISTS `em`;
CREATE TABLE `em` (
  `e_no` int(11) NOT NULL,
  `e_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `e_gender` char(2) COLLATE utf8_unicode_ci DEFAULT NULL,
  `dept_no` int(11) NOT NULL,
  `e_job` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `e_salary` int(11) NOT NULL,
  `hireDate` date NOT NULL,
  PRIMARY KEY (`e_no`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of em
-- ----------------------------
INSERT INTO `em` VALUES ('1004', 'jones', 'm', '20', 'manager', '2975', '1998-05-18');
INSERT INTO `em` VALUES ('1005', 'martin', 'm', '30', 'xiaoshou', '1250', '2001-06-12');
INSERT INTO `em` VALUES ('1006', 'blake', 'f', '30', 'manager', '2850', '1997-02-15');
INSERT INTO `em` VALUES ('1007', 'clark', 'm', '10', 'manager', '2450', '2002-09-12');
INSERT INTO `em` VALUES ('1008', 'scott', 'm', '20', 'yanjiu', '3000', '2003-05-12');
INSERT INTO `em` VALUES ('1009', 'king', 'f', '10', 'zongcai', '5000', '1995-01-01');
INSERT INTO `em` VALUES ('1010', 'turner', 'f', '30', 'xiaoshou', '1500', '1997-10-12');
INSERT INTO `em` VALUES ('1011', 'adams', 'm', '20', 'yuangong', '1100', '1999-10-05');
INSERT INTO `em` VALUES ('1012', 'james', 'f', '30', 'yuangong', '950', '2008-06-15');
