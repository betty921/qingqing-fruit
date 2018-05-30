<?php
/*
涓嬪崍2:11:34
*/
header("content-type:text/html;charset=utf-8");
include '../models/CategoryModel.php';


//添加分类
/* function addcategory(){
	$category_name = getClientParam('category_name');
	$category_img = getClientParam('category_img');
	if(empty($category_img) || empty($category_name)){
		return rtMsg(RT_CODE('ERR_PARAM'));
	}
	db_add_category($category_name,$category_img);
	return rtMsg();
}

function getcategory(){
	$infos = db_get_category();
	return rtMsg(RT_CODE('OK'),$infos);
} */
//添加商品种类
function showAddCategory(){
	$GLOBALS['rt_code'] = '0';
	$submit = getClientParam('submit');
	if(empty($submit)){
		include 'views/product_category_add.php';
		return;
	}
	$category_name = getClientParam('category_name');
	$category_img = getClientParam('category_img');
	if(empty($category_name)||empty($category_img)){
		$GLOBALS['rt_code'] = RT_CODE('ERR_PARAM');
		include 'views/product_category_add.php';
		return ;
	}
	db_add_category($category_name, $category_img);
	$GLOBALS['rt_code'] = RT_CODE('OK');
	return showListCategory();
}
/*
 * 修改商品类别
 * */
function  editCategory(){
	$GLOBALS['rt_code'] = '0';
	$category_id =getClientParam('category_id');
	$GLOBALS['categoryInfos'] = get_onecategory($category_id);
	// var_dump($GLOBALS['sizeInfos']);die;
	$submit = getClientParam('submit');
	if(empty($submit)){
		$GLOBALS['rt_code'] = RT_CODE('ERR_PARAM');
		include'views/product_category_edit.php';
		return ;
	}
	$category_name = getClientParam('category_name');
	$category_img = getClientParam('category_img');
	if(empty($category_name)){
		$GLOBALS['rt_code'] = RT_CODE('ERR_PARAM');
		include'views/product_category_edit.php';
		return;
	}
	db_edit_category($category_id, $category_name, $category_img);
	$GLOBALS['rt_code'] = RT_CODE('OK');
	return showListCategory();
}


/*
 * 显示商品种类列表
 * */
function showListCategory(){
	$GLOBALS['infos'] = db_get_category();
	include 'views/product_category_list.php';
}
/*
 * 删除类型
 * */
function deleteCategory(){
	$category_id = getClientParam('category_id');
	if(empty($category_id)){
		return showListCategory();
	}
	delete_category($category_id);
	return showListCategory();
} 