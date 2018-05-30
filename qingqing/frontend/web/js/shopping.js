/**
 * Created by xxh on 2017/9/19.
 */

/* 加入购物车 */
function toShoppingCart(product_id) {

    $.ajax({
        url: '?r=product/ajax-add-shopping',
        dataType: 'json',
        type: 'post',
        data: 'product_id='+product_id,
        success: function (resp) {
            if(resp.code == 1) {
                $('#shoppingcart').text(resp.data.num);
                KingAlert({
                    title: '成功加入购物车',
                });
            }
        },
        error: function (resp) {

        }
    });
}

$(document).ready(function () {
    $.ajax({
        url: '?r=product/cart-num',
        dataType: 'json',
        type: 'get',
        success: function (resp) {
            if(resp.code == 1) {
                $('#shoppingcart').text(resp.data.num);
            }
        },
        error: function (resp) {

        }
    });
});