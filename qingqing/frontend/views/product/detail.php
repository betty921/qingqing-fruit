<?php
$this->title = $product['second_class_name'] . '-' . $product['product_name'];
?>
<link href="css/product_detail.css" rel="stylesheet">
<link href="css/froala_style.css" rel="stylesheet">
<style>
    table {
        border-collapse: collapse;
    }
    .product-page_o td{
        border-left: 1px solid #d8d8d8;
        border-collapse: collapse;
        padding-left: 15px;
    }
    .product-page_o tr {
        height: 40px;
        border-bottom: 1px solid #d8d8d8;
    }
    .product-page_o tr td:first-child {
        border-left: none;
    }
    .product-page_o tr:nth-child(odd) {
        background-color: rgb(247,247,247);
    }
</style>

<hr>

<!-- 商品详情 -->
<div class="page product-contain">
    <div class="product-base-info">
        <div class="product-local-nav">
            <a href="?r=site">首页</a>&nbsp;&gt;
            <a href="#"><?= $product['second_class_name'] ?></a>&nbsp;&gt;
            <span><?= $product['product_name'] ?></span>
        </div>
        <div class="product-base-info-show">
            <div class="product-imgs-show">
                <div class="product-pre-imgs">
                    <?php
                    $roll_imgs = explode(';', $product['product_gallery']);
                    ?>
                    <?php foreach ($roll_imgs as $img):?>
                    <div class="imgs-li"><img src="<?= $img ?>"></div>
                    <?php endforeach;?>
                </div>
                <div class="product-pre-imgs-show">
                    <img src="<?= $roll_imgs[0] ?>">
                </div>
            </div>
            <div class="product-main-show">
                <div class="product-main-region">
                    <div class="p-item product-name"><?= $product['product_name'] ?></div>
                    <div class="p-item product-desc"><?= $product['product_brief'] ?></div>
                    <div class="p-item product-price">
                        <div class="l-name">果园价</div>
                        <div class="l-value">￥<?= $product['origin_price']/100 ?></div>
                        <div class="qrcode1"><img src="images/vcode.png"></div>
                        <div class="qrcode2"><img src="images/api.png"></div>
                    </div>
                    <div class="p-item product-standard">
                        <div class="l-name">规格</div>
                        <div class="l-value"><?= $product['standard_name'] ?></div>
                    </div>
                    <div class="p-item product-distribution">
                        <div class="l-name">配送</div>
                        <div  class="l-value">
                            <select>
                                <option>上海</option>
                                <option>深圳</option>
                                <option>广州</option>
                            </select>
                            <span class="green">有货</span>
                        </div>
                    </div>
                    <div class="p-item product-amount">
                        <div class="l-name">数量</div>
                        <div class="l-value">
                            <div class="sub-add-combine">
                                <span class="sub">-</span>
                                <input type="text" id="product_amound" value="1">
                                <span class="add">+</span>
                            </div>
                        </div>
                    </div>
                    <div class="p-item product-btn">
                        <div class="l-name"></div>
                        <div class="l-value">
                            <input type="button" value="立即购买" name="buy" onclick="location.href='?r=product/cart'">
                            <input type="button" value="加入购物车" name="tocart"  onclick="toShoppingCart(<?= $product['product_id'] ?>);">
                        </div>
                    </div>
                </div>
                <div class="product-attr-region">
                    <div class="attr-li">
                        <div class="attr-li-name">甜度</div>
                        <div class="attr-li-value">
                            <?php for($i=1; $i<=$product['sweet']; $i++):?>
                                <div class="circle sweet-selected"></div>
                            <?php endfor;?>
                            <?php for(;$i<=5;$i++):?>
                                <div class="circle"></div>
                            <?php endfor;?>
                        </div>
                    </div>
                    <div class="attr-li">
                        <div class="attr-li-name">产地</div>
                        <div class="attr-li-value"><?= $product['origin_place_name'] ?></div>
                    </div>
                    <div class="attr-li">
                        <div class="attr-li-name">存储方法</div>
                        <div class="attr-li-value"><?= $product['storage_method'] ?></div>
                    </div>
                    <div class="attr-li">
                        <div class="attr-li-name">备注</div>
                        <div class="attr-li-value"><?= $product['product_remark'] ?></div>
                    </div>
                    <div class="attr-li">
                        <div class="attr-li-name">商品编号</div>
                        <div class="attr-li-value"><?= $product['product_no'] ?></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- 商品简介 -->
    <div class="product-detail-info">
        <div class="product-left">
            <div class="product-table-head">
                <div class="tabs">
                    <div class="tab tab-1 tab-selected" data-index="1">商品简介</div>
                    <div class="tab tab-2" data-index="2">顾客评论<span>(705)</span></div>
                </div>
                <div class="btn-cart">
                    <img src="images/shopping-car2.png">
                    <span onclick="toShoppingCart(<?= $product['product_id'] ?>);">加入购物车</span>
                </div>
            </div>
            <div class="product-table-body">
                <div class="product-page_o product-page-1">
                    <?= $product['product_detail'] ?>
                    <!--<div class="product-base-attr">
                        <div class="p-item-li">
                            <div class="p-item-li-name">产地</div>
                            <div class="p-item-li-value">新西兰</div>
                        </div>
                        <div class="p-item-li">
                            <div class="p-item-li-name">储藏方法</div>
                            <div class="p-item-li-value">0°及以上冷藏</div>
                        </div>
                        <div class="p-item-li">
                            <div class="p-item-li-name">水果甜度</div>
                            <div class="p-item-li-value">3星</div>
                        </div>
                    </div>
                    <div class="product-main-detail">
                        <img src="images/des1.jpg">
                        <img src="images/des2.jpg">
                        <img src="images/des3.jpg">
                    </div>-->
                </div>
                <div class="product-page_o product-page-2">
                    <div class="comment-statistics">
                        <div class="statistics-li good-comment-percent"><span>99%</span><br>好评度</div>
                        <div class="statistics-li comment-percents">
                            <div class="comment-pecents-li">
                                <div class="comment-pecents-li-name">不错哟</div>
                                <div class="comment-pecents-li-value">
                                    <span class="process-defalut"><span class="process" style="width: 99%"></span></span><span>99%</span>

                                </div>
                            </div>
                            <div class="comment-pecents-li">
                                <div class="comment-pecents-li-name">待提高</div>
                                <div class="comment-pecents-li-value">
                                    <span class="process-defalut"><span class="process" style="width: 1%"></span></span><span>1%</span>
                                </div>
                            </div>
                            <div class="comment-pecents-li">
                                <div class="comment-pecents-li-name">小失落
                                </div>
                                <div class="comment-pecents-li-value">
                                    <span class="process-defalut"><span class="process" style="width: 0%"></span></span><span>0%</span>
                                </div>
                            </div>
                        </div>
                        <div class="statistics-li comment-desc">
                            发布评价即可获5积分，<br>
                            APP上传图片并晒单即可获得5积分。
                        </div>

                    </div>
                    <div class="comment-contain">
                        <div class="comment-head">
                            <div class="comment-head-li">
                                <span class="radio radio-selected"></span>
                                <span>全部评论(705)</span>
                            </div>
                            <div class="comment-head-li">
                                <span class="radio"></span>
                                <span>不错哟(695)</span>
                            </div>
                            <div class="comment-head-li">
                                <span class="radio"></span>
                                <span>待提高(9)</span>
                            </div>
                            <div class="comment-head-li">
                                <span class="radio"></span>
                                <span>小失落(1)</span>
                            </div>
                        </div>
                        <div class="comment-content-contain">
                            <div class="comment-li-item">
                                <div class="comment-item-left">
                                    <img src="images/u_head.png">
                                    <span>137*******</span>
                                </div>
                                <div class="comment-item-right">
                                    <div class="c-item-li">
                                        <div class="c-item-li-name">评分</div>
                                        <div class="c-item-li-value"></div>
                                    </div>
                                    <div class="c-item-li">
                                        <div class="c-item-li-name">内容</div>
                                        <div class="c-item-li-value">此人没有写文字评论哦~</div>
                                    </div>
                                    <div class="c-item-li">
                                        <div class="c-item-li-name"></div>
                                        <div class="c-item-li-value ctime">2017-09-05 15:13:13</div>
                                    </div>
                                </div>
                            </div>
                            <div class="comment-li-item">
                                <div class="comment-item-left">
                                    <img src="images/u_head.png">
                                    <span>137*******</span>
                                </div>
                                <div class="comment-item-right">
                                    <div class="c-item-li">
                                        <div class="c-item-li-name">评分</div>
                                        <div class="c-item-li-value"></div>
                                    </div>
                                    <div class="c-item-li">
                                        <div class="c-item-li-name">内容</div>
                                        <div class="c-item-li-value">此人没有写文字评论哦~</div>
                                    </div>
                                    <div class="c-item-li">
                                        <div class="c-item-li-name"></div>
                                        <div class="c-item-li-value ctime">2017-09-05 15:13:13</div>
                                    </div>
                                </div>
                            </div>
                            <div class="comment-li-item">
                                <div class="comment-item-left">
                                    <img src="images/u_head.png">
                                    <span>137*******</span>
                                </div>
                                <div class="comment-item-right">
                                    <div class="c-item-li">
                                        <div class="c-item-li-name">评分</div>
                                        <div class="c-item-li-value"></div>
                                    </div>
                                    <div class="c-item-li">
                                        <div class="c-item-li-name">内容</div>
                                        <div class="c-item-li-value">此人没有写文字评论哦~</div>
                                    </div>
                                    <div class="c-item-li">
                                        <div class="c-item-li-name"></div>
                                        <div class="c-item-li-value ctime">2017-09-05 15:13:13</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="comment-footer">
                            <ul>
                                <li><a href="#"> &lt; 首页</a></li>
                                <li><a href="#">上一页</a></li>

                                <li><a class="paging paging-selected" href="#">1</a></li>
                                <li><a class="paging" href="#">2</a></li>
                                <li><a class="paging paging-selected" href="#">12</a></li>

                                <li><a href="#">下一页</a></li>
                                <li><a href="#">最后一页 &gt;</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
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
</div><!-- 商品详情 end -->


