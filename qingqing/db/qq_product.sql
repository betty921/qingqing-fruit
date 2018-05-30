/**
    表名: qq_product
    描述: 商品
    建表时间: 2017-09-11
    作者: KingPHP

    top_class_id: 第一级分类
    second_class_id: 第二级分类id
    product_type_tag: 商品首页分类标记
                      1: 家庭量贩
                      2: 全球鲜果
                      3: 生鲜美食
                      4: 礼品卡券
    origin_place_id: 产地
    product_no: 商品编号
    product_name: 商品名称
    product_brief: 商品简单描述
    product_gallery: 商品展示图片url, 多张图片使用分号(;)隔开
    origin_price: 商品原价, 单位分
    discount_price: 商品折扣价, 单位分
    standard_id: 商品规格
    sweet: 甜度 0 ~ 5
    storage_method: 存储方式
    product_remark: 商品备注
 */
CREATE TABLE `qq_product`
(
  `product_id` INT unsigned NOT NULL auto_increment,
  `top_class_id` INT unsigned NOT NULL DEFAULT 0,
  `second_class_id` INT unsigned NOT NULL DEFAULT 0,
  `product_type_tag` INT NOT NULL DEFAULT 1,
  `origin_place_id` INT unsigned NOT NULL DEFAULT 0,
  `standard_id` VARCHAR(64) NOT NULL DEFAULT '',
  `product_no` VARCHAR(64) NOT NULL DEFAULT '',
  `product_name` VARCHAR(64) NOT NULL DEFAULT '',
  `product_brief` VARCHAR(64) NOT NULL DEFAULT '',
  `product_gallery` VARCHAR(1024) NOT NULL DEFAULT '',
  `origin_price` INT NOT NULL DEFAULT 0,
  `discount_price` INT NOT NULL DEFAULT 0,
  `product_detail` VARCHAR(4096) NOT NULL DEFAULT '',
  `product_qr_code` VARCHAR(1024) NOT NULL DEFAULT '',
  `sweet` TINYINT NOT NULL DEFAULT 0,
  `storage_method` VARCHAR(32) NOT NULL DEFAULT '',
  `product_remark` VARCHAR(32) NOT NULL DEFAULT '',
  `ctime` INT NOT NULL DEFAULT 0,
  PRIMARY KEY(`product_id`),
  FOREIGN KEY(`top_class_id`) REFERENCES qq_classification(`class_id`) ON DELETE CASCADE
)engine=innodb DEFAULT charset=utf8;