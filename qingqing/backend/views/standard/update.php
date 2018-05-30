<?php
$this->params['main_title'] = '商品管理';
$this->params['sub_title'] = '规格管理';
$this->params['page'] = 'navProduct';
$this->params['active'] = 3;
?>
<div class="row">
	<div class="col-sm-3">
		<h4>规格修改</h4>
		<form action="?r=standard/update" method="post">
            <div class="form-group">
                <label>规格名</label>
                <input type="text" name="standard_name" class="form-control" placeholder="" value="<?= $standard_name ?>">
            </div>
			<input type="text" name="standard_id" value="<?= $standard_id ?>" hidden>
			<input type="button" class="btn btn-default" onclick="Submit();" value="修改">
		</form>
		<p class="bg-danger" style="color: red"><?= empty($errmsg)?'':$errmsg ?></p>
	</div>
</div>

<script>
	function Submit() {
		$('form').submit();
	}
</script>