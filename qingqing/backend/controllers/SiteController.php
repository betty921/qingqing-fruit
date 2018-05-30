<?php
namespace backend\controllers;

use common\controllers\QQBaseController;

class SiteController extends QQBaseController {

    public function actionIndex()
    {
        $this->layout = 'qingqing';
        return $this->render('index');
    }
}