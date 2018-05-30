<?php
/*
时间：2017年8月9日

*/
header("content-type:text/html;charset=utf-8");
@$goodchoice = $GLOBALS['goodchoice'];
@$goodChoicebyupSellnum=$GLOBALS['goodChoicebyupSellnum'];
@$goodchoicebyupPrice = $GLOBALS['goodchoicebyupPrice'];
//var_dump($goodchoicebyupPrice);die;
//var_dump($goodChoicebyupSellnum);die;
//$goodChoicebydownSellnum=$GLOBALS['goodChoicebydownSellnum'];
//var_dump($goodchoice);die;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <title>优选</title>

    <link href="css/global.css" type="text/css" rel="stylesheet">
    <link href="css/youxuan.css" type="text/css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <div class="youxuan-head">
            <div class="banner">
                <img src="image/b1.png">
            </div>

            <div class="order">
                <div class="order-item selected">综合</div>
                
                <a href = "?c=youxuan&m=showSellnumByup">
                <div class="order-item">
                    销量
                    <div class="up-down">
                        <div class="up up-selected">
                        </div>
                        <div class="down">
                        </div>
                    </div>
                </div>
                </a>
                <a href = "?c=youxuan&m=showPricebyup">
                <div class="order-item">
                    价格
                    <div class="up-down">
                        <div class="up"></div>
                        <div class="down"></div>
                    </div>
                </div>
                </a>
            </div>
        </div>


        
           <?php for($i=1;$i<=count($goodchoice);$i+=2):?>
           <?php for($j=$i-1;$j<$i;$j+=2):?>
            <div class="product-row">
                <div class="product-item">
                    <a href="?c=detail&m=showDetail&product_id=<?php echo $goodchoice[$j]['product_id'];?>">
                        <img src="<?php echo $goodchoice[$j]['list_img_url'];?>">
                        <p><?php echo $goodchoice[$j]['product_name'];?></p>
                        <div class="price-car">
                            <span class="price">￥ <?php echo $goodchoice[$j]['origin_price'];?></span>
                            <img src="image/car1.png" onclick="alert('x');return false">
                        </div>
                    </a>
                </div>
                 <?php if($i<count($goodchoice)):?>
                <div class="product-item">
                    <a href="?c=detail&m=showDetail&product_id=<?php echo $goodchoice[$i]['product_id'];?>">
                        <img src="<?php echo $goodchoice[$i]['list_img_url'];?>">
                        <p><?php echo $goodchoice[$i]['product_name'];?></p>
                        <div class="price-car">
                            <span class="price">￥ <?php echo $goodchoice[$i]['origin_price'];?></span>
                            <img src="image/car1.png" onclick="alert('x');return false">
                        </div>
                    </a>
                </div>
                <?php endif;?>
            </div>
           <?php endfor;?>
           <?php endfor;?>
           
 
        
           <?php for($i=1;$i<=count($goodChoicebyupSellnum);$i+=2):?>
           <?php for($j=$i-1;$j<$i;$j+=2):?>
            <div class="product-row">
                <div class="product-item">
                    <a href="http://www.baidu.com/">
                        <img src="<?php echo $goodChoicebyupSellnum[$j]['list_img_url'];?>">
                        <p><?php echo $goodChoicebyupSellnum[$j]['product_name'];?></p>
                        <div class="price-car">
                            <span class="price">￥ <?php echo $goodChoicebyupSellnum[$j]['origin_price'];?></span>
                            <img src="image/car1.png" onclick="alert('x');return false">
                        </div>
                    </a>
                </div>
                 <?php if($i<count($goodChoicebyupSellnum)):?>
                <div class="product-item">
                    <a href="http://www.baidu.com/">
                        <img src="<?php echo $goodChoicebyupSellnum[$i]['list_img_url'];?>">
                        <p><?php echo $goodChoicebyupSellnum[$i]['product_name'];?></p>
                        <div class="price-car">
                            <span class="price">￥ <?php echo $goodChoicebyupSellnum[$i]['origin_price'];?></span>
                            <img src="image/car1.png" onclick="alert('x');return false">
                        </div>
                    </a>
                </div>
                <?php endif;?>
            </div>
           <?php endfor;?>
           <?php endfor;?>
           
      <?php for($i=1;$i<=count($goodchoicebyupPrice);$i+=2):?>
           <?php for($j=$i-1;$j<$i;$j+=2):?>
            <div class="product-row">
                <div class="product-item">
                    <a href="http://www.baidu.com/">
                        <img src="<?php echo $goodchoicebyupPrice[$j]['list_img_url'];?>">
                        <p><?php echo $goodchoicebyupPrice[$j]['product_name'];?></p>
                        <div class="price-car">
                            <span class="price">￥ <?php echo $goodchoicebyupPrice[$j]['origin_price'];?></span>
                            <img src="image/car1.png" onclick="alert('x');return false">
                        </div>
                    </a>
                </div>
                 <?php if($i<count($goodchoicebyupPrice)):?>
                <div class="product-item">
                    <a href="http://www.baidu.com/">
                        <img src="<?php echo $goodchoicebyupPrice[$i]['list_img_url'];?>">
                        <p><?php echo $goodchoicebyupPrice[$i]['product_name'];?></p>
                        <div class="price-car">
                            <span class="price">￥ <?php echo $goodchoicebyupPrice[$i]['origin_price'];?></span>
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