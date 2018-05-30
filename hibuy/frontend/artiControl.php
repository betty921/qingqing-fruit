<?php
/*
时间：2017年8月12日

*/
header("content-type:text/html;charset=utf-8");
include '../models/ArticleModel.php';
include '../models/commentModel.php';
include '../models/productModel.php';
function showArti(){
	$GLOBALS['artiInfos'] = db_get_arti();
	include 'views/hot.php';
	
}
function showArtiByone(){
	$arti_id = getClientParam('arti_id');
	
	//echo $arti_id;
	
	
	$GLOBALS['artiOne'] = db_get_artiByone($arti_id);
	$GLOBALS['comInfos'] = get_all_comments($arti_id);
	//include 'views/hot_arti.php';
	//$u_id = getClientParam('u_id');
	//db_add_pos($arti_id,$u_id);
	//echo $u_id;die;
	include 'views/hot_arti.php';
	//echo "<script>window.location='views/hot_arti.php';</script>";
}
function AddPos(){
	//$u_id = $_SESSION['u_id'];
	//$u_id = getClientParam('u_id');
	//$arti_id = getClientParam('arti_id');
	$m_id = getClientParam('m_id');
	if(empty($m_id)){

		echo "<script>alert('点赞失败');</script>";
	}
	db_add_pos($m_id);
	//return showArtiByone();
	echo "<script>window.location.reload();</script>";
}
function showSubject(){

	$GLOBALS['artiOne'] = db_get_artiByone();
	$GLOBALS['comInfos'] = get_all_comments();
	$GLOBALS['productInfos'] = get_all_product();
	include 'views/subject.php';
}