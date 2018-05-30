/**
    表名: qq_advertisement
    描述: 广告
    建表时间: 2017-09-18
    作者: KingPHP

    position: 广告位置
              1: 首页轮播
              2: 首页推荐位
              3: 首页中部横幅广告
    img: 图片
    url: 对应的链接
    desc: 描述
    order: 排序, 值越小越排在前面
 */
CREATE TABLE `qq_advertisement`
(
  `advertisement_id` INT unsigned NOT NULL auto_increment,
  `position` INT NOT NULL DEFAULT 0,
  `img` VARCHAR(1024) NOT NULL DEFAULT '',
  `url` VARCHAR(1024) NOT NULL DEFAULT '',
  `desc` VARCHAR(32) NOT NULL DEFAULT '',
  `order` INT NOT NULL DEFAULT 10,
  PRIMARY KEY(`advertisement_id`),
  index(`position`)
)engine=innodb DEFAULT charset=utf8;