/**
    表名: qq_coupon
    描述: 优惠券
         由后台管理人员生成
    建表时间: 2017-09-12
    作者: KingPHP

    coupon_value: 优惠券面值  单位分
    start_time: 起始时间, 时间戳   年月日
    end_time: 结束时间, 时间戳   年月日
    shop_limit: 购买限制, 即购买的金额满多少才能用  单位分
    coupon_imgs: 优惠券图片，如果有多张的话，每张用分号隔开
    coupon_total_count: 发放量
    coupon_used_count: 领取量
 */
CREATE TABLE `qq_coupon`
(
  `coupon_id` INT unsigned NOT NULL auto_increment,
  `coupon_name` VARCHAR(32) NOT NULL DEFAULT '',
  `coupon_value` INT NOT NULL DEFAULT 0,
  `coupon_desc` VARCHAR(255) NOT NULL DEFAULT '',
  `coupon_imgs` VARCHAR(2048) NOT NULL DEFAULT '',
  `start_time` INT NOT NULL DEFAULT 0,
  `end_time` INT NOT NULL DEFAULT 0,
  `shop_limit` INT NOT NULL DEFAULT 0,
  `coupon_total_count` INT NOT NULL DEFAULT 0,
  `coupon_used_count` INT NOT NULL DEFAULT 0,
  `remark` VARCHAR(255) NOT NULL DEFAULT '',
  `ctime` INT NOT NULL DEFAULT 0,
  PRIMARY KEY(`coupon_id`)
)engine=innodb DEFAULT charset=utf8;