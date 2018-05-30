<?php
include_once '../models/SizeModel.php';

function addSize()
{
    $sizeName = getClientParam('size_name');
    $remark = getClientParam('remark');
    if (empty($sizeName)) {
        return rtMsg(RT_CODE('ERR_PARAM'));
    }
    add_size($sizeName, $remark);
    return rtMsg();
}

function getAllSize()
{
    $infos = get_all_size();
    return rtMsg(RT_CODE('OK'), $infos);
}

function getAllSizeWhere($sizeId)
{
    $sizeId = getClientParam('size_id');
    $infos = get_where_size($sizeId);
    return rtMsg(RT_CODE('OK'), $infos);
}

//添加商品尺寸
function showAddSize(){
	$GLOBALS['rt_code'] = '0';
	$submit = getClientParam('submit');
	if(empty($submit)){
		include 'views/size_add.php';
		return;
	}
	$size_name = getClientParam('size_name');
	$remark = getClientParam('remark');
	if(empty($size_name)||empty($remark)){
		$GLOBALS['rt_code'] = RT_CODE('ERR_PARAM');
		include 'views/size_add.php';
		return;
	}
	add_size($size_name,$remark);
	$GLOBALS['rt_code'] = RT_CODE('OK');
	include 'views/size_add.php';
}
//修改尺寸
function  editSize(){
	$GLOBALS['rt_code'] = '0';
    $size_id =getClientParam('size_id');
    $GLOBALS['sizeInfos'] = get_onesize($size_id);
   // var_dump($GLOBALS['sizeInfos']);die;
    $submit = getClientParam('submit');
    if(empty($submit)){
    	$GLOBALS['rt_code'] = RT_CODE('ERR_PARAM');
    	include'views/size_edit.php';
    	return ;
    }
    $size_name = getClientParam('size_name');
    $remark = getClientParam('remark');
    if(empty($size_name)){
    	$GLOBALS['rt_code'] = RT_CODE('ERR_PARAM');
    	include'views/size_edit.php';
    	return;
    }
    db_edit_size($size_id, $size_name, $remark);
    $GLOBALS['rt_code'] = RT_CODE('OK');
    include 'views/size_edit.php';
}
//显示商品列表尺寸
function showListSize(){
  $GLOBALS['sizeInfos']=get_all_size();
  include 'views/size_list.php';
  	
}
function deleteSize(){
	
	$size_id = getClientParam('size_id');
	if(empty($size_id)){
		return showListSize();
	}
	delete_size($size_id);
	return showListSize();
}