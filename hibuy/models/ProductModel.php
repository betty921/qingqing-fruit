<?php
/*
时间：2017年8月8日

*/
header("content-type:text/html;charset=utf-8");
include_once 'ConnectDB.php';

function product_table_name(){
	return 'hb_product';
}
//添加商品
function db_add_product($product_no,$product_name,
		$product_subname,$list_img_url,$origin_price,$discount_price,
		$is_optimization,$is_hot,$is_week_popular,
		$category_id,$dress_id,$popular_category_id,$ctime,$remark){
	
	$tablename = product_table_name();
	$sqllink = sqlLink();
	$sqlStr = "insert into ${tablename} (`product_no`,`product_name`,
	`product_subname`,`list_img_url`,`origin_price`,`discount_price`,
	`is_optimization`,`is_hot`,
	`is_week_popular`,`category_id`,`dress_id`,`popular_category_id`,
	`ctime`,`remark`) values ('${product_no}','${product_name}','${product_subname}',
	'${list_img_url}',${origin_price},${discount_price},
	${is_optimization},${is_hot},${is_week_popular},${category_id},${dress_id},
	${popular_category_id},${ctime},'${remark}')";
	mysqli_query($sqllink, $sqlStr);
	//echo $sqlStr;die;
	return;
}

//获取所有商品
function get_all_product(){
	$tablename = product_table_name();
	$sqllink = sqlLink();
	$sqlStr = "select * from ${tablename}";
	$productInfos = [];
	$result = mysqli_query($sqllink,$sqlStr);
	if(empty($result)){
		return $productInfos;
	}
	$i = 0;
	while($info = mysqli_fetch_assoc($result)){
		$productInfos[$i] = $info;
		$i++;
	}
	return $productInfos;
}
/**
 * 删除商品
 */
function db_delete_product($product_id){
	$tablename = product_table_name();
	$link = sqlLink();
	$query = "delete from ${tablename} where product_id=${product_id}";
	mysqli_query($link, $query);
	return true;
	/* if($result && mysqli_affected_rows($link)){
		echo "<script>alert('删除成功！');window.location.href=document.referrer;</script>";
		}else{
		echo "<script>alert('删除失败！');window.location.href=document.referrer;</script>";
		} */
}
/**
 * 获取一条商品信息  */
function db_get_one_product($product_id){
	$tablename = product_table_name();
	$link = sqlLink();
	$query = "select * from ${tablename} where product_id=${product_id}";
	$productInfos = [];
	$result = mysqli_query($link, $query);
	if(empty($result)){
		return $productInfos;
	}
	$productInfos = mysqli_fetch_assoc($result);
	return $productInfos;
}
/**
 * 修改商品信息  */
function db_mod_one_poduct($product_id,$product_name,$product_subname,
		$list_img_url,$origin_price,$discount_price,$is_optimization,
		$is_hot,$is_week_popular,$category_id,$dress_id,$popular_category_id,
		$ctime,$remark){
	$tablename = product_table_name();
	$link = sqlLink();
	$query = "update ${tablename} set `product_name`='${product_name}',
	`product_subname`='${product_subname}', `list_img_url`='${list_img_url}',
	`origin_price`=${origin_price},`discount_price`=${discount_price},
	`is_optimization`=${is_optimization},`is_hot`=${is_hot},
	`is_week_popular`=${is_week_popular},`category_id`=${category_id},
	`dress_id`=${dress_id},`popular_category_id`=${popular_category_id},
	`ctime`=${ctime},`remark`='${remark}'where `product_id`=${product_id}";
	//echo $query;die;
	$result = mysqli_query($link, $query);
	if(empty($result)){
		return false;
	}
	return;
}
//获取优选
function get_goodchoice(){
	$tablename = product_table_name();
	$link = sqlLink();
	$query = "select * from ${tablename} where `is_optimization`=1";
	//echo $query;die;
	$goodchoice = [];
	$result = mysqli_query($link,$query);
	if(empty($result)){
		return $goodchoice;
	}
	$i = 0;
	while($info = mysqli_fetch_assoc($result)){
		$goodchoice[$i] = $info; 
		$i++;
	}
	//var_dump($goodchoice);die;
	return $goodchoice;
}
//按销量获取优选
function get_goodchoice_by_upsellnum(){
	$tablename = product_table_name();
	$link = sqlLink();
	$query = "select * from ${tablename} where `is_optimization`=1  order by`sell_num`";
	$goodChoicebyupSellnum = [];
	$result = mysqli_query($link,$query);
	if(empty($result)){
		return $goodChoicebyupSellnum;
	}
	$i = 0;
	while($info = mysqli_fetch_assoc($result)){
		$goodChoicebyupSellnum[$i] = $info;
		$i++;
	}
	//var_dump($goodchoice);die;
	return $goodChoicebyupSellnum;
}

