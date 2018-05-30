<?php
/*
时间：2017年8月10日

*/
header("content-type:text/html;charset=utf-8");
include '../models/ProductModel.php';
function showWeek(){
	$pageno = isset($_GET['pageno'])?$_GET['pageno']:1;
	global $pagesize ;
	$pagesize = 4;
	
	
	global $startno;
	$startno = ($pageno-1)*$pagesize;
	
	
	$popular_category_id = getClientParam('popular_category_id');

	$act = getClientParam('act');

	$GLOBALS['weekInfos'] = get_diff_week($popular_category_id,$act);

	include 'views/weekpopular.php';
}
function showPage(){
	$pageno = isset($_GET['pageno'])?$_GET['pageno']:1;
	global $pagesize ;
	$pagesize = 4;
	

	global $startno;
	$startno = ($pageno-1)*$pagesize;

	$act = getClientParam('act');
	
	$category_id = getClientParam('category_id');
	$GLOBALS['weekInfos'] = get_diff_week($category_id, $act, $startno, $pagesize);
	include 'views/weekpopular.php';
}
?>