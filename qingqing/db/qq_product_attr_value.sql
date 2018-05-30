/**
    表名: qq_product_attr_value
    描述: 商品属性表与商品表的关联表
    建表时间: 2017-09-11
    作者: KingPHP


**/
CREATE TABLE `qq_product_attr_value`
(
  `product_id` INT unsigned NOT NULL DEFAULT 0,
  `attr_id` INT unsigned NOT NULL DEFAULT 0,
  `attr_value` VARCHAR(32) NOT NULL DEFAULT '',
  FOREIGN KEY(`product_id`) REFERENCES qq_product(`product_id`) ON DELETE CASCADE,
  FOREIGN KEY(`attr_id`) REFERENCES qq_product_attr(`attr_id`) ON DELETE CASCADE
)engine=innodb DEFAULT charset=utf8;