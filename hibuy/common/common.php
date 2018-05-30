<?php
include_once '../conf/rtcode.php';


/**
 * 
 * @param int $code
 * @param string $msg
 * @param array $data
 */
function rtMsg($code=1, $data=[])
{
    $rt = [
        'code' => $code,
        'msg' => RT_MSG($code),
        'data' => $data
    ];
    echo json_encode($rt);
    return;
}

// 获取客户端的参数
function getClientParam($param, $defalut='')
{
    $requestParam = array_merge($_GET, $_POST);
    if(array_key_exists($param, $requestParam)) {
        return $requestParam[$param];
    }
    return $defalut;
}