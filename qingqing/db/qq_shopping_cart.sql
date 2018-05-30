/**
    表名: qq_shopping_cart
    描述: 购物车
    建表时间: 2017-09-19
    作者: KingPHP

 */

 CREATE TABLE  `qq_shopping_cart`
 (
    `user_id` VARCHAR(32) NOT NULL DEFAULT '',
    `product_id` INT unsigned NOT NULL DEFAULT 0,
    `count` INT unsigned NOT NULL DEFAULT 0,
    `ctime` INT unsigned NOT NULL DEFAULT 0,
    KEY(`user_id`)
 )engine=innodb DEFAULT charset=utf8;