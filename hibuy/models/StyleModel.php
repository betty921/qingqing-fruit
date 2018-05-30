<?php
/*
时间：2017年8月8日

*/
header("content-type:text/html;charset=utf-8");
include_once 'ConnectDB.php';
include 'colorModel.php';
include 'sizeModel.php';
include 'productModel.php';
$GLOBALS['colorInfos'] = db_get_all_color();
$GLOBALS['sizeInfos'] = get_all_size();
$GLOBALS['productInfos'] = get_all_product();
function style_table_name(){
	return 'hb_product_style';
}
//添加商品样式
function db_add_style($product_id,$color_id,$size_id,$stock,$sell_num){
	$tablename = style_table_name();
	$sqllink = sqlLink();
	$sqlStr = "insert into $tablename(`product_id`,`color_id`,`size_id`,`stock`,`sell_num`)values(${product_id},${color_id},${size_id},${stock},${sell_num})";
	mysqli_query($sqllink, $sqlStr);
    return;
}
//获取一条样式信息
function get_onestyle($product_style_id){
	$tablename = style_table_name();
	$sqllink = sqlLink();
	$sqlStr = "select*from ${tablename} where `product_style_id`=${product_style_id}";
    //echo $sqlStr;die;
	$styleInfos = [];
    $result = mysqli_query($sqllink, $sqlStr);
    if(empty($result)){
    	return $styleInfos;
    }
    $styleInfos = mysqli_fetch_assoc($result);
    return $styleInfos;
}
//修改商品样式信息
function db_edit_style($product_style_id,$stock){
	$tablename = style_table_name();
	$sqllink = sqlLink();
	$sqlStr = "update ${tablename} set `stock`=${stock} where `product_style_id`=${product_style_id} ";
    mysqli_query($sqllink, $sqlStr);
    return true;
}
//获取所有样式
function db_get_allstyle(){
	$tablename = style_table_name();
	$sqllink = sqlLink();
	$sqlStr = "select * from ${tablename}";
	//echo $sqlStr;die;
	$styleInfos = [];
	$result = mysqli_query($sqllink, $sqlStr);
	if(empty($result)){
		return $styleInfos;
	}
	$i = 0;
	while($info = mysqli_fetch_assoc($result)){
		$styleInfos[$i] = $info;
		$i++;
	}
	return $styleInfos;
}
//删除样式
function db_deleteStyle($product_style_id){
	$tablename = style_table_name();
	$sqllink = sqlLink();
	$sqlStr = "delete from $tablename where `product_style_id`='${product_style_id}'";
	mysqli_query($sqllink, $sqlStr);
	
}
?>