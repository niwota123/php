/*
Navicat MySQL Data Transfer

Source Server         : mysq
Source Server Version : 50629
Source Host           : localhost:3306
Source Database       : test

Target Server Type    : MYSQL
Target Server Version : 50629
File Encoding         : 65001

Date: 2017-07-19 18:59:44
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `blog`
-- ----------------------------
DROP TABLE IF EXISTS `blog`;
CREATE TABLE `blog` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `content` varchar(1000) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `author` varchar(10) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `creattime` datetime NOT NULL,
  `category_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

-- ----------------------------
-- Records of blog
-- ----------------------------
INSERT INTO `blog` VALUES ('1', 'mysql', 'Mysql是最流行的关系型数据库管理系统，在WEB应用方面MySQL是最好的RDBMS(Relational Database Management System：关系数据库管理系统)应用软件之一。\r\n在本教程中，会让大家快速掌握Mysql的基本知识，并轻松使用Mysql数据库。', 'superking', '2017-07-18 11:00:00', '3');
INSERT INTO `blog` VALUES ('2', '什么是数据库？', '数据库（Database）是按照数据结构来组织、存储和管理数据的仓库，\r\n每个数据库都有一个或多个不同的API用于创建，访问，管理，搜索和复制所保存的数据。\r\n我们也可以将数据存储在文件中，但是在文件中读写数据速度相对较慢。\r\n所以，现在我们使用关系型数据库管理系统（RDBMS）来存储和管理的大数据量。所谓的关系型数据库，是建立在关系模型基础上的数据库，借助于集合代数等数学概念和方法来处理数据库中的数据。', 'superking', '2017-07-18 12:00:00', '2');
INSERT INTO `blog` VALUES ('3', 'MySQL PHP 语法', 'MySQL 可应用于多种语言，包括 PERL, C, C++, JAVA 和 PHP。 在这些语言中，Mysql在PHP的web开发中是应用最广泛。\r\n在本教程中我们大部分实例都采用了 PHP 语言。如果你想了解 Mysql 在 PHP 中的应用，可以访问我们的 PHP 中使用 Mysqli 介绍。\r\nPHP提供了多种方式来访问和操作Mysql数据库记录。PHP Mysqli函数格式如下：', 'superking', '2017-07-18 11:00:00', '1');

-- ----------------------------
-- Table structure for `category`
-- ----------------------------
DROP TABLE IF EXISTS `category`;
CREATE TABLE `category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category` varchar(100) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

-- ----------------------------
-- Records of category
-- ----------------------------
INSERT INTO `category` VALUES ('1', '娱乐');
INSERT INTO `category` VALUES ('2', '游记');
INSERT INTO `category` VALUES ('3', '日记');

-- ----------------------------
-- Table structure for `student`
-- ----------------------------
DROP TABLE IF EXISTS `student`;
CREATE TABLE `student` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(10) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `age` varchar(3) COLLATE utf8mb4_unicode_520_ci NOT NULL DEFAULT '0',
  `tel` varchar(11) COLLATE utf8mb4_unicode_520_ci DEFAULT NULL,
  `address` varchar(100) COLLATE utf8mb4_unicode_520_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

-- ----------------------------
-- Records of student
-- ----------------------------
INSERT INTO `student` VALUES ('2', '小李', '24', '18587878787', '北京市朝阳区');
INSERT INTO `student` VALUES ('3', '小糖', '24', '18587878787', '北京市朝阳区');
INSERT INTO `student` VALUES ('4', '小李1', '23', '13989800987', '河南省郑州市经开区');
INSERT INTO `student` VALUES ('5', '小李2', '22', null, null);
INSERT INTO `student` VALUES ('6', '小李2', '', null, null);
INSERT INTO `student` VALUES ('7', '小李2', '0', null, null);
INSERT INTO `student` VALUES ('9', '小王', '30', '19889898989', '智游教育');
INSERT INTO `student` VALUES ('10', '小王', '30', '19889898989', '智游教育');
INSERT INTO `student` VALUES ('11', '小王1', '23', '19889898989', '智游教育');
INSERT INTO `student` VALUES ('12', '小王2', '23', '19889898989', '智游教育');
INSERT INTO `student` VALUES ('13', '小王3', '23', '19889898989', '智游教育');
INSERT INTO `student` VALUES ('14', '小王4', '23', '19889898989', '智游教育');
INSERT INTO `student` VALUES ('15', '小王1', '23', '19889898989', '智游教育');
INSERT INTO `student` VALUES ('16', '小王2', '23', '19889898989', '智游教育');
INSERT INTO `student` VALUES ('17', '小王3', '23', '19889898989', '智游教育');
INSERT INTO `student` VALUES ('18', '小王4', '23', '19889898989', '智游教育');

-- ----------------------------
-- Table structure for `user`
-- ----------------------------
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(20) NOT NULL,
  `pwd` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of user
-- ----------------------------
INSERT INTO `user` VALUES ('1', 'admin', '5d793fc5b00a2348c3fb9ab59e5ca98a');
INSERT INTO `user` VALUES ('2', 'root', 'e10adc3949ba59abbe56e057f20f883e');
