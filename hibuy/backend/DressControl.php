<?php
/*
ʱ�䣺2017��8��7��

*/
header("content-type:text/html;charset=utf-8");
include_once '../models/DressModel.php';
//�����Ʒ����
function AddDress(){
	//$GLOBALS['rt_code'] = '0';
	/* $submit = getClientParam('submit');
	if(empty($submit)){
		include 'views/dress_add.php';
		return;
	} */
	$dress_name = getClientParam('dress_name');
	$dress_img = getClientParam('dress_img');
	
	 if(empty($dress_name)||empty($dress_img)){
		
		return rtMsg(ERR_PARAM);
	} 
	db_add_dress($dress_name, $dress_img);
	return rtMsg();
}
function showAddDress(){
	include 'views/dress_add.php';
}

/*
 * �޸���Ʒ���
 * */
function  editDress(){
	$GLOBALS['rt_code'] = '0';
	$dress_id =getClientParam('dress_id');
	$GLOBALS['dressInfos'] = get_onedress($dress_id);
	// var_dump($GLOBALS['sizeInfos']);die;
	$submit = getClientParam('submit');
	if(empty($submit)){
		$GLOBALS['rt_code'] = RT_CODE('ERR_PARAM');
		include'views/dress_edit.php';
		return ;
	}
	$dress_name = getClientParam('dress_name');
	$dress_img = getClientParam('dress_img');
	if(empty($dress_name)){
		$GLOBALS['rt_code'] = RT_CODE('ERR_PARAM');
		include'views/dress_edit.php';
		return;
	}
	db_edit_dress($dress_id, $dress_name, $dress_img);
	$GLOBALS['rt_code'] = RT_CODE('OK');
	return showListDress();
}

/*
 * ��ʾ��Ʒ�����б�
 * */
function showListDress(){
	$GLOBALS['infos'] = db_get_dress();
	include 'views/dress_list.php';
}
/*
 * ɾ������
 * */
function deleteDress(){
	$dress_id = getClientParam('dress_id');
	if(empty($dress_id)){
		return showListDress();
	}
	delete_dress($dress_id);
	return showListDress();
}
?>
