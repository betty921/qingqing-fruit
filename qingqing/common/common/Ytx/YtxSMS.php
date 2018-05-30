<?php

namespace common\common\Ytx;

include_once("SDK/CCPRestSDK.php");

class YtxSMS {
    //主帐号
    public $accountSid= 'aaf98f8953ea8e8c0153fa64d6ae1b8f';
    //主帐号Token
    public $accountToken= 'bf82d7cceaa6444fa1889677eb878da6';
    //应用Id
    public $appId='aaf98f8953ea8e8c0153fa6667e01b96';
    //请求地址，格式如下，不需要写https://
    public $serverIP='app.cloopen.com';
    //请求端口
    public $serverPort='8883';
    //REST版本号
    public $softVersion='2013-12-26';


    public function sendMsg($to, $datas)
    {
        $ytx = new \REST($this->serverIP, $this->serverPort, $this->softVersion);
        $ytx->setAccount($this->accountSid, $this->accountToken);
        $ytx->setAppId($this->appId);
        $result = $ytx->sendTemplateSMS($to, $datas, 1);
        if($result == NULL ) {
            \Yii::error('send msg error: result error', 'YTXSMS');
            return false;
        }
        if($result->statusCode!=0) {
            \Yii::error('error code:'.$result->statusCode.',error msg'.$result->statusMsg, 'YTXSMS');
            return false;
            //TODO 添加错误处理逻辑
        }else{
            // 获取返回信息
            $smsmessage = $result->TemplateSMS;
            //TODO 添加成功处理逻辑
            \Yii::trace('sendmsg success: dateCreated:'.$smsmessage->dateCreated.',smsMessageSid:'.$smsmessage->smsMessageSid, 'YTXSMS');
        }
        return true;
    }
}