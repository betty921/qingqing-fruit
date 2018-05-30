<?php
/*
时间：2017年8月7日

*/
header("content-type:text/html;charset=utf-8");
include_once 'ConnectDB.php';
function popular_table_name(){
	return 'hb_popular_category';
}

/**
 * 增加类型
 */
function db_add_popular($popular_category_name,$imgurl){
	$tablename = popular_table_name();
	$link = sqlLink();
	$query = "insert into ${tablename}(`popular_category_name`,`popular_img`)
	 values ('${popular_category_name}','${imgurl}')";
	mysqli_query($link, $query);
	return;
}

/*
 * 删除类型
 * */
function delete_popular($popular_category_id){
	$tablename = popular_table_name();
	$sqlStr = "delete from ${tablename} where popular_category_id = '${popular_category_id}'";
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
 * 获取商品一条的信息
 * */
function get_onepopular($popular_category_id){
	$tablename = popular_table_name();
	$sqlStr = "select * from ${tablename} where `popular_category_id` = ${popular_category_id}";
	$sqllink = sqlLink();
	$popularInfos = [];
	$result = mysqli_query($sqllink, $sqlStr);
	if(empty($result)){
		return $popularInfos;
	}
	$popularInfos = mysqli_fetch_assoc($result);
	return $popularInfos;
}
//修改商品信息

function db_edit_popular($popular_category_id,$popular_category_name,$popular_img){
	$tablename = popular_table_name();
	$sqlStr = "update ${tablename} set `popular_category_name`='${popular_category_name}' ,`popular_img`='${popular_img}'
	 where `popular_category_id`=${popular_category_id}";
    $sqllink = sqlLink();
    mysqli_query($sqllink, $sqlStr);
    return true;
}

/**
 * 获取所有商品类型
 */
function db_get_popualr(){
	$tablename = popular_table_name();
	$link = sqlLink();
	$query = "select * from ${tablename}";
	$popularInfos = [];
	$result = mysqli_query($link, $query);
	if(empty($result)){
		return $popularInfos;
	}
	$i = 0;
	while($info = mysqli_fetch_assoc($result)){
		$popularInfos[$i] = $info;
		$i++;
	}
	return $popularInfos;
}

?>
