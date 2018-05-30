/**
    表名: qq_order
    描述: 用户订单
    建表时间: 2017-09-12
    作者: KingPHP

    order_no: 外部使用的订单号，格式: 20170912092734{3位随机数}{user_id}
    pay_type: 支付方式
              0: 未支付(默认)
              1: 微信支付
              2: 支付宝
              3: 网银
    pay_token: 第三方支付token
    total_money: 支付金额 单位分
    pay_money: 实际支付金额 单位分  pay_money=total_money-(优惠金额+积分抵扣)
    order_status: 订单状态
                  0: 下单未支付(默认)  待支付
                  1: 已支付
                  2: 支付失败
                  3: 支付成功  待发货
                  4: 发货 用户待收货
                  5: 用户已收货  待用户确认收货
                  6: 用户确认收货
                  7: 完成
    user_remark: 用户备注
    admin_remark: 管理员备注
 */
CREATE TABLE `qq_order`
(
  `order_id` INT unsigned NOT NULL auto_increment,
  `order_no` VARCHAR(32) NOT NULL DEFAULT '',
  `pay_type` TINYINT NOT NULL DEFAULT 0,
  `pay_token` VARCHAR(128) NOT NULL DEFAULT '',
  `user_id` INT unsigned NOT NULL DEFAULT 0,
  `address_id` INT unsigned NOT NULL DEFAULT 0,
  `total_money` INT unsigned NOT NULL DEFAULT 0,
  `coupon_id` INT unsigned NOT NULL DEFAULT 0,
  `point` INT unsigned NOT NULL DEFAULT 0,
  `pay_money` INT unsigned NOT NULL DEFAULT 0,
  `order_status` TINYINT NOT NULL DEFAULT 0,
  `user_remark` VARCHAR(255) NOT NULL DEFAULT '',
  `admin_remark` VARCHAR(255) NOT NULL DEFAULT '',
  `ctime` INT NOT NULL DEFAULT 0,
  PRIMARY KEY(`order_id`),
  index(`order_no`),
  FOREIGN KEY(`user_id`) REFERENCES qq_user(`user_id`) ON DELETE CASCADE
)engine=innodb DEFAULT charset=utf8;