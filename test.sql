/*
 Navicat Premium Data Transfer

 Source Server         : localhost
 Source Server Type    : MySQL
 Source Server Version : 50542
 Source Host           : localhost
 Source Database       : test

 Target Server Type    : MySQL
 Target Server Version : 50542
 File Encoding         : utf-8

 Date: 04/15/2016 01:27:21 AM
*/

SET NAMES utf8;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
--  Table structure for `test_adverts`
-- ----------------------------
DROP TABLE IF EXISTS `test_adverts`;
CREATE TABLE `test_adverts` (
  `user_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_first_name` varchar(255) NOT NULL,
  `user_last_name` varchar(255) NOT NULL,
  `user_login` varchar(255) NOT NULL,
  `user_password` varchar(255) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Records of `test_adverts`
-- ----------------------------
BEGIN;
INSERT INTO `test_adverts` VALUES ('1', 'John', 'Doe', 'jdoe@gmail.com', '$2y$13$5S5FuDB8cxzB778omb6YTeDhHfAl/ZqhmHKyoWL75YbEpgmJ/5uu2'), ('2', 'Erick', 'Doe', 'edoe@gmail.com', '$2y$13$FaUHuchhPvX0E5KTFxBe9.grpSsygUMrtL522kwfss/7VWe6z/dCS'), ('3', 'Mitchel', 'Doe', 'mdoe@gmail.com', '$2y$13$FaUHuchhPvX0E5KTFxBe9.grpSsygUMrtL522kwfss/7VWe6z/dCS'), ('4', 'admon', 'asd', 'admin', '$2y$13$WFEPRG5xvXO7CH6aMbx/zOhJXh/zdOnXgrFh.U3ZkWCkboTbkeHQm');
COMMIT;

-- ----------------------------
--  Table structure for `test_goods`
-- ----------------------------
DROP TABLE IF EXISTS `test_goods`;
CREATE TABLE `test_goods` (
  `good_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `good_name` varchar(255) NOT NULL,
  `good_price` decimal(11,2) unsigned NOT NULL,
  `good_advert` int(11) unsigned NOT NULL,
  PRIMARY KEY (`good_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Records of `test_goods`
-- ----------------------------
BEGIN;
INSERT INTO `test_goods` VALUES ('1', 'Часы Rado Integral', '2000.00', '1'), ('2', 'Часы Swiss Army', '1500.00', '1'), ('3', 'Детский планшет', '2100.00', '2'), ('4', 'Колонки Monster Beats', '900.00', '3');
COMMIT;

-- ----------------------------
--  Table structure for `test_orders`
-- ----------------------------
DROP TABLE IF EXISTS `test_orders`;
CREATE TABLE `test_orders` (
  `order_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `order_state` tinyint(1) DEFAULT '1',
  `order_add_time` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `order_good` int(11) NOT NULL,
  `order_client_phone` varchar(12) NOT NULL,
  `order_client_name` varchar(150) NOT NULL,
  PRIMARY KEY (`order_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Records of `test_orders`
-- ----------------------------
BEGIN;
INSERT INTO `test_orders` VALUES ('1', '1', null, '1', '1234567890', 'John');
COMMIT;

-- ----------------------------
--  Table structure for `test_states`
-- ----------------------------
DROP TABLE IF EXISTS `test_states`;
CREATE TABLE `test_states` (
  `state_id` int(1) unsigned NOT NULL AUTO_INCREMENT,
  `state_name` varchar(50) NOT NULL,
  `state_slug` varchar(50) NOT NULL,
  PRIMARY KEY (`state_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Records of `test_states`
-- ----------------------------
BEGIN;
INSERT INTO `test_states` VALUES ('1', 'Новый', 'new'), ('3', 'В работе', 'onoperator'), ('4', 'Подтвержден', 'accepted');
COMMIT;

SET FOREIGN_KEY_CHECKS = 1;
