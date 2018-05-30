<?php
/*
时间：2017年8月9日

*/
header("content-type:text/html;charset=utf-8");
include_once '../models/ProductModel.php';
function showYouxuan(){
	$GLOBALS['goodchoice'] = get_goodchoice();
	include 'views/youxuan.php';
}
function showSellnumByup(){
	$GLOBALS['goodChoicebyupSellnum']=get_goodchoice_by_upsellnum();
	include 'views/youxuan.php';
}
function showSellnumBydown(){
	$GLOBALS['goodChoicebydownSellnum']=get_goodchoice_by_downsellnum();
	include 'views/youxuan.php';
}
function showPricebyup(){
	$GLOBALS['goodchoicebyupPrice'] = get_goodchoice_byupPrice();
	include 'views/youxuan.php';
}
?>