<?php
/*
时间：2017年8月10日

*/
header("content-type:text/html;charset=utf-8");
$fashionInfos=$GLOBALS['fashionInfos'];
//echo $fashionInfos[0]['dress_id'];die;
//var_dump($fashionInfos);die;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <title>潮流穿搭</title>
    <link href="css/global.css" rel="stylesheet" type="text/css">
    <link href="css/product_list.css" rel="stylesheet" type="text/css">
    <link href="css/fashion.css" rel="stylesheet" type="text/css">
</head>
<body>
<div class="container">
    <div class="header-nav">
        <div class="nav-item selected"><a href = "?c=fashion&m=showFashion&dress_id=<?php echo $fashionInfos[0]['dress_id']; ?>&act=1">流行</a></div>
        <div class="nav-item"><a href = "?c=fashion&m=showFashion&dress_id=<?php echo $fashionInfos[0]['dress_id']; ?>&act=2">热销</a></div>
        <div class="nav-item"><a href = "?c=fashion&m=showFashion&dress_id=<?php echo $fashionInfos[0]['dress_id']; ?>&act=3">新品</a></div>
        <div class="nav-item"><a href = "?c=fashion&m=showFashion&dress_id=<?php echo $fashionInfos[0]['dress_id']; ?>&act=4">价格</a></div>
    </div>
      
      <?php for($i=1;$i<=count($fashionInfos);$i+=2):?>
           <?php for($j=$i-1;$j<$i;$j+=2):?>
    <div class="product-list">
        <div class="product-item">
            <a href="?c=detail&m=showDetail&product_id=<?php echo $fashionInfos[$j]['product_id'];?>">
                <img src="<?php echo $fashionInfos[$j]['list_img_url'];?>" >
                <div class="product-title"><?php echo $fashionInfos[$j]['product_name'];?></div>
                <div class="price-shop">
                    <span class="price">￥<?php echo $fashionInfos[$j]['origin_price'];?></span>
                    <img src="image/shopping1.png">
                </div>
            </a>
        </div>
        <?php if($i<count($fashionInfos)):?>
        <div class="product-item">
            <a href="?c=detail&m=showDetail&product_id=<?php echo $fashionInfos[$i]['product_id'];?>">
                <img src="<?php echo $fashionInfos[$i]['list_img_url'];?>">
                <div class="product-title"><?php echo $fashionInfos[$i]['product_name'];?></div>
                <div class="price-shop">
                    <span class="price">￥<?php echo $fashionInfos[$i]['origin_price'];?></span>
                    <img src="image/shopping1.png">
                </div>
            </a>
        </div>
		<?php endif;?>
       
     </div>
    <?php endfor;?>
    <?php endfor;?>
   
</div>
</body>
</html>