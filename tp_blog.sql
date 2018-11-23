/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50553
Source Host           : localhost:3306
Source Database       : tp_blog

Target Server Type    : MYSQL
Target Server Version : 50553
File Encoding         : 65001

Date: 2018-11-23 11:06:55
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for tp_admin
-- ----------------------------
DROP TABLE IF EXISTS `tp_admin`;
CREATE TABLE `tp_admin` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(20) NOT NULL COMMENT '管理员账户号',
  `password` varchar(20) NOT NULL,
  `nickname` varchar(20) NOT NULL COMMENT '昵称',
  `email` varchar(20) NOT NULL COMMENT '邮箱',
  `status` enum('1','0') NOT NULL DEFAULT '0' COMMENT '0是禁用1是可用',
  `is_super` enum('1','0') NOT NULL DEFAULT '0' COMMENT '是否是超级管理员,0不是,1是',
  `create_time` int(11) DEFAULT NULL,
  `update_time` int(11) DEFAULT NULL,
  `delete_time` int(11) DEFAULT NULL COMMENT '是否删除',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tp_admin
-- ----------------------------
INSERT INTO `tp_admin` VALUES ('1', 'root', 'root', 'root', 'root@qqq.com', '1', '1', null, null, null);
INSERT INTO `tp_admin` VALUES ('2', '22', '22', '22', '22@qq.com', '1', '0', '1542703222', '1542807824', null);
INSERT INTO `tp_admin` VALUES ('9', 'haha', 'hahah', 'haha', '137522982@qq.com', '1', '0', '1542705481', '1542807951', null);
INSERT INTO `tp_admin` VALUES ('8', 'yangshuang', '776138', '12', '137522872@qq.com', '1', '0', '1542705441', '1542715291', null);
INSERT INTO `tp_admin` VALUES ('14', 'abc', 'abcabc', 'abc', 'abc@qq.com', '0', '0', '1542805633', '1542853996', '1542853996');

-- ----------------------------
-- Table structure for tp_article
-- ----------------------------
DROP TABLE IF EXISTS `tp_article`;
CREATE TABLE `tp_article` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(50) NOT NULL COMMENT '文章标题',
  `desc` text NOT NULL COMMENT '概要',
  `tags` varchar(100) NOT NULL COMMENT '标签',
  `content` longtext NOT NULL COMMENT '内容',
  `is_top` enum('1','0') NOT NULL DEFAULT '0' COMMENT '0推荐1不推荐',
  `cate_id` int(11) DEFAULT NULL COMMENT '所属导航id',
  `create_time` int(11) NOT NULL COMMENT '添加时间',
  `update_time` int(11) NOT NULL,
  `delete_time` datetime DEFAULT NULL COMMENT '软删除',
  `click` int(11) DEFAULT NULL COMMENT '点击量',
  `comm_num` int(11) DEFAULT NULL COMMENT '评论量',
  `author` varchar(20) DEFAULT NULL COMMENT '作者',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 COMMENT='文章表';

-- ----------------------------
-- Records of tp_article
-- ----------------------------
INSERT INTO `tp_article` VALUES ('1', 'Hadoop', '1', '1', '<p>1</p>', '1', '4', '1542780896', '1542780896', null, '10', '12', '辰东');
INSERT INTO `tp_article` VALUES ('2', 'Mysql', 'mysql入门', 'mysql |dba', '<p>mysql从入门到放弃</p>', '0', '8', '1542780946', '1542780946', null, '6', '43', '番茄');
INSERT INTO `tp_article` VALUES ('3', 'php', 'php', 'php', '<p>php是世界上最好的语言</p>', '0', '4', '1542781023', '1542784128', null, '2', '34', '土豆');
INSERT INTO `tp_article` VALUES ('4', 'php1', 'php', 'php', '<p>php是世界上最好的语言</p>', '0', '10', '1542781091', '1542781091', null, '34', '42', '小刀');
INSERT INTO `tp_article` VALUES ('5', 'python', 'python ahhhhhh', 'python', '<p>python 是最好的语言</p>', '0', '4', '1542781463', '1542791336', '0000-00-00 00:00:00', '2', '32', '会说话的肘子');
INSERT INTO `tp_article` VALUES ('6', 'python1234', 'python ahhhhhh', 'python', '<p>python 是最好的语言aaa</p>', '1', '7', '1542781475', '1542791219', '0000-00-00 00:00:00', '3', '45', '唐家三少');
INSERT INTO `tp_article` VALUES ('7', 'Django', 'web django', 'web', '<p>django 是一个框架</p>', '0', '4', '1542781541', '1542784108', null, '4', '345', '烽火戏诸侯');
INSERT INTO `tp_article` VALUES ('8', '大王饶命', '肘子的小说', '大王', '<p>吕小布</p>', '1', '3', '1542864090', '1542864090', null, '12', '23', '会说话的肘子');
INSERT INTO `tp_article` VALUES ('9', '修真聊天群', '圣骑士的传说', '圣骑士的传说', '<p><span style=\"color: rgb(102, 102, 102); font-family: arial; font-size: 13px; background-color: rgb(255, 255, 255);\">圣骑士的传说</span></p>', '1', '4', '1542864338', '1542864338', null, '6', '45', '圣骑士的传说');
INSERT INTO `tp_article` VALUES ('10', '遮天', '辰东', '辰南', '<p><strong>辰东辰东辰东辰东辰东辰东辰东辰东辰东辰东辰东辰东辰东辰东辰东</strong></p>', '1', '7', '1542865098', '1542865098', null, '113', '534', '辰东');

