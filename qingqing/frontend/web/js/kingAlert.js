/**
 *  version: v1.0
 *  author: echo
 *  email: 360765409@qq.com
 *  time: 2017-09-06
 *  userage:
 *      <script>
             function kingAlert(msg) {
                KingAlert({
                    coverColor: 'rgba(0,0,0,0.36)',
                    title: msg,
                    okFun: function () {

                    },
                    cancelFun: null
                });
            }
         </script>
 * @param paramObj
 * {
 *      coverColor: rgba(0,0,0,0.36),
 *      title: '删除该商品吗？',
 *      okFun: function(){},
 *      cancelFun: function(){}
 * }
 * @constructor
 */
function KingAlert(paramObj) {
    this.coverColor = paramObj.coverColor == null ? 'rgba(0,0,0,0.36)':paramObj.coverColor;
    this.title = paramObj.title == null ? '删除该商品吗？' : paramObj.title;

    this.alertHtml = '<div class="king-alert-contain"><div class="king-alert">\
                        <div class="alert-title">\
                            <span>删除该商品吗2？</span>\
                            <span>X</span>\
                        </div>\
                        <div class="alert-body">\
                            <span class="btn-ok">确定</span>\
                            <span class="btn-cancel">取消</span>\
                            </div>\
                       </div></div>';

    $('body').append(this.alertHtml);
    $('.king-alert-contain').css({display: 'block',backgroundColor: this.coverColor});


    $('.alert-title span:first-child').text(this.title);
    $('.king-alert .alert-body .btn-ok').click(function () {
        if(paramObj.okFun == null) {
            $('.king-alert-contain').remove();
        } else
            paramObj.okFun();

    });
    $('.king-alert .alert-body .btn-cancel').click(function () {
        if(paramObj.cancelFun == null) {
            $('.king-alert-contain').remove();
        } else
            paramObj.cancelFun();
    });
    $('.king-alert .alert-title span:last-child').click(function () {
        if(paramObj.cancelFun == null) {
            $('.king-alert-contain').remove();
        } else
            paramObj.cancelFun();
    });
}