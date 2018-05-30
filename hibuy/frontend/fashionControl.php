<?php
/*
时间：2017年8月10日

*/
header("content-type:text/html;charset=utf-8");
include '../models/ProductModel.php';

function showFashion(){
	$dress_id = getClientParam('dress_id');
	//echo $dress_id;die;
	$act = getClientParam('act');
	//echo $act;die;
	$GLOBALS['fashionInfos'] = get_fashion($dress_id,$act);
	//var_dump($GLOBALS['fashionInfos']);die;

	include 'views/fashion.php';
}

?>