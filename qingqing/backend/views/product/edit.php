<?php
$this->params['main_title'] = '商品管理';
$this->params['sub_title'] = '商品编辑';
$this->params['page'] = 'navProduct';
$this->params['active'] = 4;

$productTypeArray = [
    1=>'家庭量贩',
    2=>'全球鲜果',
    3=>'生鲜美食',
    4=>'礼品卡券',
];

?>

<link rel="stylesheet" href="wysiwyg-edit/css/font-awesome.min.css">
<link rel="stylesheet" href="wysiwyg-edit/css/froala_editor.css">
<link rel="stylesheet" href="wysiwyg-edit/css/froala_style.css">
<link rel="stylesheet" href="wysiwyg-edit/css/plugins/code_view.css">
<link rel="stylesheet" href="wysiwyg-edit/css/plugins/draggable.css">
<link rel="stylesheet" href="wysiwyg-edit/css/plugins/colors.css">
<link rel="stylesheet" href="wysiwyg-edit/css/plugins/emoticons.css">
<link rel="stylesheet" href="wysiwyg-edit/css/plugins/image_manager.css">
<link rel="stylesheet" href="wysiwyg-edit/css/plugins/image.css">
<link rel="stylesheet" href="wysiwyg-edit/css/plugins/line_breaker.css">
<link rel="stylesheet" href="wysiwyg-edit/css/plugins/table.css">
<link rel="stylesheet" href="wysiwyg-edit/css/plugins/char_counter.css">
<link rel="stylesheet" href="wysiwyg-edit/css/plugins/video.css">
<link rel="stylesheet" href="wysiwyg-edit/css/plugins/fullscreen.css">
<link rel="stylesheet" href="wysiwyg-edit/css/plugins/file.css">
<link rel="stylesheet" href="wysiwyg-edit/css/plugins/quick_insert.css">
<link rel="stylesheet" href="wysiwyg-edit/css/plugins/help.css">
<link rel="stylesheet" href="wysiwyg-edit/css/third_party/spell_checker.css">
<link rel="stylesheet" href="wysiwyg-edit/css/plugins/special_characters.css">
<link rel="stylesheet" href="wysiwyg-edit/css/codemirror.min.css">

<style>
    #editor2 {
        width: 81%;
        min-height: 200px;
        margin: auto;
        text-align: left;
    }
    img {
        width: 200px;
    }
</style>

<p class="bg-danger" style="color: red"><?= empty($errmsg)?'':$errmsg ?></p>

