/*
 Navicat Premium Data Transfer

 Source Server         : homestead
 Source Server Type    : MySQL
 Source Server Version : 50719
 Source Host           : localhost:33060
 Source Schema         : dev_skripsi

 Target Server Type    : MySQL
 Target Server Version : 50719
 File Encoding         : 65001

 Date: 08/11/2017 00:15:37
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for anggota
-- ----------------------------
DROP TABLE IF EXISTS `anggota`;
CREATE TABLE `anggota`  (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `no_anggota` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `nama` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `telepon` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `kota` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `alamat` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `pekerjaan` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `status` tinyint(1) NULL DEFAULT 1,
  `avatar` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 6 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of anggota
-- ----------------------------
INSERT INTO `anggota` VALUES (1, 'AGT00001', 'Raina Unzhurna', '087728723455', 'r.unzhurna@gmail.com', 'Cirebon', 'Jl. Kusnan Gg. Karya No. 23, Kel. Kesenden, Kec. Kejaksan', 'Swasta', 0, NULL, '2017-11-06 20:35:25', '2017-11-07 15:58:41');
INSERT INTO `anggota` VALUES (2, 'AGT00002', 'Ifon Puspa Negara', '087729990670', 'kim.ivonn@gmail.com', 'CIrebon', 'Jl. Kusnan Gg. Karya No. 23, Kel. Kesenden, Kec. Kejaksan', 'IRT', 1, NULL, '2017-11-06 13:47:43', '2017-11-07 15:59:14');
INSERT INTO `anggota` VALUES (3, 'AGT00003', 'Bayu Fernando Ibrahin', '081237462910', 'bayu.fernando@gmail.com', 'Cirebon', 'Jl. Perjuangan No. 10', NULL, 1, NULL, '2017-11-07 16:08:58', '2017-11-07 16:08:58');
INSERT INTO `anggota` VALUES (4, 'AGT00004', 'sadasdasdasd', '2423432', 'dsdas@dsdas.com', 'Cirebon', 'sadsadsadsa', NULL, 1, '1510071146.jpg', '2017-11-07 16:12:26', '2017-11-07 16:12:26');
INSERT INTO `anggota` VALUES (5, 'AGT00005', 'sadsadasdasd', '23423432432', 'qwdwqdqw@sfdsfd.com', 'dfasdsad', 'adsadasdasdas', NULL, 1, NULL, '2017-11-07 16:13:21', '2017-11-07 16:13:21');

-- ----------------------------
-- Table structure for migrations
-- ----------------------------
DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of migrations
-- ----------------------------
INSERT INTO `migrations` VALUES (1, '2014_10_12_000000_create_users_table', 1);
INSERT INTO `migrations` VALUES (2, '2014_10_12_100000_create_password_resets_table', 1);
INSERT INTO `migrations` VALUES (3, '2017_11_01_064642_create_members_table', 2);

-- ----------------------------
-- Table structure for options
-- ----------------------------
DROP TABLE IF EXISTS `options`;
CREATE TABLE `options`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `opt_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `opt_value` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for password_resets
-- ----------------------------
DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE `password_resets`  (
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  INDEX `password_resets_email_index`(`email`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for setoran
-- ----------------------------
DROP TABLE IF EXISTS `setoran`;
CREATE TABLE `setoran`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_simpanan` int(11) NULL DEFAULT NULL,
  `sim_pokok` decimal(20, 0) NULL DEFAULT NULL,
  `sim_wajib` decimal(20, 0) NULL DEFAULT NULL,
  `sim_sukarela` decimal(20, 0) NULL DEFAULT NULL,
  `sim_total` decimal(20, 0) NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `setoran_ibfk_1`(`id_simpanan`) USING BTREE,
  CONSTRAINT `setoran_ibfk_1` FOREIGN KEY (`id_simpanan`) REFERENCES `simpanan` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 10 CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of setoran
-- ----------------------------
INSERT INTO `setoran` VALUES (1, 1, 1000, 100, 1000, 10000, '2017-11-06 17:32:23', '2017-11-06 17:32:28');
INSERT INTO `setoran` VALUES (2, 1, 5000, 1777, 3000, 10000, '2017-11-07 17:32:34', '2017-11-07 17:32:40');
INSERT INTO `setoran` VALUES (3, 1, 68786876, 6876876876, 78687687687687, 10000, '2017-11-07 15:28:20', '2017-11-07 15:28:20');
INSERT INTO `setoran` VALUES (4, 1, 3424324, 32432432432, 3432423432432423, 10000, '2017-11-07 15:30:08', '2017-11-07 15:30:08');
INSERT INTO `setoran` VALUES (5, 1, 678687687687, 7868767867868, 786876786878, 10000, '2017-11-07 15:31:59', '2017-11-07 15:31:59');
INSERT INTO `setoran` VALUES (6, 1, 500000, 500000, 500000, 10000, '2017-11-07 15:34:32', '2017-11-07 15:34:32');
INSERT INTO `setoran` VALUES (7, 6, 1000, 10000, 10000, 10000, '2017-11-07 15:41:03', '2017-11-07 15:41:03');
INSERT INTO `setoran` VALUES (8, 1, 1000, 10000, 100000, 10000, '2017-11-07 16:43:14', '2017-11-07 16:43:14');
INSERT INTO `setoran` VALUES (9, 7, 50000, 100000, 20000, 170000, '2017-11-07 17:10:43', '2017-11-07 17:10:43');

-- ----------------------------
-- Table structure for simpanan
-- ----------------------------
DROP TABLE IF EXISTS `simpanan`;
CREATE TABLE `simpanan`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_anggota` int(11) NOT NULL,
  `no_simpanan` varchar(10) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `ttl_simpanan` decimal(20, 0) NOT NULL DEFAULT 0,
  `status` tinyint(1) NULL DEFAULT 1,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `id_anggota`(`id_anggota`) USING BTREE,
  CONSTRAINT `simpanan_ibfk_1` FOREIGN KEY (`id_anggota`) REFERENCES `anggota` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 8 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of simpanan
-- ----------------------------
INSERT INTO `simpanan` VALUES (1, 1, 'SIM00001', 0, 1, '2017-11-07 07:59:16', '2017-11-07 07:59:16');
INSERT INTO `simpanan` VALUES (2, 1, 'SIM00001', 0, 1, '2017-11-07 07:59:42', '2017-11-07 07:59:42');
INSERT INTO `simpanan` VALUES (3, 2, 'SIM00003', 0, 1, '2017-11-07 14:23:48', '2017-11-07 14:23:48');
INSERT INTO `simpanan` VALUES (4, 2, 'SIM00004', 0, 1, '2017-11-07 15:35:41', '2017-11-07 15:35:41');
INSERT INTO `simpanan` VALUES (5, 2, 'SIM00005', 0, 1, '2017-11-07 15:39:37', '2017-11-07 15:39:37');
INSERT INTO `simpanan` VALUES (6, 1, 'SIM00006', 0, 1, '2017-11-07 15:40:44', '2017-11-07 15:40:44');
INSERT INTO `simpanan` VALUES (7, 3, 'SIM00007', 0, 1, '2017-11-07 17:10:20', '2017-11-07 17:10:20');

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `users_email_unique`(`email`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES (1, 'Administrator', 'admin@admin.com', '$2y$10$o251TIFHdZbVB.F4x2BcaObeZVt3BcOsOTFUIaUj//DtxbRVMsN1e', 'nSwaeNDRClRkqeCIfDySoKU08W12rBNDa9hBcqup6SU7knOeQdlT7agVJkaW', '2017-11-01 03:38:06', '2017-11-03 15:07:30');

SET FOREIGN_KEY_CHECKS = 1;
