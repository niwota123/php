/*
Navicat MySQL Data Transfer

Source Server         : mysq
Source Server Version : 50629
Source Host           : localhost:3306
Source Database       : test

Target Server Type    : MYSQL
Target Server Version : 50629
File Encoding         : 65001

Date: 2017-02-16 14:45:41
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `dept`
-- ----------------------------
DROP TABLE IF EXISTS `dept`;
CREATE TABLE `dept` (
  `d_no` int(11) NOT NULL,
  `d_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `d_location` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`d_no`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of dept
-- ----------------------------
INSERT INTO `dept` VALUES ('10', 'kuaiji', 'shanghai');
INSERT INTO `dept` VALUES ('20', 'yanjiu', 'beijing');
INSERT INTO `dept` VALUES ('30', 'xiaoshou', 'shenzhen');
INSERT INTO `dept` VALUES ('40', 'guanli', 'fujian');
