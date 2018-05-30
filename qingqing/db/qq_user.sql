/**
    表名: qq_user
    描述: 存储用户信息
    建表时间: 2017-09-11
    作者: KingPHP

   user_id: 用户id
   wx_token: 微信登录token
   third_token: 除微信外第三方登录
   third_type: 第三方登录的类型
                0: 未知(默认)
                1: QQ登录
                2: 微博
   user_name: 用户真实姓名
   user_gender: 用户性别
                1: 为男
                2: 为女
                0: 未知(默认)
   user_birthday: 用户出生日期，格式为: 1992-01-20
   user_point: 用户积分
   user_privilege: 用户权限
                  1: 最高权限
                  10: 普通用户(默认)
   user_vip: 用户等级
**/

CREATE TABLE `qq_user`
(
  `user_id` INT unsigned NOT NULL auto_increment,
  `wx_token` VARCHAR(128) NOT NULL DEFAULT '',
  `third_token` VARCHAR(128) NOT NULL DEFAULT '',
  `third_type` TINYINT NOT NULL DEFAULT 0,
  `user_name` VARCHAR(32) NOT NULL DEFAULT '',
  `user_phone` VARCHAR(16) NOT NULL DEFAULT '',
  `user_passwd` VARCHAR(64) NOT NULL DEFAULT '',
  `user_email` VARCHAR(32) NOT NULL DEFAULT '',
  `user_nickname` VARCHAR(32) NOT NULL DEFAULT '',
  `user_icon` VARCHAR(256) NOT NULL DEFAULT '',
  `user_gender` TINYINT NOT NULL DEFAULT 0,
  `user_birthday` VARCHAR(16) NOT NULL DEFAULT '',
  `user_point` INT unsigned NOT NULL DEFAULT 0,
  `user_privilege` TINYINT unsigned NOT NULL DEFAULT 10,
  `user_vip` TINYINT unsigned NOT NULL DEFAULT 0,
  `register_time` INT unsigned NOT NULL DEFAULT 0,
   PRIMARY KEY(`user_id`),
   KEY(`user_phone`)
)engine=innodb default charset=utf8;