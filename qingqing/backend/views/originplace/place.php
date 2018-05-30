<?php
$this->params['main_title'] = '商品管理';
$this->params['sub_title'] = '产地管理';
$this->params['page'] = 'navProduct';
$this->params['active'] = 2;
?>
<div class="row">
	<div class="col-sm-3">
		<h4>产地添加</h4>
		<form action="?r=originplace/add" method="post">
            <div class="form-group">
                <label>产地名</label>
                <input type="text" name="origin_place_name" class="form-control" placeholder="">
            </div>
			<input type="button" class="btn btn-default" onclick="Submit();" value="增加">
		</form>
	</div>

	<div class="col-sm-9">
        <p class="bg-danger" style="color: red"><?= empty($errmsg)?'':$errmsg ?></p>
		<table id="sample-table-1" class="table table-striped table-bordered table-hover">
			<thead>
			<tr>
				<th style="width: 80%">产地</th>

				<th style="width: 20%">操作</th>
			</tr>
			</thead>

			<tbody>
            <?php if(!empty($places)): ?>
            <?php foreach ($places as $place): ?>
            <tr>
                <td><?= $place['origin_place_name'] ?></td>
                <td><a href="?r=originplace/del&origin_place_id=<?= $place['origin_place_id'] ?>">删除</a> | <a href="?r=originplace/update-page&origin_place_id=<?= $place['origin_place_id'] ?>">编辑</a> </td>
            </tr>
            <?php endforeach; ?>
            <?php endif;?>


			</tbody>
		</table>

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