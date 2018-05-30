<?php
/*
时间：2017年8月13日

*/
header("content-type:text/html;charset=utf-8");
session_start();
include_once 'ConnectDB.php';
function user_table_name(){
	return 'hb_user';
}
/*验证用户是否合法
 * */
function db_check_user($u_name,$u_pwd){
	$tablename= user_table_name();
	$link = sqlLink();
	$query = "select * from ${tablename} where `u_name` = '${u_name}' and `u_pwd`='${u_pwd}' ";
	
	//echo $query;die;
	$result = mysqli_query($link, $query);
	$row = mysqli_fetch_assoc($result);
	//var_dump($row);
		//echo $row['u_icon'];die;
	$_SESSION['u_id'] = $row['u_id'];
	$_SESSION['u_name'] = $row['u_name'];
	$_SESSION['u_icon'] = $row['u_icon'];

	return $result;
}