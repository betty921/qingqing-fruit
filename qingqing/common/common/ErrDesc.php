<?php

namespace common\common;

class ErrDesc {
    const OK = 1;

    const ERR_PHONE_EXIST           = 100;      // 手机号码已注册
    const ERR_PARAM                 = 101;      // 参数错误
    const ERR_PHONE_FORMAT          = 102;      // 手机号码格式错误
    const ERR_CK_PWD                = 103;      // 两次密码不对
    const ERR_PHONE_NOT_EXIST       = 104;      // 手机号码不存在
    const ERR_VERIFY_CODE           = 105;      // 验证码错误
    const ERR_PHONE_PASSWD          = 106;      // 用户名或密码错误

    const ERR_SEND_SMS              = 200;      // 发送短信失败

    const ERR_MENU_CHILD            = 300;      // 目录有孩子,不能删除
    const ERR_NO_CHILD_MENU         = 301;      // 没有子目录

    // 资源相关
    const ERR_UPIMAGE               = 2000;     // 图片上传错误
    const ERR_FILE_NOT_EXIST        = 2001;     // 路径不存在
    const ERR_DOMAIN_NOT            = 2002;     // 域不允许
    const ERR_SENSITIVE_WORD        = 2003;     // 敏感词

    public static $DESC = [
        self::OK                    => 'ok',
        self::ERR_PHONE_EXIST       => '手机号码已注册',
        self::ERR_PARAM             => '参数错误',
        self::ERR_PHONE_FORMAT      => '手机号码格式错误',
        self::ERR_CK_PWD            => '两次密码不对',
        self::ERR_PHONE_NOT_EXIST   => '手机号码不存在',
        self::ERR_VERIFY_CODE       => '验证码错误',
        self::ERR_PHONE_PASSWD      => '用户名或密码错误',

        self::ERR_SEND_SMS          => '发送短信失败',

        self::ERR_MENU_CHILD        => '目录有孩子,不能删除',
        self::ERR_NO_CHILD_MENU     => '没有子目录',

        self::ERR_UPIMAGE           => '图片上传错误',
        self::ERR_FILE_NOT_EXIST    => '路径不存在',
        self::ERR_DOMAIN_NOT        => '域不允许',
        self::ERR_SENSITIVE_WORD    => '敏感词',
    ];
}