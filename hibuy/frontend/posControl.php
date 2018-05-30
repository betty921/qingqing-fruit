<?php
/*
时间：2017年8月14日

*/
header("content-type:text/html;charset=utf-8");
include '../models/commentModel.php';
function AddPos(){
	//$u_id = $_SESSION['u_id'];
	$u_id = getClientParam('u_id');
	$arti_id = getClientParam('arti_id');
	if(empty($arti_id)||empty($u_id)){

		echo "<script>alert('点赞失败');</script>";
	}
	db_add_pos($arti_id,$u_id);
	include 'views/hot_arti.php';
	//echo "<script>window.location:views/hot_arti.php;</script>";
}