-- ----------------------------
-- Table structure for tp_cate
-- ----------------------------
DROP TABLE IF EXISTS `tp_cate`;
CREATE TABLE `tp_cate` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `catename` varchar(20) NOT NULL COMMENT '导航名称',
  `sort` int(11) NOT NULL COMMENT '排序',
  `create_time` int(11) NOT NULL COMMENT '添加时间',
  `update_time` int(11) NOT NULL,
  `delete_time` int(11) DEFAULT NULL COMMENT '软删除',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COMMENT='导航表';

-- ----------------------------
-- Records of tp_cate
-- ----------------------------
INSERT INTO `tp_cate` VALUES ('3', 'java', '7', '1542765965', '1542792028', null);
INSERT INTO `tp_cate` VALUES ('4', 'PYTHON', '9', '1542766129', '1542768502', null);
INSERT INTO `tp_cate` VALUES ('7', 'Laravel', '10', '1542766340', '1542766340', null);
INSERT INTO `tp_cate` VALUES ('8', 'Mysql', '8', '1542767485', '1542768651', null);

-- ----------------------------
-- Table structure for tp_comment
-- ----------------------------
DROP TABLE IF EXISTS `tp_comment`;
CREATE TABLE `tp_comment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `content` text NOT NULL COMMENT '评论内容',
  `article_id` int(11) NOT NULL COMMENT '文章id',
  `member_id` int(11) NOT NULL COMMENT '哪个用户评论的,用户id',
  `create_time` int(11) NOT NULL COMMENT '评论时间',
  `update_time` int(11) NOT NULL,
  `delete_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8 COMMENT='评论表';

-- ----------------------------
-- Records of tp_comment
-- ----------------------------
INSERT INTO `tp_comment` VALUES ('1', '挺好', '2', '1', '12234343', '1542856358', null);
INSERT INTO `tp_comment` VALUES ('2', '真不错', '4', '2', '1542869532', '1542869532', null);
INSERT INTO `tp_comment` VALUES ('3', '值得一看', '10', '2', '1542867532', '1542867532', null);
INSERT INTO `tp_comment` VALUES ('4', '挺好', '10', '2', '1542869132', '1542869132', null);
INSERT INTO `tp_comment` VALUES ('5', '你小子不错啊', '10', '1', '1542941761', '1542941761', null);
INSERT INTO `tp_comment` VALUES ('6', '你小子不错啊', '10', '1', '1542941772', '1542941772', null);
INSERT INTO `tp_comment` VALUES ('7', '看了几天了', '10', '1', '1542941803', '1542941803', null);
INSERT INTO `tp_comment` VALUES ('8', '看了多少了', '10', '1', '1542941985', '1542941985', null);
INSERT INTO `tp_comment` VALUES ('9', '看了多少了', '10', '1', '1542941987', '1542941987', null);
INSERT INTO `tp_comment` VALUES ('10', '123', '10', '1', '1542942119', '1542942119', null);
INSERT INTO `tp_comment` VALUES ('11', '哈哈', '10', '1', '1542942202', '1542942202', null);
INSERT INTO `tp_comment` VALUES ('12', '我就是来凑个热闹', '10', '1', '1542942341', '1542942341', null);

-- ----------------------------
-- Table structure for tp_member
-- ----------------------------
DROP TABLE IF EXISTS `tp_member`;
CREATE TABLE `tp_member` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(20) NOT NULL COMMENT '用户名',
  `password` varchar(20) NOT NULL COMMENT '密码',
  `nickname` varchar(20) NOT NULL COMMENT '昵称',
  `email` varchar(20) NOT NULL COMMENT '邮箱',
  `create_time` int(11) NOT NULL COMMENT '注册时间',
  `update_time` int(11) NOT NULL,
  `delete_time` int(11) DEFAULT NULL COMMENT '软删除',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tp_member
-- ----------------------------
INSERT INTO `tp_member` VALUES ('1', 'zhangsan', 'zhangsan1', 'zhangsan', 'zhangsan@qq.com', '1542795107', '1542801161', null);
INSERT INTO `tp_member` VALUES ('2', 'hah', 'haha', 'hahah', 'ha', '1542795486', '1542801284', null);
INSERT INTO `tp_member` VALUES ('3', 'lisi', 'lisi', 'lisi', 'lisi@qq.com', '1542795576', '1542795576', null);
INSERT INTO `tp_member` VALUES ('4', 'wangwu', 'wangwu', 'wangwu', 'lisi@qq.com', '1542795597', '1542795597', null);
INSERT INTO `tp_member` VALUES ('5', 'zhangsan1', 'zhangsansan', 'zhangsan', 'zhangsa1n@qq.com', '1542795643', '1542801203', null);
INSERT INTO `tp_member` VALUES ('6', 'username', 'password', 'username', '137522872@qq.com', '1542896701', '1542896701', null);

-- ----------------------------
-- Table structure for tp_system
-- ----------------------------
DROP TABLE IF EXISTS `tp_system`;
CREATE TABLE `tp_system` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '网址标题',
  `webname` varchar(50) NOT NULL,
  `copyright` varchar(50) NOT NULL,
  `create_time` int(11) NOT NULL,
  `update_time` int(11) NOT NULL,
  `delete_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COMMENT='系统设置表';

-- ----------------------------
-- Records of tp_system
-- ----------------------------
INSERT INTO `tp_system` VALUES ('1', '程序猿1', '版权信息', '0', '1542858953', null);
