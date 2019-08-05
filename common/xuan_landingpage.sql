/*
Navicat MySQL Data Transfer

Source Server         : Database
Source Server Version : 50505
Source Host           : localhost:3306
Source Database       : xuan_landingpage

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2019-08-05 10:57:53
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for auth_assignment
-- ----------------------------
DROP TABLE IF EXISTS `auth_assignment`;
CREATE TABLE `auth_assignment` (
  `item_name` varchar(64) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `user_id` varchar(64) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`item_name`,`user_id`),
  KEY `auth_assignment_user_id_idx` (`user_id`) USING BTREE,
  CONSTRAINT `auth_assignment_ibfk_1` FOREIGN KEY (`item_name`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of auth_assignment
-- ----------------------------
INSERT INTO `auth_assignment` VALUES ('admin', '1', '1534871718', null);
INSERT INTO `auth_assignment` VALUES ('manager', '2', '1534871718', '1562404097');

-- ----------------------------
-- Table structure for auth_item
-- ----------------------------
DROP TABLE IF EXISTS `auth_item`;
CREATE TABLE `auth_item` (
  `name` varchar(64) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `type` smallint(6) NOT NULL,
  `description` text CHARACTER SET utf8 COLLATE utf8_unicode_ci,
  `rule_name` varchar(64) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `data` blob,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`name`),
  KEY `rule_name` (`rule_name`) USING BTREE,
  KEY `idx-auth_item-type` (`type`) USING BTREE,
  CONSTRAINT `auth_item_ibfk_1` FOREIGN KEY (`rule_name`) REFERENCES `auth_rule` (`name`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of auth_item
-- ----------------------------
INSERT INTO `auth_item` VALUES ('admin', '1', 'Quản trị cấp cao', null, null, '1534871407', '1534871407');
INSERT INTO `auth_item` VALUES ('author', '1', 'Người viết', null, null, '1534871406', '1534871406');
INSERT INTO `auth_item` VALUES ('manager', '1', null, null, null, '1560140700', '1560140700');
INSERT INTO `auth_item` VALUES ('product/create', '2', 'Thêm mới xe', null, null, '1564667633', '1564667633');
INSERT INTO `auth_item` VALUES ('product/delete', '2', 'Xóa xe', null, null, '1564667633', '1564667633');
INSERT INTO `auth_item` VALUES ('product/getprice', '2', 'Lấy giá sản phẩm', null, null, '1564673944', '1564673944');
INSERT INTO `auth_item` VALUES ('product/index', '2', 'Danh sách xe', null, null, '1564667633', '1564667633');
INSERT INTO `auth_item` VALUES ('product/quickchange', '2', 'Sửa nhanh xe', null, null, '1564667633', '1564667633');
INSERT INTO `auth_item` VALUES ('product/statuschange', '2', 'Kích hoạt nhanh xe', null, null, '1564667633', '1564667633');
INSERT INTO `auth_item` VALUES ('product/update', '2', 'Chỉnh sửa xe', null, null, '1564667633', '1564667633');
INSERT INTO `auth_item` VALUES ('product/validation', '2', 'Validate sản phẩm', null, null, '1564667633', '1564667633');
INSERT INTO `auth_item` VALUES ('product/view', '2', 'Chi tiết xe', null, null, '1564667633', '1564667633');
INSERT INTO `auth_item` VALUES ('register/create', '2', 'Thêm mới Ảnh sản phẩm', null, null, '1564667903', '1564667903');
INSERT INTO `auth_item` VALUES ('register/delete', '2', 'Xóa Ảnh sản phẩm', null, null, '1564667904', '1564667904');
INSERT INTO `auth_item` VALUES ('register/index', '2', 'Danh sách Ảnh sản phẩm', null, null, '1564667903', '1564667903');
INSERT INTO `auth_item` VALUES ('register/quickchange', '2', 'Sửa nhanh xe', null, null, '1564667904', '1564667904');
INSERT INTO `auth_item` VALUES ('register/statuschange', '2', 'Kích hoạt nhanh xe', null, null, '1564667904', '1564667904');
INSERT INTO `auth_item` VALUES ('register/update', '2', 'Chỉnh sửa Ảnh sản phẩm', null, null, '1564667903', '1564667903');
INSERT INTO `auth_item` VALUES ('register/view', '2', 'Chi tiết Ảnh sản phẩm', null, null, '1564667903', '1564667903');
INSERT INTO `auth_item` VALUES ('setting/setting-modules/create', '2', 'Thêm mới Modules sản phẩm', null, null, '1564667575', '1564667575');
INSERT INTO `auth_item` VALUES ('setting/setting-modules/delete', '2', 'Xóa Modules sản phẩm', null, null, '1564667575', '1564667575');
INSERT INTO `auth_item` VALUES ('setting/setting-modules/index', '2', 'Danh sách Modules sản phẩm', null, null, '1564667575', '1564667575');
INSERT INTO `auth_item` VALUES ('setting/setting-modules/quickchange', '2', 'Sửa nhanh Modules sản phẩm', null, null, '1564667575', '1564667575');
INSERT INTO `auth_item` VALUES ('setting/setting-modules/statuschange', '2', 'Kích hoạt Modules sản phẩm nhanh', null, null, '1564667575', '1564667575');
INSERT INTO `auth_item` VALUES ('setting/setting-modules/update', '2', 'Chỉnh sửa Modules sản phẩm', null, null, '1564667575', '1564667575');
INSERT INTO `auth_item` VALUES ('setting/setting-modules/view', '2', 'Chi tiết Modules sản phẩm', null, null, '1564667575', '1564667575');
INSERT INTO `auth_item` VALUES ('setting/setting-website/create', '2', 'Thêm mới xe', null, null, '1564668004', '1564668004');
INSERT INTO `auth_item` VALUES ('setting/setting-website/delete', '2', 'Xóa xe', null, null, '1564668004', '1564668004');
INSERT INTO `auth_item` VALUES ('setting/setting-website/index', '2', 'Danh sách xe', null, null, '1564668004', '1564668004');
INSERT INTO `auth_item` VALUES ('setting/setting-website/update', '2', 'Chỉnh sửa xe', null, null, '1564668004', '1564668004');
INSERT INTO `auth_item` VALUES ('setting/setting-website/view', '2', 'Chi tiết xe', null, null, '1564668004', '1564668004');
INSERT INTO `auth_item` VALUES ('updateOwnPost', '2', 'Update own post', 'isAuthor', null, '1534912775', '1534912775');
INSERT INTO `auth_item` VALUES ('user/changepassword', '2', 'Changepassword Account', null, null, '1560152430', '1560152430');
INSERT INTO `auth_item` VALUES ('user/delete', '2', 'Xóa Account', null, null, '1560152430', '1560152430');
INSERT INTO `auth_item` VALUES ('user/index', '2', 'Danh sách Account', null, null, '1560152430', '1560152430');
INSERT INTO `auth_item` VALUES ('user/resetpassword', '2', 'Reset Password Account', null, null, '1560152430', '1560152430');
INSERT INTO `auth_item` VALUES ('user/signup', '2', 'Thêm mới Account', null, null, '1560152430', '1560152430');
INSERT INTO `auth_item` VALUES ('user/update', '2', 'Chỉnh sửa Account', null, null, '1560152430', '1560152430');
INSERT INTO `auth_item` VALUES ('user/view', '2', 'Chi tiết Account', null, null, '1560152430', '1560152430');

-- ----------------------------
-- Table structure for auth_item_child
-- ----------------------------
DROP TABLE IF EXISTS `auth_item_child`;
CREATE TABLE `auth_item_child` (
  `parent` varchar(64) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `child` varchar(64) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`parent`,`child`),
  KEY `child` (`child`) USING BTREE,
  CONSTRAINT `auth_item_child_ibfk_1` FOREIGN KEY (`parent`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `auth_item_child_ibfk_2` FOREIGN KEY (`child`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of auth_item_child
-- ----------------------------
INSERT INTO `auth_item_child` VALUES ('admin', 'manager');
INSERT INTO `auth_item_child` VALUES ('admin', 'user/delete');
INSERT INTO `auth_item_child` VALUES ('admin', 'user/signup');
INSERT INTO `auth_item_child` VALUES ('admin', 'user/update');
INSERT INTO `auth_item_child` VALUES ('author', 'product/create');
INSERT INTO `auth_item_child` VALUES ('author', 'product/getprice');
INSERT INTO `auth_item_child` VALUES ('author', 'product/index');
INSERT INTO `auth_item_child` VALUES ('author', 'product/quickchange');
INSERT INTO `auth_item_child` VALUES ('author', 'product/statuschange');
INSERT INTO `auth_item_child` VALUES ('author', 'product/update');
INSERT INTO `auth_item_child` VALUES ('author', 'product/validation');
INSERT INTO `auth_item_child` VALUES ('author', 'product/view');
INSERT INTO `auth_item_child` VALUES ('author', 'register/create');
INSERT INTO `auth_item_child` VALUES ('author', 'register/index');
INSERT INTO `auth_item_child` VALUES ('author', 'register/quickchange');
INSERT INTO `auth_item_child` VALUES ('author', 'register/statuschange');
INSERT INTO `auth_item_child` VALUES ('author', 'register/update');
INSERT INTO `auth_item_child` VALUES ('author', 'register/view');
INSERT INTO `auth_item_child` VALUES ('author', 'setting/setting-website/create');
INSERT INTO `auth_item_child` VALUES ('author', 'setting/setting-website/index');
INSERT INTO `auth_item_child` VALUES ('author', 'setting/setting-website/update');
INSERT INTO `auth_item_child` VALUES ('author', 'setting/setting-website/view');
INSERT INTO `auth_item_child` VALUES ('author', 'updateOwnPost');
INSERT INTO `auth_item_child` VALUES ('author', 'user/changepassword');
INSERT INTO `auth_item_child` VALUES ('manager', 'author');
INSERT INTO `auth_item_child` VALUES ('manager', 'product/delete');
INSERT INTO `auth_item_child` VALUES ('manager', 'register/delete');
INSERT INTO `auth_item_child` VALUES ('manager', 'setting/setting-modules/create');
INSERT INTO `auth_item_child` VALUES ('manager', 'setting/setting-modules/delete');
INSERT INTO `auth_item_child` VALUES ('manager', 'setting/setting-modules/index');
INSERT INTO `auth_item_child` VALUES ('manager', 'setting/setting-modules/quickchange');
INSERT INTO `auth_item_child` VALUES ('manager', 'setting/setting-modules/statuschange');
INSERT INTO `auth_item_child` VALUES ('manager', 'setting/setting-modules/update');
INSERT INTO `auth_item_child` VALUES ('manager', 'setting/setting-modules/view');
INSERT INTO `auth_item_child` VALUES ('manager', 'setting/setting-website/delete');
INSERT INTO `auth_item_child` VALUES ('manager', 'user/index');
INSERT INTO `auth_item_child` VALUES ('manager', 'user/resetpassword');
INSERT INTO `auth_item_child` VALUES ('manager', 'user/view');

-- ----------------------------
-- Table structure for auth_rule
-- ----------------------------
DROP TABLE IF EXISTS `auth_rule`;
CREATE TABLE `auth_rule` (
  `name` varchar(64) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `data` blob,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of auth_rule
-- ----------------------------
INSERT INTO `auth_rule` VALUES ('isAuthor', 0x4F3A33353A22636F6D6D6F6E5C6D6F64756C65735C617574685C726261635C417574686F7252756C65223A333A7B733A343A226E616D65223B733A383A226973417574686F72223B733A393A22637265617465644174223B693A313533343931323737353B733A393A22757064617465644174223B693A313533343931323737353B7D, '1534912775', '1534912775');

-- ----------------------------
-- Table structure for migration
-- ----------------------------
DROP TABLE IF EXISTS `migration`;
CREATE TABLE `migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`version`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of migration
-- ----------------------------

-- ----------------------------
-- Table structure for tbl_product
-- ----------------------------
DROP TABLE IF EXISTS `tbl_product`;
CREATE TABLE `tbl_product` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `proName` varchar(255) NOT NULL,
  `price` int(11) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `note` text,
  `order` float DEFAULT NULL,
  `status` tinyint(4) NOT NULL,
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  `userCreated` int(11) NOT NULL,
  `userUpdated` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `uni_proName` (`proName`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tbl_product
-- ----------------------------
INSERT INTO `tbl_product` VALUES ('1', 'Không có sản phẩm', '0', '', '', null, '0', '1564492578', '1564492578', '1', '1');
INSERT INTO `tbl_product` VALUES ('2', 'test', '200000', '', '', null, '1', '1564670772', '1564670772', '1', '1');
INSERT INTO `tbl_product` VALUES ('3', 'sp2 ', '600000', '', '\r\n', null, '1', '1564676012', '1564676012', '1', '1');

-- ----------------------------
-- Table structure for tbl_register
-- ----------------------------
DROP TABLE IF EXISTS `tbl_register`;
CREATE TABLE `tbl_register` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(150) NOT NULL,
  `phone` varchar(12) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `note` text,
  `status` tinyint(4) NOT NULL,
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  `userCreated` int(11) NOT NULL,
  `userUpdated` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tbl_register
-- ----------------------------
INSERT INTO `tbl_register` VALUES ('1', 'Hoang Van Nam', '0934242', '', '', '1', '0', 'sfdsfs', '0', '1564584560', '1564584560', '999', '999');
INSERT INTO `tbl_register` VALUES ('2', 'sfdsf', '08908', 'leneuhung@gmail.com', '89080808', '2', '3', 'dgdfgdgd', '0', '1564591366', '1564591366', '999', '999');
INSERT INTO `tbl_register` VALUES ('3', 'gsgdsfs', 'fsdfsfs', 'leneuhung@gmail.com', 'fdssfs', '3', '2', 'dfgdgd', '0', '1564591586', '1564591586', '999', '999');
INSERT INTO `tbl_register` VALUES ('4', 'sdfsfs', '654464', 'leneuhung@gmail.com', '65464', '3', '4', 'dgfdgd', '0', '1564591634', '1564591634', '999', '999');
INSERT INTO `tbl_register` VALUES ('5', '6456', '56465464', '576575', '6757575', '2', '5', 'gdfgd', '0', '1564591723', '1564591723', '999', '999');
INSERT INTO `tbl_register` VALUES ('6', 'gdfgd', '5464564', 'leneuhung@gmail.com', '46546', '1', '0', '456464', '0', '1564591799', '1564591799', '999', '999');
INSERT INTO `tbl_register` VALUES ('7', 'dgdgfdgfd', '54646', 'leneuhung@gmail.com', 'dgfdgd', '1', '0', 'dgfdgd', '0', '1564591823', '1564591823', '999', '999');

-- ----------------------------
-- Table structure for tbl_setting_modules
-- ----------------------------
DROP TABLE IF EXISTS `tbl_setting_modules`;
CREATE TABLE `tbl_setting_modules` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `order` float DEFAULT NULL,
  `registration` tinyint(4) DEFAULT NULL,
  `date` int(11) DEFAULT NULL,
  `content` mediumtext,
  `status` tinyint(4) NOT NULL,
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  `userCreated` int(11) NOT NULL,
  `userUpdated` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tbl_setting_modules
-- ----------------------------
INSERT INTO `tbl_setting_modules` VALUES ('1', 'BẢN TIN BÓNG ĐÁ 30/7| RONALDO bất ngờ trở lại Madrid ! Patrice Evra CHÍNH THỨC GIẢI NGHỆ', '1.6', '1', null, '<h1 class=\"title style-scope ytd-video-primary-info-renderer\">&nbsp;</h1>\r\n<p>*** Ghiền B&oacute;ng Đ&aacute; TV kh&ocirc;ng sở hữu to&agrave;n bộ tất cả tư liệu được sử dụng trong video n&agrave;y. V&igrave; thế mọi thắc mắc về bản quyền, t&agrave;i trợ, quảng c&aacute;o, hợp t&aacute;c vui l&ograve;ng li&ecirc;n hệ email: hotro.gbd@gmail.com Cảm ơn c&aacute;c bạn đ&atilde; theo d&otilde;i VIDEO v&agrave; ủng hộ k&ecirc;nh!</p>\r\n<p>&nbsp;</p>\r\n<p><iframe src=\"https://www.youtube.com/embed/LlsFG5bx7ho\" width=\"560\" height=\"315\" frameborder=\"0\" allowfullscreen=\"allowfullscreen\"></iframe></p>', '1', '1564473094', '1564924543', '1', '1');
INSERT INTO `tbl_setting_modules` VALUES ('2', 'WHO NEEDS RONALDO ??? CHÍNH LÀ PEREZ VÀ ZIDANE CHỨ CÒN AI NỮA!!!', '3.2', '1', '1564681500', '<p><iframe src=\"//www.youtube.com/embed/qg-mSZ8241A\" width=\"560\" height=\"314\" allowfullscreen=\"allowfullscreen\"></iframe></p>\r\n<p>Ronaldo đ&atilde; đầu 3 nhưng ai cũng c&ocirc;ng nhận tinh thần v&agrave; kh&aacute;t khao chiến đấu của anh ấy l&agrave; đ&aacute;ng nể...nhớ lại hồi c&oacute; th&ocirc;ng tin Real b&aacute;n Ro cho Juve c&ograve;n kh&ocirc;ng tin l&agrave; thật :3 Giờ c&oacute; lẽ người hận nhất l&agrave; Perez ae nhỉ?</p>\r\n<p>&nbsp;</p>\r\n<p>&nbsp;</p>', '1', '1564476205', '1564681134', '1', '1');
INSERT INTO `tbl_setting_modules` VALUES ('3', 'Ronaldo và câu chuyện buồn tại Real Madrid', '4', '1', null, '<p>K&ecirc;nh Youtube ch&iacute;nh thức của B&aacute;o bongda.com.vn. K&ecirc;nh chuy&ecirc;n tổng hợp c&aacute;c th&ocirc;ng tin, b&igrave;nh luận c&aacute;c sự kiện của c&aacute;c giải b&oacute;ng đ&aacute; h&agrave;ng đầu thế giới dưới g&oacute;c độ chuy&ecirc;n nghiệp lẫn h&agrave;i hước.</p>\r\n<p>&nbsp;</p>\r\n<p>&nbsp;</p>', '1', '1564480427', '1564926198', '1', '1');

-- ----------------------------
-- Table structure for tbl_setting_website
-- ----------------------------
DROP TABLE IF EXISTS `tbl_setting_website`;
CREATE TABLE `tbl_setting_website` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `title_form` varchar(255) DEFAULT NULL,
  `content_form` text,
  `logo` varchar(255) NOT NULL,
  `google_analytics` varchar(255) DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `hotline` varchar(11) NOT NULL,
  `footer` text,
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  `userCreated` int(11) NOT NULL,
  `userUpdated` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tbl_setting_website
-- ----------------------------
INSERT INTO `tbl_setting_website` VALUES ('1', 'landing page', 'sdfsfsfs', 'dadasda', '<p>⚡️ Với mức ph&iacute; chỉ từ 2.000đ/ng&agrave;y, FWD bảo hiểm hỗ trợ viện ph&iacute; gi&uacute;p bạn bảo vệ thu nhập để d&agrave;nh cho những trải nghiệm. ???? M&ugrave;a h&egrave; n&agrave;y, khi mua FWD BẢO HIỂM HỖ TRỢ VIỆN PH&Iacute;, bạn c&ograve;n nhận ngay gi&agrave;y Biti&rsquo;s Hunter Street x Việt Max &ndash; &ldquo;Bộ đ&ocirc;i trải nghiệm&rdquo; đồng h&agrave;nh c&ugrave;ng bạn.</p>', 'http://local.langpage.vn/uploads/honda/bugi-xe-vision-hang-ngk.jpg', '34242423', '4242432@gmail.com', '908086867', '<p>&nbsp;bảo hiểm hỗ trợ viện ph&iacute; gi&uacute;p bạn bảo vệ thu nhập để d&agrave;nh cho những trải nghiệm. ???? M&ugrave;a h&egrave; n&agrave;y, khi mua FWD BẢO HIỂM HỖ TRỢ VIỆN PH&Iacute;, bạn c&ograve;n nhận ngay gi&agrave;y Biti&rsquo;s Hunter Street x Việt Max &ndash; &ldquo;Bộ đ&ocirc;i trải nghiệm&rdquo; đồng h&agrave;nh c&ugrave;ng bạn.</p>', '1564391247', '1564973369', '1', '1');

-- ----------------------------
-- Table structure for user
-- ----------------------------
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `fullname` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `auth_key` varchar(32) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `password_hash` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `password_reset_token` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `phone` varchar(12) DEFAULT NULL,
  `status` smallint(6) NOT NULL DEFAULT '10',
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`) USING BTREE,
  UNIQUE KEY `email` (`email`) USING BTREE,
  UNIQUE KEY `password_reset_token` (`password_reset_token`) USING BTREE,
  KEY `fullname` (`fullname`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of user
-- ----------------------------
INSERT INTO `user` VALUES ('1', 'admin', 'Lê Văn Hưng', 'pkHWEe0Vj6vdZ18rfE898DlmKH90kz1G', '$2y$13$S1dkFqNCsAY9n4dE8wSZ2OPt4WTeBXpQH6cskYcCP22flem9u0eiS', null, 'admin@gmail.com', null, null, '10', '1534845575', '1560153635');
INSERT INTO `user` VALUES ('2', 'test', 'Nguyễn Hoàng Nam', 'DM3Uj2peJ-fJh0KdyrxPamLTnVOF-raz', '$2y$13$p2CyOKkyGUMpKCaopp1WAet.etT1TptAIt1x0IH3TrglihxngXzOO', null, 'a@gmail.com', null, null, '10', '1534872565', '1534872565');
