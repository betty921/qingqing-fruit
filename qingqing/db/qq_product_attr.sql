/**
    表名: qq_product_attr
    描述: 商品属性, 如: 甜度、产地等
    建表时间: 2017-09-11
    作者: KingPHP


**/
CREATE TABLE `qq_product_attr`
(
  `attr_id` INT unsigned NOT NULL auto_increment,
  `attr_name` VARCHAR(32) NOT NULL DEFAULT '',
  PRIMARY KEY(`attr_id`)
)engine=innodb DEFAULT charset=utf8;