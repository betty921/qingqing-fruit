<?php
/*
时间：2017年8月14日

*/
header("content-type:text/html;charset=utf-8");
session_start();
include '../models/commentModel.php';

function addComment(){
	//$arti_id = 5;
	$u_name = $_SESSION['u_name'];
	$u_id = $_SESSION['u_id'];
	$u_icon = $_SESSION['u_icon'];
	//echo $u_id;die;
	 $message = getClientParam('message');
	$picture = getClientParam('picture'); 
	$time = time();
    /* if(empty($message)&&empty($picture)){
		return rtMsg(ERR_PARAM);
	} */
	db_add_comment($arti_id=5,$u_id,$u_name,$u_icon,$message,$picture,$time);
	return rtMsg();
}
//addComment();
?>