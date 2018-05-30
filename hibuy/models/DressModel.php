<?php
/*
时间：2017年8月7日

*/
header("content-type:text/html;charset=utf-8");


include_once 'ConnectDB.php';

function dress_table_name(){
	return 'hb_dress';
}

/**
 * 增加类型
 */
function db_add_dress($dress_name,$dress_img){
	$tablename = dress_table_name();
	$link = sqlLink();
	$query = "insert into ${tablename}(`dress_name`,`dress_img`) values ('${dress_name}','${dress_img}')";
	mysqli_query($link, $query);
	return;
}

/*
 * 删除类型
 * */
function delete_dress($dress_id){
	$tablename = dress_table_name();
	$sqlStr = "delete from ${tablename} where dress_id = '${dress_id}'";
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
 * 修改商品
 * */
function db_edit_dress($dress_id,$dress_name,$dress_img){
	$tablename = dress_table_name();
	$sqlStr = "update ${tablename} set `dress_name`='${dress_name}',`dress_img`='${dress_img}' where `dress_id` = ${dress_id} ";
    $sqllink = sqlLink();
    mysqli_query($sqllink, $sqlStr);
    return true;
}
/*
 * 获取商品一条的信息
 * */
function get_onedress($dress_id){
	$tablename = dress_table_name();
	$sqlStr = "select * from ${tablename} where `dress_id` = ${dress_id}";
    $sqllink = sqlLink();
    $dressInfos = [];
    $result = mysqli_query($sqllink, $sqlStr);
    if(empty($result)){
    	return $dressInfos;
    }
    $dressInfos = mysqli_fetch_assoc($result);
    return $dressInfos;
}


/**
 * 获取所有商品类型
 */
function db_get_dress(){
	$tablename = dress_table_name();
	$link = sqlLink();
	$query = "select * from ${tablename}";
	$dressInfos = [];
	$result = mysqli_query($link, $query);
	if(empty($result)){
		return $dressInfos;
	}
	$i = 0;
	while($info = mysqli_fetch_assoc($result)){
		$dressInfos[$i] = $info;
		$i++;
	}
	return $dressInfos;
}

?>
