/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50554
Source Host           : localhost:3306
Source Database       : question

Target Server Type    : MYSQL
Target Server Version : 50554
File Encoding         : 65001

Date: 2019-03-19 23:01:04
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for api_user
-- ----------------------------
DROP TABLE IF EXISTS `api_user`;
CREATE TABLE `api_user` (
  `id` int(11) unsigned NOT NULL,
  `mobile` bigint(15) NOT NULL,
  `appid` varchar(200) NOT NULL COMMENT 'appid',
  `appsercet` varchar(100) NOT NULL COMMENT 'app密码',
  `timestamp` bigint(20) NOT NULL COMMENT '时间戳',
  `create_at` bigint(20) NOT NULL,
  `update_at` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of api_user
-- ----------------------------
INSERT INTO `api_user` VALUES ('1', '15889845442', '15889845442', 'b0f414b8bcd696f5f9c0db219a0e9de2', '1552999929', '1552999929', '1552999929');

-- ----------------------------
-- Table structure for user
-- ----------------------------
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `avatar_url` varchar(255) DEFAULT NULL COMMENT '用户头像地址',
  `is_famous` int(11) NOT NULL DEFAULT '0' COMMENT '是否是名人',
  `info` varchar(255) DEFAULT NULL COMMENT '用户简介',
  `user_name` varchar(255) NOT NULL COMMENT '用户名',
  `open_id` int(11) NOT NULL COMMENT '用户标识符',
  `account` decimal(10,0) NOT NULL DEFAULT '0' COMMENT '用户余额',
  `create_time` datetime NOT NULL COMMENT '创建时间',
  `update_time` datetime NOT NULL COMMENT '更新时间',
  `delete_time` datetime NOT NULL COMMENT '软删除',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of user
-- ----------------------------
SET FOREIGN_KEY_CHECKS=1;
