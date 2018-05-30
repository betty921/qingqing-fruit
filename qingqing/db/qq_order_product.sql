/**
    表名: qq_order_product
    描述: 用户购买的商品
    建表时间: 2017-09-12
    作者: KingPHP

    product_price: 商品购买时的价格 单位分

 */
CREATE TABLE `qq_order_product`
(
  `order_id` INT unsigned NOT NULL DEFAULT 0,
  `product_id` INT unsigned NOT NULL DEFAULT 0,
  `product_price` INT NOT NULL DEFAULT 0,
  `product_amount` INT NOT NULL DEFAULT 0,
   FOREIGN KEY(`order_id`) REFERENCES qq_order(`order_id`) ON DELETE CASCADE,
   FOREIGN KEY(`product_id`) REFERENCES qq_product(`product_id`) ON DELETE CASCADE
)engine=innodb DEFAULT charset=utf8;