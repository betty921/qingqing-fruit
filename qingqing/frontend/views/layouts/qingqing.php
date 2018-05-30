<?php
/**
 *  第一个布局文件
 */
$top_classes = \common\models\Classification::find()->where(['parent_id' => -1])->asArray()->all();
if(empty($this->params['top_class_id']))
    $top_class_id = -1;
else
    $top_class_id = $this->params['top_class_id'];
?>
<?php $this->beginPage() ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?= $this->title ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <link href="css/main.css" type="text/css" rel="stylesheet">
    <link href="css/kingSwape.css" type="text/css" rel="stylesheet">
    <link href="css/index.css" type="text/css" rel="stylesheet">
    <link href="css/product.css" type="text/css" rel="stylesheet">
    <link href="css/kingAlert.css" type="text/css" rel="stylesheet">
    <script src="js/jquery-2.0.3.min.js"></script>
    <script src="js/kingAlert.js"></script>
    <script src="js/kingSwape.js"></script>
    <script src="js/shopping.js"></script>
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
                    <li><a href="?r=user/login">[登录]</a> , <a href="?r=user/register">[注册有惊喜]</a></li>
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
                        <a href="?r=site"><img src="images/logo.svg"></a>
                    </div>
                    <ul class="nav-list">
                        <li><a href="?r=site">首页<br>Home</a><em class="<?= $top_class_id==-1?'em-selected':''?>"></em></li>
                        <?php foreach ($top_classes as $class):?>
                        <li><a href="?r=product/category&top_class_id=<?= $class['class_id']?>"><?= $class['class_name'] ?><br><?= $class['other_name'] ?></a><em class="<?= $class['class_id']==$top_class_id?'em-selected':'' ?>"></em></li>
                        <?php endforeach; ?>
                    </ul>
                </li>
                <li class="search-nav">
                    <div class="search-info">
                        <div class="search-component">
                            <form>
                                <input type="text" value="奇异果">
                                <input type="submit" value="">
                            </form>
                        </div>
                        <div class="search-hot">
                            <div class="li">热门:</div>
                            <div class="li"><a href="#">橙</a></div>
                            <div class="li"><a href="#">提子</a></div>
                            <div class="li"><a href="#">樱桃</a></div>
                            <div class="li"><a href="#">苹果</a></div>
                        </div>
                    </div>
                    <div class="shopping-cart-info">
                        <a href="?r=product/cart">
                            <img src="images/shopping-car2.png">
                            <span id="shoppingcart">0</span>
                        </a>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</header><!-- 头部导航栏 end -->

<?= $content ?>

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
<?php $this->endPage() ?>