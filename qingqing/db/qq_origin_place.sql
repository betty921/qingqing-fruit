/**
    表名: qq_origin_place
    描述: 产地
    建表时间: 2017-09-14
    作者: KingPHP
 */
CREATE TABLE `qq_origin_place`
(
  `origin_place_id` INT unsigned NOT NULL auto_increment,
  `origin_place_name` VARCHAR(32) NOT NULL DEFAULT '',
  PRIMARY KEY(`origin_place_id`)
)engine=innodb DEFAULT charset=utf8;