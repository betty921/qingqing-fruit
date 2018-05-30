<?php
include_once '../models/ColorModel.php';

function addColor()
{
    $colorName = getClientParam('color_name');
    $colorValue = getClientParam('color_value');
    $remark = getClientParam('remark');
    if(empty($colorName) || empty($colorValue)) {
        return rtMsg(RT_CODE('ERR_PARAM'));
    }
    db_add_color($colorName, $colorValue, $remark);
    return rtMsg();
}

//Ajax接口
function getAllColor()
{
    $infos = db_get_all_color();
    return rtMsg(RT_CODE('OK'), $infos);
}
//显示添加颜色页面
function showAddColor(){
	$GLOBALS['rt_code'] = '0';
	$submit = getClientParam('submit');
	if(empty($submit)){
		include 'views/color_add.php';
		return ;
	}
	$color_value = getClientParam('color_value');
	$color_name = getClientParam('color_name');
	$remark = getClientParam('remark');
	if(empty($color_value)||empty($color_name)){
		$GLOBALS['rt_code'] = RT_CODE('ERR_PARAM');
		include 'views/color_add.php';
		return;
	}
	db_add_color($color_name, $color_value,$remark);
	$GLOBALS['rt_code'] = RT_CODE('OK');
	include 'views/color_add.php';
}

//显示颜色列表

function showListColor(){
	$GLOBALS['colorInfos'] = db_get_all_color();
	include 'views/color_list.php';
}

//修改颜色
function  editColor(){
	$GLOBALS['rt_code'] = '0';
	$color_id = getClientParam('color_id');
	$GLOBALS['colorOneInfo'] = get_onecolor($color_id);
	$submit = getClientParam('submit');
	if(empty($submit)){
		include 'views/color_edit.php';
		return ;
	}
	
	$color_value = getClientParam('color_value');
	$color_name = getClientParam('color_name');
	$remark = getClientParam('remark');
	if(empty($color_value)||empty($color_name)){
		$GLOBALS['rt_code'] = RT_CODE('ERR_PARAM');
		include 'views/color_edit.php';
		return;
	}
	db_edit_color($color_id,$color_name, $color_value,$remark);
	$GLOBALS['rt_code'] = RT_CODE('OK');
	include 'views/color_edit.php';
}
//删除颜色
function deleteColor(){
	$color_id = getClientParam('color_id');
	if(empty($color_id)){
		return showListColor();
	}
	db_delete_color($color_id);
	return showListColor();

}