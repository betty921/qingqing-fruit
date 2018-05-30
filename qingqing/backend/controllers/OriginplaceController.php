<?php
/**
 * Created by PhpStorm.
 * User: xxh
 * Date: 2017/9/15
 * Time: 8:41
 */
namespace backend\controllers;

use common\controllers\QQBaseController;
use common\models\OriginPlace;

class OriginplaceController extends QQBaseController {

    public function actionIndex()
    {
        $places = OriginPlace::find()->asArray()->all();
        return $this->render('place', ['places'=>$places]);
    }

    public function actionAdd()
    {
        $placeModel = new OriginPlace();
        $placeModel->setAttributes($this->requestData);
        if($placeModel->validate()) {
            $placeModel->save();
        }
        return $this->redirect(['index']);
    }

    public function actionDel()
    {
        if(!array_key_exists('origin_place_id', $this->requestData)) {
            return $this->redirect(['index']);
        }
        $origin_place_id = $this->requestData['origin_place_id'];
        if(empty($origin_place_id)) {
            return $this->redirect(['index']);
        }
        OriginPlace::find()->where(['origin_place_id' => $origin_place_id])->one()->delete();
        return $this->redirect(['index']);
    }

    public function actionUpdatePage()
    {
        $origin_place_id = $this->getClientParam('origin_place_id');
        if(empty($origin_place_id)) {
            return $this->redirect(['index']);
        }

        $place = OriginPlace::findOne(['origin_place_id'=>$origin_place_id])->toArray();
        return $this->render('place_update', $place);
    }
    public function actionUpdate()
    {
        if(empty($this->requestData)) {
            return $this->redirect(['index']);
        }
        $origin_place_id = $this->getClientParam('origin_place_id');
        $origin_place_name = $this->getClientParam('origin_place_name');
        if(empty($origin_place_id)) {
            return $this->redirect(['index']);
        }
        if(empty($origin_place_name)) {
            $this->requestData['errmsg'] = '产品名不能为空';
            return $this->render('place_update', $this->requestData);
        }

        $place = OriginPlace::findOne(['origin_place_id'=>$origin_place_id]);
        $place->origin_place_name = $origin_place_name;
        $place->update();
        return $this->redirect(['index']);
    }
}