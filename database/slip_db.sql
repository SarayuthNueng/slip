/*
 Navicat Premium Data Transfer

 Source Server         : web-server
 Source Server Type    : MySQL
 Source Server Version : 100334
 Source Host           : 192.168.0.208:3306
 Source Schema         : slip_db

 Target Server Type    : MySQL
 Target Server Version : 100334
 File Encoding         : 65001

 Date: 05/04/2022 11:33:24
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for admin_login
-- ----------------------------
DROP TABLE IF EXISTS `admin_login`;
CREATE TABLE `admin_login`  (
  `id_admin` int NOT NULL AUTO_INCREMENT,
  `username` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `password` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `name` varchar(200) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `position` varchar(200) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id_admin`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 3 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of admin_login
-- ----------------------------
INSERT INTO `admin_login` VALUES (1, 'admin', 'admin', 'ผู้ดูแลระบบ', 'ผู้ดูแลระบบ');

-- ----------------------------
-- Table structure for kname
-- ----------------------------
DROP TABLE IF EXISTS `kname`;
CREATE TABLE `kname`  (
  `kumnum_id` int NOT NULL,
  `kumnum_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  PRIMARY KEY (`kumnum_id`) USING BTREE
) ENGINE = MyISAM CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of kname
-- ----------------------------
INSERT INTO `kname` VALUES (1, 'นาย');
INSERT INTO `kname` VALUES (2, 'นาง');
INSERT INTO `kname` VALUES (3, 'น.ส.');

-- ----------------------------
-- Table structure for login
-- ----------------------------
DROP TABLE IF EXISTS `login`;
CREATE TABLE `login`  (
  `id_login` varchar(13) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `pass` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `pname` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `fname` varchar(200) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `txtoffice` varchar(200) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id_login`) USING BTREE
) ENGINE = MyISAM CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of login
-- ----------------------------
INSERT INTO `login` VALUES ('123456789', '123456789', 'นาย', 'ทดสอบ', 'ทดสอบ');

-- ----------------------------
-- Table structure for payslip
-- ----------------------------
DROP TABLE IF EXISTS `payslip`;
CREATE TABLE `payslip`  (
  `id_num` int NOT NULL AUTO_INCREMENT,
  `date` date NULL DEFAULT NULL,
  `no` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT '',
  `title` varchar(10) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `id` varchar(13) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `bank_id` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `office` int NULL DEFAULT NULL,
  `txtoffice` varchar(200) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `salary` int NULL DEFAULT NULL,
  `tax` int NULL DEFAULT NULL,
  `assur_dd` int NULL DEFAULT NULL,
  `saving` int NULL DEFAULT NULL,
  `kid` int NULL DEFAULT NULL,
  `gpf` int NULL DEFAULT NULL,
  `pfund` int NULL DEFAULT NULL,
  `soc` int NULL DEFAULT NULL,
  `total` int NULL DEFAULT NULL,
  `type0` int NULL DEFAULT NULL,
  `type1` int NULL DEFAULT NULL,
  `type2` int NULL DEFAULT NULL,
  `type3` int NULL DEFAULT NULL,
  `type4` int NULL DEFAULT NULL,
  `type5` int NULL DEFAULT NULL,
  `type6` int NULL DEFAULT NULL,
  `type7` int NULL DEFAULT NULL,
  `type8` int NULL DEFAULT NULL,
  `type9` int NULL DEFAULT NULL,
  `type10` int NULL DEFAULT NULL,
  `type11` int NULL DEFAULT NULL,
  `type12` int NULL DEFAULT NULL,
  `type13` int NULL DEFAULT NULL,
  `type14` int NULL DEFAULT NULL,
  `type15` int NULL DEFAULT NULL,
  `type16` int NULL DEFAULT NULL,
  `type17` int NULL DEFAULT NULL,
  `type18` int NULL DEFAULT NULL,
  `type19` int NULL DEFAULT NULL,
  `type20` int NULL DEFAULT NULL,
  `type21` int NULL DEFAULT NULL,
  `type22` int NULL DEFAULT NULL,
  `type23` int NULL DEFAULT NULL,
  `type24` int NULL DEFAULT NULL,
  `type25` int NULL DEFAULT NULL,
  `type26` int NULL DEFAULT NULL,
  `type27` int NULL DEFAULT NULL,
  `type28` int NULL DEFAULT NULL,
  `type29` int NULL DEFAULT NULL,
  `type30` int NULL DEFAULT NULL,
  `type31` int NULL DEFAULT NULL,
  `type32` int NULL DEFAULT NULL,
  `type33` int NULL DEFAULT NULL,
  `type34` int NULL DEFAULT NULL,
  `type35` int NULL DEFAULT NULL,
  `type36` int NULL DEFAULT NULL,
  `type37` int NULL DEFAULT NULL,
  `type38` int NULL DEFAULT NULL,
  `type39` int NULL DEFAULT NULL,
  `type40` int NULL DEFAULT NULL,
  `type41` int NULL DEFAULT NULL,
  `type42` int NULL DEFAULT NULL,
  `type43` int NULL DEFAULT NULL,
  `type44` int NULL DEFAULT NULL,
  `type45` int NULL DEFAULT NULL,
  `type46` int NULL DEFAULT NULL,
  `type47` int NULL DEFAULT NULL,
  `type48` int NULL DEFAULT NULL,
  `type49` int NULL DEFAULT NULL,
  `type50` int NULL DEFAULT NULL,
  `type51` int NULL DEFAULT NULL,
  `type52` int NULL DEFAULT NULL,
  `type53` int NULL DEFAULT NULL,
  `type54` int NULL DEFAULT NULL,
  `type55` int NULL DEFAULT NULL,
  `type56` int NULL DEFAULT NULL,
  `type57` int NULL DEFAULT NULL,
  `type58` int NULL DEFAULT NULL,
  `type59` int NULL DEFAULT NULL,
  `type60` int NULL DEFAULT NULL,
  `type61` int NULL DEFAULT NULL,
  `type62` int NULL DEFAULT NULL,
  `type63` int NULL DEFAULT NULL,
  `type64` int NULL DEFAULT NULL,
  `type65` int NULL DEFAULT NULL,
  `type66` int NULL DEFAULT NULL,
  `type67` int NULL DEFAULT NULL,
  `type68` int NULL DEFAULT NULL,
  `type69` int NULL DEFAULT NULL,
  `type70` int NULL DEFAULT NULL,
  `type71` int NULL DEFAULT NULL,
  `type72` int NULL DEFAULT NULL,
  `type73` int NULL DEFAULT NULL,
  `type74` int NULL DEFAULT NULL,
  `type75` int NULL DEFAULT NULL,
  `type76` int NULL DEFAULT NULL,
  `type77` int NULL DEFAULT NULL,
  `type78` int NULL DEFAULT NULL,
  `type79` int NULL DEFAULT NULL,
  `type80` int NULL DEFAULT NULL,
  `type81` int NULL DEFAULT NULL,
  `type82` int NULL DEFAULT NULL,
  `type83` int NULL DEFAULT NULL,
  `type84` int NULL DEFAULT NULL,
  `type85` int NULL DEFAULT NULL,
  `type86` int NULL DEFAULT NULL,
  `type87` int NULL DEFAULT NULL,
  `type88` int NULL DEFAULT NULL,
  `type89` int NULL DEFAULT NULL,
  `type90` int NULL DEFAULT NULL,
  `type91` int NULL DEFAULT NULL,
  `type92` int NULL DEFAULT NULL,
  `type93` int NULL DEFAULT NULL,
  `type94` int NULL DEFAULT NULL,
  `type95` int NULL DEFAULT NULL,
  `type96` int NULL DEFAULT NULL,
  `type97` int NULL DEFAULT NULL,
  `type98` int NULL DEFAULT NULL,
  `type99` int NULL DEFAULT NULL,
  PRIMARY KEY (`id_num`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 3 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of payslip
-- ----------------------------
INSERT INTO `payslip` VALUES (1, '2019-07-25', 'ก0001', 'นาย', 'ทดสอบ ทดสอบ', '123456789', '416-0-000000', 110, 'IT', 0, 0, 0, 0, 0, 0, 0, 0, 5100, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 3600, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1500, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);
INSERT INTO `payslip` VALUES (2, '2021-03-26', 'ก0001', 'นาย', 'ทดสอบ ทดสอบ', '123456789', '416-0-000000', 110, 'IT', 0, 0, 0, 0, 0, 0, 0, 0, 5100, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 3600, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1500, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);

-- ----------------------------
-- Table structure for save_time_login
-- ----------------------------
DROP TABLE IF EXISTS `save_time_login`;
CREATE TABLE `save_time_login`  (
  `id_save_time_login` int NOT NULL AUTO_INCREMENT,
  `time_login` date NOT NULL,
  PRIMARY KEY (`id_save_time_login`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 1 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Fixed;

-- ----------------------------
-- Records of save_time_login
-- ----------------------------

SET FOREIGN_KEY_CHECKS = 1;
