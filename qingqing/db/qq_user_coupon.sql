/**
    表名: qq_user_coupon
    描述: 用户领取优惠券
    建表时间: 2017-09-12
    作者: KingPHP

    coupon_status: 使用状态:
                  0: 已领取未使用(默认)
                  1: 已经使用
    ctime: 领取时间
 */
CREATE TABLE `qq_user_coupon`
(
  `user_id` INT unsigned NOT NULL DEFAULT 0,
  `coupon_id` INT unsigned NOT NULL DEFAULT 0,
  `coupon_status` TINYINT NOT NULL DEFAULT 0,
  `ctime` INT NOT NULL DEFAULT 0,
  FOREIGN KEY(`user_id`) REFERENCES qq_user(`user_id`) ON DELETE CASCADE,
  FOREIGN KEY(`coupon_id`) REFERENCES qq_coupon(`coupon_id`) ON DELETE CASCADE
)engine=innodb DEFAULT charset=utf8;