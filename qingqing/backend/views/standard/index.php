<?php
$this->params['main_title'] = '商品管理';
$this->params['sub_title'] = '规格管理';
$this->params['page'] = 'navProduct';
$this->params['active'] = 3;
?>
<div class="row">
	<div class="col-sm-3">
		<h4>规格添加</h4>
		<form action="?r=standard/add" method="post">
            <div class="form-group">
                <label>规格名</label>
                <input type="text" name="standard_name" class="form-control" placeholder="">
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
            <?php if(!empty($standards)): ?>
            <?php foreach ($standards as $standard): ?>
            <tr>
                <td><?= $standard['standard_name'] ?></td>
                <td><a href="?r=standard/del&standard_id=<?= $standard['standard_id'] ?>">删除</a> | <a href="?r=standard/update-page&standard_id=<?= $standard['standard_id'] ?>">编辑</a> </td>
            </tr>
            <?php endforeach; ?>
            <?php endif;?>


			</tbody>
		</table>

	</div>
</div>

<script>
	function Submit() {
		$('form').submit();
	}
</script>