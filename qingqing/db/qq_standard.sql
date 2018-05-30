/**
    表名: qq_standard
    描述: 商品规格  1盒 ...
    建表时间: 2017-09-14
    作者: KingPHP
 */
CREATE TABLE `qq_standard`
(
  `standard_id` INT unsigned NOT NULL auto_increment,
  `standard_name` VARCHAR(32) NOT NULL DEFAULT '',
  PRIMARY KEY(`standard_id`)
)engine=innodb DEFAULT charset=utf8;