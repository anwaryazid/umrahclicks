/*
 Navicat Premium Data Transfer

 Source Server         : Local MySQL
 Source Server Type    : MySQL
 Source Server Version : 100408
 Source Host           : localhost:3306
 Source Schema         : umrahclicks

 Target Server Type    : MySQL
 Target Server Version : 100408
 File Encoding         : 65001

 Date: 01/05/2020 02:30:20
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for advertisement
-- ----------------------------
DROP TABLE IF EXISTS `advertisement`;
CREATE TABLE `advertisement`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ad_companyRegNo` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `ad_companyName` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `ad_companyTelNo` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `ad_companyEmail` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `ad_contactPerson` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `ad_contactPersonNo` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `ad_website` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `ad_operator` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `ad_companyStatus` int(11) NULL DEFAULT NULL,
  `ad_status` int(11) NULL DEFAULT NULL,
  `ad_remark` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `ad_image` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `ad_dateFrom` date NULL DEFAULT NULL,
  `ad_dateTo` date NULL DEFAULT NULL,
  `ad_price` decimal(10, 2) NULL DEFAULT NULL,
  `createdBy` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `createdDate` datetime(0) NULL DEFAULT NULL,
  `updatedBy` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `updatedDate` datetime(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 8 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for agency
-- ----------------------------
DROP TABLE IF EXISTS `agency`;
CREATE TABLE `agency`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `agency_regNo` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `agency_name` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `agency_address1` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `agency_address2` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `agency_postcode` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `agency_city` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `agency_state` int(11) NULL DEFAULT NULL,
  `agency_country` int(11) NULL DEFAULT NULL,
  `agency_contactNo` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `agency_email` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `agency_status` int(11) NULL DEFAULT NULL,
  `agency_LKUNo` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `agency_LKUExpiryDate` date NULL DEFAULT NULL,
  `agency_rating` int(11) NULL DEFAULT NULL,
  `agency_contactPerson` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `agency_contactPersonNo` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `agency_image` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `agency_info` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `createdBy` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `createdDate` datetime(0) NULL DEFAULT NULL,
  `updatedBy` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `updatedDate` datetime(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 7 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for follow_up
-- ----------------------------
DROP TABLE IF EXISTS `follow_up`;
CREATE TABLE `follow_up`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `guest_name` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `guest_email` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `guest_phoneNo` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `agency_id` int(11) NULL DEFAULT NULL,
  `package_id` int(11) NULL DEFAULT NULL,
  `pax` int(11) NULL DEFAULT NULL,
  `confirm_date` datetime(0) NULL DEFAULT NULL,
  `cust_callDate` date NULL DEFAULT NULL,
  `cust_remarks` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `agency_callDate` date NULL DEFAULT NULL,
  `agency_remarks` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `fp_status` int(11) NULL DEFAULT NULL,
  `operator` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `complete_date` datetime(0) NULL DEFAULT NULL,
  `createdBy` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `createdDate` datetime(0) NULL DEFAULT NULL,
  `updatedBy` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `updatedDate` datetime(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 6 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for menu
-- ----------------------------
DROP TABLE IF EXISTS `menu`;
CREATE TABLE `menu`  (
  `mid` int(11) NOT NULL AUTO_INCREMENT,
  `menuName` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `menuIcon` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `menuPath` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `menuOrder` int(11) NULL DEFAULT NULL,
  PRIMARY KEY (`mid`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 10 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of menu
-- ----------------------------
INSERT INTO `menu` VALUES (1, 'Dashboard', 'fa-tachometer-alt', 'dashboard', 1);
INSERT INTO `menu` VALUES (2, 'Agency', 'fa-building', 'agency', 2);
INSERT INTO `menu` VALUES (3, 'Packages', 'fa-archive', 'packages', 3);
INSERT INTO `menu` VALUES (4, 'Promotion', 'fa-thumbs-up', 'promo', 4);
INSERT INTO `menu` VALUES (5, 'Advertisement', 'fa-bullhorn', 'advertisement', 5);
INSERT INTO `menu` VALUES (6, 'Follow Up', 'fa-exclamation', 'follow-up', 6);
INSERT INTO `menu` VALUES (7, 'User Management', 'fa-users', 'user-management', 20);
INSERT INTO `menu` VALUES (8, 'Data Reference', 'fa-book', 'ref-country', 30);

-- ----------------------------
-- Table structure for menu2nd
-- ----------------------------
DROP TABLE IF EXISTS `menu2nd`;
CREATE TABLE `menu2nd`  (
  `m2id` int(11) NOT NULL AUTO_INCREMENT,
  `menu2ndName` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `menu2ndPath` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `mid` int(11) NULL DEFAULT NULL,
  PRIMARY KEY (`m2id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of menu2nd
-- ----------------------------
INSERT INTO `menu2nd` VALUES (1, 'Country', 'ref-country', 8);
INSERT INTO `menu2nd` VALUES (2, 'State', 'ref-state', 8);

-- ----------------------------
-- Table structure for package
-- ----------------------------
DROP TABLE IF EXISTS `package`;
CREATE TABLE `package`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `package_name` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `agency_id` int(5) NULL DEFAULT NULL,
  `package_status` int(5) NULL DEFAULT NULL,
  `package_remark` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `package_dateFrom` date NULL DEFAULT NULL,
  `package_dateTo` date NULL DEFAULT NULL,
  `package_pax` int(5) NULL DEFAULT NULL,
  `package_actualCost` decimal(10, 2) NULL DEFAULT NULL,
  `package_umrahCost` decimal(10, 2) NULL DEFAULT NULL,
  `package_thumbnail` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `package_flight_id` int(5) NULL DEFAULT NULL,
  `package_meal_id` int(5) NULL DEFAULT NULL,
  `package_mutawwif` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `package_1stDestination` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `package_ziarah` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `makkah_hotel` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `makkah_distance` double NULL DEFAULT NULL,
  `makkah_days` int(5) NULL DEFAULT NULL,
  `makkah_night` int(5) NULL DEFAULT NULL,
  `madinah_hotel` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `madinah_distance` double NULL DEFAULT NULL,
  `madinah_days` int(5) NULL DEFAULT NULL,
  `madinah_night` int(5) NULL DEFAULT NULL,
  `madinah_hotelImg` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `makkah_hotelImg` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `createdBy` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `createdDate` datetime(0) NULL DEFAULT NULL,
  `updatedBy` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `updatedDate` datetime(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 11 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for package_image
-- ----------------------------
DROP TABLE IF EXISTS `package_image`;
CREATE TABLE `package_image`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `package_id` int(11) NULL DEFAULT NULL,
  `img_for` int(5) NULL DEFAULT NULL,
  `img_title` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `hotel_img` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `createdBy` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `createdDate` datetime(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 10 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for package_room
-- ----------------------------
DROP TABLE IF EXISTS `package_room`;
CREATE TABLE `package_room`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `package_id` int(11) NOT NULL,
  `hotel` int(5) NULL DEFAULT NULL,
  `room_type` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `room_actualCost` decimal(10, 2) NULL DEFAULT NULL,
  `room_umrahCost` decimal(10, 2) NULL DEFAULT NULL,
  `room_img` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `createdBy` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `createdDate` datetime(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`, `package_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 26 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of package_room
-- ----------------------------
INSERT INTO `package_room` VALUES (14, 5, NULL, 'Double Bed', 6000.00, 6200.00, NULL, 'system', '2020-04-27 10:49:21');
INSERT INTO `package_room` VALUES (15, 5, NULL, 'Triple Bed', 6000.00, 6200.00, NULL, 'system', '2020-04-27 10:49:26');
INSERT INTO `package_room` VALUES (17, 6, NULL, 'Triple Bed', 6000.00, 6200.00, NULL, 'system', '2020-04-27 10:58:29');
INSERT INTO `package_room` VALUES (20, 1, NULL, 'Double Bed', 6000.00, 6200.00, NULL, 'system', '2020-04-28 23:11:17');
INSERT INTO `package_room` VALUES (21, 1, NULL, 'Triple Bed', 6000.00, 6200.00, NULL, 'system', '2020-04-28 23:13:02');
INSERT INTO `package_room` VALUES (22, 1, NULL, 'Quadruple Bed', 8000.00, 8200.00, NULL, 'system', '2020-04-28 23:13:14');
INSERT INTO `package_room` VALUES (23, 10, NULL, 'Double Bed', 6000.00, 6200.00, NULL, 'system', '2020-04-29 00:29:10');
INSERT INTO `package_room` VALUES (24, 10, NULL, 'Triple Bed', 7000.00, 7200.00, NULL, 'system', '2020-04-29 00:29:19');
INSERT INTO `package_room` VALUES (25, 9, NULL, 'Double Bed', 6000.00, 6200.00, NULL, 'admin', '2020-04-29 14:01:18');

-- ----------------------------
-- Table structure for promo
-- ----------------------------
DROP TABLE IF EXISTS `promo`;
CREATE TABLE `promo`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `promo_code` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `promo_desc` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `promo_dateFrom` date NULL DEFAULT NULL,
  `promo_dateTo` date NULL DEFAULT NULL,
  `promo_from` int(11) NULL DEFAULT NULL,
  `promo_agency` int(11) NULL DEFAULT NULL,
  `promo_status` int(11) NULL DEFAULT NULL,
  `promo_variable` int(11) NULL DEFAULT NULL,
  `promo_variableAmount` decimal(10, 2) NULL DEFAULT NULL,
  `promo_pax` int(11) NULL DEFAULT NULL,
  `promo_operator` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `createdBy` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `createdDate` datetime(0) NULL DEFAULT NULL,
  `updatedBy` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `updatedDate` datetime(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 5 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for ref_country
-- ----------------------------
DROP TABLE IF EXISTS `ref_country`;
CREATE TABLE `ref_country`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kod` varchar(4) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `keterangan` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `currency_code` varchar(5) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `currency_name` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `countryImage` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `currency_symbol` varchar(5) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 55 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of ref_country
-- ----------------------------
INSERT INTO `ref_country` VALUES (1, 'MY', 'MALAYSIA', 'MYR', 'MALAYSIAN RINGGIT', '632945270.png', 'RM');
INSERT INTO `ref_country` VALUES (2, 'SG', 'SINGAPORE', 'SGD', 'SINGAPORE DOLLAR', '1536522605.png', 'SGD');
INSERT INTO `ref_country` VALUES (3, 'ID', 'INDONESIA', 'IDR', 'INDONESIA RUPEE', '1221126275.png', 'Rp');
INSERT INTO `ref_country` VALUES (4, 'BN', 'BRUNEI', 'BND', 'BRUNEI DOLLAR', '445934824.png', 'BND');
INSERT INTO `ref_country` VALUES (54, 'TH', 'THAILAND', 'THB', 'THAI BAHT', '23686824.png', '฿');

-- ----------------------------
-- Table structure for ref_image_for
-- ----------------------------
DROP TABLE IF EXISTS `ref_image_for`;
CREATE TABLE `ref_image_for`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `desc` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of ref_image_for
-- ----------------------------
INSERT INTO `ref_image_for` VALUES (1, 'Makkah');
INSERT INTO `ref_image_for` VALUES (2, 'Madinah');

-- ----------------------------
-- Table structure for ref_package_flight
-- ----------------------------
DROP TABLE IF EXISTS `ref_package_flight`;
CREATE TABLE `ref_package_flight`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `desc` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of ref_package_flight
-- ----------------------------
INSERT INTO `ref_package_flight` VALUES (1, 'Direct');
INSERT INTO `ref_package_flight` VALUES (2, 'Transit');

-- ----------------------------
-- Table structure for ref_package_meal
-- ----------------------------
DROP TABLE IF EXISTS `ref_package_meal`;
CREATE TABLE `ref_package_meal`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `desc` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of ref_package_meal
-- ----------------------------
INSERT INTO `ref_package_meal` VALUES (1, 'Provided');
INSERT INTO `ref_package_meal` VALUES (2, 'Not Provided');

-- ----------------------------
-- Table structure for ref_promo_from
-- ----------------------------
DROP TABLE IF EXISTS `ref_promo_from`;
CREATE TABLE `ref_promo_from`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `desc` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of ref_promo_from
-- ----------------------------
INSERT INTO `ref_promo_from` VALUES (1, 'Company');
INSERT INTO `ref_promo_from` VALUES (2, 'Agency');

-- ----------------------------
-- Table structure for ref_promo_variable
-- ----------------------------
DROP TABLE IF EXISTS `ref_promo_variable`;
CREATE TABLE `ref_promo_variable`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `desc` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of ref_promo_variable
-- ----------------------------
INSERT INTO `ref_promo_variable` VALUES (1, 'Percentage');
INSERT INTO `ref_promo_variable` VALUES (2, 'Amount');

-- ----------------------------
-- Table structure for ref_state
-- ----------------------------
DROP TABLE IF EXISTS `ref_state`;
CREATE TABLE `ref_state`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kod` varchar(2) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '',
  `keterangan` varchar(40) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `abb_negeri` varchar(5) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `country_id` int(11) NULL DEFAULT 1,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `kneg_idx01`(`kod`, `keterangan`, `abb_negeri`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 23 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of ref_state
-- ----------------------------
INSERT INTO `ref_state` VALUES (1, '01', 'JOHOR', 'JHR', 1);
INSERT INTO `ref_state` VALUES (2, '02', 'KEDAH', 'KDH', 1);
INSERT INTO `ref_state` VALUES (3, '03', 'KELANTAN', 'KEL', 1);
INSERT INTO `ref_state` VALUES (4, '04', 'MELAKA', 'MLK', 1);
INSERT INTO `ref_state` VALUES (5, '05', 'NEGERI SEMBILAN', 'NS', 1);
INSERT INTO `ref_state` VALUES (6, '06', 'PAHANG', 'PHG', 1);
INSERT INTO `ref_state` VALUES (7, '07', 'PULAU PINANG', 'PP', 1);
INSERT INTO `ref_state` VALUES (8, '08', 'PERAK', 'PRK', 1);
INSERT INTO `ref_state` VALUES (9, '09', 'PERLIS', 'PLS', 1);
INSERT INTO `ref_state` VALUES (10, '10', 'SELANGOR', 'SEL', 1);
INSERT INTO `ref_state` VALUES (11, '11', 'TERENGGANU', 'TRG', 1);
INSERT INTO `ref_state` VALUES (12, '12', 'SABAH', 'SAB', 1);
INSERT INTO `ref_state` VALUES (13, '13', 'SARAWAK', 'SAR', 1);
INSERT INTO `ref_state` VALUES (14, '14', 'KUALA LUMPUR', 'WPKL', 1);
INSERT INTO `ref_state` VALUES (15, '15', 'LABUAN (SABAH)', 'WPL', 1);
INSERT INTO `ref_state` VALUES (16, '16', 'PUTRAJAYA', 'WPP', 1);
INSERT INTO `ref_state` VALUES (17, '98', 'LUAR NEGERI', 'LN', 1);
INSERT INTO `ref_state` VALUES (18, '99', 'LAIN-LAIN', 'LL', 1);

-- ----------------------------
-- Table structure for ref_user_type
-- ----------------------------
DROP TABLE IF EXISTS `ref_user_type`;
CREATE TABLE `ref_user_type`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `userType` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of ref_user_type
-- ----------------------------
INSERT INTO `ref_user_type` VALUES (1, 'Administrator');
INSERT INTO `ref_user_type` VALUES (2, 'Superuser');
INSERT INTO `ref_user_type` VALUES (3, 'User');

-- ----------------------------
-- Table structure for user
-- ----------------------------
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `userFullName` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `userName` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `userEmail` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `userPassword` varchar(80) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `userStatus` int(11) NULL DEFAULT NULL,
  `userType` int(11) NULL DEFAULT NULL,
  `userAccess` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `createdBy` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `createdDate` datetime(0) NULL DEFAULT NULL,
  `updatedBy` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `updatedDate` datetime(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`, `userName`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of user
-- ----------------------------
INSERT INTO `user` VALUES (1, 'Administrator', 'admin', '', '$2y$10$NZlrMp.Aj7C9OCtuTNB5oeuIExXB.tCm001XqAHpN/I/Z549bMsMW', 1, 1, '', 'system', '2020-04-21 17:52:15', 'admin', '2020-04-29 05:11:54');

SET FOREIGN_KEY_CHECKS = 1;
