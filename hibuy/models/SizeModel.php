<?php
header("content-type:text/html;charset=utf-8");
/**
 * 商品尺码操作
 */
include_once 'ConnectDB.php';

function size_table_name()
{
    return 'hb_size';
}

function add_size($size_name,$remark=''){
    $tablename = size_table_name();
    $sqlStr = "insert into ${tablename}(`size_name`,`remark`) VALUES ('${size_name}',  '${remark}')";
    $sqllink = sqlLink();
    mysqli_query($sqllink, $sqlStr);
    return true;
}
/*
 * 获取一条尺码
 * */
function get_onesize($size_id){
	$tablename = size_table_name();
	$sqlStr = "select * from ${tablename} where `size_id` = ${size_id}";
	$sqllink = sqlLink();
	$sizeInfos = [];
	$result = mysqli_query($sqllink, $sqlStr);
	if(empty($result)){
		return $sizeInfos;
	}
	$sizeInfos = mysqli_fetch_assoc($result);
	return $sizeInfos;
}
/*
 * 修改尺码
 * */
function  db_edit_size($size_id,$size_name,$remark){
	$tablename = size_table_name();
	$sqlStr = "update ${tablename} set `size_name`='${size_name}',`remark`='${remark}' where `size_id`= ${size_id}";
	$sqllink = sqlLink();
    mysqli_query($sqllink, $sqlStr);
    return true;
} 

/*
 * 删除尺码
 * */

function delete_size($size_id){
 $tablename = size_table_name();
	 $sqlStr = "delete from ${tablename} where size_id = '${size_id}'";
	 $sqllink = sqlLink();
	 mysqli_query($sqllink, $sqlStr);
    $result = mysqli_query($sqllink, $sqlStr);
	/* if(!($result && mysqli_affected_rows($sqllink))){
		echo "<script>alert('删除成功！');window.location.href=document.referrer;</script>";
	}else{
		echo "<script>alert('删除失败！');window.location.href=document.referrer;</script>";
	}
	 */
}

function get_all_size()
{
    $sqllink = sqlLink();
    $tablename = size_table_name();
    $sqlStr = "select * from ${tablename}";
    $sizeInfos = [];
    $i=0;
    $result = mysqli_query($sqllink, $sqlStr);
    if(empty($result)) {
        return $sizeInfos;
    }
    while($info = mysqli_fetch_assoc($result)) {
        $sizeInfos[$i] = $info;
        $i++;
    }
    return $sizeInfos;
}

function get_where_size($size_id)
{
    $sqllink = sqlLink();
    $tablename = size_table_name();
    $sqlStr = "select * from ${tablename} where size_id=$size_id";
    $sizeInfos = [];
    $i=0;
    $result = mysqli_query($sqllink, $sqlStr);
    if(empty($result)) {
        return $sizeInfos;
    }
    while($info = mysqli_fetch_assoc($result)) {
        $sizeInfos[$i] = $info;
        $i++;
    }
    return $sizeInfos;
}