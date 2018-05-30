<?php
namespace resource\controllers;

use common\common\ErrDesc;
use common\controllers\QQBaseController;
use yii\base\Module;
use resource\models\UpImageModel;
use yii\web\UploadedFile;

/**
 * Site controller
 */
class SiteController extends QQBaseController
{
    public $webRoot;
    public $newFilePath;
    public $urlPath;
    public $domainParams;
    public function __construct($id, Module $module, array $config=[])
    {
        parent::__construct($id, $module, $config);
        $this->webRoot = \Yii::$app->basePath . '/' . 'web' . '/';
        $this->urlPath = \Yii::$app->request->hostInfo . '/' ;
        $this->domainParams = \Yii::$app->params['SITE_DOMAIN'];
    }

    public function actionIndex()
    {
        /*$origin = isset($_SERVER['HTTP_ORIGIN'])? $_SERVER['HTTP_ORIGIN'] : '';
        if(in_array($origin, $this->domainParams)) {
            \Yii::$app->response->headers->set('Access-Control-Allow-Origin',  $origin);
        }else
        {
            $apptoken = $this->getClientParam('app_token');
            $origin = '*';
            if(empty($apptoken)) {
                return $this->rtJson(ErrDesc::ERR_DOMAIN_NOT);
            }else {
                \Yii::$app->response->headers->set('Access-Control-Allow-Origin',  $origin);
            }
        }*/

        $part = $this->getClientParam('part');
        if(empty($part)) {
            $this->newFilePath = $this->webRoot . 'default' . '/';
            $this->urlPath = $this->urlPath . dirname(\Yii::$app->homeUrl) . '/default' . '/';
        }
        else {
            $this->newFilePath = $this->webRoot . $part . '/';
            $this->urlPath = $this->urlPath . dirname(\Yii::$app->homeUrl). '/'. $part . '/';
        }

        $imgeModel = new UpImageModel();
        $imgeModel->imageFile = UploadedFile::getInstanceByName('imgFile');
        if(empty($imgeModel->imageFile)) {
            return $this->rtJson(ErrDesc::ERR_UPIMAGE);
        }
        $rst = $imgeModel->upload($this->newFilePath, $this->urlPath);

        $rtMsg = [
            'code' => $rst->code,
            'msg' => ErrDesc::$DESC[$rst->code],
            'link' => $rst->data[0]['link'],
            'data' => $rst->data,
        ];
        return $this->asJson($rtMsg);

        //return $this->rtJson($rst->code, $rst->data);
    }

    public function actionError()
    {
        $upImageModel = new UpImageModel('x');
        $rst = $upImageModel->error();
        return $this->rtJson($rst);
    }

    public function actionTest()
    {
        $this->layout = false;
        return $this->render('test.html');
    }




}
