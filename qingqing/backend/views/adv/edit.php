<?php
$this->params['main_title'] = '广告管理';
$this->params['sub_title'] = '广告修改';
$this->params['page'] = 'navAdv';
$this->params['active'] = 1;

$placeArray = [
	1 => '首页轮播',
	2 => '首页推荐位',
	3 => '首页中部横幅广告'
];
?>

<style>
	.ace-thumbnails img {
		max-width: 100%;
	}
</style>

<p class="bg-danger" style="color: red"><?= empty($errmsg)?'':$errmsg ?></p>
<form class="form-horizontal" role="form" action="?r=adv/edit" method="post">
	<input type="text" name="advertisement_id" value="<?= $advertisement_id ?>" hidden>
	<!-- #section:elements.form -->
	<div class="form-group">
		<label class="col-sm-2 control-label no-padding-right" for="form-field-1"> 广告位置 </label>

		<div class="col-sm-10">
			<select name="position" class="col-xs-10 col-sm-5">
				<?php foreach ($placeArray as $key=>$value):?>
					<option value="<?= $key ?>" <?= $key==$position?'selected':'' ?>><?= $value ?></option>
				<?php endforeach;?>
			</select>
		</div>
	</div>

	<div class="form-group">
		<label class="col-sm-2 control-label no-padding-right" for="form-field-1"> 描述 </label>

		<div class="col-sm-10">
			<input type="text" name="desc" value="<?= $desc ?>" class="col-xs-10 col-sm-5" />
		</div>
	</div>

	<div class="form-group">
		<label class="col-sm-2 control-label no-padding-right"> 图片 </label>

		<div class="col-sm-4">
			<div class="widget-box">
				<div class="widget-body">
					<input type="file" id="id-input-file-2" onchange="UpFileImage(this,img, true)"/>
					<div class="widget-main">
						<div class="row">
							<ul class="ace-thumbnails" id="img">
								<li>
									<a href="<?= $img ?>" title="Photo Title" data-rel="colorbox" class="cboxElement"><img src="<?= $img ?>"></a>
									<div class="tools">
										<a href="javascript:void(0);" onclick="DeleteImage(this);">								<i class="icon-remove red"></i>	</a>
									</div>
									<input type="text" value="<?= $img ?>" name="img" hidden="">
								</li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="form-group">
		<label class="col-sm-2 control-label no-padding-right"> 链接地址 </label>

		<div class="col-sm-10">
			<input type="text" name="url" value="<?= $url ?>" class="col-xs-10 col-sm-5" />
		</div>
	</div>

	<div class="form-group">
		<label class="col-sm-2 control-label no-padding-right" for="form-field-1"> 排序 </label>

		<div class="col-sm-10">
			<select name="order" class="col-xs-10 col-sm-5">
				<option value="10" <?= $order==10?'selected':'' ?>>10</option>
				<?php for($i=1; $i<=9; $i++):?>
				<option value="<?= $i ?>" <?= $order==$i?'selected':'' ?>><?= $i ?></option>
				<?php endfor;?>
			</select>
		</div>
	</div>



	<div class="clearfix form-actions">
		<div class="col-md-offset-3 col-md-9">
			<input class="btn btn-info" type="submit" name="submit" value="Submit">
				<i class="ace-icon fa fa-check bigger-110"></i>

			</input>

			&nbsp; &nbsp; &nbsp;
			<button class="btn" type="reset">
				<i class="ace-icon fa fa-undo bigger-110"></i>
				Reset
			</button>
		</div>
	</div>

</form>



<script>
	upImgUrl = 'http://localhost/kingphp/qingqing/resource/web/index.php';
	$(document).ready(function () {

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
		$('.ace-thumbnails [data-rel="colorbox"]').colorbox(colorbox_params);
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

				$(showObj).html('<li><a href="' + rtMsg.data[0].link+'" title="Photo Title" data-rel="colorbox"><img src="' + rtMsg.data[0].link + '"></a><div class="tools">\
								<a href="javascript:void(0);" onclick="DeleteImage(this);">\
								<i class="icon-remove red"></i>\
								</a>\
								</div><input type="text" value="' + rtMsg.data[0].link+'" name="'+showObjId+'" hidden></li>');
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