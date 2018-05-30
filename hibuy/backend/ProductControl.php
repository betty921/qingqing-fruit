<?php
/*
时间：2017年8月8日

*/
header("content-type:text/html;charset=utf-8");
include_once '../models/ProductModel.php';
include_once '../models/CategoryModel.php';
include_once '../models/PopularModel.php';
include_once '../models/DressModel.php';
$GLOBALS['categoryInfos'] = db_get_category();
$GLOBALS['popularInfos'] = db_get_popualr();
$GLOBALS['dressInfos'] = db_get_dress();
/**
 * 添加商品*/
function showAddProduct(){
	$GLOBALS['rt_code'] = '0';
	$submit = getClientParam('submit');
	if(empty($submit)){
		include 'views/product_add.php';
		return;
	}
	$product_no = getClientParam('product_no');
	$product_name = getClientParam('product_name');
	$product_subname = getClientParam('product_subname');
	$list_img_url = getClientParam('list_img_url');
	$origin_price = getClientParam('origin_price');
	$discount_price = getClientParam('discount_price');
	$is_optimization = getClientParam('is_optimization');
	$is_hot = getClientParam('is_hot');
	$is_week_popular = getClientParam('is_week_popular');
	$category_id= getClientParam('category_id');
	$dress_id = getClientParam('dress_id');
	$popular_category_id = getClientParam('popular_category_id');
	$remark = getClientParam('remark');
	$ctime = time();
	//echo $ctime;die;
	if (empty($product_no)||empty($product_name)||empty($list_img_url)
			||empty($origin_price)){
		$GLOBALS['rt_code'] = RT_CODE('ERR_PARAM');
		include 'views/product_add.php';
		return;
	}
	
	db_add_product($product_no,$product_name,
	$product_subname,$list_img_url,$origin_price,$discount_price,
	$is_optimization,$is_hot,$is_week_popular,
	$category_id,$dress_id,$popular_category_id,$ctime,$remark);
	
	$GLOBALS['rt_code'] = RT_CODE('OK');
	return showListProduct();
}

/**
 显示商品列表  */
function showListProduct(){
	$GLOBALS['productInfos'] = get_all_product();
	include 'views/product_list.php';
}

/**
 * 删除商品  */
function deleteProduct(){
	$product_id = getClientParam('product_id');
	if(empty($product_id)){
		return showListProduct();
	}
	db_delete_product($product_id);
	return showListProduct();
}


/**
 * 修改商品  */
function editProduct(){
	$product_id = getClientParam('product_id');
	$GLOBALS['productInfos'] = db_get_one_product($product_id);
	$GLOBALS['rt_code'] = '0';
	$submit = getClientParam('submit');
	if(empty($submit)){
		include 'views/product_edit.php';
		return ;
	}
	$product_id = getClientParam('product_id');
	$product_name = getClientParam('product_name');
	$product_subname = getClientParam('product_subname');
	$list_img_url = getClientParam('list_img_url');
	$origin_price = getClientParam('origin_price');
	$discount_price = getClientParam('discount_price');
	$is_optimization = getClientParam('is_optimization');
	$is_hot = getClientParam('is_hot');
	$is_week_popular = getClientParam('is_week_popular');
	$category_id= getClientParam('category_id');
	$dress_id = getClientParam('dress_id');
	//echo $dress_id;die;
	$popular_category_id = getClientParam('popular_category_id');
	$remark = getClientParam('remark');
	$ctime = time();
	if(empty($product_id)||empty($product_name)||empty($origin_price)){
		$GLOBALS['rt_code'] = RT_CODE('ERR_PARAM');
		include 'views/product_edit.php';
		return;
	}
	db_mod_one_poduct($product_id,$product_name,$product_subname,$list_img_url,
	$origin_price,$discount_price,$is_optimization,$is_hot,
	$is_week_popular,$category_id,$dress_id,$popular_category_id,
	$ctime,$remark);
	$GLOBALS['rt_code'] = RT_CODE('OK');
	return showListProduct();
}
