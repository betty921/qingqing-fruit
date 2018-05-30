<?php
/*
时间：2017年8月9日

*/
header("content-type:text/html;charset=utf-8");
include_once '../models/CategoryModel.php';
include_once '../models/ProductModel.php';
function showCategory(){
	$category_id = getClientParam('category_id');
	$act = getClientParam('act');
	$GLOBALS['categoryInfos'] = db_get_category();
	$GLOBALS['diff'] = get_diff_kind($category_id,$act);
	include 'views/category.php';
}

?>
