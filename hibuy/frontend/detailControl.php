<?php
/*
ʱ�䣺2017��8��10��

*/
header("content-type:text/html;charset=utf-8");
include '../models/ProductModel.php';
 function showDetail(){
 	$product_id = getClientParam('product_id');
 	$GLOBALS['productInfos']=db_get_one_product($product_id);
 	include 'views/detail.php';
 }
?>