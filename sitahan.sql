/*
Navicat MySQL Data Transfer

Source Server         : My PC
Source Server Version : 50616
Source Host           : localhost:3306
Source Database       : sitahan

Target Server Type    : MYSQL
Target Server Version : 50616
File Encoding         : 65001

Date: 2020-04-02 17:13:16
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for logs
-- ----------------------------
DROP TABLE IF EXISTS `logs`;
CREATE TABLE `logs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `tahanan_id` int(11) DEFAULT NULL,
  `start_date_old` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `end_date_old` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `start_date_new` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `end_date_new` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `created` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `updated` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of logs
-- ----------------------------
INSERT INTO `logs` VALUES ('1', '12', '4', '2019-12-30 00:00:00', '2019-12-30 00:00:00', '2019-12-29 00:00:00', '2019-12-30 00:00:00', '2020-01-26 05:19:06', null);
INSERT INTO `logs` VALUES ('2', '12', '4', '2019-12-29 00:00:00', '2019-12-30 00:00:00', '2020-02-01 00:00:00', '2020-02-29 00:00:00', '2020-01-26 05:19:47', null);
INSERT INTO `logs` VALUES ('3', '12', '4', '2020-01-26 00:00:00', '2020-01-26 00:00:00', '2020-04-02 00:00:00', '2020-07-31 00:00:00', '2020-01-26 07:11:32', null);
INSERT INTO `logs` VALUES ('4', '12', '4', '2020-01-26 00:00:00', '2020-01-26 00:00:00', '2020-01-01 00:00:00', '2020-12-31 00:00:00', '2020-01-26 07:12:32', null);
INSERT INTO `logs` VALUES ('5', '12', '6', '2020-02-07 00:00:00', '1970-01-01 00:00:00', '2020-02-07 00:00:00', '2020-02-28 00:00:00', '2020-04-02 05:05:21', null);

-- ----------------------------
-- Table structure for tbl_file_berkas
-- ----------------------------
DROP TABLE IF EXISTS `tbl_file_berkas`;
CREATE TABLE `tbl_file_berkas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_surat` varchar(255) DEFAULT NULL,
  `file` varchar(255) DEFAULT NULL,
  `created` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `user_created` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of tbl_file_berkas
-- ----------------------------
INSERT INTO `tbl_file_berkas` VALUES ('6', '7', '9597df05e19388b2c0a10f34a67225e0.pdf', '2019-12-31 08:46:20', '12');

-- ----------------------------
-- Table structure for tbl_ref_instansi
-- ----------------------------
DROP TABLE IF EXISTS `tbl_ref_instansi`;
CREATE TABLE `tbl_ref_instansi` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kode` varchar(255) DEFAULT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `alamat` varchar(255) DEFAULT NULL,
  `level` enum('0','1','2') DEFAULT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of tbl_ref_instansi
-- ----------------------------
INSERT INTO `tbl_ref_instansi` VALUES ('2', '000', 'Super Admin', 'Super Admin', '0', '2019-12-09 10:08:28', '2019-12-29 18:52:25');
INSERT INTO `tbl_ref_instansi` VALUES ('4', '007', 'Lembaga Pemasyarakatan Perempuan Kelas III Manokwari', 'solo', '2', '2019-12-09 10:08:28', '2020-01-01 17:46:36');
INSERT INTO `tbl_ref_instansi` VALUES ('7', '008', ' PENGADILAN NEGERI MANOKWARI KELAS II', '-', '1', '2019-12-20 23:16:26', null);

-- ----------------------------
-- Table structure for tbl_ref_penerima
-- ----------------------------
DROP TABLE IF EXISTS `tbl_ref_penerima`;
CREATE TABLE `tbl_ref_penerima` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama_penerima` varchar(255) DEFAULT NULL,
  `created` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `updated` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `instansi` varchar(255) DEFAULT NULL,
  `jabatan` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of tbl_ref_penerima
-- ----------------------------
INSERT INTO `tbl_ref_penerima` VALUES ('5', 'Drs. La Ode Mustari, M.Si.', '2019-11-07 00:36:43', null, null, null);
INSERT INTO `tbl_ref_penerima` VALUES ('6', 'H. M. Faisal Laimu, S.E., M.Si', '2019-11-07 00:36:57', null, null, null);
INSERT INTO `tbl_ref_penerima` VALUES ('7', 'Dr. Ir. H. Ila Ladamay, M.Si.', '2019-11-07 00:37:07', null, null, null);
INSERT INTO `tbl_ref_penerima` VALUES ('8', 'Agus Feisal Hidayat, S.Sos., M.Si.', '2019-11-07 00:37:19', null, null, null);
INSERT INTO `tbl_ref_penerima` VALUES ('9', 'H. La Ode Arusani', '2019-11-07 00:37:30', null, null, null);
INSERT INTO `tbl_ref_penerima` VALUES ('10', 'Syaukani Saleh', '2019-11-07 00:37:47', null, null, null);
INSERT INTO `tbl_ref_penerima` VALUES ('11', 'Syaiful Emran Ali', '2019-11-07 00:37:59', null, null, null);
INSERT INTO `tbl_ref_penerima` VALUES ('12', 'Warman Suwardi', '2019-11-07 00:38:13', null, null, null);
INSERT INTO `tbl_ref_penerima` VALUES ('13', 'Barlian Pintarudin', '2019-11-07 00:38:24', null, null, null);
INSERT INTO `tbl_ref_penerima` VALUES ('14', 'Hermen Malik', '2019-11-07 00:38:35', null, null, null);
INSERT INTO `tbl_ref_penerima` VALUES ('15', 'Gusril Pausi', '2019-11-07 00:38:48', null, null, null);
INSERT INTO `tbl_ref_penerima` VALUES ('16', null, '2019-12-08 12:57:16', null, null, null);
INSERT INTO `tbl_ref_penerima` VALUES ('17', 'asa', '2019-12-08 13:03:06', null, null, null);

-- ----------------------------
-- Table structure for tbl_ref_surat
-- ----------------------------
DROP TABLE IF EXISTS `tbl_ref_surat`;
CREATE TABLE `tbl_ref_surat` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kode` varchar(255) DEFAULT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `created` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `updated` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of tbl_ref_surat
-- ----------------------------
INSERT INTO `tbl_ref_surat` VALUES ('1', 'HK.01', 'dinas pengadilan nasional', '2019-11-18 13:00:14', '2019-11-18 09:00:14');

-- ----------------------------
-- Table structure for tbl_surat
-- ----------------------------
DROP TABLE IF EXISTS `tbl_surat`;
CREATE TABLE `tbl_surat` (
  `id_surat` int(10) NOT NULL AUTO_INCREMENT,
  `no_surat` varchar(50) DEFAULT NULL,
  `asal_surat` int(11) NOT NULL,
  `isi` mediumtext NOT NULL,
  `perihal` varchar(30) NOT NULL,
  `indeks` varchar(30) NOT NULL,
  `tgl_surat` date NOT NULL,
  `tgl_diterima` date NOT NULL,
  `file` varchar(250) NOT NULL,
  `hal` varchar(250) NOT NULL,
  `pengirim` int(11) NOT NULL,
  `alamat_pengirim` varchar(255) DEFAULT NULL,
  `tembusan` varchar(255) DEFAULT NULL,
  `kepada` varchar(255) DEFAULT NULL,
  `created` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `updated` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `upload_berkas` varchar(255) DEFAULT NULL,
  `status_kirim` varchar(255) DEFAULT NULL,
  `id_created` int(11) NOT NULL,
  `instansi` int(11) NOT NULL,
  `status_delete` int(5) NOT NULL,
  PRIMARY KEY (`id_surat`),
  KEY `id_created` (`id_created`),
  CONSTRAINT `tbl_surat_ibfk_1` FOREIGN KEY (`id_created`) REFERENCES `users` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of tbl_surat
-- ----------------------------
INSERT INTO `tbl_surat` VALUES ('2', '92309213/12921.m/3209', '4', '', 'pengadaan baru', '', '2020-01-01', '2020-01-01', '482f10e20b7e6c5cd2d432e806575652.docx', 'penambahan masa tahananaaa', '12', null, 'dkk', '1', '2020-01-01 19:47:44', '2020-01-01 19:47:44', '1', '1', '12', '2', '0');
INSERT INTO `tbl_surat` VALUES ('3', '240934/2923.kkda/219', '2', '', 'pembaharuan', '', '2020-01-01', '0000-00-00', '65f1fc5574d9480a6cccccaa82cd525f.docx', '----', '12', 'solo', 'saya', '1', '2020-01-01 18:09:48', '2020-01-01 18:09:48', '1', '1', '12', '2', '0');
INSERT INTO `tbl_surat` VALUES ('4', 'a213', '1', '', 'asas', '', '2020-01-02', '0000-00-00', 'b156d086b70a43716598e1b407d1a7a2.docx', 'sa', '18', null, 'as', '2', '2020-01-02 23:34:55', '2020-01-02 23:34:55', '1', null, '18', '1', '0');
INSERT INTO `tbl_surat` VALUES ('5', '21323', '1', '', '3123', '', '2020-01-02', '2020-01-02', '62bb4fc226e7ed50217e2248f217a258.docx', '231', '18', '-', '23213', '2', '2020-01-26 13:38:36', '2020-01-26 13:38:36', '1', '1', '18', '1', '0');
INSERT INTO `tbl_surat` VALUES ('6', '546546', '1', '', 'sas', '', '2020-01-02', '0000-00-00', 'b59b83872fe06dc0ebb3304586225e86.png', 'as', '18', '-', 'asas', '2', '2020-01-03 01:21:40', '2020-01-03 01:21:40', '1', null, '18', '1', '0');

-- ----------------------------
-- Table structure for tbl_surat_keluar
-- ----------------------------
DROP TABLE IF EXISTS `tbl_surat_keluar`;
CREATE TABLE `tbl_surat_keluar` (
  `id_surat` int(10) NOT NULL AUTO_INCREMENT,
  `no_surat` varchar(50) DEFAULT NULL,
  `asal_surat` varchar(250) NOT NULL,
  `isi` mediumtext NOT NULL,
  `kode_hal` varchar(30) NOT NULL,
  `indeks` varchar(30) NOT NULL,
  `tgl_surat` date NOT NULL,
  `tgl_diterima` date NOT NULL,
  `file` varchar(250) NOT NULL,
  `file2` varchar(255) DEFAULT NULL,
  `file3` varchar(255) DEFAULT NULL,
  `hal` varchar(250) NOT NULL,
  `pengirim` varchar(30) NOT NULL,
  `alamat_pengirim` varchar(255) DEFAULT NULL,
  `tembusan` varchar(255) DEFAULT NULL,
  `kepada` varchar(255) DEFAULT NULL,
  `created` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `updated` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `upload_berkas` varchar(255) DEFAULT NULL,
  `status_kirim` varchar(255) DEFAULT NULL,
  `id_created` int(11) NOT NULL,
  `instansi` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_surat`),
  KEY `id_created` (`id_created`),
  CONSTRAINT `tbl_surat_keluar_ibfk_1` FOREIGN KEY (`id_created`) REFERENCES `users` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of tbl_surat_keluar
-- ----------------------------
INSERT INTO `tbl_surat_keluar` VALUES ('1', '/1/HK.01/12/19', 'adminlppm', '', '1', '', '2019-12-11', '0000-00-00', 'b410a62e36c6cc141dcb103f18247979.jpg', '', '', 'a', 'adminlppm', '-', 'a', 'H. La Ode Arusani', '2019-12-13 09:13:08', '2019-12-13 07:13:08', '1', '1', '12', null);
INSERT INTO `tbl_surat_keluar` VALUES ('2', '398123.3091203/213921', 'Operator Pengadilan', '', '-', '', '2019-12-21', '0000-00-00', 'a75579f1df3f71e40adcdacead512ed1.jpg', '', '', '--', 'Operator Pengadilan', null, '--', '3', '2019-12-21 02:19:45', null, null, null, '18', null);
INSERT INTO `tbl_surat_keluar` VALUES ('3', '398123.3091203/213921', 'Operator Pengadilan', '', '-', '', '2019-12-21', '0000-00-00', 'd718d423b2878ea8c1fd718be5932b77.docx', '', '', '--', 'Operator Pengadilan', null, '--', '3', '2020-01-01 18:09:24', '2020-01-01 18:09:24', '1', '1', '18', null);
INSERT INTO `tbl_surat_keluar` VALUES ('4', '398123.3091203/213921', 'Operator Pengadilan', '', '-', '', '2019-12-21', '0000-00-00', '8bc525283286f556cc40029acb1d9667.jpg', '', '', '--', 'Operator Pengadilan', null, '--', '3', '2019-12-21 02:20:38', null, null, null, '18', null);
INSERT INTO `tbl_surat_keluar` VALUES ('5', '2103231/3921.213219/', '18', '', '--', '', '2019-12-21', '0000-00-00', 'c97b75688b818f021b3494d503a6889a.jpg', '', '', '--', 'Operator Pengadilan', null, '-', '5', '2019-12-21 02:23:08', null, null, null, '18', null);
INSERT INTO `tbl_surat_keluar` VALUES ('6', 'aaa', '18', '', 'a', '', '2019-12-30', '0000-00-00', '', '', '', 'a', 'admin pengadilan', null, 'a', '2', '2019-12-30 09:11:25', null, null, null, '18', null);
INSERT INTO `tbl_surat_keluar` VALUES ('7', 'a', '12', '', '1', '', '2019-12-30', '0000-00-00', '', '', '', '1', 'adminlppm', '-', '1', null, '2019-12-31 15:07:05', '2019-12-31 15:07:05', '1', '1', '12', '2');
INSERT INTO `tbl_surat_keluar` VALUES ('8', '653', '18', '', '54', '', '2019-12-30', '0000-00-00', '', '', '', '123', 'admin pengadilan', null, '213', '4', '2019-12-30 10:26:28', null, null, null, '18', '1');

-- ----------------------------
-- Table structure for tbl_surat_masuk
-- ----------------------------
DROP TABLE IF EXISTS `tbl_surat_masuk`;
CREATE TABLE `tbl_surat_masuk` (
  `id_surat` int(10) NOT NULL AUTO_INCREMENT,
  `no_surat` varchar(50) DEFAULT NULL,
  `asal_surat` varchar(250) NOT NULL,
  `isi` mediumtext NOT NULL,
  `kode_hal` varchar(30) NOT NULL,
  `indeks` varchar(30) NOT NULL,
  `tgl_surat` date NOT NULL,
  `tgl_diterima` date NOT NULL,
  `file` varchar(250) NOT NULL,
  `file2` varchar(255) DEFAULT NULL,
  `file3` varchar(255) DEFAULT NULL,
  `hal` varchar(250) NOT NULL,
  `pengirim` varchar(30) NOT NULL,
  `alamat_pengirim` varchar(255) DEFAULT NULL,
  `tembusan` varchar(255) DEFAULT NULL,
  `kepada` varchar(255) DEFAULT NULL,
  `created` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `updated` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `berkas_disposisi` varchar(255) DEFAULT NULL,
  `status_disposisi` enum('0','1') DEFAULT NULL,
  `id_created` int(11) NOT NULL,
  PRIMARY KEY (`id_surat`),
  KEY `id_created` (`id_created`),
  CONSTRAINT `tbl_surat_masuk_ibfk_1` FOREIGN KEY (`id_created`) REFERENCES `users` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of tbl_surat_masuk
-- ----------------------------
INSERT INTO `tbl_surat_masuk` VALUES ('1', 'a', 'a', '', 'a', '', '2019-12-11', '0000-00-00', '6e857311c5813e051eb0140673d51687.jpg', null, null, 'aaaa', 'a', 'a', null, null, '2019-12-11 00:03:20', null, null, null, '12');
INSERT INTO `tbl_surat_masuk` VALUES ('2', 'a', 'a', '', 'a', '', '2019-12-11', '0000-00-00', '468d569ceac7511c6a156c93ac0a3dd1.jpg', null, null, 'aaaa', 'a', 'a', null, null, '2019-12-11 00:04:24', null, null, null, '12');

-- ----------------------------
-- Table structure for tbl_tahanan
-- ----------------------------
DROP TABLE IF EXISTS `tbl_tahanan`;
CREATE TABLE `tbl_tahanan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) DEFAULT NULL,
  `tempat_lahir` varchar(255) DEFAULT NULL,
  `tgl_lahir` varchar(255) DEFAULT NULL,
  `jenis_kelamin` varchar(255) DEFAULT NULL,
  `kebangsaan` varchar(255) DEFAULT NULL,
  `tempat_tinggal` varchar(255) DEFAULT NULL,
  `agama` varchar(255) DEFAULT NULL,
  `pekerjaan` varchar(255) DEFAULT NULL,
  `id_instansi` int(11) DEFAULT NULL,
  `pejabat` varchar(255) DEFAULT NULL,
  `perkara` varchar(255) DEFAULT NULL,
  `start_date` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `end_date` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `status_change` int(5) DEFAULT NULL,
  `tgl_surat` datetime DEFAULT NULL,
  `no_surat` varchar(255) DEFAULT NULL,
  `created` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `updated` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of tbl_tahanan
-- ----------------------------
INSERT INTO `tbl_tahanan` VALUES ('4', 'agussss', 'solo', '2019-12-21', 'perempuan', 'indonesia', 'solosololosolosololosolosololosolosololosolosololosolosololosolosololosolosololo', 'islam', 'wiraswasta', '4', 'hanum, S, Sos', 'pasal 31 ', '2020-04-02 16:16:15', '2020-04-02 16:16:15', '1', null, null, '2020-04-02 16:16:15', '2020-04-02 16:16:15');
INSERT INTO `tbl_tahanan` VALUES ('5', 'daisy', 'Sorong', '2019-12-30', 'perempuan', 'Indonesia', 'sorong', 'islam', 'Tidak Ada', '4', 'Pengadilan Manokwari', 'Tipikor', '2019-12-29 00:00:00', '2020-05-25 00:00:00', null, null, null, '2019-12-29 12:35:26', null);
INSERT INTO `tbl_tahanan` VALUES ('6', '11', '12', '2020-01-27', 'perempuan', '12', '12', '12', '12', '4', '12', '12', '2020-02-07 00:00:00', '2020-02-28 00:00:00', '1', '2019-02-01 00:00:00', '122222222222222', '2020-04-02 10:05:21', '2020-04-02 10:05:21');

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` varchar(64) NOT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `role` enum('1','2','3') NOT NULL COMMENT '1. Super Admin; 2. Admin, 3. Operator',
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `status` enum('1','0') DEFAULT '1' COMMENT '1. on; 0. off',
  `jabatan` varchar(255) DEFAULT NULL,
  `nip` varchar(18) DEFAULT NULL,
  `alamat` varchar(255) DEFAULT NULL,
  `instansi` int(11) NOT NULL,
  PRIMARY KEY (`id_user`) USING BTREE,
  KEY `instansi` (`instansi`),
  CONSTRAINT `users_ibfk_1` FOREIGN KEY (`instansi`) REFERENCES `tbl_ref_instansi` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES ('11', 'superadmin', '17c4520f6cfd1ab53d8745e84681eb49', 'superadmin', '1', '2019-12-09 10:09:28', null, '1', '-', '-', 'Manokwari', '2');
INSERT INTO `users` VALUES ('12', 'adminlppm', '2e3e6e77a33c22f493039d68998be0ee', 'adminlppm', '2', '2019-12-30 07:40:39', '2019-12-30 13:40:39', '1', 'adminlppm', '-', '-', '4');
INSERT INTO `users` VALUES ('13', 'operatorlppm', '25d13026e2443728f69cb1fd12008829', 'operatorlppm', '3', '2019-12-09 10:16:49', null, '1', '-', '-', '-', '4');
INSERT INTO `users` VALUES ('18', 'adminpengadilan', '142a52092538a3842cb732dfe510e8ba', 'admin pengadilan', '2', '2019-12-20 23:17:37', '2019-12-29 19:08:19', '1', 'IT', '20391839123', null, '7');
INSERT INTO `users` VALUES ('19', 'operatorpengadilan', 'd34c2380ce945b168a634a9c9b82e467', 'Operator Pengadilan', '3', '2019-12-29 10:10:15', '2019-12-30 11:48:20', '1', 'Operator Situs', '199701222019021001', null, '7');
