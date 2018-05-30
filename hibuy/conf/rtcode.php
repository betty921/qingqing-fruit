<?php

define('OK', 1);
define('ERR_PARAM', 2);
define('ERR_UPLOAD_FILE', 3);
define('ERR_UPLOAD_TYPE', 4);

 $_RT_CODE = [
    'OK' => 1,
    'ERR_PARAM' => 2,
]; 


$_RT_MSG = [
		OK => 'ok',
		ERR_PARAM => 'param error',
		ERR_UPLOAD_FILE => 'upload file error',
		ERR_UPLOAD_TYPE => 'file type error',
];


 function RT_CODE($code)
{
    global $_RT_CODE;
    return $_RT_CODE[$code];
}
 
function RT_MSG($code)
{
    global $_RT_MSG;
    return $_RT_MSG[$code];
}