<form class="form-horizontal" role="form" action="?r=product/update" method="post">
    <input name="product_id" value="<?= $product['product_id'] ?>" hidden>
    <!-- #section:elements.form -->
    <div class="form-group">
        <label class="col-sm-2 control-label no-padding-right" for="form-field-1"> 商品顶级分类 </label>

        <div class="col-sm-10">
            <select name="top_class_id" class="col-xs-10 col-sm-5" onchange="getSecondMenu(this)">
                <?php foreach ($topMenus as $topMenu): ?>
                <option value="<?= $topMenu['class_id'] ?>" <?= $topMenu['class_id']==$product['top_class_id']?'selected':''  ?>><?= $topMenu['class_name'] ?></option>
                <?php endforeach;?>
            </select>
            <span class="help-inline col-xs-12 col-sm-7">
                <span class="middle"><a href="?r=classification/index">添加新的顶级分类</a></span>
            </span>
        </div>
    </div>

    <div class="form-group">
        <label class="col-sm-2 control-label no-padding-right" for="form-field-1"> 商品二级分类 </label>

        <div class="col-sm-10">
            <select name="second_class_id" class="col-xs-10 col-sm-5">
                <?php foreach ($secondMenus as $menu):?>
                <option value="<?= $menu['class_id'] ?>" <?= $menu['class_id']==$product['second_class_id']?'selected':'' ?>><?= $menu['class_name'] ?></option>
                <?php endforeach;?>
            </select>
            <span class="help-inline col-xs-12 col-sm-7">
                <span class="middle"><a href="?r=classification/index">添加新的二级分类</a></span>
            </span>
        </div>
    </div>

    <div class="form-group">
        <label class="col-sm-2 control-label no-padding-right" for="form-field-1">首页分类 </label>

        <div class="col-sm-10">
            <select name="product_type_tag" class="col-xs-10 col-sm-5">
                <?php foreach ($productTypeArray as $key=>$value):?>
                    <option value="<?= $key ?>" <?= $product['product_type_tag']==$key?'selected':'' ?>><?= $value ?></option>
                <?php endforeach;?>
            </select>
        </div>
    </div>

    <div class="form-group">
        <label class="col-sm-2 control-label no-padding-right" for="form-field-1"> 产地 </label>

        <div class="col-sm-10">
            <select name="origin_place_id" class="col-xs-10 col-sm-5">
                <?php foreach ($originPlaces as $place):?>
                <option value="<?= $place['origin_place_id'] ?>" <?= $place['origin_place_id']==$product['origin_place_id']?'selected':'' ?>><?= $place['origin_place_name'] ?></option>
                <?php endforeach;?>
            </select>
            <span class="help-inline col-xs-12 col-sm-7">
                <span class="middle"><a href="?r=originplace/index">添加新的产地</a></span>
            </span>
        </div>
    </div>

    <div class="form-group">
        <label class="col-sm-2 control-label no-padding-right" for="form-field-1"> 规格 </label>

        <div class="col-sm-10">
            <select name="standard_id" class="col-xs-10 col-sm-5">
                <?php foreach ($standards as $standard):?>
                <option value="<?= $standard['standard_id'] ?>" <?= $standard['standard_id']==$product['standard_id']?'selected':'' ?>><?= $standard['standard_name'] ?></option>
                <?php endforeach;?>
            </select>
            <span class="help-inline col-xs-12 col-sm-7">
                <span class="middle"><a href="?r=standard/index">添加新的规格</a></span>
            </span>
        </div>
    </div>

    <div class="form-group">
        <label class="col-sm-2 control-label no-padding-right"> 商品编号 </label>

        <div class="col-sm-10">
            <input type="text" name="product_no" value="<?= $product['product_no'] ?>" placeholder="" class="col-xs-10 col-sm-5" />
        </div>
    </div>

    <div class="form-group">
        <label class="col-sm-2 control-label no-padding-right"> 商品名称 </label>

        <div class="col-sm-10">
            <input type="text" name="product_name" value="<?= $product['product_name'] ?>" placeholder="" class="col-xs-10 col-sm-5" />
        </div>
    </div>

    <div class="form-group">
        <label class="col-sm-2 control-label no-padding-right"> 商品简要 </label>

        <div class="col-sm-10">
            <input type="text" name="product_brief" value="<?= $product['product_brief'] ?>" placeholder="" class="col-xs-10 col-sm-5" />
        </div>
    </div>

    <div class="form-group">
        <label class="col-sm-2 control-label no-padding-right"> 商品展示图 </label>

        <div class="col-sm-10">
            <div class="widget-box">
                <div class="widget-body">
                    <input type="file" id="id-input-file-2" onchange="UpFileImage(this,roll_images_src, true)"/>
                    <div class="widget-main">
                        <div class="row">
                            <ul class="ace-thumbnails" id="roll_images_src">
                                <?php $imgs = explode(';', $product['product_gallery']); ?>
                                <?php foreach ($imgs as $img):?>
                                <li>
                                    <a href="<?= $img ?>" title="Photo Title" data-rel="colorbox" class="cboxElement"><img src="<?= $img ?>"></a>
                                    <div class="tools">
                                        <a href="javascript:void(0);" onclick="DeleteImage(this);">								<i class="icon-remove red"></i>	</a>
                                    </div>
                                    <input type="text" value="<?= $img ?>" name="roll_images_src[]" hidden="">
                                </li>
                                <?php endforeach;?>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="form-group">
        <label class="col-sm-2 control-label no-padding-right"> 原价 </label>

        <div class="col-sm-10">
            <input type="text" name="origin_price" value="<?= $product['origin_price'] ?>" placeholder="0.00" class="col-xs-10 col-sm-5" />
        </div>
    </div>

    <div class="form-group">
        <label class="col-sm-2 control-label no-padding-right"> 折扣价 </label>

        <div class="col-sm-10">
            <input type="text" name="discount_price" value="<?= $product['discount_price'] ?>" placeholder="0.00" class="col-xs-10 col-sm-5" />
        </div>
    </div>

    <div class="form-group">
        <label class="col-sm-2 control-label no-padding-right" for="form-field-1"> 甜度 </label>

        <div class="col-sm-10">
            <select name="sweet" class="col-xs-10 col-sm-5">
                <option value="0" <?= $product['sweet']==0?'selected':'' ?>>0</option>
                <option value="1" <?= $product['sweet']==1?'selected':'' ?>>1</option>
                <option value="2" <?= $product['sweet']==2?'selected':'' ?>>2</option>
                <option value="3" <?= $product['sweet']==3?'selected':'' ?>>3</option>
                <option value="4" <?= $product['sweet']==4?'selected':'' ?>>4</option>
                <option value="5" <?= $product['sweet']==5?'selected':'' ?>>5</option>

            </select>
        </div>
    </div>

    <div class="form-group">
        <label class="col-sm-2 control-label no-padding-right"> 存储方式 </label>

        <div class="col-sm-10">
            <input type="text" name="storage_method" value="<?= $product['storage_method'] ?>" placeholder="" class="col-xs-10 col-sm-5" />
        </div>
    </div>

    <div class="form-group">
        <label class="col-sm-2 control-label no-padding-right"> 商品备注 </label>

        <div class="col-sm-10">
            <input type="text" name="product_remark" value="<?= $product['product_remark'] ?>" placeholder="" class="col-xs-10 col-sm-5" />
        </div>
    </div>

    <div class="form-group">
        <label class="col-sm-2 control-label no-padding-right"> 详情 </label>

        <div id="editor" class="col-sm-10">
            <textarea id='edit' style="margin-top: 30px;" name="product_detail"><?= $product['product_detail'] ?></textarea>
        </div>
    </div>

    <div class="clearfix form-actions">
        <div class="col-md-offset-3 col-md-9">
            <button class="btn btn-info" type="submit">
                <i class="ace-icon fa fa-check bigger-110"></i>
                Submit
            </button>

            &nbsp; &nbsp; &nbsp;
            <button class="btn" type="reset">
                <i class="ace-icon fa fa-undo bigger-110"></i>
                Reset
            </button>
        </div>
    </div>

