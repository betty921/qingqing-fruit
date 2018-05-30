<?php
namespace frontend\controllers;

use common\common\ErrDesc;
use common\common\QQMongo;
use common\common\Ytx\YtxSMS;
use common\controllers\QQBaseController;
use common\models\Adv;
use common\models\Product;
use common\models\User;
use Yii;

/**
 * Site controller
 */
class SiteController extends QQBaseController
{
    public $layout = 'qingqing';
    public $enableCsrfValidation = false;

    public function actionIndex()
    {
        $roll_images_src = Adv::find()->where(['position' => 1])->asArray()->all();
        $tuijian = Adv::find()->where(['position' => 2])->asArray()->all();
        $adv = Adv::find()->where(['position' => 3])->asArray()->all();
        $family = Product::getAll(1);
        $freshFruit = Product::getAll(2);
        $freshFood = Product::getAll(3);
        $gift = Product::getAll(4);
        return $this->render('index', ['roll_images_src'=>$roll_images_src, 'tuijian'=>$tuijian, 'adv'=>$adv, 'family'=>$family, 'freshFruit'=>$freshFruit, 'freshFood'=>$freshFood, 'gift'=>$gift]);
    }

    




}
