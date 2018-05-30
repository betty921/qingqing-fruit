<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>确认订单</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <link href="css/main.css" type="text/css" rel="stylesheet">
    <link href="css/order_status.css" rel="stylesheet">
    <link href="css/component.css" rel="stylesheet">
    <link href="css/order.css" rel="stylesheet">
</head>
<body>
<!-- 头部导航栏 -->
<header>
    <div class="nav-state">
        <div class="page nav-stat-info">
            <div class="nav-left">
                <div class="li">上海</div>
                <div class="li">百包邮（环郊内）</div>
                <div class="li xyd"><a href="#">星夜达</a></div>
            </div>
            <div class="nav-right">
                <ul>
                    <li><a href="#">[登录]</a> , <a href="#">[注册有惊喜]</a></li>
                    <li>|</li>
                    <li>果园公告</li>
                    <li>|</li>
                    <li><a href="#">兑换卡券</a></li>
                    <li>|</li>
                    <li><img class="icon" src="images/phone-icon.png"/>手机果园</li>
                    <li>|</li>
                    <li><img class="icon" src="images/kefu-icon.png"/>400-8888-6666</li>
                </ul>
            </div>
        </div>
    </div>
    <div class="nav-nav">
        <div class="page">
            <ul class="nav-nav-info">
                <li class="log-info">
                    <div class="logo">
                        <a href="#"><img src="images/logo.svg"></a>
                    </div>
                </li>
                <li class="shopping-status">
                    <div class="status-img">
                        <span class="status-flag status-now">1</span>
                        <span class="line"></span>
                        <span class="status-flag status-now">2</span>
                        <span class="line"></span>
                        <span class="status-flag">3</span>
                    </div>
                    <div class="status-desc">
                        <span class="status-desc-now">我的购物车</span>
                        <span class="line"></span>
                        <span class="status-desc-now">确认订单</span>
                        <span class="line"></span>
                        <span>成功提交订单</span>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</header><!-- 头部导航栏 end -->

<hr>


