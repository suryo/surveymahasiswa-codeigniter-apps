/*
 Navicat Premium Data Transfer

 Source Server         : localhost
 Source Server Type    : MySQL
 Source Server Version : 100408
 Source Host           : localhost:3306
 Source Schema         : simlive

 Target Server Type    : MySQL
 Target Server Version : 100408
 File Encoding         : 65001

 Date: 23/12/2020 00:18:02
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for 20192_bpm_survey_value
-- ----------------------------
DROP TABLE IF EXISTS `20192_bpm_survey_value`;
CREATE TABLE `20192_bpm_survey_value`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tgl_isi` date NULL DEFAULT NULL,
  `id_fakultas` int(255) NULL DEFAULT NULL,
  `id_prodi` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `npm` int(255) NULL DEFAULT NULL,
  `id_angket_mahasiswa` int(255) NULL DEFAULT NULL,
  `id_angket` int(255) NULL DEFAULT NULL,
  `id_soal` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `skor` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `bpm_survey_value_indx`(`id`, `npm`, `id_angket_mahasiswa`, `id_angket`, `id_soal`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 317782 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

SET FOREIGN_KEY_CHECKS = 1;
