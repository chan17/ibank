CREATE TABLE `user_card` (
  `Uid` int(11) NOT NULL COMMENT '用户ID',
  `FullName` varchar(20) DEFAULT NULL COMMENT '姓名',
  `Job` varchar(20) DEFAULT NULL COMMENT '职务',
  `Mobile` varchar(20) DEFAULT NULL COMMENT '手机号码',
  `Business` varchar(20) DEFAULT NULL COMMENT '主要业务',
  `LoanRate` varchar(10) DEFAULT NULL COMMENT '贷款利率',
  `Org` int(3) DEFAULT NULL COMMENT '所在机构',
  `Create_time` int(11) DEFAULT NULL COMMENT '创建时间',
  `Update_time` int(11) DEFAULT NULL COMMENT '修改时间',
  PRIMARY KEY (`Uid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='用户名片';

CREATE TABLE `user_card_contact` (
  `Id` int(11) NOT NULL AUTO_INCREMENT COMMENT '自增ID',
  `FromUid` int(11) DEFAULT NULL COMMENT '名片发送人',
  `ToUid` int(11) DEFAULT NULL COMMENT '名片接收人',
  `Create_time` int(11) DEFAULT NULL COMMENT '发送/接收时间',
  `Update_time` int(11) DEFAULT NULL COMMENT '修改时间',
  PRIMARY KEY (`Id`),
  UNIQUE KEY `Unique` (`FromUid`,`ToUid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='名片发送记录';