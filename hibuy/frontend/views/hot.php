<?php
/*
时间：2017年8月12日

*/
header("content-type:text/html;charset=utf-8");
session_start();
if(empty($_SESSION['u_name'])){
	
	header("location:http://localhost:8088/testPHP/hibuy/frontend/?c=login&m=goLogin");
	echo "<script>alert('请先登录');</script>";
}
$artiInfos = $GLOBALS['artiInfos'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <title>今日热点</title>
    <link href="css/global.css" type="text/css" rel="stylesheet">
    <link href="css/hot.css" type="text/css" rel="stylesheet">
</head>
<body>
<div class="container">
    <div class="banner">
        <img src="image/hot.png">
    </div>
    <?php $i = 1;foreach ($artiInfos as $key):?>
    <div class="hot-items">
        <div class="hot-item">
            <div class="hot-title">TO.<?php echo $i;?> <?php echo $key['arti_title'];?></div>
            <div class="hot-body">
                <a href="?c=arti&m=showArtiByone&arti_id=<?php echo $key['arti_id'];?>">
                    <div class="hot-content">
                        <div class="author">
                            <div class="author-icon">
                                <img src="image/Cecilia.jpg">
                            </div>
                            <div class="author-name">
                                <div class="author-name-name"><?php echo $key['author_name'];?></div>
                                <div class="author-tag"><?php echo $key['author_name_name'];?></div>
                            </div>
                        </div>
                        <div class="hot-content-info"><?php echo $key['arti_subtitle'];?></div>
                    </div>
                    <div class="hot-img">
                        <img src="<?php echo $key['arti_pictures'];?>" >
                    </div>
                </a>
            </div>
        </div>

        

    </div>
    
    <?php $i++;endforeach;?>
</div>
</body>
</html>