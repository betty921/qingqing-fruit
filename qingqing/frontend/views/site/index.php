<?php
$this->title = '青青果园';
?>

<div class="lunbo">
    <!-- 轮播组件 -->
    <div class="swape_box">
        <div class="imgs">
            <?php foreach ($roll_images_src as $value):?>
            <div class="img">
                <a href="<?= $value['url'] ?>">
                    <img src="<?= $value['img'] ?>" alt="1">
                </a>
            </div>
            <?php endforeach;?>
        </div>
        <div class="left btn">&lt;</div>
        <div class="right btn">&gt;</div>
        <div class="circles">
        </div>
    </div><!-- end 轮播组件 -->
</div>

<div class="tuijian page">
    <?php foreach ($tuijian as $value):?>
    <div class="tuijian-li">
        <a href="<?= $value['url'] ?>"><img src="<?= $value['img'] ?>"></a>
    </div>
    <?php endforeach;?>
</div>

<!-- 家庭量贩 -->
<div class="page product-page">
    <div class="product-page-head">
        <div class="product-category"><span>家</span>庭量贩</div>
        <div class="product-more"><a href="#">更多&gt;</a></div>
    </div>
    <!-- 商品陈列 -->
    <div class="product-lists">
        <?php foreach ($family as $product):?>
        <div class="product-li">
            <div class="product-li-img">
                <a href="?r=product/detail&product_id=<?= $product['product_id'] ?>"><img src="<?= explode(';', $product['product_gallery'])[0] ?>"></a>
            </div>
            <div class="product-li-info">
                <div class="product-li-main">
                    <span class="product-name"><?= $product['product_name'] ?></span><br><span class="product-price">￥<?= $product['origin_price']/100?>/<?= $product['standard_name'] ?></span>
                </div>
                <div class="product-li-shoppingcart">
                    <a href="javascript:void(0);"><img src="images/shopping-car3.png"  onclick="toShoppingCart(<?= $product['product_id'] ?>);"></a>
                </div>
            </div>
        </div>
        <?php endforeach;?>

    </div><!-- 商品陈列 end-->
</div>


<!-- 全球鲜果 -->
<div class="page product-page">
    <div class="product-page-head">
        <div class="product-category"><span>全</span>球鲜果</div>
        <div class="product-more"><a href="#">更多&gt;</a></div>
    </div>
    <!-- 商品陈列 -->
    <div class="product-lists">
        <?php foreach ($freshFruit as $product):?>
            <div class="product-li">
                <div class="product-li-img">
                    <a href="?r=product/detail&product_id=<?= $product['product_id'] ?>"><img src="<?= explode(';', $product['product_gallery'])[0] ?>"></a>
                </div>
                <div class="product-li-info">
                    <div class="product-li-main">
                        <span class="product-name"><?= $product['product_name'] ?></span><br><span class="product-price">￥<?= $product['origin_price']/100?>/<?= $product['standard_name'] ?></span>
                    </div>
                    <div class="product-li-shoppingcart">
                        <a href="javascript:void(0);"><img src="images/shopping-car3.png" onclick="toShoppingCart(<?= $product['product_id'] ?>);"></a>
                    </div>
                </div>
            </div>
        <?php endforeach;?>
    </div><!-- 商品陈列 end-->
</div>

<!-- 生鲜美食 -->
<div class="page product-page">
    <div class="product-page-head">
        <div class="product-category"><span>生</span>鲜美食</div>
        <div class="product-more"><a href="#">更多&gt;</a></div>
    </div>
    <!-- 商品陈列 -->
    <div class="product-lists">
        <?php foreach ($freshFood as $product):?>
            <div class="product-li">
                <div class="product-li-img">
                    <a href="?r=product/detail&product_id=<?= $product['product_id'] ?>"><img src="<?= explode(';', $product['product_gallery'])[0] ?>"></a>
                </div>
                <div class="product-li-info">
                    <div class="product-li-main">
                        <span class="product-name"><?= $product['product_name'] ?></span><br><span class="product-price">￥<?= $product['origin_price']/100?>/<?= $product['standard_name'] ?></span>
                    </div>
                    <div class="product-li-shoppingcart">
                        <a href="javascript:void(0);"><img src="images/shopping-car3.png" onclick="toShoppingCart(<?= $product['product_id'] ?>);"></a>
                    </div>
                </div>
            </div>
        <?php endforeach;?>
    </div><!-- 商品陈列 end-->
</div>

<!-- 广告 -->
<div class="page ad">
    <a href="<?= $adv[0]['url'] ?>"><img src="<?= $adv[0]['img'] ?>"></a>
</div>

<!-- 礼品卡券 -->
<div class="page product-page">
    <div class="product-page-head">
        <div class="product-category"><span>礼</span>品卡券</div>
        <div class="product-more"><a href="#">更多&gt;</a></div>
    </div>
    <!-- 商品陈列 -->
    <div class="product-lists">
        <?php foreach ($gift as $product):?>
            <div class="product-li">
                <div class="product-li-img">
                    <a href="?r=product/detail&product_id=<?= $product['product_id'] ?>"><img src="<?= explode(';', $product['product_gallery'])[0] ?>"></a>
                </div>
                <div class="product-li-info">
                    <div class="product-li-main">
                        <span class="product-name"><?= $product['product_name'] ?></span><br><span class="product-price">￥<?= $product['origin_price']/100?>/<?= $product['standard_name'] ?></span>
                    </div>
                    <div class="product-li-shoppingcart">
                        <a href="javascript:void(0)"><img src="images/shopping-car3.png"  onclick="toShoppingCart(<?= $product['product_id'] ?>);"></a>
                    </div>
                </div>
            </div>
        <?php endforeach;?>
    </div><!-- 商品陈列 end-->
</div>



<script>
    KingSwape({time: 2000});
</script>
