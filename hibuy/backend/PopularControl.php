<?php
/*
时间：2017年8月7日

*/
header("content-type:text/html;charset=utf-8");
include_once '../models/PopularModel.php';
//添加商品种类
function showAddPopular(){
	$GLOBALS['rt_code'] = '0';
	$submit = getClientParam('submit');
	if(empty($submit)){
		include 'views/popular_add.php';
		return;
	}
	$popular_category_name = getClientParam('popular_category_name');
	$popular_img = getClientParam('popular_img');
	//echo $popular_img;die;
	if(empty($popular_category_name)||empty($popular_img)){
		$GLOBALS['rt_code'] = RT_CODE('ERR_PARAM');
		include 'views/popular_add.php';
			return;
	}
	db_add_popular($popular_category_name, $popular_img);
	$GLOBALS['rt_code'] = RT_CODE('OK');
	   return  showListPopular();
	
}

/*
 * 修改商品类别
 * */
function  editPopular(){
	$GLOBALS['rt_code'] = '0'; 
	$popular_category_id =getClientParam('popular_category_id');
	$GLOBALS['popularInfos'] = get_onepopular($popular_category_id);
	// var_dump($GLOBALS['sizeInfos']);die;
	 $submit = getClientParam('submit');
	 if(empty($submit)){
		$GLOBALS['rt_code'] = RT_CODE('ERR_PARAM');
		include'views/popular_edit.php';
		return ;
	}  
	$popular_category_name = getClientParam('popular_category_name');
	$popular_img = getClientParam('popular_img');
	 if(empty($popular_category_name)){
		$GLOBALS['rt_code'] = RT_CODE('ERR_PARAM');
		include'views/popular_edit.php';
		return;
	}  
	db_edit_popular($popular_category_id, $popular_category_name, $popular_img);
	$GLOBALS['rt_code'] = RT_CODE('OK');
	return showListPopular();
}


/*
 * 显示商品种类列表
 * */
function showListPopular(){
	$GLOBALS['popularInfos'] = db_get_popualr();
	include 'views/popular_list.php';
}

/*
 * 删除类型
 * */
function deletePopular(){
	$popular_category_id = getClientParam('popular_category_id');
	if(empty($popular_category_id)){
		return showListPopular();
	}
	delete_popular($popular_category_id);
	return showListPopular();
}



?>