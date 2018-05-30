<?php
$this->params['main_title'] = '商品管理';
$this->params['sub_title'] = '商品列表';
$this->params['page'] = 'navProduct';
$this->params['active'] = 4;

$productTypeArray = [
	1=>'家庭量贩',
	2=>'全球鲜果',
	3=>'生鲜美食',
	4=>'礼品卡券',
];
?>
<div class="row">

	<div class="col-sm-12">
        <p class="bg-danger" style="color: red"><?= empty($errmsg)?'':$errmsg ?></p>
		<table id="sample-table-1" class="table table-striped table-bordered table-hover">
			<thead>
			<tr>
				<th>商品名</th>
				<th>商品编号</th>
				<th>顶级分类</th>
				<th>二级分类</th>
				<th>首页分类</th>
				<th>产地</th>
				<th>规格</th>
				<th>展示图</th>
				<th>原价</th>
				<th>折扣价</th>
				<th>备注</th>
				<th>操作</th>
			</tr>
			</thead>

			<tbody>

			<?php foreach ($products as $product):?>
            <tr>
				<td><?= $product['product_name'] ?></td>
				<td><?= $product['product_no'] ?></td>
				<td><?= $product['top_class_name'] ?></td>
				<td><?= $product['second_class_name'] ?></td>
				<td><?= $productTypeArray[$product['product_type_tag']] ?></td>
				<td><?= $product['origin_place_name'] ?></td>
				<td><?= $product['standard_name'] ?></td>
				<td><img style="width: 80px" src="<?= explode(';', $product['product_gallery'])[0] ?>"></td>
				<td><?= $product['origin_price'] ?></td>
				<td><?= $product['discount_price'] ?></td>
				<td><?= $product['product_remark'] ?></td>
				<td><a href="?r=product/edit&product_id=<?= $product['product_id'] ?>">编辑</a> | <a href="?r=product/delete&product_id=<?= $product['product_id'] ?>">删除</a> </td>
            </tr>
			<?php endforeach; ?>


			</tbody>
		</table>

	</div>
</div>

<script>
	function Submit() {
		$('form').submit();
	}
</script>