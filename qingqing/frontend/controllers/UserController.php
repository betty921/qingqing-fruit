<?php
namespace frontend\controllers;

use common\common\ErrDesc;
use common\common\QQMongo;
use common\common\Ytx\YtxSMS;
use common\controllers\QQBaseController;
use common\models\User;

class UserController extends QQBaseController {
    public function actionLogin()
    {
        if(!empty(\Yii::$app->session['user_phone'])) {
            return $this->redirect(['site/index']);
        }
        $this->layout = 'qingqing2';
        if(empty($this->requestData)) {
            return $this->render('login');
        }

        $userModel = new User();
        $userModel->scenario = User::SCENARIO_LOGIN;
        $userModel->attributes = $this->requestData;
        $restCode = $userModel->validateLogin();
        if($restCode == ErrDesc::OK) {
            return $this->render('login', ['actionOK'=>1]);
        }
        $this->requestData['errmsg'] = ErrDesc::$DESC[$restCode];
        return $this->render('login', $this->requestData);
    }

    public function actionRegister()
    {
        $this->layout = 'qingqing2';
        if(empty($this->requestData)) {
            return $this->render('register');
        }
        $userModel = new User();
        $userModel->scenario = User::SCENARIO_REGISTER;
        $userModel->attributes = $this->requestData;
        $restCode = $userModel->validateRegister();
        if($restCode == ErrDesc::OK){
            $userModel->save();
            return $this->render('register', ['actionOK'=>1]);
        }
        $this->requestData['errmsg'] = ErrDesc::$DESC[$restCode];
        return $this->render('register', $this->requestData);
    }

    /**
     * ajax验证手机是否注册
     * @return string
     */
    public function actionCheckPhone()
    {
        $phone = $this->getClientParam('user_phone');
        if(empty($phone)) {
            return $this->rtJson(ErrDesc::ERR_PHONE_FORMAT);
        }
        $user = User::find()->where(['user_phone' => $phone])->one();
        if(empty($user)) {
            return $this->rtJson(ErrDesc::ERR_PHONE_NOT_EXIST);
        }
        return $this->rtJson(ErrDesc::ERR_PHONE_EXIST);
    }

    /** ajax 获取手机验证码
     * @return string
     */
    public function actionVerifyCode()
    {
        $user_phone = $this->getClientParam('user_phone');
        if(empty($user_phone)) {
            return $this->rtJson(ErrDesc::ERR_PARAM);
        }

        $veriyCode = QQMongo::genVerifyCode($user_phone);

        $ytx = new YtxSMS();
        $rst = $ytx->sendMsg($user_phone, [$veriyCode, '5']);
        if($rst) {
            return $this->rtJson();
        }
        return $this->rtJson(ErrDesc::ERR_SEND_SMS);

    }
}