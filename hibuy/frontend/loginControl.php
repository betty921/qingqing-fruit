<?php
/*
时间：2017年8月13日

*/
header("content-type:text/html;charset=utf-8");

include '../models/loginModel.php';


 function goLogin()
{
	include 'views/login.php';
	
} 
/*
 * 得到测试结果
 * */
function getcheckresult(){
	$GLOBALS['rt_code'] = '0';
	$submit = getClientParam('submit');
	//var_dump($submit);die;
	if(empty($submit)){
		//echo "提交为空";die;
		include'views/login.php';
	}
	$u_name = getClientParam('u_name');
	
	$u_pwd = getClientParam('u_pwd');
	//echo $u_pwd;die;
	if(empty($u_name)||empty($u_pwd)){
		$GLOBALS['rt_code'] = RT_CODE('ERR_PARAM');
		//echo '数据为空';die;
		include 'views/login.php';
		return ;
	}
	$result = db_check_user($u_name, $u_pwd);
	if(!empty($result)){
		//echo '提交成功';die;
		$GLOBALS['rt_code'] = RT_CODE('OK');
		include 'views/login.php';
		return;
		
	}else{
		echo "提交失败";die;
		$GLOBALS['rt_code'] = RT_CODE('ERR_PARAM');
		include 'views/login.php';
		return;
	}
}