</form>


<script type="text/javascript" src="wysiwyg-edit/js/jquery.min.js"></script>
<script type="text/javascript" src="wysiwyg-edit/js/codemirror.min.js"></script>
<script type="text/javascript" src="wysiwyg-edit/js/xml.min.js"></script>

<script type="text/javascript" src="wysiwyg-edit/js/froala_editor.min.js" ></script>
<script type="text/javascript" src="wysiwyg-edit/js/plugins/align.min.js"></script>
<script type="text/javascript" src="wysiwyg-edit/js/plugins/char_counter.min.js"></script>
<script type="text/javascript" src="wysiwyg-edit/js/plugins/code_beautifier.min.js"></script>
<script type="text/javascript" src="wysiwyg-edit/js/plugins/code_view.min.js"></script>
<script type="text/javascript" src="wysiwyg-edit/js/plugins/colors.min.js"></script>
<script type="text/javascript" src="wysiwyg-edit/js/plugins/draggable.min.js"></script>
<script type="text/javascript" src="wysiwyg-edit/js/plugins/emoticons.min.js"></script>
<script type="text/javascript" src="wysiwyg-edit/js/plugins/entities.min.js"></script>
<script type="text/javascript" src="wysiwyg-edit/js/plugins/file.min.js"></script>
<script type="text/javascript" src="wysiwyg-edit/js/plugins/font_size.min.js"></script>
<script type="text/javascript" src="wysiwyg-edit/js/plugins/font_family.min.js"></script>
<script type="text/javascript" src="wysiwyg-edit/js/plugins/fullscreen.min.js"></script>
<script type="text/javascript" src="wysiwyg-edit/js/plugins/image.min.js"></script>
<script type="text/javascript" src="wysiwyg-edit/js/plugins/image_manager.min.js"></script>
<script type="text/javascript" src="wysiwyg-edit/js/plugins/line_breaker.min.js"></script>
<script type="text/javascript" src="wysiwyg-edit/js/plugins/inline_style.min.js"></script>
<script type="text/javascript" src="wysiwyg-edit/js/plugins/link.min.js"></script>
<script type="text/javascript" src="wysiwyg-edit/js/plugins/lists.min.js"></script>
<script type="text/javascript" src="wysiwyg-edit/js/plugins/paragraph_format.min.js"></script>
<script type="text/javascript" src="wysiwyg-edit/js/plugins/paragraph_style.min.js"></script>
<script type="text/javascript" src="wysiwyg-edit/js/plugins/quick_insert.min.js"></script>
<script type="text/javascript" src="wysiwyg-edit/js/plugins/quote.min.js"></script>
<script type="text/javascript" src="wysiwyg-edit/js/plugins/table.min.js"></script>
<script type="text/javascript" src="wysiwyg-edit/js/plugins/save.min.js"></script>
<script type="text/javascript" src="wysiwyg-edit/js/plugins/url.min.js"></script>
<script type="text/javascript" src="wysiwyg-edit/js/plugins/video.min.js"></script>
<script type="text/javascript" src="wysiwyg-edit/js/plugins/help.min.js"></script>
<script type="text/javascript" src="wysiwyg-edit/js/plugins/print.min.js"></script>
<script type="text/javascript" src="wysiwyg-edit/js/plugins/special_characters.min.js"></script>
<script type="text/javascript" src="wysiwyg-edit/js/plugins/word_paste.min.js"></script>


// 获取子目录
<script>
function getSecondMenu(elem) {
    var class_id = $(elem).val();
    $.ajax({
        url: '?r=product/ajax-child-menu',
        data: 'class_id=' + class_id,
        dataType: 'json',
        type: 'post',
        success: function (responeMsg) {
            if(responeMsg.code == <?= \common\common\ErrDesc::OK ?>) {
                var menus = responeMsg.data;
                var options = '';
                for(var i = 0; i < menus.length; i++) {
                    options += '<option value="' + menus[i].class_id + '">' + menus[i].class_name + '</option>';
                }
                $('[name=second_class_id]').html(options);
            }
        }
    })
}
</script>

