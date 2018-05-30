<?php
/*
时间：2017年8月11日

*/
header("content-type:text/html;charset=utf-8");

include_once 'ConnectDB.php';

function arti_table_name(){
	return 'hb_article';
}

/*
 * 增加文章
 * */
function db_add_arti($arti_title,$arti_subtitle,$arti_content,$arti_pictures,$author_name,$author_name_name,$time){
	$tablename = arti_table_name();
	$link = sqlLink();
	$query = "insert into ${tablename}(`arti_title`,`arti_subtitle`,`arti_content`,`arti_pictures`,`author_name`,`author_name_name`,`time`)values('${arti_title}','${arti_subtitle}','${arti_content}','${arti_pictures}','${author_name}','${author_name_name}','${time}')";
	$res=mysqli_query($link, $query);
	//var_dump($res);die();
    return;  
}

/*
 * 获取文章内容
 * */
function db_get_arti(){
	$tablename = arti_table_name();
	$link = sqlLink();
	$query = "select * from ${tablename}";
	$artiInfos = [];
	$result = mysqli_query($link, $query);
	if(empty($result)){
		return $artiInfos;
	}
	$i = 0;
	while($info = mysqli_fetch_assoc($result)){
		$artiInfos[$i] = $info;
		$i++;
	}
	return $artiInfos;
}
/*
 * 获取一篇文章内容
 * */

function db_get_artiByone($arti_id=5){
	$tablename = arti_table_name();
	$link = sqlLink();
	$query = "select * from ${tablename} where `arti_id`=${arti_id}";
    $artiOne = [];
    $result = mysqli_query($link, $query);
    if(empty($result)){
    	return $artiOne;
    }
    $artiOne = mysqli_fetch_assoc($result);
    return $artiOne;
}

/*
 *
 * 删除文章内容
 * */
function db_del_arti($arti_id){
	$tablename = arti_table_name();
	$link = sqlLink();
	$query = "delete from ${tablename} where `arti_id`=${arti_id}";
	mysqli_query($link, $query);
	return;
}

?>