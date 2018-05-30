<?php
/*
时间：2017年8月11日

*/
header("content-type:text/html;charset=utf-8");
include '../models/ArticleModel.php';
//Ajax 接口
function AddArticle(){
	$GLOBALS['rt_code'] = '0';
	$submit = getClientParam('submit');
	if(empty($submit)){
		include 'views/arti_add.php';
		return ;
	}
	$arti_title = getClientParam('arti_title');
	$arti_subtitle = getClientParam('arti_subtitle');
	$arti_content = getClientParam('arti_content');
	$arti_pictures = getClientParam('arti_pictures');
	
	$author_name = getClientParam('author_name');
	$author_name_name = getClientParam('author_name_name');
	$time = time();
	if(empty($arti_title)||empty($arti_content)||empty($arti_pictures)||empty($author_name)||empty($author_name_name)){
		$GLOBALS['rt_code'] = RT_CODE('ERR_PARAM');
		include 'views/arti_add.php';
		return;
	}
	
	
	db_add_arti($arti_title, $arti_subtitle,$arti_content,$arti_pictures,$author_name,$author_name_name,$time);
	$GLOBALS['rt_code'] = RT_CODE('OK');
	return showListArticle();
}

//显示添加页面
/* function showAddArticle(){
	include 'views/arti_add.php';
} */
function showListArticle(){
	$GLOBALS['artiInfos'] = db_get_arti();
	include 'views/arti_list.php';
}
function delarti(){
	$arti_id = getClientParam('arti_id');
	if(empty($arti_id)){
		return showListArticle();
	}
	db_del_arti($arti_id);
	return showListArticle();
}
?>