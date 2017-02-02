CREATE TABLE `user_card` (
  `Uid` int(11) NOT NULL COMMENT '�û�ID',
  `FullName` varchar(20) DEFAULT NULL COMMENT '����',
  `Job` varchar(20) DEFAULT NULL COMMENT 'ְ��',
  `Mobile` varchar(20) DEFAULT NULL COMMENT '�ֻ�����',
  `Business` varchar(20) DEFAULT NULL COMMENT '��Ҫҵ��',
  `LoanRate` varchar(10) DEFAULT NULL COMMENT '��������',
  `Org` int(3) DEFAULT NULL COMMENT '���ڻ���',
  `Create_time` int(11) DEFAULT NULL COMMENT '����ʱ��',
  `Update_time` int(11) DEFAULT NULL COMMENT '�޸�ʱ��',
  PRIMARY KEY (`Uid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='�û���Ƭ';

CREATE TABLE `user_card_contact` (
  `Id` int(11) NOT NULL AUTO_INCREMENT COMMENT '����ID',
  `FromUid` int(11) DEFAULT NULL COMMENT '��Ƭ������',
  `ToUid` int(11) DEFAULT NULL COMMENT '��Ƭ������',
  `Create_time` int(11) DEFAULT NULL COMMENT '����/����ʱ��',
  `Update_time` int(11) DEFAULT NULL COMMENT '�޸�ʱ��',
  PRIMARY KEY (`Id`),
  UNIQUE KEY `Unique` (`FromUid`,`ToUid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='��Ƭ���ͼ�¼';