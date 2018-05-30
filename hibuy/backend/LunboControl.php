<?php
/*
ʱ�䣺2017��8��9��

*/
header("content-type:text/html;charset=utf-8");

include_once '../models/LunboModel.php';
//����ֲ�
function showAddLunbo(){
	$GLOBALS['rt_code'] = '0';
	$submit = getClientParam('submit');
	if(empty($submit)){
		include 'views/lunbo_add.php';
		return;
	}
	$lunbo_name = getClientParam('lunbo_name');
	$lunbo_img_url = getClientParam('lunbo_img_url');
	$lunbo_no = getClientParam('lunbo_no');
	if(empty($lunbo_name)||empty($lunbo_img_url)||empty($lunbo_no)){
		$GLOBALS['rt_code'] = RT_CODE('ERR_PARAM');
		include 'views/lunbo_add.php';
		return ;
	}
	add_lunbo($lunbo_img_url,$lunbo_name,$lunbo_no);
	$GLOBALS['rt_code'] = RT_CODE('OK');
	include 'views/lunbo_add.php';
}

/*
 * �޸��ֲ�
 * */
function  editLunbo(){
	$GLOBALS['rt_code'] = '0';
	$lunbo_id =getClientParam('lunbo_id');
	//echo $lunbo_id;die;
	$GLOBALS['lunboInfos'] = get_onelunbo($lunbo_id);
	//var_dump($GLOBALS['lunboInfos']);die;
	$submit = getClientParam('submit');
	if(empty($submit)){
		$GLOBALS['rt_code'] = RT_CODE('ERR_PARAM');
		include'views/lunbo_edit.php';
		return ;
	}
	$lunbo_name = getClientParam('lunbo_name');
	$lunbo_img_url = getClientParam('lunbo_img_url');
	$lunbo_no = getClientParam('lunbo_no');
	
	if(empty($lunbo_name)||empty($lunbo_img_url)||empty($lunbo_no)){
		$GLOBALS['rt_code'] = RT_CODE('ERR_PARAM');
		include'views/lunbo_edit.php';
		return;
	}
	edit_lunbo($lunbo_id,$lunbo_img_url,$lunbo_no,$lunbo_name);
	$GLOBALS['rt_code'] = RT_CODE('OK');
	include 'views/lunbo_edit.php';
	//$GLOBALS['lunboOrders']= get_orderlunbo();
}

/*
 * ��ʾ�ֲ������б�
 * */
function showListLunbo(){
	$GLOBALS['lunboInfos'] = get_all_lunbo();
	include 'views/lunbo_list.php';
}
/*
 * ɾ���ֲ�
 * */
function deleteLunbo(){
	$lunbo_id = getClientParam('lunbo_id');
	if(empty($lunbo_id)){
		return showListLunbo();
	}
	delete_lunbo($lunbo_id);
	return showListLunbo();
}
