<?php
/*
时间：2017年8月9日

*/
header("content-type:text/html;charset=utf-8");
$categorys = $GLOBALS['categoryInfos'];
$diff = $GLOBALS['diff'];
//var_dump($diff);die;
//var_dump($products);die;

//var_dump($remai);die;
//var_dump($products);die;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, inital-scale=1.0, user-scalable=0">
    <title>全部分类</title>
    <link href="css/global.css" type="text/css" rel="stylesheet">
    <link href="css/catgory.css" rel="stylesheet" type="text/css">
    <link href="css/youxuan.css" type="text/css" rel="stylesheet">
</head>
<body>

    <div class="container">
        <div class="title">全部分类</div>
        
        <div class="catgorys">
                 <?php foreach($categorys as $category):?>
                <div class="catgroy-item">
                <img src="<?php echo $category['category_img'];?>">
                <a href = "?c=category&m=showCategory&category_id=<?php echo $category['category_id'];?>">
                <p><?php echo $category['category_name'];?></p>
                 </a>
                </div>
                 <?php endforeach;?>
            </div>
           
          
            
           <?php for($i=1;$i<=count($diff);$i+=2):?>
           <?php for($j=$i-1;$j<$i;$j+=2):?>
            <div class="product-row">
         
                <div class="product-item">
                    <a href="?c=detail&m=showDetail&product_id=<?php echo $diff[$j]['product_id'];?>">
                        <img src="<?php echo $diff[$j]['list_img_url']?>" >
                        <p><?php echo $diff[$j]['product_name'];?></p>
                        <div class="price-car">
                            <span class="price">￥<?php echo $diff[$j]['origin_price'];?></span>
                            <img src="image/car1.png" onclick="alert('x');return false">
                        </div>
                    </a>
                </div>
                 
                
                 <?php if($i<count($diff)):?>
                 <div class="product-item">
                    <a href="?c=detail&m=showDetail&product_id=<?php echo $diff[$i]['product_id'];?>">
                        <img src="<?php echo $diff[$i]['list_img_url'];?>">
                        <p><?php echo $diff[$i]['product_name'];?></p>
                        <div class="price-car">
                            <span class="price">￥ <?php echo $diff[$i]['origin_price'];?></span>
                            <img src="image/car1.png" onclick="alert('x');return false">
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