<div class="body-contain">
    <div class="top">
        <div class="cart-title">
            <div class="cart-title-desc">
                <img src="images/btn-cart.png">
                <span>填写并核对订单信息</span>
            </div>
        </div>

        <div class="order-item">
            <div class="order-item-title">
                <span>收货人信息</span>
                <a href="#">新增收货人地址</a>
            </div>
            <div class="order-item-desc address-info">
                <div class="address-one">
                    <span class="king-btn king-btn-selected">陈 广东</span> <span class="receiver-name">陈</span> <span class="receiver-phone">13755639263</span> <span class="receive-addr">广东省深圳市福田区新洲村</span> <span class="addr-op"><a href="#">编辑</a><a href="#">删除</a></span>
                </div>

                <div class="address-one">
                    <span class="king-btn">陈 广东</span> <span class="receiver-name">陈</span> <span class="receiver-phone">13755639263</span> <span class="receive-addr">广东省深圳市福田区新洲村</span> <span class="addr-op"><a href="#">编辑</a><a href="#">删除</a></span>
                </div>

            </div>
        </div>

        <div class="order-item">
            <div class="order-item-title">
                <span>支付方式</span>
            </div>
            <div class="order-item-desc">
                <span class="king-btn">在线支付</span>
            </div>
        </div>

        <div class="order-item">
            <div class="order-item-title">
                <span>配送信息</span>
                <a href="#">修改购物车</a>
            </div>
            <div class="order-item-desc">
                <div class="distribution-info">
                    <div class="distribution-info-group">
                        <div class="group-item">
                            <div class="item-label">配送时间</div>
                            <div class="item-value"><span>2017-09-08 09:00-18:00</span><a href="#" class="edit">修改</a></div>
                        </div>
                        <div class="group-item">
                            <div class="item-label">发票信息</div>
                            <div class="item-value"><span>个人</span><a href="#" class="edit">修改</a></div>
                        </div>
                        <div class="group-item">
                            <div class="item-label">备注信息</div>
                            <div class="item-value"><textarea class="remark"></textarea></div>
                        </div>
                        <div class="group-item">
                            <div class="item-label">运费</div>
                            <div class="item-value distribution-fee">￥0.00</div>
                        </div>
                    </div>
                    <div class="distribution-product">
                        <div class="group-item">
                            <div class="p-litter-img"><img src="images/l1.jpg"></div>
                            <div class="p-simple-desc">
                                <div class="p-name">花好月圆礼盒（含月饼）</div>
                                <div class="p-price-amount">
                                    <span>￥118.00 / 1盒</span>
                                    <span>x 3</span>
                                </div>
                            </div>
                        </div>
                        <div class="group-item">
                            <div class="p-litter-img"><img src="images/fp1.jpg"></div>
                            <div class="p-simple-desc">
                                <div class="p-name">花好月圆礼盒（含月饼）</div>
                                <div class="p-price-amount">
                                    <span>￥118.00 / 1盒</span>
                                    <span>x 3</span>
                                </div>
                            </div>
                        </div>
                        <div class="group-item">
                            <div class="p-litter-img"><img src="images/fp1.jpg"></div>
                            <div class="p-simple-desc">
                                <div class="p-name">花好月圆礼盒（含月饼）</div>
                                <div class="p-price-amount">
                                    <span>￥118.00 / 1盒</span>
                                    <span>x 3</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="order-item">
            <div class="order-item-title">
                <span>使用积分/优惠券</span>
            </div>
            <div class="order-item-desc">
                <div class="jifen">
                    最多可抵扣￥<span>0.00</span>元，已抵扣<input type="text" value="0.00">元
                </div>
                <div class="coupon">
                    抵扣码及优惠券:<span>15</span>元优惠券 <a href="#" class="edit">选择</a>
                </div>
            </div>
        </div>

        <div class="order-item">
            <div class="order-list">
                <span class="list-name">商品总金额:</span>
                <span class="list-value">￥1.90</span>
            </div>
            <div class="order-list">
                <span class="list-name">运费:</span>
                <span class="list-value">￥0.9</span>
            </div>
            <div class="order-list">
                <span class="list-name">商品减免:</span>
                <span class="list-value">￥1078.90</span>
            </div>
            <div class="order-list">
                <span class="list-name">积分抵扣:</span>
                <span class="list-value">￥1078.90</span>
            </div>
            <div class="order-list">
                <span class="list-name">优惠券抵扣:</span>
                <span class="list-value">￥1078.90</span>
            </div>
            <div class="order-list">
                <span class="list-name">其他抵扣:</span>
                <span class="list-value">￥1078.90</span>
            </div>
        </div>

        <div class="submit-order">
            <span>应付金额</span> <span class="total-price">￥1063.90</span> <span class="submit-btn">提交订单</span>
        </div>
    </div>

</div>

<!-- 特色 -->
<div class="page footer margin">
    <div class="footer-feature">
        <div class="feature-li l1"></div>
        <div class="feature-li l2"></div>
        <div class="feature-li l3"></div>
        <div class="feature-li l4"></div>
    </div>
</div>

<div class="page footer">
    <div class="footer-info">
        <div class="info-li tel">
            <div class="logo"><img src="images/logo.svg"></div><br>
            <img src="images/tel.png"><br>
            电话客服 09:00 - 21:00<br>
            在线客服 08:00 - 24:00<br>
        </div>
        <div class="info-li erweima">
            <div class="weixin"><img src="images/weixin.jpg"><br><span>青青果园官方微信</span></div>
            <div class="app"><img src="images/app.jpg"><br><span>青青果园APP</span></div>
        </div>
        <div class="info-li service">
            <ul>
                <li>购物指南</li>
                <li><a href="#">新用户注册</a></li>
                <li><a href="#">在线下单</a></li>
                <li><a href="#">支付方式</a></li>
            </ul>
            <ul>
                <li>配送说明</li>
                <li><a href="#">运费说明</a></li>
                <li><a href="#">运费方式</a></li>
                <li><a href="#">发票说明</a></li>
            </ul>
            <ul>
                <li>售后服务</li>
                <li><a href="#">退换货规则</a></li>
                <li><a href="#">服务保障承若</a></li>
                <li><a href="#">验货与签收</a></li>
            </ul>
            <ul>
                <li>企业服务</li>
                <li><a href="#">企业订购</a></li>
                <li><a href="#">公司简介</a></li>
                <li><a href="#">定制专区</a></li>
            </ul>
        </div>
    </div>
</div>

<div class="page footer">
    <div class="copyright"><span>版权所有 ©2017上海天天鲜果电子商务有限公司  保留所有权利 | 沪ICP备12042163</span></div>
</div>

</body>
</html>