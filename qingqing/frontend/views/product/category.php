<?php
$this->title = $top_class['class_name'];
$this->params['top_class_id'] = $top_class['class_id'];
?>
<link href="css/product_detail.css" rel="stylesheet">
<link href="css/product_category.css" rel="stylesheet">

<hr>

<div class="page product-contain">
    <div class="category-contain">
        <div class="category-row">
            <div class="category-1">品类</div>
            <div class="category-2">
                <div class="category-all"><a href="#">全部</a></div>
                <div class="categorys">
                    <?php foreach ($second_classes as $class):?>
                    <a href="#"><?= $class['class_name'] ?></a>
                    <?php endforeach;?>
                </div>
            </div>
        </div>
        <div class="category-row">
            <div class="category-1">产地</div>
            <div class="category-2">
                <div class="category-all"><a href="#">全部</a></div>
                <div class="categorys">
                    <?php foreach ($origin_places as $place):?>
                    <a href="#"><?= $place['origin_place_name'] ?></a>
                    <?php endforeach;?>

                </div>
            </div>
        </div>
        <div class="category-row">
            <div class="category-1">排序</div>
            <div class="category-2 sort">
                <div class="category-all"><a href="#">默认</a></div>
                <div class="categorys">
                    <a href="#">价格从低到高</a>
                    <a href="#">价格从高到低</a>
                </div>
            </div>
        </div>
    </div>

    <div class="product-detail-info">
        <div class="product-left">
            <div class="categor-contain-products">
                <?php foreach ($products as $product):?>
                <div class="category-product-info">
                    <div class="product-image">
                        <a href="?r=product/detail&product_id=<?= $product['product_id']?>"><img src="<?= explode(';', $product['product_gallery'])[0] ?>"></a>
                    </div>
                    <div class="product-name-info">
                        <span><?= $product['product_name'] ?></span>
                        <span>￥<?= $product['origin_price']/100 ?></span>
                    </div>
                    <div class="buy">
                        <span><?= $product['standard_name'] ?></span>
                        <img src="images/shopping-car3.png" onclick="toShoppingCart(<?= $product['product_id'] ?>);">
                    </div>
                </div>
                <?php endforeach;?>
            </div>
        </div>
        <div class="product-right">
            <div class="title">最近浏览过</div>
            <div class="recent-view-item">
                <a href="#">
                    <div class="p-img"><img src="images/view1.jpg"></div>
                    <div class="p-desc">
                        <span>新西兰皇后红玫瑰苹果</span>
                        <span>￥99.00 / 20个</span>
                    </div>
                </a>
            </div>
            <div class="recent-view-item">
                <a href="#">
                    <div class="p-img"><img src="images/view2.jpg"></div>
                    <div class="p-desc">
                        <span>新西兰皇后红玫瑰苹果</span>
                        <span>￥99.00 / 20个</span>
                    </div>
                </a>
            </div>
            <div class="recent-view-item">
                <a href="#">
                    <div class="p-img"><img src="images/view3.jpg"></div>
                    <div class="p-desc">
                        <span>新西兰皇后红玫瑰苹果</span>
                        <span>￥99.00 / 20个</span>
                    </div>
                </a>
            </div>
            <div class="recent-view-item">
                <a href="#">
                    <div class="p-img"><img src="images/view1.jpg"></div>
                    <div class="p-desc">
                        <span>新西兰皇后红玫瑰苹果</span>
                        <span>￥99.00 / 20个</span>
                    </div>
                </a>
            </div>
        </div>
    </div>
</div>

