<?php
/*
下午2:11:34
*/
header("content-type:text/html;charset=utf-8");
include '../models/CategoryModel.php';


//��ӷ���
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
//�����Ʒ����
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
 * �޸���Ʒ���
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
 * ��ʾ��Ʒ�����б�
 * */
function showListCategory(){
	$GLOBALS['infos'] = db_get_category();
	include 'views/product_category_list.php';
}
/*
 * ɾ������
 * */
function deleteCategory(){
	$category_id = getClientParam('category_id');
	if(empty($category_id)){
		return showListCategory();
	}
	delete_category($category_id);
	return showListCategory();
} 