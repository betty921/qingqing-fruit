<?php
/*
ʱ�䣺2017��8��9��

*/
header("content-type:text/html;charset=utf-8");
include '../models/DressModel.php';
include '../models/PopularModel.php';
include '../models/LunboModel.php';
include '../models/ProductModel.php';
function showIndex(){
	$GLOBALS['fit'] = db_get_dress();
	$GLOBALS['week'] = db_get_popualr();
	$GLOBALS['lunboInfos'] = get_orderlunbo();
	$GLOBALS['productInfos'] = get_all_product();
	include 'views/index.php';
}
?>