<?php
/*
ʱ�䣺2017��8��9��

*/
header("content-type:text/html;charset=utf-8");
@$fit = $GLOBALS['fit'];
@$week = $GLOBALS['week'];
@$lunboInfos= $GLOBALS['lunboInfos'];
@$productInfos = $GLOBALS['productInfos'];

//echo $keys = mt_rand(0,(count(array_keys($productInfos)))-1);die;
//var_dump($lunboInfos);die;
//var_dump($productInfos);die;
//var_dump($fit);die;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <title>HiBuy</title>
    <link href="css/global.css" type="text/css" rel="stylesheet">
    <link href="css/index.css" type="text/css" rel="stylesheet">
	<script src= "js/jquery-2.0.3.min.js"></script>
    <script src = "js/kingSwape.js"></script>
    <link href = "css/kingSwape.css" type = "text/css" rel="stylesheet">
    <style>
    .container{
       width: 100%;
    }
    </style>
    
    </head>
<body>

<div class="container">
   <!-- 轮播 -->
   
      
        <div class="swape_box">
            
            <div class="imgs" style="z-index: 1">
                <div class="img">
                    <a href="javascript:void(0);">
                        <img src="../image/<?php echo $lunboInfos[0]['lunbo_img_url'];?>" alt="1">
                    </a>
                </div>
                   <div class="img">
                    <a href="javascript:void(0);">
                        <img src="../image/<?php echo $lunboInfos[1]['lunbo_img_url'];?>" alt="2">
                    </a>
                </div>
                <div class="img">
                    <a href="javascript:void(0);">
                        <img src="../image/<?php echo $lunboInfos[2]['lunbo_img_url'];?>" alt="3">
                    </a>
                </div>
                <div class="img">
                    <a href="javascript:void(0);">
                        <img src="../image/<?php echo $lunboInfos[3]['lunbo_img_url'];?>" alt="4">
                    </a>
                </div>
             
            </div>
          
            <div class="left btn">&lt;</div>
            <div class="right btn">&gt;</div>
            <div class="circles" style="z-index: 99">
            </div>
        </div><!-- end �ֲ���� -->
       
   <!-- 目录 -->
    <div class="menu">
        <div class="menu-item">
            <a href="?c=youxuan&m=showYouxuan">
                <img src="image/youxuan.png">
                <p>优选</p>
            </a>
        </div>
        <div class="menu-item">
            <a href="javascript:void(0);">
                <img src="image/rexiao.png">
                <p>热销</p>
            </a>
        </div>
        <div class="menu-item">
            <a href="?c=category&m=showCategory&category_id=26">
                <img src="image/fenlei.png">
                <p>分类</p>
            </a>
        </div>
        <div class="menu-item">
            <a href="javascript:void(0);">
                <img src="image/youhui.png">
                <p>优惠</p>
            </a>
        </div>
    </div>

 
    <div class="row hotbuy">
        <a href="?c=arti&m=showArti">
            <img src="image/hot.png">
            <p class="hotbuy-desc">
               今日热点|《择天记》开播鹿晗的盛世美颜不够看
            </p>
        </a>

    </div>

    <!-- 潮流穿搭 -->
    <div class="row fashion">
        <div class="fashion-head">
            <img src="image/fashion.png"><span>潮流搭配</span>
        </div>
         
   
        <div class="fashion-product">
             <?php foreach ($fit as $key):?>
            <div class="product-item">
                <a href="?c=fashion&m=showFashion&dress_id=<?php echo $key['dress_id'];?>&act=1">
                    <img src="<?php echo $key['dress_img'];?>">
                    <p><?php echo $key['dress_name'];?></p>
                </a>
            </div>
         <?php endforeach;?>
            </div>
            
    </div>

     <!-- 每周流行 -->
    <div class="row weekpopular">
        <div class="fashion-head">
            <img src="image/week.png"><span>每周流行</span>
        </div>
       
        <div class="popular-product">
        <?php for($i=0;$i<count($week);$i++):?>
            <div class="product-item">
                <a href="?c=week&m=showWeek&popular_category_id=<?php echo $week[$i]['popular_category_id'];?>&act=1">
                    <img src="<?php echo $week[$i]['popular_img'];?>">
                    
                    <p><?php echo $week[$i]['popular_category_name'];?></p>
                </a>
            </div>
         <?php endfor;?>
        </div>
    </div>

    <!-- 精选专题 -->
    <div class="row subject">
        <div class="fashion-head">
            <img src="image/j.png"><span>精选专题</span>
        </div>

        <div class="edit">
            <a href="?c=arti&m=showSubject">
            <img src="image/j1.png">
            <div class="edit-desc">
                <p class="edit-title">------小编专栏------</p>
                <p>初冬温暖套装
                    让你天生时髦难自弃
                </p>
            </div>
            </a>

        </div>

        <div class="subject-product">
           <?php for($i=0;$i<4;$i++): $onekey = mt_rand(0,(count(array_keys($productInfos)))-1);
            
           ?>
            <div class="product-item">
                <a href="?c=detail&m=showDetail&product_id=<?php echo $productInfos[$onekey]['product_id'];?>">
                    <img src="<?php echo $productInfos[$onekey]['list_img_url'];?>">
                    <p>￥<?php echo $productInfos[$onekey]['origin_price']; ?></p>
                </a>
            </div>
            <?php endfor;?>
            
          
        </div>
    </div>
</div>

<div class="nav">
    <div class="home nav-item">
        <a href="javascript:void(0);">
            <img src="image/hom1.png">
        </a>
    </div>
    <div class="shopping nav-item">
        <a href="javascript:void(0);">
            <img src="image/shopping1.png">
        </a>
    </div>
    <div class="dongtai nav-item">
        <a href="javascript:void(0);">
            <img src="image/dongtai1.png">
        </a>
    </div>
    <div class="my nav-item">
        <a href="?c=login&m=goLogin">
            <img src="image/my1.png">
        </a>
    </div>
</div>

<script src="js/index.js"></script>
<script>
    KingSwape({time: 1000});
</script>
</body>
</html>