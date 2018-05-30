<?php
/*
时间：2017年8月8日

*/
header("content-type:text/html;charset=utf-8");
include_once '../models/StyleModel.php';
//添加商品样式
function showAddStyle(){
	$GLOBALS['rt_code'] = '0';
	$submit = getClientParam('submit');
	if(empty($submit)){
		include 'views/style_add.php';
		return;
	}
	$product_id = getClientParam('product_id');
	$color_id = getClientParam('color_id');
	$size_id = getClientParam('size_id');
	$stock = getClientParam('stock');
	$sell_num = getClientParam('sell_num');
	if(empty($product_id)||empty($color_id)||empty($size_id)||empty($stock)||empty($sell_num)){
		$GLOBALS['rt_code'] = RT_CODE('ERR_PARAM');
		include 'views/style_add.php';
		return ;
	}
	db_add_style($product_id, $color_id, $size_id, $stock, $sell_num);
    $GLOBALS['rt_code'] = RT_CODE('OK');
    include 'views/style_add.php';
}
//修改样式
function editStyle(){
	
	$GLOBALS['rt_code'] = '0';
	$product_style_id = getClientParam('product_style_id');
	$GLOBALS['styleInfos'] = get_onestyle($product_style_id);
	//var_dump($GLOBALS['styleInfos']);die;
	$submit = getClientParam('submit');
	if(empty($submit)){
		$GLOBALS['rt_code'] = RT_CODE('ERR_PARAM');
		include'views/style_edit.php';
		return ;
	}
	$stock = getClientParam('stock');
	if(empty($stock)){
		$GLOBALS['rt_code'] = RT_CODE('ERR_PARAM');
		include'views/style_edit.php';
		return;
	}
	db_edit_style($product_style_id,$stock);
	$GLOBALS['rt_code'] = RT_CODE('OK');
	include'views/style_edit.php';
}
//显示商品列表
function showListStyle(){
	$GLOBALS['styleInfos'] = db_get_allstyle();
	include 'views/style_list.php';
}
//删除商品列表
function deleteStyle(){
	$product_style_id = getClientParam('product_style_id');
	
	if(empty($product_style_id)){
		return showListStyle();
	}
	db_deleteStyle($product_style_id);
	return showListStyle();
}

?>