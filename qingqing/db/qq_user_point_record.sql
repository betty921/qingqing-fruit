/**
    表名: qq_user_point_record
    描述: 用户积分记录表
    建表时间: 2017-09-12
    作者: KingPHP

    point: 正数为积分增加: 购买商品时, 由购买的金额转化 1rmb=1point
           负数为积分减少: 购买商品时抵押   100point=1rmb
 */
CREATE TABLE `qq_user_point_record`
(
  `user_id` INT unsigned NOT NULL DEFAULT 0,
  `order_id` INT unsigned NOT NULL DEFAULT 0,
  `point` INT unsigned NOT NULL DEFAULT 0,
  `ctime` INT NOT NULL DEFAULT 0,
  FOREIGN KEY(`user_id`) REFERENCES qq_user(`user_id`) ON DELETE CASCADE
)engine=innodb DEFAULT charset=utf8;