function get_goodchoice_by_downsellnum(){
	$tablename = product_table_name();
	$link = sqlLink();
	$query = "select * from ${tablename} where `is_optimization`=1 order by`sell_num`desc";
	$goodChoicebydownSellnum = [];
	$result = mysqli_query($link,$query);
	if(empty($result)){
		return $goodChoicebydownSellnum;
	}
	$i = 0;
	while($info = mysqli_fetch_assoc($result)){
		$goodChoicebydownSellnum[$i] = $info;
		$i++;
	}
	//var_dump($goodchoice);die;
	return $goodChoicebydownSellnum;
}
//根据价格获取优选
function get_goodchoice_byupPrice(){
	$tablename = product_table_name();
	$link = sqlLink();
	$query = "select * from ${tablename} where `is_optimization`=1 order by`origin_price`";
	//echo $query;die;
	$goodchoicebyupPrice = [];
	$result = mysqli_query($link, $query);
	if(empty($result)){
		return $goodchoicebyupPrice;
	}
	$i = 0;
	while($info = mysqli_fetch_assoc($result)){
		$goodchoicebyupPrice[$i] = $info;
		$i++;
	}
	//var_dump($goodchoice);die;
	return $goodchoicebyupPrice;
}

//是否潮流穿搭
function get_fit(){
	$tablename = product_table_name();
	$link = sqlLink();
	$query = "select * from ${tablename} where `is_hot`=1";
	$fit = [];
	$result = mysqli_query($link, $query);
	if(empty($result)){
		return $fit;
	}
	$i = 0;
	while($info = mysqli_fetch_assoc($result)){
		$fit[$i] = $info;
		$i++;
	}
	return $fit;
}

function get_fashion($dress_id,$act=1){
	$tablename = product_table_name();
	$link = sqlLink();
	//echo $dress_id;die;
	
	
	if($act ==1 ){$query = "select * from ${tablename} where `dress_id`=${dress_id}";}
	else if($act==2){
		$query = "select * from ${tablename} where `dress_id`=${dress_id} and `is_hot`=1";
	}
	else if($act==3){
		$query = "select * from ${tablename} where `dress_id`=${dress_id} order by `ctime`";
	}
	else{
		$query = "select * from ${tablename} where `dress_id`=${dress_id} order by `origin_price`";
	}
	//echo  $query;die;
	$fashionInfos = [];
	$result = mysqli_query($link, $query);
	if(empty($result)){
		return $fashionInfos;
	}
	$i = 0;
	while($info = mysqli_fetch_assoc($result)){
		$fashionInfos[$i] = $info;
		$i++;
	}
	//var_dump($fashionInfos);die;
	return $fashionInfos;
}



//是否每周流行
function get_week(){
	$tablename = product_table_name();
	$link = sqlLink();
	$query = "select * from ${tablename} where `is_week_popular`=1";
	$week = [];
	$result = mysqli_query($link, $query);
	if(empty($result)){
		return $week;
	}
	$i = 0;
	while($info = mysqli_fetch_assoc($result)){
		$week[$i] = $info;
		$i++;
	}
	return $week;
}
//按每周流行分类
function get_diff_week($popular_category_id,$act,$startno=1,$pagesize=100){
	
	$tablename = product_table_name();
	$link = sqlLink();
	//echo $dress_id;die;
	$query = "select * from ${tablename} where";
	switch($act){
		case 1:
			$query .= "`is_week_popular`=1 and `popular_category_id`=${popular_category_id} ";
			break;
		case 2:
	$query .= "`popular_category_id`=${popular_category_id}  and `is_hot`=1";
	break;
		case 3:
	$query .= "`popular_category_id`=${popular_category_id} order by `ctime`";
    break;
		default:
	$query .= "`popular_category_id`=${popular_category_id}  order by `origin_price`";	
}
	
	
	//echo  $query;die;
	$weekInfos = [];
	$result = mysqli_query($link, $query);
	if(empty($result)){
		return $weekInfos;
	}
	$i = 0;
	while($info = mysqli_fetch_assoc($result)){
		$weekInfos[$i] = $info;
		$i++;
	}
	//var_dump($fashionInfos);die;
	return $weekInfos;
} 
//获取分类的商品
function get_diff_kind($category_id,$act){
	$tablename = product_table_name();
	$link = sqlLink();
	$query = "select * from ${tablename} where";
	switch($act){
		case 1:
	$query .= "`category_id`=${category_id}";
			break;
        case 2:
    $query .= "`category_id`=${category_id}";
			break;
		case 3:
	$query .= "`category_id`=${category_id}";
	break;
		case 4:
	$query .= "`category_id`=${category_id}";
	break;
		case 5:
	$query .= "`category_id`=${category_id}";
	break;
		case 6:
	$query .= "`category_id`=${category_id}";
	break;
		case 7:
	$query .= "`category_id`=${category_id}";
	break;
//  case 8:
// 		$query .= "`category_id`=${category_id}";
// 		break; 
		default:
	 $query .= "`category_id`=${category_id}";
	}
	$diff= [];
	$result = mysqli_query($link, $query);
	if(empty($result)){
		return $diff;
	}
	$i = 0;
	while($info = mysqli_fetch_assoc($result)){
		$diff[$i] = $info;
		$i++;
	}
	return $diff;
}

?>