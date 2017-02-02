-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- 主机: localhost
-- 生成日期: 2014 年 05 月 29 日 11:34
-- 服务器版本: 5.6.12-log
-- PHP 版本: 5.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- 数据库: `51ibank`
--
CREATE DATABASE IF NOT EXISTS `51ibank` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `51ibank`;

--
-- 表的结构 `info_talk`
--

CREATE TABLE IF NOT EXISTS `info_talk` (
  `MsgId` int(30) NOT NULL AUTO_INCREMENT COMMENT '消息id 自增长',
  `From` int(10) NOT NULL COMMENT '消息来自谁 ',
  `To` int(10) NOT NULL COMMENT '消息发给谁',
  `MsgContent` text NOT NULL COMMENT '消息内容',
  `MsgType` tinyint(2) NOT NULL COMMENT '消息类型 0：文本  1：图片  2：语音 3：视频',
  `MsgStatus` tinyint(1) NOT NULL COMMENT '消息状态 0：未读  1：已读',
  `Send_time` int(11) NOT NULL COMMENT '发送时间，服务器系统时间',
  `Version` varchar(64) NOT NULL,
  PRIMARY KEY (`MsgId`),
  UNIQUE KEY `MsgId` (`MsgId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='用户聊天记录' AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `loan_base_info`
--

CREATE TABLE IF NOT EXISTS `loan_base_info` (
  `LoanId` int(11) NOT NULL COMMENT '借款ID',
  `Uid` int(11) NOT NULL COMMENT '发布人ID',
  `Status` tinyint(2) NOT NULL COMMENT '0借款审核中，1借款进行中，2借款结束，追加借款。',
  `Source` tinyint(2) NOT NULL DEFAULT '1' COMMENT '贷款来源.1 来自web 2 来自app  ',
  `CityId` int(10) NOT NULL DEFAULT '0' COMMENT '借款所属城市',
  `Loan_effect_type` tinyint(3) DEFAULT NULL COMMENT '借款用途',
  `Loan_title` varchar(100) DEFAULT NULL COMMENT '借款标题',
  `Loan_amount` int(11) DEFAULT NULL COMMENT '借款金额',
  `Loan_tern_type` tinyint(3) DEFAULT NULL COMMENT '借款期限',
  `Income` decimal(10,2) NOT NULL COMMENT '点击收益',
  `Loan_description` varchar(1000) DEFAULT NULL COMMENT '借款描述',
  `Create_time` int(11) DEFAULT NULL COMMENT '入库时间',
  `Update_time` int(11) DEFAULT NULL COMMENT '修改时间',
  PRIMARY KEY (`LoanId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='借款基本信息';

--
-- 转存表中的数据 `loan_base_info`
--

INSERT INTO `loan_base_info` (`LoanId`, `Uid`, `Status`, `Loan_effect_type`, `Loan_title`, `Loan_amount`, `Loan_tern_type`, `Income`, `Loan_description`, `Create_time`, `Update_time`) VALUES
(1, 1, 1, 5, '买车置业', 10000, 16, '69.00', '我从1991年大学毕业工作至今，我借款主要是为了购买汽车。', 1397562143, 1397562143),
(2, 2, 2, 2, '日常消费', 3000, 12, '46.00', '借款人工资一月分两次发放，每月发工资当日有两笔，一笔工资，一笔网转', 1396996454, 1396996454),
(3, 3, 1, 1, '兼职创业', 5000, 2, '77.00', '兼职找到一条创业的项目，由于去年买房现金都花完了，现在启动需要借款', 1394775445, 1394775445),
(4, 4, 1, 6, '家居家装', 17000, 12, '67.00', '房屋装修，急需借款，本人工作稳定，无还款压力，望批准！谢谢！', 1400380319, 1400380319),
(5, 5, 2, 1, '进购原材料周转', 6000, 12, '14.00', '我公司是从事自动变速箱配件及维修的的公司。公司销售的自动变速箱配件均为知名厂商生产，产品质量有保障，同时我公司拥有一批专业的维修队伍，为客户提供技术支持，免除了客户的后顾之忧，得到了客户的高度赞誉和稳定支持。此次借款是用于购买原材料周转，希望大家支持。 \n还款来源: 公司有自己稳定的客户，同时有众多代理销售机构，以销售收入为还款来源，还款有保障，同时以自己的丰田皇冠作为抵押，请大家放心投标，谢谢支持！', 1398466201, 1398466201),
(6, 6, 1, 3, '自动化流水建设\n', 6000, 14, '52.00', ' 申请人提供房产足值抵押，借款的主要目的是扩建电子车间。该车间今后将生产数据传输线及转接端口专供出口。借款资金将用于购进两台全自动拉线机以建立流水线借款用于添置新设备，建立一条生产线。现该车间已建成，员工已配备，设备投产即可运营。产品主要是数据线和转接口，直接出口。该企业紧邻江苏三二四省道，连接徐连高速直达连云港口岸，车程不超过两小时，交通优势较为明显。如该项目投产，将作为当地政府重点支持的新型工业项目，获得政策支持与财政补贴。该项目已经实地考察。\n还款来源: 主要通过现已投产的服装车间利润，另电子车间投产后产值将用于还款，提供组织抵押。期望150万的贷款。', 1393379860, 1393379860),
(7, 7, 2, 5, '公司资金周转\n', 20000, 4, '65.00', '我公司专业研发制作各种节能灯箱产品，如滚动灯箱、太阳能灯箱和EEFL灯箱等。我公司引进国外生产的外部电极荧光灯,应用于广告灯箱，因此取得了良好的节能效果，得到了客户的高度好评。借款用于资金周转，希望大家能够帮忙。\n还款来源: 公司产品种类多样，适应性广，安装方便，且较其它灯箱产品，拥有更强的节能效果，因而得到了广大客户的认可，形成了自己稳定的客户群体。以营业收入为还款来源，还款有保障，同时以自己的丰田兰德酷路泽作抵押，请大家放心投标。', 1394189134, 1394189134),
(8, 8, 2, 6, '经营性周转费用', 7000, 12, '58.00', '我公司是集产品创意设计、产品开发、产品销售为一体的专业礼品公司。公司产品包括工艺精品、时尚家居礼品、地方文化礼品等礼品类别。根据客户的不同需求，我公司可以提供个性化礼品定制，产品设计美观，时尚大方，深受客户欢迎，公司稳步向前发展。此次借款是临时经营性周转，会很快还款，希望大家多多支持。\n还款来源: 公司为客户设计生产的礼品，设计时尚美观，深受广大客户好评，公司经营稳步发展，有自己稳定的收益，且由担保公司做担保，反担保措施足值，还款无压力，放心投标。', 1398555169, 1398555169),
(9, 9, 2, 5, '短期借款周转', 2000, 4, '11.00', '我公司主营中央空调的销售，是一家集销售、安装、售后维修等于一体的公司。我公司经销的产品均为各大厂商生产，产品质量优良，技术先进，且产品型号多样，能够满足客户不同需求，因而得到了众多客户的支持。我公司同时提供批发与零售两种营销模式，销路广阔，公司业绩蒸蒸日上。此次借款是经营周转，希望大家支持。\n还款来源: 公司拥有自己稳定的客户群体，同时在各地拥有众多经销批发商，销量稳步增长，还款无压力，且以自己的讴歌RLX作抵押，不会逾期，放心投标。', 1392782169, 1392782169),
(10, 10, 1, 1, '进购原材料周转\n', 18000, 8, '27.00', ' 我公司专业设计、生产和销售各类标志性服装，如工作服、西服 , 保安服和校服等。我公司拥有先进的制衣设备和优秀的设计、生产人员，公司生产的服装，设计时尚、新颖，质量上乘，得到了客户的一致好评。此次借款是购买一批原材料，希望大家能够多多支持。\n还款来源: 公司经营较好，有自己稳定的客户群体，还款有保障。且重视信用，无不良记录，同时以自己的大众途锐做抵押，不会逾期，放心投标。', 1398874057, 1398874057),
(11, 11, 1, 2, '扩大规模，短期借款', 15000, 7, '34.00', '我公司是一家集研发，生产，设计和安装于一体的专业保温防火材料生产商。公司拥有专业先进的生产设备与工艺，拥有专业的研发生产技术人才，且公司经过多年发展，已拥有丰富的实践经验，凭借着精湛的设计、优质的产品和专业的施工，受到了客户的一致好评，并相互建立了稳固的合作关系，公司不断稳步发展。现公司借款主要用于扩大规模后的资金临时周转，希望大家多多帮忙。\n还款来源: 公司发展前景良好，有自己稳定的合作客户，且客户群不断拓展，公司规模不断扩大，有能力偿还借款。以自己的奔驰ML320作足值抵押，不会逾期，放心投标。', 1396728948, 1396728948),
(12, 12, 1, 1, '短期借款，多多帮忙', 14000, 15, '71.00', '我公司是一家集环保型喷砂设备、喷漆设备、工业涂装环保设备研发、设计、生产与销售为一体的企业，拥有完整、科学的质量管理体系。 自成立以来一直经营稳定，所生产的产品广受消费者的欢迎，有自己稳定的客户来源，此次借款是用于经营周转，望大家能够帮忙。', 1392365922, 1392365922),
(13, 13, 1, 4, '扩大规模，短期借款', 4000, 20, '47.00', '我公司主要从事喷码机的生产与销售等。公司已成立十年左右，实力雄厚，拥有较强的研发生产能力，现主要生产高解析喷码机、小字符喷码机和激光喷码机等。公司产品品种齐全，型号多样，能够满足客户不同需求，且质量优良，性能稳定，价格低廉，深受客户好评。现在由于公司业务发展较快，想扩大规模，已有部分资金，但缺部分资金周转，故来借款，望大家帮忙', 1400220934, 1400220934),
(14, 14, 1, 1, '谢谢支持，按时还款', 15000, 4, '18.00', ' 公司产品具有寿命长、节能等优点，在市场上得到了客户的广泛认可，销售额节节攀升，公司经过多年发展已拥有自己稳定的客户群体，收入稳定，还款来源有保障。以自己的奥迪Q7做足值抵押，不会逾期，放心投标。', 1400044685, 1400044685);

-- --------------------------------------------------------

--
-- 表的结构 `loan_user_info`
--

CREATE TABLE IF NOT EXISTS `loan_user_info` (
  `LoanId` int(11) NOT NULL AUTO_INCREMENT COMMENT '借款信息ID',
  `Uid` int(11) NOT NULL COMMENT '用户ID',
  `Publisher_type` tinyint(1) DEFAULT '1' COMMENT '发布者类型，1自己发布2代人发布',
  `True_name` varchar(10) DEFAULT NULL COMMENT '真实姓名',
  `Nike_name` varchar(64) NOT NULL COMMENT '昵称',
  `QQ` varchar(20) DEFAULT NULL COMMENT 'QQ号码',
  `Email` varchar(64) DEFAULT NULL COMMENT '如题',
  `Mobile` varchar(20) DEFAULT NULL COMMENT '手机号码',
  `Edu_type` tinyint(3) DEFAULT NULL COMMENT '教育程度',
  `Id_card` varchar(18) DEFAULT NULL COMMENT '身份证号码',
  `Marry_type` tinyint(3) DEFAULT NULL COMMENT '婚姻状况',
  `House_type` tinyint(3) DEFAULT NULL COMMENT '住宅状况',
  `House_address` varchar(200) DEFAULT NULL COMMENT '住宅地址',
  `House_tel` varchar(20) DEFAULT NULL COMMENT '住宅电话',
  `Checkin_years` int(11) DEFAULT NULL COMMENT '入住年数',
  `Have_car` tinyint(1) DEFAULT '1' COMMENT '是否购车，1未购车2已购车',
  `Job_type` tinyint(3) DEFAULT NULL COMMENT '就业状态',
  `Year_revenue` int(10) NOT NULL COMMENT '年收入',
  `Income_type` tinyint(1) DEFAULT '1' COMMENT '收入发放方式，1银行卡2现金',
  `Company_type` tinyint(3) DEFAULT NULL COMMENT '单位性质',
  `Work_experience` int(2) DEFAULT NULL COMMENT '工作年限',
  `Company_name` varchar(100) DEFAULT NULL COMMENT '单位名称',
  `Office` varchar(20) DEFAULT NULL COMMENT '任职部门',
  `Company_address` varchar(200) DEFAULT NULL COMMENT '单位地址',
  `Company_tel` varchar(20) DEFAULT NULL COMMENT '单位电话',
  `Create_time` int(11) DEFAULT NULL COMMENT '入库时间',
  `Update_time` int(11) DEFAULT NULL COMMENT '修改时间',
  PRIMARY KEY (`LoanId`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='借款用户个人信息' AUTO_INCREMENT=15 ;

--
-- 转存表中的数据 `loan_user_info`
--

INSERT INTO `loan_user_info` (`LoanId`, `Uid`, `Publisher_type`, `True_name`, `Nike_name`, `QQ`, `Email`, `Mobile`, `Edu_type`, `Id_card`, `Marry_type`, `House_type`, `House_address`, `House_tel`, `Checkin_years`, `Have_car`, `Job_type`, `Year_revenue`, `Income_type`, `Company_type`, `Work_experience`, `Company_name`, `Office`, `Company_address`, `Company_tel`, `Create_time`, `Update_time`) VALUES
(1, 1, 1, '陈毅豪', 'LensCrafters', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, NULL, 50600, 1, NULL, NULL, NULL, NULL, NULL, NULL, 1400441191, 1400441191),
(2, 2, 1, '陈毅豪', 'Arno wang', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, 329100, 1, NULL, NULL, NULL, NULL, NULL, NULL, 1397491621, 1397491621),
(3, 3, 1, '陈毅豪', 'Antonyyy', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, 55500, 1, NULL, NULL, NULL, NULL, NULL, NULL, 1393158853, 1393158853),
(4, 4, 1, '陈毅豪', '谨风云', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, NULL, 357200, 1, NULL, NULL, NULL, NULL, NULL, NULL, 1399556690, 1399556690),
(5, 5, 1, '陈毅豪', '王子__欣', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, NULL, 153000, 1, NULL, NULL, NULL, NULL, NULL, NULL, 1392665729, 1392665729),
(6, 6, 1, '陈毅豪', '军靜靜丶Elvirag', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, 55700, 1, NULL, NULL, NULL, NULL, NULL, NULL, 1392818495, 1392818495),
(7, 7, 1, '陈毅豪', '密斯折腾是苏菲', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, 278200, 1, NULL, NULL, NULL, NULL, NULL, NULL, 1396835371, 1396835371),
(8, 8, 1, '陈毅豪', '罗远林', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, 339100, 1, NULL, NULL, NULL, NULL, NULL, NULL, 1392896143, 1392896143),
(9, 9, 1, '陈毅豪', '亲草', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, NULL, 274200, 1, NULL, NULL, NULL, NULL, NULL, NULL, 1396316056, 1396316056),
(10, 10, 1, '陈毅豪', 'summerls ', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, NULL, 142700, 1, NULL, NULL, NULL, NULL, NULL, NULL, 1398519364, 1398519364),
(11, 11, 1, '陈毅豪', '风浪纸', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, 278300, 1, NULL, NULL, NULL, NULL, NULL, NULL, 1398078412, 1398078412),
(12, 12, 1, '陈毅豪', '王二大甲鱼', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, 45700, 1, NULL, NULL, NULL, NULL, NULL, NULL, 1397631401, 1397631401),
(13, 13, 1, '陈毅豪', '大大大芒果', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, NULL, 315200, 1, NULL, NULL, NULL, NULL, NULL, NULL, 1396074512, 1396074512),
(14, 14, 1, '陈毅豪', 'Heidi-嘟嘟小熊', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, NULL, 193500, 1, NULL, NULL, NULL, NULL, NULL, NULL, 1396175300, 1396175300);

-- --------------------------------------------------------

--
-- 表的结构 `loan_user_prove`
--

CREATE TABLE IF NOT EXISTS `loan_user_prove` (
  `LoanId` INT(11) NOT NULL COMMENT '借款ID',
  `Uid` INT(11) NOT NULL COMMENT '发布人ID',
  `Auth_mobile` VARCHAR(20) DEFAULT NULL COMMENT '手机号码',
  `Contact_one_name` VARCHAR(20) DEFAULT NULL COMMENT '联系人1姓名',
  `Contact_one_rel` TINYINT(3) DEFAULT NULL COMMENT '联系人1关系',
  `Contact_one_mobile` VARCHAR(20) DEFAULT NULL COMMENT '联系人1手机',
  `Contact_two_name` VARCHAR(20) DEFAULT NULL COMMENT '联系人2姓名',
  `Contact_two_rel` TINYINT(3) DEFAULT NULL COMMENT '联系人2关系',
  `Contact_two_mobile` VARCHAR(20) DEFAULT NULL COMMENT '联系人2手机',
  `Idcard_url` VARCHAR(200) DEFAULT NULL COMMENT '身份证地址',
  `House_card_url` VARCHAR(200) DEFAULT NULL COMMENT '房产证地址',
  `Driving_license_url` VARCHAR(200) DEFAULT NULL COMMENT '行驶证地址',
  `House_add_url` VARCHAR(200) DEFAULT NULL COMMENT '住址证明地址',
  `Income_prove_url` VARCHAR(200) DEFAULT NULL COMMENT '收入证明地址',
  `Job_prove_url` VARCHAR(200) DEFAULT NULL COMMENT '工作证明地址',
  `Wage_prove_url` VARCHAR(200) DEFAULT NULL COMMENT '工资流水地址',
  `Create_time` INT(11) DEFAULT NULL COMMENT '入库时间',
  `Update_time` INT(11) DEFAULT NULL COMMENT '修改时间',
  PRIMARY KEY (`LoanId`),
  UNIQUE KEY `LoanId` (`LoanId`)
) ENGINE=INNODB DEFAULT CHARSET=utf8 COMMENT='借款用户资质信息';

--
-- 转存表中的数据 `loan_user_prove`
--

INSERT INTO `loan_user_prove` (`LoanId`, `Uid`, `Idcard_url`, `House_card_url`, `Driving_license_url`, `House_add_url`, `Income_prove_url`, `Job_prove_url`, `Wage_prove_url`, `Create_time`, `Update_time`) VALUES
(1, 1, 'fraud-URL hahahaha', 'fraud-URL hahahaha', 'fraud-URL hahahaha', 'fraud-URL hahahaha', 'fraud-URL hahahaha', 'fraud-URL hahahaha', 'fraud-URL hahahaha', 1397562143, 1397562143),
(2, 2, 'fraud-URL hahahaha', 'fraud-URL hahahaha', 'fraud-URL hahahaha', 'fraud-URL hahahaha', 'fraud-URL hahahaha', 'fraud-URL hahahaha', 'fraud-URL hahahaha', 1396996454, 1396996454),
(3, 3, 'fraud-URL hahahaha', 'fraud-URL hahahaha', 'fraud-URL hahahaha', 'fraud-URL hahahaha', 'fraud-URL hahahaha', 'fraud-URL hahahaha', 'fraud-URL hahahaha', 1394775445, 1394775445),
(4, 4, 'fraud-URL hahahaha', 'fraud-URL hahahaha', 'fraud-URL hahahaha', 'fraud-URL hahahaha', 'fraud-URL hahahaha', 'fraud-URL hahahaha', 'fraud-URL hahahaha', 1400380319, 1400380319),
(5, 5, 'fraud-URL hahahaha', 'fraud-URL hahahaha', 'fraud-URL hahahaha', 'fraud-URL hahahaha', 'fraud-URL hahahaha', 'fraud-URL hahahaha', 'fraud-URL hahahaha', 1398466201, 1398466201),
(6, 6, 'fraud-URL hahahaha', 'fraud-URL hahahaha', 'fraud-URL hahahaha', 'fraud-URL hahahaha', 'fraud-URL hahahaha', 'fraud-URL hahahaha', 'fraud-URL hahahaha', 1393379860, 1393379860),
(7, 7, 'fraud-URL hahahaha', 'fraud-URL hahahaha', 'fraud-URL hahahaha', 'fraud-URL hahahaha', 'fraud-URL hahahaha', 'fraud-URL hahahaha', 'fraud-URL hahahaha', 1394189134, 1394189134),
(8, 8, 'fraud-URL hahahaha', 'fraud-URL hahahaha', 'fraud-URL hahahaha', 'fraud-URL hahahaha', 'fraud-URL hahahaha', 'fraud-URL hahahaha', 'fraud-URL hahahaha', 1398555169, 1398555169),
(9, 9, 'fraud-URL hahahaha', 'fraud-URL hahahaha', 'fraud-URL hahahaha', 'fraud-URL hahahaha', 'fraud-URL hahahaha', 'fraud-URL hahahaha', 'fraud-URL hahahaha', 1392782169, 1392782169),
(10, 10, 'fraud-URL hahahaha', 'fraud-URL hahahaha', 'fraud-URL hahahaha', 'fraud-URL hahahaha', 'fraud-URL hahahaha', 'fraud-URL hahahaha', 'fraud-URL hahahaha', 1398874057, 1398874057),
(11, 11, 'fraud-URL hahahaha', 'fraud-URL hahahaha', 'fraud-URL hahahaha', 'fraud-URL hahahaha', 'fraud-URL hahahaha', 'fraud-URL hahahaha', 'fraud-URL hahahaha', 1396728948, 1396728948),
(12, 12, 'fraud-URL hahahaha', 'fraud-URL hahahaha', 'fraud-URL hahahaha', 'fraud-URL hahahaha', 'fraud-URL hahahaha', 'fraud-URL hahahaha', 'fraud-URL hahahaha', 1392365922, 1392365922),
(13, 13, 'fraud-URL hahahaha', 'fraud-URL hahahaha', 'fraud-URL hahahaha', 'fraud-URL hahahaha', 'fraud-URL hahahaha', 'fraud-URL hahahaha', 'fraud-URL hahahaha', 1400220934, 1400220934),
(14, 14, 'fraud-URL hahahaha', 'fraud-URL hahahaha', 'fraud-URL hahahaha', 'fraud-URL hahahaha', 'fraud-URL hahahaha', 'fraud-URL hahahaha', 'fraud-URL hahahaha', 1400044685, 1400044685);

-- --------------------------------------------------------

--
-- 表的结构 `log_gain_click`
--

CREATE TABLE IF NOT EXISTS `log_gain_click` (
  `Id` int(10) NOT NULL AUTO_INCREMENT COMMENT '发布的信息唯一id主键',
  `LoanId` int(10) NOT NULL COMMENT '借款订单id',
  `Uid` int(10) NOT NULL COMMENT '点击者id',
  `SingleIncome` decimal(10,2) NOT NULL COMMENT '单次点击收益',
  `Create_time` int(10) NOT NULL,
  `Update_time` int(10) NOT NULL,
  `Version` varchar(64) NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='点击收益流水' AUTO_INCREMENT=16 ;

--
-- 转存表中的数据 `log_gain_click`
--

INSERT INTO `log_gain_click` (`Id`, `LoanId`, `Uid`, `SingleIncome`, `Create_time`, `Update_time`, `Version`) VALUES
(1, 1, 1, '2.00', 1394503232, 1394503232, 'fraud'),
(2, 2, 2, '3.00', 1399327137, 1399327137, 'fraud'),
(3, 3, 3, '1.00', 1394453209, 1394453209, 'fraud'),
(4, 4, 4, '2.00', 1398058771, 1398058771, 'fraud'),
(5, 5, 5, '3.00', 1397302309, 1397302309, 'fraud'),
(6, 6, 6, '3.00', 1400685546, 1400685546, 'fraud'),
(7, 7, 7, '2.00', 1399351037, 1399351037, 'fraud'),
(8, 8, 8, '4.00', 1392124906, 1392124906, 'fraud'),
(9, 9, 9, '4.00', 1392346676, 1392346676, 'fraud'),
(10, 10, 10, '2.00', 1398273315, 1398273315, 'fraud'),
(11, 11, 11, '3.00', 1399909074, 1399909074, 'fraud'),
(12, 12, 12, '2.00', 1394941769, 1394941769, 'fraud'),
(13, 13, 13, '1.00', 1395572617, 1395572617, 'fraud'),
(14, 14, 14, '3.00', 1398920282, 1398920282, 'fraud'),
(15, 15, 15, '4.00', 1393850707, 1393850707, 'fraud');

-- --------------------------------------------------------

--
-- 表的结构 `log_payment`
--

CREATE TABLE IF NOT EXISTS `log_payment` (
  `Id` int(10) NULL AUTO_INCREMENT,
  `Uid` int(10) NULL COMMENT '用户ID',
  `LoanId` int(10) NULL DEFAULT '0' COMMENT '借款表id',
  `PayOrderId` varchar(50) NULL COMMENT '第三方支付平台的订单ID',
  `Type` varchar(64) NULL COMMENT '与支付平台的资金流动：click(消费的点击收益)  add (用户账户充值)   minus(用户账户提款)',
  `Money` decimal(10,2) NULL COMMENT '操作钱的数目',
  `Update_time` int(11) NULL,
  `Create_time` int(11) NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='记录网站的资金流动' AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `log_sendsms`
--

CREATE TABLE IF NOT EXISTS `log_sendsms` (
  `LogId` int(10) NOT NULL AUTO_INCREMENT,
  `Uid` int(10) NOT NULL COMMENT '用户ID',
  `LoanId` int(10) NOT NULL DEFAULT '0' COMMENT '借款表id',
  `Action` varchar(64) NOT NULL COMMENT '短信的行为：register登录 loan 借款验证',
  `Code` int(15) NOT NULL COMMENT '发送的验证码',
  `Phone` varchar(20) DEFAULT NULL,
  `SmsMessageSid` varchar(32) NOT NULL COMMENT '短信标识符 ,云通讯返回的',
  `Message` varchar(500) NOT NULL COMMENT '内容',
  `SendTime` datetime NOT NULL,
  PRIMARY KEY (`LogId`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='短信发送日志' AUTO_INCREMENT=3 ;

--
-- 转存表中的数据 `log_sendsms`
--

INSERT INTO `log_sendsms` (`LogId`, `Uid`, `LoanId`, `Action`, `Code`, `Phone`, `SmsMessageSid`, `Message`, `SendTime`) VALUES
(1, 0, 0, 'register', 2222, '13858038315', '2.0140520105134e19', '0', '2014-05-20 10:51:34'),
(2, 0, 0, 'register', 3333, '13858038315', '2.0140520105134e19', '22您的手机验证码是：3333，欢迎使用千亿贷。验证码个人持有。请勿轻信不法分子，泄露本验证码。如非本人操作请致电：888888。【千亿贷】', '2014-05-20 10:52:34');

-- --------------------------------------------------------

--
-- 表的结构 `record_recharge`
--

CREATE TABLE IF NOT EXISTS `record_recharge` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `Uid` int(10) NOT NULL COMMENT '注册成功后的账户ID',
  `Yue` decimal(10,2) NOT NULL DEFAULT '0.00' COMMENT '钱包余额',
  `ColdYue` decimal(10,2) NOT NULL DEFAULT '0.00' COMMENT '冻结金额',
  `HandselYue` decimal(10,2) DEFAULT '0.00' COMMENT '网站赠送的钱',
  `Create_time` int(11) NOT NULL,
  `Update_time` int(11) NOT NULL,
  `Version` varchar(64) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='账户余额' AUTO_INCREMENT=8 ;

--
-- 转存表中的数据 `record_recharge`
--

INSERT INTO `record_recharge` (`id`, `Uid`, `Yue`, `ColdYue`, `HandselYue`, `Create_time`, `Update_time`, `Version`) VALUES
(1, 1, '57.00', '57.00', NULL, 2147483647, 2147483647, '0'),
(2, 57, '0.00', '0.00', NULL, 1401834907, 1401834907, ''),
(3, 58, '0.00', '0.00', NULL, 1401838043, 1401838043, ''),
(4, 59, '0.00', '0.00', NULL, 1401916963, 1401916963, ''),
(5, 60, '0.00', '0.00', NULL, 1401960430, 1401960430, ''),
(6, 61, '0.00', '0.00', NULL, 1401972342, 1401972342, ''),
(7, 28, '0.00', '0.00', '0.00', 0, 0, '');
-- --------------------------------------------------------

--
-- 表的结构 `record_withdrawal`
--

CREATE TABLE IF NOT EXISTS `record_withdrawal` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `Uid` int(10) NOT NULL COMMENT '注册成功后的账户ID',
  `Status` tinyint(2) DEFAULT NULL COMMENT '0:未审核，1:已审核。后台审核打钱。',
  `YuE` double NOT NULL COMMENT '提款后钱包余额',
  `ColdYuE` double NOT NULL COMMENT '冻结金额',
  `OutJinE` double NOT NULL COMMENT '提款金额',
  `OutCount` int(64) NULL COMMENT '提款账户（卡号）',
  `OutCountName` varchar(64) NULL COMMENT '提款账户姓名',
  `Create_time` int(10) NOT NULL,
  `Update_time` int(10) NOT NULL,
  `Version` varchar(64) NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='提款记录' AUTO_INCREMENT=2 ;

--
-- 转存表中的数据 `record_withdrawal`
--

INSERT INTO `record_withdrawal` (`id`, `Uid`, `YuE`, `ColdYuE`, `OutJinE`, `OutCount`, `OutCountName`, `Create_time`, `Update_time`, `Version`) VALUES
(1, 1, 655555.4375, 655555.5625, 655555.4375, 165198956, 'cdfdfd', 2147483647, 2147483647, 'fghjk');

-- --------------------------------------------------------

--
-- 表的结构 `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `Uid` int(11) NOT NULL AUTO_INCREMENT COMMENT '主键',
  `Phone` varchar(11) DEFAULT NULL,
  `Qqopenid` varchar(32) DEFAULT NULL COMMENT 'Qq登入成功返回的openid',
  `Nickname` varchar(64) DEFAULT NULL COMMENT '用户名称',
  `Password` varchar(64) DEFAULT NULL COMMENT '密码',
  `Salt` varchar(32) DEFAULT NULL,
  `CashPassword` varchar(64) DEFAULT NULL COMMENT '提现密码',
  `Purview` tinyint(2) NOT NULL DEFAULT '1' COMMENT '0 信贷经理，1 普通投资者',
  `Gender` int(1) DEFAULT NULL COMMENT '性别 男1，女0',
  `Level` varchar(5) NOT NULL DEFAULT 'AAAAA' COMMENT '等级 (AAAAA)',
  `SingleIncome` decimal(10,2) DEFAULT NULL COMMENT '点击收益',
  `Email` int(128) DEFAULT NULL,
  `Face` int(11) DEFAULT NULL COMMENT '头像链接',
  `loan_count` int(10) DEFAULT NULL,
  `Type` int(11) DEFAULT NULL COMMENT '用户类型',
  `Status` tinyint(3) DEFAULT NULL COMMENT '借款状态:0：未成交 1：已成交 2：已关闭 3：未审核',
  `True_name` varchar(7) DEFAULT NULL COMMENT '真实姓名',
  `PhoneVerified` tinyint(1) DEFAULT NULL COMMENT '手机是否验证：0没，1已',
  `Roles` varchar(255) DEFAULT NULL,
  `City` varchar(64) DEFAULT NULL COMMENT '城市',
  `CityId` int(10) DEFAULT NULL COMMENT '城市ID',
  `Id_number` varchar(19) DEFAULT NULL COMMENT '身份证号',
  `CheckidNum` tinyint(1) DEFAULT NULL COMMENT '整型标示：身份证号码是否已认证',
  `CheckTel` tinyint(1) DEFAULT NULL COMMENT '整型标示：手机号码是否已认证',
  `CheckName` tinyint(1) DEFAULT NULL COMMENT '整型标示：姓名是否已认证',
  `CheckOutPwd` tinyint(1) DEFAULT NULL COMMENT '整型标示：提款密码是否已设置',
  `OutMoneyPwd` tinyint(64) DEFAULT NULL COMMENT '提款密码',
  `IsBlack` tinyint(1) DEFAULT NULL COMMENT '整型标示：是否黑名单,==1不能登陆',
  `Create_time` int(10) DEFAULT NULL COMMENT '数据创建时间（系统设置，其他人不能更改）',
  `Update_time` int(10) DEFAULT NULL COMMENT '数据更新时间（系统设置，其他人不能更改）',
  `Version` varchar(64) DEFAULT NULL COMMENT '当前数据的版本号（系统设置，其他人不能更改）',
  PRIMARY KEY (`Uid`),
  UNIQUE KEY `Uid` (`Uid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=38 ;

--
-- 转存表中的数据 `user`
--

INSERT INTO `user` (`Uid`, `Phone`, `Qqopenid`, `Nickname`, `Password`, `Salt`, `Purview`, `Gender`, `Level`, `SingleIncome`, `Email`, `Face`, `loan_count`, `Type`, `Status`, `True_name`, `PhoneVerified`, `Roles`, `City`, `CityId`, `Id_number`, `CheckidNum`, `CheckTel`, `CheckName`, `CheckOutPwd`, `OutMoneyPwd`, `IsBlack`, `Create_time`, `Update_time`, `Version`) VALUES
(1, '13598746547', 0, 'LensCrafters', '5555555555555555555555', '', 0, 1, 'AAAA', '4.00', 0, 0, 1, 0, 0, '', 0, '', '', 0, '', 0, 0, 0, 0, 0, 0, 0, 1400222296, ''),
(2, '13598746547', 0, 'Arno wang', '5555555555555555555555', '', 0, 1, 'AAAAA', '5.00', 0, 0, 1, 0, 0, '', 0, '', '', 0, '', 0, 0, 0, 0, 0, 0, 0, 1400222296, ''),
(3, '13896547565', 0, 'Antonyyy', '', '', 0, 1, 'AAAAA', '4.00', 0, 0, 2, 0, 0, '', 0, '', '', 0, '', 0, 0, 0, 0, 0, 0, 0, 0, ''),
(4, '13896547565', 0, '谨风云', '', '', 1, 0, 'AAAA', '4.20', 0, 0, 2, 0, 0, '', 0, '', '', 0, '', 0, 0, 0, 0, 0, 0, 0, 0, ''),
(5, '13896547565', 0, 'Hardy', '', '', 0, 0, 'AAAA', '4.00', 0, 0, 2, 0, 0, '', 0, '', '', 0, '', 0, 0, 0, 0, 0, 0, 0, 0, ''),
(6, '13896547565', 0, '王子__欣', '', '', 1, 0, 'AAAA', '4.00', 0, 0, 2, 0, 0, '', 0, '', '', 0, '', 0, 0, 0, 0, 0, 0, 0, 0, ''),
(7, '13896547565', 0, 'Elvirag', '', '', 0, 1, 'AAAA', '4.00', 0, 0, 2, 0, 0, '', 0, '', '', 0, '', 0, 0, 0, 0, 0, 0, 0, 0, ''),
(8, '13896547565', 0, '密斯折腾是苏菲', '', '', 1, 0, 'AAAA', '4.00', 0, 0, 2, 0, 0, '', 0, '', '', 0, '', 0, 0, 0, 0, 0, 0, 0, 0, ''),
(9, '13896547565', 0, '罗远林', '', '', 0, 1, 'AAAA', '4.00', 0, 0, 2, 0, 0, '', 0, '', '', 0, '', 0, 0, 0, 0, 0, 0, 0, 0, ''),
(10, '13896547565', 0, '亲草', '', '', 0, 1, 'AAAA', '4.00', 0, 0, 2, 0, 0, '', 0, '', '', 0, '', 0, 0, 0, 0, 0, 0, 0, 0, ''),
(11, '13896547565', 0, 'summerls ', '', '', 0, 0, 'AAAA', '4.00', 0, 0, 2, 0, 0, '', 0, '', '', 0, '', 0, 0, 0, 0, 0, 0, 0, 0, ''),
(12, '13896547565', 0, '风浪纸', '', '', 0, 1, 'AAAA', '4.00', 0, 0, 2, 0, 0, '', 0, '', '', 0, '', 0, 0, 0, 0, 0, 0, 0, 0, ''),
(13, '13896547565', 0, '王二大甲鱼', '', '', 0, 0, 'AAAA', '4.00', 0, 0, 2, 0, 0, '', 0, '', '', 0, '', 0, 0, 0, 0, 0, 0, 0, 0, ''),
(14, '13896547565', 0, '大大大芒果', '', '', 0, 1, 'AAAA', '3.00', 0, 0, 2, 0, 0, '', 0, '', '', 0, '', 0, 0, 0, 0, 0, 0, 0, 0, ''),
(15, '13896547565', 0, 'Heidi-嘟嘟小熊', '', '', 0, 1, 'AAAA', '2.00', 0, 0, 2, 0, 0, '', 0, '', '', 0, '', 0, 0, 0, 0, 0, 0, 0, 0, ''),
(16, '13896547565', 0, 'TheChyi', '', '', 0, 1, 'AAAA', '1.00', 0, 0, 2, 0, 0, '', 0, '', '', 0, '', 0, 0, 0, 0, 0, 0, 0, 0, ''),
(17, '13896547565', 0, '冰格致 ', '', '', 0, 1, 'AAAA', '1.00', 0, 0, 2, 0, 0, '', 0, '', '', 0, '', 0, 0, 0, 0, 0, 0, 0, 0, ''),
(18, '13896547565', 0, '八条大象', '', '', 0, 0, 'AAAA', '2.00', 0, 0, 2, 0, 0, '', 0, '', '', 0, '', 0, 0, 0, 0, 0, 0, 0, 0, ''),
(19, '13896547565', 0, '李鲜若', '', '', 0, 1, 'AAAA', '4.00', 0, 0, 2, 0, 0, '', 0, '', '', 0, '', 0, 0, 0, 0, 0, 0, 0, 0, ''),
(20, '13896547565', 0, '王天明', '', '', 0, 1, 'AAAA', '5.00', 0, 0, 2, 0, 0, '', 0, '', '', 0, '', 0, 0, 0, 0, 0, 0, 0, 0, ''),
(21, '13896547565', 0, '康明Cumminw ', '', '', 0, 0, 'AAAA', '4.00', 0, 0, 2, 0, 0, '', 0, '', '', 0, '', 0, 0, 0, 0, 0, 0, 0, 0, ''),
(22, '13896547565', 0, '大乌冬洪', '', '', 0, 1, 'AAAAA', '5.00', 0, 0, 2, 0, 0, '', 0, '', '', 0, '', 0, 0, 0, 0, 0, 0, 0, 0, ''),
(23, '13896547565', 0, ' clisvineyard', '', '', 0, 0, 'AAAA', '4.00', 0, 0, 2, 0, 0, '', 0, '', '', 0, '', 0, 0, 0, 0, 0, 0, 0, 0, ''),
(24, '13896547565', 0, '于海洋FeoniX ', '', '', 0, 1, 'AAAA', '4.00', 0, 0, 2, 0, 0, '', 0, '', '', 0, '', 0, 0, 0, 0, 0, 0, 0, 0, ''),
(25, '13896547565', 0, 'Lei_nuonuo3', '', '', 0, 0, 'AAAA', '4.00', 0, 0, 2, 0, 0, '', 0, '', '', 0, '', 0, 0, 0, 0, 0, 0, 0, 0, ''),
(26, '13896547565', 0, '东瓯青才', '', '', 0, 1, 'AAAA', '3.00', 0, 0, 2, 0, 0, '', 0, '', '', 0, '', 0, 0, 0, 0, 0, 0, 0, 0, ''),
(27, '13858038315', 0, 'testttt222', '5e2df0a3d1e63d5112b81df51c28d889', '', 0, 0, 'AAAAA', '5.00', 0, 0, 0, 0, 0, '', 1, '', '', 0, '', 0, 0, 0, 0, 0, 0, 1400480294, 1400480294, 'beta'),
(28, '13856666666', 0, 'vvvvvvvv', '827ccb0eea8a706c4c34a16891f84e7b', '', 0, 0, 'AAAAA', '5.00', 0, 0, 0, 0, 0, '', 1, '', '', 0, '', 0, 0, 0, 0, 0, 0, 1400552826, 1400552826, 'beta'),
(29, '13899999999', 0, 'ggzdsgds', '45298308dbec5c0757e6f751d0fb2a29', '', 1, 0, 'AAAAA', '5.00', 0, 0, 0, 0, 0, '', 1, '', '', 0, '', 0, 0, 0, 0, 0, 0, 1400917253, 1400917253, 'beta'),
(30, '13666666666', 0, 'ggg', '3b6281fa2ce2b6c20669490ef4b026a4', '', 1, 0, 'AAAAA', '5.00', 0, 0, 0, 0, 0, '', 1, '', '', 0, '', 0, 0, 0, 0, 0, 0, 1400919073, 1400919073, 'beta'),
(31, '13666666666', 0, 'ggg', '3b6281fa2ce2b6c20669490ef4b026a4', '', 1, 0, 'AAAAA', NULL, 0, 0, 0, 0, 0, '', 1, '', '', 0, '', 0, 0, 0, 0, 0, 0, 1400919401, 1400919401, 'beta'),
(32, '13666666666', 0, 'ggg', '3b6281fa2ce2b6c20669490ef4b026a4', '', 1, 0, 'AAAAA', NULL, 0, 0, 0, 0, 0, '', 1, '', '', 0, '', 0, 0, 0, 0, 0, 0, 1400919417, 1400919417, 'beta'),
(33, '19874588888', 0, 'test1', '827ccb0eea8a706c4c34a16891f84e7b', '', 1, 0, 'AAAAA', NULL, 0, 0, 0, 0, 0, '', 1, '', '', 0, '', 0, 0, 0, 0, 0, 0, 1401101288, 1401101288, 'beta'),
(34, '19874577777', 0, 'test1', '827ccb0eea8a706c4c34a16891f84e7b', '', 1, 0, 'AAAAA', NULL, 0, 0, 0, 0, 0, '', 1, '', '', 0, '', 0, 0, 0, 0, 0, 0, 1401101674, 1401101674, 'beta'),
(35, '19874556666', 0, 'test22', '827ccb0eea8a706c4c34a16891f84e7b', '', 1, 0, 'AAAAA', NULL, 0, 0, 0, 0, 0, '', 1, '', '', 0, '', 0, 0, 0, 0, 0, 0, 1401102249, 1401102249, 'beta');