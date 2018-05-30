/**
    表名: qq_classification
    描述: 商品类别
    建表时间: 2017-09-11
    作者: KingPHP

    class_id: 分类id
    parent_id: 上级分类id -1:为顶级分类
    class_name: 分类名称
 */

 CREATE TABLE  `qq_classification`
 (
    `class_id` INT unsigned NOT NULL auto_increment,
    `parent_id` INT NOT NULL DEFAULT -1,
    `class_name` VARCHAR(32) NOT NULL DEFAULT '',
    `other_name` VARCHAR(32) NOT NULL DEFAULT '',
    PRIMARY KEY(`class_id`),
    index(`parent_id`)
 )engine=innodb DEFAULT charset=utf8;