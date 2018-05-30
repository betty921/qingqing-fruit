<?php
namespace backend\controllers;

use common\controllers\QQBaseController;
use common\models\Adv;

class AdvController extends QQBaseController {

    public function actionIndex()
    {
        $advs = Adv::find()->asArray()->orderBy(['position'=>SORT_ASC])->all();
        return $this->render('index', ['advs'=>$advs]);
    }

    public function actionAdd()
    {
        if(empty($this->requestData))
            return $this->render('add');
        $adv = new Adv();
        $adv->position = $this->getClientParam('position');
        $adv->img = $this->getClientParam('img');
        $adv->url = $this->getClientParam('url');
        $adv->order = $this->getClientParam('order');
        $adv->desc = $this->getClientParam('desc');
        $adv->insert();
        return $this->render('add', ['errmsg'=>'添加成功']);
    }

    public function actionEdit()
    {
        $advertisement_id = $this->getClientParam('advertisement_id');
        if(empty($advertisement_id)) {
            return $this->redirect(['index']);
        }
        $adv = Adv::find()->where(['advertisement_id' => $advertisement_id])->one();

        if(!empty($this->getClientParam('submit'))) {
            $adv->position = $this->getClientParam('position');
            $adv->img = $this->getClientParam('img');
            $adv->url = $this->getClientParam('url');
            $adv->order = $this->getClientParam('order');
            $adv->desc = $this->getClientParam('desc');
            $adv->update();
            return $this->redirect(['index']);
        }

        return $this->render('edit', $adv->toArray());
    }

    public function actionDel()
    {
        $advertisement_id = $this->getClientParam('advertisement_id');
        if(empty($advertisement_id)) {
            return $this->redirect(['index']);
        }
        $adv = Adv::find()->where(['advertisement_id' => $advertisement_id])->one();
        $adv->delete();
        return $this->redirect(['index']);
    }
}