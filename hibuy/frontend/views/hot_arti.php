<?php
/*
时间：2017年8月12日

*/
header("content-type:text/html;charset=utf-8");
session_start();
@$u_id = $_SESSION['u_id'];
//echo $u_id;die;
$artiOne = $GLOBALS['artiOne'];
$_SESSION['arti_id'] = $artiOne['arti_id'];
$comInfos=$GLOBALS['comInfos'];
//var_dump($comInfos);die;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
     <!-- <meta http-equiv='refresh' content='1'> -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <title> </title>
    <link rel="stylesheet" type="text/css" href="views/bootstrap/css/bootstrap.css">
    <script src="views/bootstrap/js/bootstrap.min.js"></script>
    <link href="css/global.css" type="text/css" rel="stylesheet">
    <link href="css/replay.css" type="text/css" rel="stylesheet">
    <link href="css/hot_artic.css" type="text/css" rel="stylesheet">
</head>
<body>

<div class="container">
    <div class="title"><?php echo $artiOne['arti_title'];?></div>
    <div class="time-view">
        <div class="time"><?php echo $artiOne['time'];?> 21:05</div>
        <div class="view">阅读9999</div>
    </div>
    
     <div class="hot-img">
           <img src="<?php echo $artiOne['arti_pictures'];?>" >
     </div>
    
    <div class="aritc"><?php echo $artiOne['arti_content']; ?></div>
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


    <div class="recent-comment">
        <div class="comment-header">最近评论</div>
        <?php foreach ($comInfos as $key):?>
        <div class="comment-item-div">
        
            <div class="comment-item">
            
                <div class="replyer">
                
                     <div class="replyer-info">
                    
                        <div class="replyer-icon">
                        <img src="<?php echo $key['u_icon'];?>">
                        </div>
                        
                        <div class="reply-nickname"><?php echo $key['u_name'];?>
                        </div>
                        
                    </div>
                    
                    <div class="ctime"><?php echo date("Y-m-d H:i:s",$key['time']);?></div>
                </div>
                
                <div class="reply-content">
                                                 <?php echo $key['message'];?>
                    <img src="<?php echo $key['picture'];?>" >
                </div>
                
                <div class="like-reply">
                    <a href="?c=arti&m=AddPos&m_id=<?php echo $key['m_id'];?>"><div class="like"> <lable class = "glyphicon glyphicon-thumbs-up"><?php echo $key['pos'];?></lable></div></a>
                    <div class="reply-op"><img src="image/shopping1.png"> 回复</div>
                </div>
                
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
	//alert(message);
	//alert(picture);
	ajaxUpFile('?c=comment&m=AddComment', formdata, function (respText) {
		//alert(picture);
		var respObj = JSON.parse(respText);
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