<script>
$('.imgs-li').mouseenter(function () {
    var children = $(this).children();
    $('.product-pre-imgs-show img').attr('src', children.attr('src'));

    var width = $(this).width();
    var height = $(this).height();

    console.log(width + " , " + height);

    $(this).append('<div class="cover"></div>');
    $('.cover').css('width', width);
    $('.cover').css('height', height);

});
$('.imgs-li').mouseleave(function () {
    $('.cover').remove();
})
</script>

<script>
    $('.sub').click(function () {
        var product_amound = $('#product_amound').val();
        if(product_amound == 1)
                return;
        product_amound --;
        $('#product_amound').val(product_amound);
    });
    $('.add').click(function () {
        var product_amound = $('#product_amound').val();
        product_amound ++;
        $('#product_amound').val(product_amound);
    });
</script>

<script>
$('.qrcode1').mouseenter(function () {
    $('.qrcode2').css('display', 'inline-block');
});
$('.qrcode2').mouseleave(function () {
    $('.qrcode2').css('display', 'none');
});
</script>

<!-- 页面切换 -->
<script>
$('.tab').click(function () {
    $('.tab').removeClass('tab-selected');
    $(this).addClass('tab-selected');

    var pageIndex = $(this).data('index');
    $('.product-page_o').css('display', 'none');
    $('.product-page-'+pageIndex).css('display', 'block');

});
</script>

<script>
$('.comment-head-li').click(function () {
    $('.radio').removeClass('radio-selected');
    var radio_obj = $(this).children()[0];
    $(radio_obj).addClass('radio-selected');

});
</script>

<!-- 监控页面滚动 -->
<script>
var product_head_top = $('.product-table-head').offset().top;
var product_head_width  = $('.product-table-head').width();
$(window).scroll(function () {
    var win_top = $(window).scrollTop();
    $('.product-table-head').removeClass('fixed');
    if(win_top >= product_head_top) {
        $('.product-table-head').addClass('fixed');
        $('.product-table-head').width(product_head_width);
    }
});
</script>
