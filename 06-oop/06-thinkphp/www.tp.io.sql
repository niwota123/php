/*
Navicat MySQL Data Transfer

Source Server         : local
Source Server Version : 50629
Source Host           : localhost:3306
Source Database       : www.tp.io

Target Server Type    : MYSQL
Target Server Version : 50629
File Encoding         : 65001

Date: 2017-10-10 17:46:27
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for think_article
-- ----------------------------
DROP TABLE IF EXISTS `think_article`;
CREATE TABLE `think_article` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of think_article
-- ----------------------------
INSERT INTO `think_article` VALUES ('1', 'article1');

-- ----------------------------
-- Table structure for think_blog
-- ----------------------------
DROP TABLE IF EXISTS `think_blog`;
CREATE TABLE `think_blog` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) DEFAULT NULL,
  `content` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of think_blog
-- ----------------------------
INSERT INTO `think_blog` VALUES ('1', 'title_1', 'content:1');
INSERT INTO `think_blog` VALUES ('2', 'title_2', 'content:2');
INSERT INTO `think_blog` VALUES ('3', 'title_3', 'content:3');
INSERT INTO `think_blog` VALUES ('4', 'title_4', 'content:4');
INSERT INTO `think_blog` VALUES ('5', 'title_5', 'content:5');
INSERT INTO `think_blog` VALUES ('6', 'title_6', 'content:6');
INSERT INTO `think_blog` VALUES ('7', 'title_7', 'content:7');
INSERT INTO `think_blog` VALUES ('8', 'title_8', 'content:8');
INSERT INTO `think_blog` VALUES ('9', 'title_9', 'content:9');
INSERT INTO `think_blog` VALUES ('10', 'title_0', 'content:0');
INSERT INTO `think_blog` VALUES ('11', 'title_1', 'content:1');
INSERT INTO `think_blog` VALUES ('12', 'title_2', 'content:2');
INSERT INTO `think_blog` VALUES ('13', 'title_3', 'content:3');
INSERT INTO `think_blog` VALUES ('14', 'title_4', 'content:4');
INSERT INTO `think_blog` VALUES ('15', 'title_5', 'content:5');
INSERT INTO `think_blog` VALUES ('16', 'title_6', 'content:6');
INSERT INTO `think_blog` VALUES ('17', 'title_7', 'content:7');
INSERT INTO `think_blog` VALUES ('18', 'title_8', 'content:8');
INSERT INTO `think_blog` VALUES ('19', 'title_9', 'content:9');

-- ----------------------------
-- Table structure for think_book
-- ----------------------------
DROP TABLE IF EXISTS `think_book`;
CREATE TABLE `think_book` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of think_book
-- ----------------------------
INSERT INTO `think_book` VALUES ('1', '西游记');
INSERT INTO `think_book` VALUES ('2', '诛仙');

-- ----------------------------
-- Table structure for think_city
-- ----------------------------
DROP TABLE IF EXISTS `think_city`;
CREATE TABLE `think_city` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of think_city
-- ----------------------------
INSERT INTO `think_city` VALUES ('1', 'zhengzhou');

-- ----------------------------
-- Table structure for think_comment
-- ----------------------------
DROP TABLE IF EXISTS `think_comment`;
CREATE TABLE `think_comment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `content` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `commentable_id` int(11) DEFAULT NULL,
  `commentable_type` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of think_comment
-- ----------------------------
INSERT INTO `think_comment` VALUES ('1', '34', 'title', 'content', '2', null, null);
INSERT INTO `think_comment` VALUES ('2', '34', 'title1', 'content1', '2', null, null);
INSERT INTO `think_comment` VALUES ('3', null, 'title111', 'content1111', null, '1', 'article');
INSERT INTO `think_comment` VALUES ('4', null, 'title222', 'content222', null, '1', 'article');
INSERT INTO `think_comment` VALUES ('5', null, 'title-book', 'content-book', null, '1', 'book');
INSERT INTO `think_comment` VALUES ('6', null, '真好看', '猴子真好看', null, '1', 'book');
INSERT INTO `think_comment` VALUES ('7', null, '欲罢不能', '张小凡太厉害了', null, '2', 'book');
INSERT INTO `think_comment` VALUES ('8', null, '楼上说的对', '碧瑶真好看!!!', null, '2', 'book');

-- ----------------------------
-- Table structure for think_data
-- ----------------------------
DROP TABLE IF EXISTS `think_data`;
CREATE TABLE `think_data` (
  `id` int(8) unsigned NOT NULL AUTO_INCREMENT,
  `data` varchar(255) NOT NULL,
  `info` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of think_data
-- ----------------------------
INSERT INTO `think_data` VALUES ('1', 'thinkphp', '{\'name\':\'a\'}');
INSERT INTO `think_data` VALUES ('2', 'php', '{\'name\':\'a\'}');
INSERT INTO `think_data` VALUES ('3', 'framework', null);
INSERT INTO `think_data` VALUES ('4', 'java', null);
INSERT INTO `think_data` VALUES ('5', 'java', null);
INSERT INTO `think_data` VALUES ('6', 'java', null);

-- ----------------------------
-- Table structure for think_profile
-- ----------------------------
DROP TABLE IF EXISTS `think_profile`;
CREATE TABLE `think_profile` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `no` int(11) DEFAULT NULL,
  `type` varchar(255) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of think_profile
-- ----------------------------
INSERT INTO `think_profile` VALUES ('1', '436286383', '身份证', '34');

-- ----------------------------
-- Table structure for think_rel
-- ----------------------------
DROP TABLE IF EXISTS `think_rel`;
CREATE TABLE `think_rel` (
  `user_id` int(11) DEFAULT NULL,
  `role_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of think_rel
-- ----------------------------
INSERT INTO `think_rel` VALUES ('4', '3');
INSERT INTO `think_rel` VALUES ('5', '1');
INSERT INTO `think_rel` VALUES ('5', '2');
INSERT INTO `think_rel` VALUES ('6', '2');
INSERT INTO `think_rel` VALUES ('6', '3');

-- ----------------------------
-- Table structure for think_role
-- ----------------------------
DROP TABLE IF EXISTS `think_role`;
CREATE TABLE `think_role` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of think_role
-- ----------------------------
INSERT INTO `think_role` VALUES ('1', '管理员');
INSERT INTO `think_role` VALUES ('2', '员工');
INSERT INTO `think_role` VALUES ('3', 'vip');

-- ----------------------------
-- Table structure for think_topic
-- ----------------------------
DROP TABLE IF EXISTS `think_topic`;
CREATE TABLE `think_topic` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(200) DEFAULT NULL,
  `topic_content` varchar(200) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of think_topic
-- ----------------------------
INSERT INTO `think_topic` VALUES ('1', 'test', 'testcontent', '4');
INSERT INTO `think_topic` VALUES ('2', 'test1', 'testcontent1', '5');

-- ----------------------------
-- Table structure for think_user
-- ----------------------------
DROP TABLE IF EXISTS `think_user`;
CREATE TABLE `think_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `create_time` datetime DEFAULT NULL,
  `update_time` datetime DEFAULT NULL,
  `delete_time` datetime DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `ip` varchar(255) DEFAULT NULL,
  `city_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of think_user
-- ----------------------------
INSERT INTO `think_user` VALUES ('4', 'yii', 'yii@sina.com', null, null, null, null, null, '1');
INSERT INTO `think_user` VALUES ('5', 'phpcms', 'phpcms@sina.com', null, null, null, null, null, '1');
INSERT INTO `think_user` VALUES ('6', 'post', 'post@aa.com', null, null, null, null, null, '1');
INSERT INTO `think_user` VALUES ('7', 'post_2', null, null, null, null, null, null, '1');
INSERT INTO `think_user` VALUES ('9', 'more1', 'more1@sina.com', null, null, null, null, null, '1');
INSERT INTO `think_user` VALUES ('10', 'more2', 'more2@sina.com', null, null, null, null, null, null);
INSERT INTO `think_user` VALUES ('11', 'more1', 'more1@sina.com', null, null, null, null, null, null);
INSERT INTO `think_user` VALUES ('12', 'more2', 'more2@sina.com', null, null, null, null, null, null);
INSERT INTO `think_user` VALUES ('14', 'static', 'static@sina.com', null, null, null, null, null, null);
INSERT INTO `think_user` VALUES ('15', 'static', 'static@sina.com', null, null, null, null, null, null);
INSERT INTO `think_user` VALUES ('16', 'static', 'static@sina.com', null, null, null, null, null, null);
INSERT INTO `think_user` VALUES ('18', '修改器处理updata-3', 'updata-3@qq.com', null, '2017-10-09 23:53:02', '2017-10-09 23:53:02', null, null, null);
INSERT INTO `think_user` VALUES ('19', '修改器处理updata-3', 'updata-3@qq.com', '2017-10-09 23:45:43', '2017-10-09 23:53:30', '2017-10-09 23:53:30', null, null, null);
INSERT INTO `think_user` VALUES ('20', '修改器处理updata-3', 'static@sina.com', '2017-10-10 00:48:51', '2017-10-10 09:28:51', null, '1', '127.0.0.1', null);
INSERT INTO `think_user` VALUES ('21', '修改器处理updata-3', 'updata-3@qq.com', '2017-10-10 09:24:47', '2017-10-10 09:32:01', '2017-10-10 09:32:01', '1', '127.0.0.1', null);
INSERT INTO `think_user` VALUES ('22', '修改器处理static', 'static@sina.com', '2017-10-10 09:41:56', '2017-10-10 09:41:56', null, '1', '127.0.0.1', null);
INSERT INTO `think_user` VALUES ('23', '修改器处理static', 'static@sina.com', '2017-10-10 09:42:41', '2017-10-10 09:42:41', null, '3', '192.168.1.1', null);
INSERT INTO `think_user` VALUES ('24', '修改器处理static', 'static@sina.com', '2017-10-10 11:13:47', '2017-10-10 11:13:47', null, '3', '192.168.1.1', null);
INSERT INTO `think_user` VALUES ('25', '修改器处理static', 'static@sina.com', '2017-10-10 11:14:20', '2017-10-10 11:14:20', null, '3', '192.168.1.1', null);
INSERT INTO `think_user` VALUES ('26', '修改器处理static', 'static@sina.com', '2017-10-10 11:15:34', '2017-10-10 11:15:34', null, '3', '192.168.1.1', null);
INSERT INTO `think_user` VALUES ('27', '修改器处理static', 'static@sina.com', '2017-10-10 11:16:09', '2017-10-10 11:16:09', null, '3', '192.168.1.1', null);
INSERT INTO `think_user` VALUES ('28', '修改器处理static', 'static@sina.com', '2017-10-10 11:17:13', '2017-10-10 11:17:13', null, '3', '192.168.1.1', null);
INSERT INTO `think_user` VALUES ('29', '修改器处理static', 'static@sina.com', '2017-10-10 11:19:24', '2017-10-10 11:19:24', null, '3', '192.168.1.1', null);
INSERT INTO `think_user` VALUES ('30', '修改器处理static', 'static@sina.com', '2017-10-10 11:19:36', '2017-10-10 11:19:36', null, '3', '192.168.1.1', null);
INSERT INTO `think_user` VALUES ('31', '修改器处理static', 'static@sina.com', '2017-10-10 11:19:50', '2017-10-10 11:19:50', null, '3', '192.168.1.1', null);
INSERT INTO `think_user` VALUES ('32', '修改器处理static', 'static@sina.com', '2017-10-10 11:21:49', '2017-10-10 11:21:49', null, '3', '192.168.1.1', null);
INSERT INTO `think_user` VALUES ('33', 'name1', 'email@qq.com', '2017-10-10 12:00:13', '2017-10-10 12:00:13', null, '3', '192.168.1.1', null);
INSERT INTO `think_user` VALUES ('34', 'name1', 'email@qq.com', '2017-10-10 12:00:49', '2017-10-10 12:00:49', null, '3', '192.168.1.1', null);
