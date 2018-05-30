<?php
header("content-type:text/html;charset=utf-8");
/**
 * 商品颜色相关的操作
 */
include_once 'ConnectDB.php';

function color_table_name()
{
    return 'hb_color';
}

/**
 * 增加颜色
 */
function db_add_color($color_name, $color_value, $remark='')
{
    $tablename = color_table_name();
    $sqlStr = "insert into ${tablename}(`color_name`, `color_value`, `remark`) VALUES ('${color_name}', '${color_value}', '${remark}')";

    $sqllink = sqlLink();
    mysqli_query($sqllink, $sqlStr);
    return true;
}
/*
 * 获取一条颜色值
 * */
function get_onecolor($color_id){
	$tablename = color_table_name();
	$sqlStr  = "select * from $tablename  where `color_id`=${color_id}";
	$sqllink = sqlLink();
	$colorOneInfo = [];
	$result = mysqli_query($sqllink, $sqlStr);
	if(empty($result)) {
		return $colorOneInfo;
	}
	$colorOneInfo = mysqli_fetch_assoc($result);
	return $colorOneInfo;
}
/*
 * 修改颜色
 * */
function db_edit_color($color_id,$color_name,$color_value,$remark=''){
	$tablename = color_table_name();
	$sqlStr  = "update $tablename set `color_name` = '${color_name}',`color_value`='${color_value}',`remark`='${remark}' where `color_id`=${color_id}";
	$sqllink = sqlLink();
    $result = mysqli_query($sqllink, $sqlStr);
    return true;
}
/*
 * 删除颜色
 * */


function db_delete_color($color_id){
	 $tablename = color_table_name();
	 $sqlStr = "delete from ${tablename} where color_id = ${color_id}";
     //echo $sqlStr;die;
	 $sqllink = sqlLink();
	 mysqli_query($sqllink, $sqlStr);
    $result = mysqli_query($sqllink, $sqlStr);
	/* if(!($result && mysqli_affected_rows($sqllink))){
		echo "<script>alert('删除成功！');window.location.href=document.referrer;</script>";
	}else{
		echo "<script>alert('删除失败！');window.location.href=document.referrer;</script>";
	} */
}
/**
 * 获取所有的商品颜色
 */
function db_get_all_color()
{
    $sqllink = sqlLink();
    $tablename = color_table_name();
    $sqlStr = "select * from ${tablename}";
    $colorInfos = [];
    $i=0;
    $result = mysqli_query($sqllink, $sqlStr);
    if(empty($result)) {
        return $colorInfos;
    }
    while($info = mysqli_fetch_assoc($result)) {
        $colorInfos[$i] = $info;
        $i++;
    }
    return $colorInfos;
}