<?php
/*
下午2:12:24
*/
header("content-type:text/html;charset=utf-8");
/**
 * 类型相关的操作
*/
include_once 'ConnectDB.php';

function table_name(){
	return 'hb_product_category';
}

/**
 * 增加类型
*/
function db_add_category($category_name,$category_img){
	$tablename = table_name();
	$link = sqlLink();
	$query = "insert into ${tablename}(`category_name`,`category_img`) values ('${category_name}','${category_img}')";
	mysqli_query($link, $query);
	return;
}

/*
 * 删除类型
 * */
function delete_category($category_id){
	$tablename = table_name();
	$sqlStr = "delete from ${tablename} where category_id = '${category_id}'";
	$sqllink = sqlLink();
	mysqli_query($sqllink, $sqlStr);
	$result = mysqli_query($sqllink, $sqlStr);
	/* if(!($result && mysqli_affected_rows($sqllink))){
		echo "<script>alert('删除成功！');window.location.href=document.referrer;</script>";
	}else{
		echo "<script>alert('删除失败！');window.location.href=document.referrer;</script>";
	} */

}
/*
 * 修改商品类型
 * */
function  db_edit_category($category_id,$category_name,$category_img){
	$tablename = table_name();
	$sqlStr = "update ${tablename} set `category_name`='${category_name}',`category_img`='${category_img}' where `category_id`= ${category_id}";
	$sqllink = sqlLink();
	mysqli_query($sqllink, $sqlStr);
	return true;
}

/*
 * 获取一条类别
 * */
function get_onecategory($category_id){
	$tablename = table_name();
	$sqlStr = "select * from ${tablename} where `category_id` = ${category_id}";
	$sqllink = sqlLink();
	$categoryInfos = [];
	$result = mysqli_query($sqllink, $sqlStr);
	if(empty($result)){
		return $categoryInfos;
	}
	$categoryInfos = mysqli_fetch_assoc($result);
	return $categoryInfos;
}

/**
 * 获取所有商品类型
 */
function db_get_category(){
	$tablename = table_name();
	$link = sqlLink();
	$query = "select * from ${tablename}";
	$categoryInfos = [];
	$result = mysqli_query($link, $query);
	if(empty($result)){
		return $categoryInfos;
	}
	$i = 0;
	while($info = mysqli_fetch_assoc($result)){
		$categoryInfos[$i] = $info;
		$i++;
	}
	return $categoryInfos;
}

