<?php
$this->params['main_title'] = '广告管理';
$this->params['sub_title'] = '广告列表';
$this->params['page'] = 'navAdv';
$this->params['active'] = 1;

$placeArray = [
	1 => '首页轮播',
	2 => '首页推荐位',
	3 => '首页中部横幅广告'
];
?>
<div class="row">

	<div class="col-sm-9">
        <p class="bg-danger" style="color: red"><?= empty($errmsg)?'':$errmsg ?></p>
		<table id="sample-table-1" class="table table-striped table-bordered table-hover">
			<thead>
			<tr>
				<th>广告位置</th>
				<th>描述</th>
				<th>顺序</th>
				<th>图片</th>
				<th>链接</th>
				<th>操作</th>
			</tr>
			</thead>

			<tbody>

			<?php foreach ($advs as $adv):?>
            <tr>
                <td><?= $placeArray[$adv['position']] ?></td>
				<td><?= $adv['desc'] ?></td>
				<td><?= $adv['order'] ?></td>
				<td><img style="width:50px" src="<?= $adv['img'] ?>"></td>
				<td><a href="<?= $adv['url'] ?>">查看</a></td>
                <td><a href="?r=adv/del&advertisement_id=<?= $adv['advertisement_id'] ?>">删除</a> | <a href="?r=adv/edit&advertisement_id=<?= $adv['advertisement_id'] ?>">编辑</a> </td>
            </tr>
			<?php endforeach;?>


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