/**
    表名: qq_distribution
    描述: 配送服务范围
    建表时间: 2017-09-11
    作者: KingPHP
 */
CREATE TABLE `qq_distribution`
(
  `distribution_id` INT unsigned NOT NULL auto_increment,
  `address` VARCHAR(32) NOT NULL DEFAULT '',
  `remark` VARCHAR(32) NOT NULL DEFAULT '',
  PRIMARY KEY(`distribution_id`)
)engine=innodb DEFAULT charset=utf8;