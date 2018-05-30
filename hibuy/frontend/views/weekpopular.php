<?php
/*
ʱ�䣺2017��8��10��

*/
header("content-type:text/html;charset=utf-8");
$weekInfos = $GLOBALS['weekInfos'];
//var_dump($weekInfos);die;
$recordcount=count(array_keys($weekInfos));
$pagesize = 4;
$pagecount = ceil($recordcount/$pagesize);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <title>每周流行</title>
    <link href="css/global.css" rel="stylesheet" type="text/css">
    <link href="css/product_list.css" rel="stylesheet" type="text/css">
    <link href="css/weekpopular.css" rel="stylesheet" type="text/css">
</head>
<body>
<div class="container">
    <div class="popular-desc">
        <img src="image/w1.png">
        <div class="desc">
            <p class="title">流行详解</p>
            <p>春风吹起来，连衣裙穿起来，凸显气质的早春连衣裙都在这里了。</p>
        </div>
    </div>

    <div class="header-nav">
        <div class="nav-item selected"><a href = "?c=week&m=showWeek&popular_category_id=<?php echo $weekInfos[0]['category_id'];?>&act=1">流行</div>
        <div class="nav-item"><a href = "?c=week&m=showWeek&popular_category_id=<?php echo $weekInfos[0]['category_id'];?>&act=2">热销</a></div>
        <div class="nav-item"><a href = "?c=week&m=showWeek&popular_category_id=<?php echo $weekInfos[0]['category_id'];?>&act=3">新品</a></div>
        <div class="nav-item"><a href = "?c=week&m=showWeek&popular_category_id=<?php echo $weekInfos[0]['category_id'];?>&act=4">价格</a></div>
    </div>
         
      <?php for($i=1;$i<=count($weekInfos);$i+=2):?>
           <?php for($j=$i-1;$j<$i;$j+=2):?>
    <div class="product-list">
    
        <div class="product-item">
            <a href="?c=detail&m=showDetail&product_id=<?php echo $weekInfos[$j]['product_id'];?>">
                <img src="<?php echo $weekInfos[$j]['list_img_url'];?>">
                <div class="product-title"><?php echo $weekInfos[$j]['product_name'];?></div>
                <div class="price-shop">
                    <span class="price">￥<?php echo $weekInfos[$j]['origin_price'];?></span>
                    <img src="image/shopping1.png">
                </div>
            </a>
        </div>
      <?php if($i<count($weekInfos)):?>
        <div class="product-item">
            <a href="?c=detail&m=showDetail&product_id=<?php echo $weekInfos[$i]['product_id'];?>">
                <img src="<?php echo $weekInfos[$i]['list_img_url'];?>">
                <div class="product-title"><?php echo $weekInfos[$j]['product_name'];?></div>
                <div class="price-shop">
                    <span class="price">￥<?php echo $weekInfos[$i]['origin_price'];?></span>
                    <img src="image/shopping1.png">
                </div>
            </a>
        </div>
     <?php endif;?>
       
    </div>
    <?php endfor;?>
    <?php endfor;?>
    <table>
   <tr>
<?php for($i=1;$i<=$pagecount;$i++):?>
  <td>
  <a href="?c=week&m=showPage&category_id=<?php echo $weekInfos[0]['category_id'];?>&act=1&pageno=<?php echo $i;?>"><?php echo $i;?></a>  &nbsp;&nbsp;&nbsp;
</td>
<?php endfor;?>
  </tr>
  </table>
</div>

</body>
</html>