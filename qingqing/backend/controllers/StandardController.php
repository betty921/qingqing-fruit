<?php
/**
 * Created by PhpStorm.
 * User: xxh
 * Date: 2017/9/15
 * Time: 10:10
 */
namespace backend\controllers;

use common\controllers\QQBaseController;
use common\models\Standard;

class StandardController extends QQBaseController {

    public function actionIndex()
    {
        $standards = Standard::find()->asArray()->all();
        return $this->render('index', ['standards'=>$standards]);
    }

    public function actionAdd()
    {
        $model = new Standard();
        $model->attributes = $this->requestData;
        if($model->validate()) {
            $model->insert();
        }
        return $this->redirect(['index']);
    }

    public function actionDel()
    {
        $standard_id = $this->getClientParam('standard_id');
        if(empty($standard_id)) {
            return $this->redirect(['index']);
        }
        Standard::findOne(['standard_id' => $standard_id])->delete();
        return $this->redirect(['index']);
    }

    public function actionUpdatePage()
    {
        $standard_id = $this->getClientParam('standard_id');
        if(empty($standard_id)) {
            return $this->redirect(['index']);
        }
        $standard = Standard::findOne(['standard_id' => $standard_id])->toArray();
        return $this->render('update', $standard);
    }

    public function actionUpdate()
    {
        $standard_id = $this->getClientParam('standard_id');
        if(empty($standard_id)) {
            return $this->redirect(['index']);
        }
        $standard_name = $this->getClientParam('standard_name');
        if(empty($standard_name)) {
            $this->requestData['errmsg'] = '规格名不能为空';
            return $this->render('update', $this->requestData);
        }
        $standard = Standard::findOne(['standard_id' => $standard_id]);
        $standard->standard_name = $standard_name;
        $standard->update();
        return $this->redirect(['index']);
    }
}