<?php
/*
时间：2017年8月13日

*/
header("content-type:text/html;charset=utf-8");
session_start();

include '../models/commentModel.php';
function AddComment(){
	/* $GLOBALS['rt_code'] = '0';
	$submit = getClientParam('submit');
	if(empty($submit)){
		include 'views/hot_arti.php';
		return;
	} */
	$u_id = $_SESSION['u_id'];
	$arti_id = $_SESSION['arti_id'];
	$u_name = $_SESSION['u_name'];
	$u_icon = $_SESSION['u_icon'];
	//echo $u_name;die;
	//$arti_id = getClientParam('arti_id');
	$message = getClientParam('message');
	$picture = getClientParam('picture');
	//echo $message;die;
	$time = time();
	if(empty($message)&&empty($picture)){
		/* $GLOBALS['rt_code'] = RT_CODE('ERR_PARAM');
		include 'views/hot_arti.php';
		return ; */
		return rtMsg(ERR_PARAM);
	}
	db_add_comment($arti_id,$u_id,$u_name,$u_icon,$message,$picture,$time);
	//$GLOBALS['rt_code'] = RT_CODE('OK');
	return rtMsg();
	//include 'views/hot_arti.php';
	//echo "<script>window.location:views/hot_arti.php;</script>";
}

?>