<script>
    upImgUrl = 'http://localhost/kingphp/qingqing/resource/web/index.php';
    $(document).ready(function () {
        $(function() {
            $('#edit').froalaEditor({
                heightMin: 200,
                // Set the image upload parameter.
                imageUploadParam: 'imgFile',

                // Set the image upload URL.
                imageUploadURL: upImgUrl,

                // Additional upload params.
                imageUploadParams: {id: 'my_editor'},

                // Set request type.
                imageUploadMethod: 'POST',

                // Set max image size to 5MB.
                imageMaxSize: 5 * 1024 * 1024,

                // Allow to upload PNG and JPG.
                imageAllowedTypes: ['jpeg', 'jpg', 'png']
            })
                .on('froalaEditor.image.beforeUpload', function (e, editor, images) {
                    // Return false if you want to stop the image upload.
                })
                .on('froalaEditor.image.uploaded', function (e, editor, response) {
                    // Image was uploaded to the server.
                })
                .on('froalaEditor.image.inserted', function (e, editor, $img, response) {
                    // Image was inserted in the editor.
                })
                .on('froalaEditor.image.replaced', function (e, editor, $img, response) {
                    // Image was replaced in the editor.
                })
                .on('froalaEditor.image.error', function (e, editor, error, response) {
                    // Bad link.
                    if (error.code == 1) {}

                    // No link in upload response.
                    else if (error.code == 2) {}

                    // Error during image upload.
                    else if (error.code == 3) {}

                    // Parsing response failed.
                    else if (error.code == 4) {}

                    // Image too text-large.
                    else if (error.code == 5) {}

                    // Invalid image type.
                    else if (error.code == 6) {}

                    // Image can be uploaded only to same domain in IE 8 and IE 9.
                    else if (error.code == 7) {}

                    // Response contains the original server response to the request if available.
                });
        });


        $('#id-input-file-1,#id-input-file-2').ace_file_input({
            //style: 'well',
            no_file:'No File ...',
            btn_choose:'Choose',
            btn_change:'Change',
            droppable:false,
            //onchange:null,
            thumbnail:'large', //| true | large
            whitelist:'gif|png|jpg|jpeg',
            blacklist:'exe|php',
            allowExt: ['gif','png'],
            icon_remove: false,
            onchange:function () {
                alert('aaa');
            },
            before_change: function (files, dropped) {
                //alert('x');
                return true;
            }
            //
        });

        colorbox_params = {
            reposition:true,
            scalePhotos:true,
            scrolling:false,
            previous:'<i class="icon-arrow-left"></i>',
            next:'<i class="icon-arrow-right"></i>',
            close:'&times;',
            current:'{current} of {total}',
            maxWidth:'100%',
            maxHeight:'100%',
            onOpen:function(){
                document.body.style.overflow = 'hidden';
            },
            onClosed:function(){
                document.body.style.overflow = 'auto';
            },
            onComplete:function(){
                $.colorbox.resize();
            }
        };
        //$('.ace-thumbnails [data-rel="colorbox"]').colorbox(colorbox_params);
    });

</script>


<script>

    // 图片上传
    function UpFileImage(fileObj, showObj, isPre) {
        var isPre = arguments[2]?isPre:false;
        // 创建FormData对象
        var data = new FormData();
        // 为FormData对象添加数据
        $.each($(fileObj)[0].files, function (i, file) {
            data.append('imgFile', file);
        });
        var showObjId = showObj.id;
        $.ajax({
            url: upImgUrl,
            type: 'POST',
            data: data,
            cache: false,
            contentType: false,
            processData: false,
            success: function (rtMsg) {
                if(rtMsg.code != 1) {
                    alert('上传图片失败：' + rtMsg.message);
                    return;
                }

                $(showObj).append('<li><a href="' + rtMsg.data[0].link+'" title="Photo Title" data-rel="colorbox"><img src="' + rtMsg.data[0].link + '"></a><div class="tools">\
								<a href="javascript:void(0);" onclick="DeleteImage(this);">\
								<i class="icon-remove red"></i>\
								</a>\
								</div><input type="text" value="' + rtMsg.data[0].link+'" name="'+showObjId+'[]" hidden></li>');
                $('.ace-thumbnails [data-rel="colorbox"]').colorbox(colorbox_params);
                if(isPre)
                    $('.detail-head').css('background-image', 'url('+rtMsg.data[0].url+')');
            }
        });
    }

    // 删除图片
    function DeleteImage(imgObj) {
        var liParent = $(imgObj).parent().parent('li');
        $(liParent).remove();
    }

</script>