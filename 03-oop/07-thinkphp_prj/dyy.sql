/*
Navicat MySQL Data Transfer

Source Server         : local
Source Server Version : 50629
Source Host           : localhost:3306
Source Database       : dyy

Target Server Type    : MYSQL
Target Server Version : 50629
File Encoding         : 65001

Date: 2017-10-19 15:12:23
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for dyy_biz
-- ----------------------------
DROP TABLE IF EXISTS `dyy_biz`;
CREATE TABLE `dyy_biz` (
  `b_id` int(11) NOT NULL AUTO_INCREMENT,
  `b_username` varchar(40) DEFAULT NULL,
  `b_name` varchar(200) DEFAULT NULL,
  `b_password` varchar(32) DEFAULT NULL,
  `b_province` varchar(50) DEFAULT NULL,
  `b_city` varchar(50) DEFAULT NULL,
  `b_district` varchar(50) DEFAULT NULL,
  `b_address` varchar(255) DEFAULT NULL,
  `b_lng` varchar(255) DEFAULT NULL COMMENT '维度',
  `b_lat` varchar(255) DEFAULT NULL COMMENT '经度',
  `create_time` datetime DEFAULT NULL COMMENT '创建时间',
  `update_time` datetime DEFAULT NULL COMMENT '更新时间',
  `delete_time` datetime DEFAULT NULL COMMENT '删除时间',
  PRIMARY KEY (`b_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for dyy_files
-- ----------------------------
DROP TABLE IF EXISTS `dyy_files`;
CREATE TABLE `dyy_files` (
  `f_id` int(11) NOT NULL AUTO_INCREMENT,
  `f_uid` int(11) DEFAULT NULL,
  `f_filename` varchar(100) DEFAULT NULL COMMENT ' 文件名称',
  `f_filesize` varchar(40) DEFAULT NULL,
  `f_upload_time` datetime DEFAULT NULL,
  `f_filepath` varchar(255) DEFAULT NULL COMMENT '文件路径',
  `f_ext` varchar(20) DEFAULT NULL COMMENT '后缀',
  `delete_time` datetime DEFAULT NULL,
  `create_time` datetime DEFAULT NULL,
  `update_time` datetime DEFAULT NULL,
  PRIMARY KEY (`f_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for dyy_orders
-- ----------------------------
DROP TABLE IF EXISTS `dyy_orders`;
CREATE TABLE `dyy_orders` (
  `o_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '订单ID',
  `o_b_id` int(11) DEFAULT NULL COMMENT '商家ID',
  `o_uid` int(11) DEFAULT NULL COMMENT '用户ID',
  `o_state` varchar(60) DEFAULT NULL COMMENT '支付状态',
  `o_goods_money` decimal(8,2) DEFAULT NULL COMMENT '商品金额',
  `o_pay_type` varchar(30) DEFAULT NULL COMMENT '支付方式',
  `o_pay_money` decimal(8,2) DEFAULT NULL COMMENT '应付金额',
  `o_delivery_type` varchar(40) DEFAULT NULL COMMENT '派送的类型',
  `o_delivery_fee` decimal(6,2) DEFAULT NULL COMMENT '派送费',
  `o_delivery_address` varchar(255) DEFAULT NULL COMMENT '配送地址',
  `create_time` datetime DEFAULT NULL COMMENT '创建时间',
  `update_time` datetime DEFAULT NULL COMMENT '更新时间',
  `delete_time` datetime DEFAULT NULL COMMENT '删除时间',
  PRIMARY KEY (`o_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for dyy_order_goods
-- ----------------------------
DROP TABLE IF EXISTS `dyy_order_goods`;
CREATE TABLE `dyy_order_goods` (
  `og_id` int(11) NOT NULL AUTO_INCREMENT,
  `og_o_id` int(11) DEFAULT NULL COMMENT '订单ID',
  `og_f_id` int(11) DEFAULT NULL COMMENT '文件ID',
  `og_start_page` int(5) DEFAULT NULL COMMENT '开始页码',
  `og_end_page` int(5) DEFAULT NULL COMMENT '结束页码',
  `og_color` char(10) DEFAULT NULL COMMENT '黑白',
  `og_two_sided` char(10) DEFAULT NULL,
  `og_page_size` char(20) DEFAULT NULL,
  `og_totals` int(11) DEFAULT NULL,
  `og_extra` varchar(255) DEFAULT NULL COMMENT '额外要求',
  `create_time` datetime DEFAULT NULL,
  `update_time` datetime DEFAULT NULL COMMENT '更新时间',
  `delete_time` datetime DEFAULT NULL COMMENT '删除时间',
  PRIMARY KEY (`og_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for dyy_order_timeline
-- ----------------------------
DROP TABLE IF EXISTS `dyy_order_timeline`;
CREATE TABLE `dyy_order_timeline` (
  `ot_id` int(11) NOT NULL AUTO_INCREMENT,
  `ot_o_id` int(11) DEFAULT NULL COMMENT '订单ID',
  `ot_operator` varchar(40) DEFAULT NULL COMMENT '操作人',
  `ot_operate_time` datetime DEFAULT NULL COMMENT '操作时间',
  `ot_operate_information` varchar(255) DEFAULT NULL COMMENT '操作信息',
  `create_time` datetime DEFAULT NULL,
  `update_time` datetime DEFAULT NULL COMMENT '更新时间',
  `delete_time` datetime DEFAULT NULL COMMENT '删除时间',
  PRIMARY KEY (`ot_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for dyy_user
-- ----------------------------
DROP TABLE IF EXISTS `dyy_user`;
CREATE TABLE `dyy_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(60) DEFAULT NULL,
  `passwd` char(32) DEFAULT NULL,
  `email` varchar(60) DEFAULT NULL,
  `balance` decimal(6,2) DEFAULT NULL,
  `create_time` datetime DEFAULT NULL,
  `update_time` datetime DEFAULT NULL,
  `delete_time` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
