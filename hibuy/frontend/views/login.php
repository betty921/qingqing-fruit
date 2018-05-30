<?php
/*
时间：2017年8月13日

*/
header("content-type:text/html;charset=utf-8");

?>
<!DOCTYPE html>
<html>
<head>
<title>登录页面</title>
<meta charset="utf-8">
<link rel="stylesheet" type="text/css" href="views/bootstrap/css/bootstrap.css">
<script src="views/bootstrap/js/bootstrap.min.js"></script>
</head>

<body>
<form action = "?c=login&m=getcheckresult" method = "get">

<input type="text" name="c" value="login" hidden>
<input type="text" name="m" value="getcheckresult" hidden>

<div class = "panel panel-danger" style = "width :400px;margin :200px auto;">
  <div class = "panel panel-heading">欢迎登录Hibuy</div>
  
  <div calss = "panel panel-body">
  
    <div class = "input-group">
    <lable class = "input-group-oddon glyphicon  glyphicon-user"></lable>
    <input type = "text" name = "u_name" class = "form-control" placeholder="用户名">
    </div>
    
  
  
    <div class = "input-group">
    <lable class = "input-group-oddon glyphicon  glyphicon-lock"></lable>
    <input type = "password" name = "u_pwd" class = "form-control" placeholder="密码">
    </div>
    
     <br>
    <div class ="form-group">
    <input type = "submit" name = "submit" class = "form-group btn btn-info btn-lg" value = "submit">
    </div>
     
       <a href = "?c=Index&m=showIndex">去hibuy？？</a>
    </div>
  
    </div>
   
    </form>
    								<p style="color: red">
<?php
	if(!empty($GLOBALS['rt_code'])) {
		if($GLOBALS['rt_code'] == RT_CODE('OK')) {
			echo '登录成功';
		}
		else if($GLOBALS['rt_code'] == RT_CODE('ERR_PARAM')){
			echo '请检测参数';
		}
	}
?>
</p>
   
</body>

</html>