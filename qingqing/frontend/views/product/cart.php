

<link href="css/product_detail.css" rel="stylesheet">
<link href="css/order_status.css" rel="stylesheet">
<link href="css/cart.css" type="text/css" rel="stylesheet">


<hr>

<div class="body-contain">
    <div class="top">
        <div class="cart-title">
            <div class="cart-title-desc">
                <img src="images/btn-cart.png">
                <span>我的购物车</span>
            </div>
            <a href="#">继续逛逛 &gt;</a>
        </div>
        <table class="cart-table" cellpadding="0" cellspacing="0">
            <tr>
                <th class="p-img"></th>
                <th class="p-name">商品</th>
                <th class="p-status">规格</th>
                <th class="p-one-price">单价(元)</th>
                <th class="p-mount">数量</th>
                <th class="p-price">原价(元)</th>
                <th class="p-op">操作</th>
            </tr>
            <?php foreach ($products as $product):?>
            <tr>
                <td><a href="?r=product/detail&product_id=<?= $product['product_id'] ?>"><img src="<?= explode(';', $product['product_gallery'])[0] ?>"></a></td>
                <td><a href="?r=product/detail&product_id=<?= $product['product_id'] ?>"><?= $product['product_name'] ?></a></td>
                <td><?= $product['standard_name'] ?></td>
                <td class="green">￥<?= $product['origin_price'] ?></td>
                <td>
                    <div class="sub-add-combine" style="display: inline-block">
                        <span class="sub">-</span>
                        <input type="text" name="product_amound" value="<?= $product['count'] ?>">
                        <span class="add">+</span>
                    </div>
                </td>
                <td class="green">￥<?= $product['total_price']/100 ?></td>
                <td><a href="javascript:" onclick="DeleteAlert(<?= $product['product_id'] ?>);">删除</a></td>
            </tr>
            <?php endforeach;?>
        </table>
        <div class="to-pay">
            <span>已选择 <em><?= count($products) ?>件</em> 商品 | 订单金额 <em>￥<?= $total_money/100 ?></em></span>
            <span class="to-pay-btn">去结算</span>
        </div>
    </div>
    <div class="bottom"></div>
</div>



<script>
    $('.sub').click(function () {
        var product_amound = $($(this).siblings()[0]).val();
        if(product_amound == 1)
            return;
        product_amound --;
        $($(this).siblings()[0]).val(product_amound);
    });
    $('.add').click(function () {
        var product_amound = $($(this).siblings()[1]).val();
        product_amound ++;
        $($(this).siblings()[1]).val(product_amound);
    });
</script>

<script>
function DeleteAlert(product_id) {
    $('.delete-alert-combine').css('display', 'block');
    KingAlert({
        title: '删除该商品吗？',
        okFun: function () {
            location.href = '?r=product/del-cart&product_id=' + product_id;
        }
    });
}
function Cancel() {
    $('.delete-alert-combine').css('display', 'none');
}
</script>
