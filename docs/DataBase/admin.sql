--
-- 表的结构 `user_admin`
--

CREATE TABLE IF NOT EXISTS `user_admin` (
  `Uid` int(10) NOT NULL AUTO_INCREMENT,
  `UserName` varchar(64) NOT NULL COMMENT '用户名',
  `Password` varchar(64) NOT NULL COMMENT '密码',
  `Purview` tinyint(2) NOT NULL DEFAULT '3' COMMENT '权限：1 超级管理员；2 管理员；3普通',
  `salt` int(10) DEFAULT NULL COMMENT 'RT',
  `LastTime` int(10) DEFAULT NULL COMMENT '上一次登陆',
  `LastIp` int(10) DEFAULT NULL COMMENT '上一次登陆Ip',
  PRIMARY KEY (`Uid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='后台用的' AUTO_INCREMENT=1 ;

INSERT INTO `user_admin` (`Uid`, `UserName`, `Password`, `Purview`, `salt`, `LastTime`, `LastIp`) VALUES (NULL, 'ibank', 'bd99e43dda9768cac5d2b6d056287f78', '1', NULL, NULL, NULL);