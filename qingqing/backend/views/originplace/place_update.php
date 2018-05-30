<?php
$this->params['main_title'] = '商品管理';
$this->params['sub_title'] = '产地管理';
$this->params['page'] = 'navProduct';
$this->params['active'] = 2;
?>
<div class="row">
	<div class="col-sm-3">
		<h4>产地更新</h4>
		<form action="?r=originplace/update" method="post">
            <div class="form-group">
                <label>产地名</label>
                <input type="text" name="origin_place_name" class="form-control" placeholder="" value="<?= $origin_place_name ?>">
            </div>
			<input type="text" name="origin_place_id" value="<?= $origin_place_id ?>" hidden>
			<input type="button" class="btn btn-default" onclick="Submit();" value="修改">
		</form>
		<p class="bg-danger" style="color: red"><?= empty($errmsg)?'':$errmsg ?></p>
	</div>

</div>

<script>
	function Submit() {
		var class_name = $('[name=class_name]').val();
		if(class_name == '') {
			return;
		}
		$('form').submit();
	}
</script>