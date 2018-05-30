/**
    表名: qq_user_address
    描述: 用户收货地址
    建表时间: 2017-09-12
    作者: KingPHP

 */
CREATE TABLE `qq_user_address`
(
  `address_id` INT unsigned NOT NULL auto_increment,
  `user_id` INT unsigned NOT NULL DEFAULT 0,
  `user_name` VARCHAR(32) NOT NULL DEFAULT '',
  `user_phone` VARCHAR(16) NOT NULL DEFAULT '',
  `address` VARCHAR(64) NOT NULL DEFAULT '',
  PRIMARY KEY(`address_id`),
  index(`user_name`),
  FOREIGN KEY(`user_id`) REFERENCES qq_user(`user_id`) ON DELETE CASCADE
)engine=innodb DEFAULT charset=utf8;