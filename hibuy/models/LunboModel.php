<?php
/*
时间：2017年8月9日

*/
header("content-type:text/html;charset=utf-8");
include_once 'ConnectDB.php';
function lunbo_table_name(){
	return 'hb_lunbo';
}

function add_lunbo($lunbo_img_url,$lunbo_name,$lunbo_no){
	$tablename= lunbo_table_name();
	$link = sqlLink();
	$query = "insert into ${tablename}(`lunbo_img_url`,`lunbo_name`,`lunbo_no`)values('${lunbo_img_url}','${lunbo_name}',${lunbo_no})";
    //echo $query;die; 
	mysqli_query($link, $query);
     return;
}

function get_all_lunbo(){
	$tablename= lunbo_table_name();
	$link = sqlLink();
	$query = "select * from ${tablename}";
	$lunboInfos = [];
	$result = mysqli_query($link, $query);
	if(empty($result)){
		return $lunboInfos;
	}
	$i=0;
	while($info = mysqli_fetch_assoc($result)){
		$lunboInfos[$i] = $info;
		$i++;
	}
	return $lunboInfos;
}
function delete_lunbo($lunbo_id){
	$tablename= lunbo_table_name();
	$link = sqlLink();
	$query = "delete from ${tablename} where `lunbo_id`=${lunbo_id}";
	mysqli_query($link, $query);
	return true;
}

function edit_lunbo($lunbo_id,$lunbo_img_url,$lunbo_no,$lunbo_name){
	$tablename= lunbo_table_name();
	$link = sqlLink();
	$query = "update ${tablename} set `lunbo_img_url` ='${lunbo_img_url}',`lunbo_no`=${lunbo_no},`lunbo_name`='${lunbo_name}' where `lunbo_id`=${lunbo_id}";
    //echo $query;die;
	$result = mysqli_query($link, $query);
    if(empty($result)){
		return false;
	}
	return;
}
function get_onelunbo($lunbo_id){
	$tablename= lunbo_table_name();
	$link = sqlLink();
	$query = "select * from ${tablename} where `lunbo_id` = ${lunbo_id}";
    //echo $query;die;
	$lunboInfos = [];
    $result = mysqli_query($link, $query);
    if(empty($result)){
    	return $lunboInfos;
    }
    $lunboInfos = mysqli_fetch_assoc($result);
    return $lunboInfos;
}
//按顺序轮播
function get_orderlunbo(){
	$tablename= lunbo_table_name();
	$link = sqlLink();
	$query = "select * from ${tablename} order by `lunbo_no`";
	//echo $query;die;
	$lunboInfos = [];
	$result = mysqli_query($link, $query);
	if(empty($result)){
		return $lunboInfos;
	}
	$i=0;
	while($info = mysqli_fetch_assoc($result)){
		$lunboInfos[$i] = $info;
		$i++;
	}
	return $lunboInfos;
}
