<?php
/*
时间：2017年8月14日

*/
header("content-type:text/html;charset=utf-8");
//session_start();
//$u_name = $_SESSION['u_name'];
//echo $u_name;die;
$artiOne=$GLOBALS['artiOne'];
//var_dump($artiOne);die;
$comInfos = $GLOBALS['comInfos'] ;
//var_dump($comInfos);die;
$productInfos = $GLOBALS['productInfos'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <!--  <meta http-equiv='refresh' content='1'> -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <title>专题</title>
      <link rel="stylesheet" type="text/css" href="views/bootstrap/css/bootstrap.css">
    <script src="views/bootstrap/js/bootstrap.min.js"></script>
    <link href="css/global.css" type="text/css" rel="stylesheet">
    <link href="css/product_list.css" rel="stylesheet" type="text/css">
    <link href="css/replay.css" type="text/css" rel="stylesheet">
    <link href="css/subject.css" type="text/css" rel="stylesheet">
</head>
<body>
<div class="container">

    <div class="header">
        <img src="<?php echo $artiOne['arti_pictures'];?>">
    </div>
    <div class="subject">
        <div class="subject-title"><?php echo $artiOne['arti_subtitle'];?></div> 
        <div class="subject-author"><span>小编专栏</span><span><?php echo $artiOne['time'];?></span></div>
        <div class="subject-content">
        <?php echo $artiOne['arti_content'];?>
        </div>
    </div>
  
    <div class="tuijian"><span></span>小编推荐</div>

    <div class="product-list">
    <?php for($i=1;$i<=4;$i+=2):?>
    <?php for($j=$i-1;$j<$i;$j+=2):?>
        <div class="product-item">
            <a href="?c=detail&m=showDetail&product_id=<?php echo $productInfos[$j]['product_id'];?>">
                <img src="<?php echo $productInfos[$j]['list_img_url'];?>" >
                <div class="product-title"><?php echo $productInfos[$j]['product_name'];?></div>
                <div class="price-shop">
                    <span class="price">￥<?php echo $productInfos[$j]['origin_price'];?></span>
                    <img src="image/shopping1.png">
                </div>
            </a>
        </div>

        <div class="product-item">
            <a href="?c=detail&m=showDetail&product_id=<?php echo $productInfos[$i]['product_id'];?>">
                <img src="<?php echo $productInfos[$i]['list_img_url'];?>">
                <div class="product-title"><?php echo $productInfos[$i]['product_name'];?></div>
                <div class="price-shop">
                    <span class="price">￥<?php echo $productInfos[$i]['origin_price'];?></span>
                    <img src="image/shopping1.png">
                </div>
            </a>
        </div>
<?php endfor;?>
<?php endfor;?>

    </div>
    <form>
    <div class="reply">
                <div class="reply-input">
                
                    <input type="text" class="reply-text" name="message" id="message">
                    <div class="reply-img">
                        <img src="image/shopping1.png">
                        <input type="file" class="reply-file" onchange="UpFileImage(this,'http://localhost:8088/testPHP/hibuy/resource1/index.php')">
                         <li><a href='' id="pre_img_img" ></a></li> <input type = "text" value="" name="picture" hidden>
                    </div>
                </div>

                <input type="button" value="发布"  onclick = "Submit();" class="btn_publish">
          
            </div>
</form>
   
    </div>

    <!-- 最近评论 -->
    <div class="recent-comment">
        <div class="comment-header">最近评论</div>
        <?php foreach ($comInfos as $key):?>
        <div class="comment-item-div">
            <div class="comment-item">
                <div class="replyer">
                    <div class="replyer-info">
                        <div class="replyer-icon"><img src="<?php echo $key['u_icon'];?>"></div>
                        <div class="reply-nickname"><?php echo $key['u_name'];?></div>
                    </div>
                    <div class="ctime"><?php echo $key['time'];?></div>
                </div>
                <div class="reply-content">
                    <?php echo $key['message'];?><img src="<?php echo $key['picture'];?>">
                </div>
                <div class="like-reply">
                   <a href = "?c=arti&m=AddPos&m_id=<?php echo $key['m_id'];?>"> <div class="like"><lable class = "glyphicon glyphicon-thumbs-up"> <?php echo $key['pos'];?></lable></div></a>
                    <div class="reply-op"><img src="image/shopping1.png"> 回复</div>
                </div>
            </div>
            <div class="reply">
                <div class="reply-input">
                    <input type="text" class="reply-text">
                    <div class="reply-img">
                        <img src="image/shopping1.png">
                        <input type="file" class="reply-file">
                    </div>
                </div>
s
                <input type="button" value="发布" class="btn_publish">
            </div>
        </div>
<?php endforeach;?>
      

    </div>

</div>
<script>


function ajaxUpFile(url,data,callFun){
    var xmlhttp;
    if(window.XMLHttpRequest){
        xmlhttp = new XMLHttpRequest();
        }else
			xmlhttp = new ActiveXObject('Microsoft.XMLHTTP');
			xmlhttp.open('post',url,true);	
			xmlhttp.send(data);		
			 xmlhttp.onreadystatechange=function (){
				if(xmlhttp.readyState==4 && xmlhttp.status==200){
						callFun(xmlhttp.responseText);
					}
	 			}
           
    }


function UpFileImage(elem,url){
			var img = elem.files[0];
			var formData = new FormData();
			formData.append('myImg',img);
			ajaxUpFile(url,formData,function(respTest){
			var respObj = JSON.parse(respTest);		
			if(respObj.code!=1){
				alert(respObj.msg);
				return;
				}

			var img_url = respObj.data.url;

		

		    document.getElementById('pre_img_img').href=img_url;
			
			document.getElementsByName('picture')[0].value = img_url;
	 			})
    }
 function Submit() {
	
	var message = document.getElementsByName('message')[0].value;
	var picture =  document.getElementsByName('picture')[0].value;
	/* if( picture==''||message=='') {
		alert('请检测参数');
		return;
	} */
	var formdata = new FormData();
	
	formdata.append('message',message);
	
	formdata.append('picture',picture);
	//alert(u_id);
	//alert(u_name);
	ajaxUpFile('?c=subject&m=addComment', formdata, function (respText) {
		
		var respObj = JSON.parse(respText);
		//alert(picture);
		if(respObj.code != 1) {
			alert(respObj.msg);
			return;
		}
		alert('发布成功');
		window.location.reload();
	})
} 
</script>
</body>
</html>