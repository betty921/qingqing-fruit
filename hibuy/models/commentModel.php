<?php
/*
时间：2017年8月13日

*/
header("content-type:text/html;charset=utf-8");
include_once 'ConnectDB.php';

function message_table_name(){
	return 'hb_message';
}

function db_add_comment($arti_id,$u_id,$u_name,$u_icon,$message,$picture,$time){
	$tablename = message_table_name();
	$link = sqlLink();
	$query = "insert into ${tablename}(`arti_id`,`u_id`,`u_name`,`u_icon`,`message`,`picture`,`time`) values(${arti_id},${u_id},'${u_name}','${u_icon}','${message}','${picture}','${time}')";
	//echo $query;die;
	mysqli_query($link, $query);
	return;
}

function get_all_comments($arti_id=5){
	$tablename = message_table_name();
	$link = sqlLink();
	$query = "select * from ${tablename} where `arti_id`=${arti_id}";
	$comInfos = [];
	$result = mysqli_query($link, $query);
	if(empty($result)){
		return $comInfos;
	}
	$i = 0;
	while($info = mysqli_fetch_assoc($result)){
		$comInfos[$i] = $info;
		$i++;
	}
	return $comInfos;
}
function db_add_pos($m_id){
	$tablename = message_table_name();
	$link = sqlLink();
	$query = "update ${tablename} set `pos`=`pos`+1 where `m_id`=${m_id}";
	//echo $query;die;
	$result = mysqli_query($link, $query);
	if($result){
		echo "<script>alert('点赞成功');window.location.href=document.referrer;</script>";
	}
	return;
}