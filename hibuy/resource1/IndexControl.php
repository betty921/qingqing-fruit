<?php

function getFileType($filename)
{
    $tmp = explode('.', $filename);
    $f_type = end($tmp);
    return $f_type;
}

// 鍥剧墖涓婁紶
// http://localhost/kingphp/hibuy/resoure/index.php
function showIndex()
{
    // 鍏佽涓婁紶鐨勬枃浠舵牸寮�
    $ims_arr = ['image/jpeg', 'image/jpg', 'image/gif', 'image/png','image/svg'];

    // 鍒ゆ柇涓婁紶鏁扮粍鏄惁涓虹┖
    if(empty($_FILES['myImg'])) {
        rtMsg(ERR_UPLOAD_FILE);
        return;
    }

// 鍙栧嚭鏂囦欢
    $img = $_FILES['myImg'];

// 鍒ゆ柇鏂囦欢涓婁紶鏄惁鏈夐敊璇�
    if($img['error'] != 0) {
        rtMsg(ERR_UPLOAD_FILE);
        return;
    }

// 鍒ゆ柇鏂囦欢绫诲瀷
    $fileType = $img['type'];
    if(!in_array($fileType, $ims_arr)) {
        rtMsg(ERR_UPLOAD_TYPE);
        return;
    }

    $f_type = getFileType($img['name']);

    $new_filename = time() .'dnjs'. '.' . $f_type;

// 淇濆瓨鏂囦欢
    move_uploaded_file($img['tmp_name'], 'image/'.$new_filename);

    $request_url = $_SERVER['REQUEST_URI'];
    $filepath = dirname($request_url);

    $img_url = $_SERVER['REQUEST_SCHEME'] . '://' .$_SERVER['SERVER_NAME'] . ':8088/' .$filepath. '/image/' . $new_filename;
    // echo $img_url;die;
    rtMsg(OK, ['url'=>$img_url]);
}