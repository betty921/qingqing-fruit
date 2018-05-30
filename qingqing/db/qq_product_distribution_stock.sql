/**
    表名: qq_product_distribution_stock
    描述: 每个商品在不同配送区的库存
    建表时间: 2017-09-11
    作者: KingPHP
 */
CREATE TABLE `qq_product_distribution_stock`
(
  `product_id` INT unsigned NOT NULL DEFAULT 0,
  `distribution_id` INT unsigned NOT NULL DEFAULT 0,
  `stock` INT unsigned NOT NULL DEFAULT 0,
  FOREIGN KEY(`product_id`) REFERENCES qq_product(`product_id`) ON DELETE CASCADE,
  FOREIGN KEY(`distribution_id`) REFERENCES qq_distribution(`distribution_id`) ON DELETE CASCADE
)engine=innodb DEFAULT charset=utf8;