<?php
/**
 * Created by PhpStorm.
 * User: xxh
 * Date: 2017/9/14
 * Time: 15:31
 */
namespace backend\controllers;

use common\common\ErrDesc;
use common\common\Tree;
use common\controllers\QQBaseController;
use common\models\Classification;

class ClassificationController extends QQBaseController {

    public $layout = 'qingqing';
    public $enableCsrfValidation = false;

    /**
     * 所有类别
     */
    public function actionIndex()
    {
        $classes = Classification::getMenu();
        $tree = new Tree($classes);
        $tree->genTree();
        $tresForm = $tree->tree;
        $this->requestData['classes'] = $tresForm;
        return $this->render('classification',$this->requestData);
    }

    /**
     * 类别添加
     */
    public function actionAdd()
    {
        if(empty($this->requestData))
            return $this->render('classification');
        $classificationModel = new Classification();
        $classificationModel->attributes = $this->requestData;
        $rest = $classificationModel->validateAdd();
        if($rest == ErrDesc::OK) {
            $classificationModel->save();
            return $this->redirect(['classification/index']);
        }
        $this->requestData['errmsg'] = ErrDesc::$DESC[$rest];
        return $this->redirect(['classification/index','errmsg'=>ErrDesc::$DESC[$rest]]);
    }

    /**
     * 删除类别
     */
    public function actionDel()
    {
        if(empty($this->requestData))
            return $this->render('classification');
        $rest = Classification::del($this->requestData['class_id']);
        return $this->redirect(['classification/index', 'errmsg'=>ErrDesc::$DESC[$rest]]);
    }

    /**
     * 修改
     */
    public function actionUpdate()
    {
        $classes = Classification::getMenu();
        $tree = new Tree($classes);
        $tree->genTree();
        $tresForm = $tree->tree;

        $updeClass = Classification::find()->where(['class_id' => $this->requestData['class_id']])->one();
        if(empty($this->requestData['class_name'])) {
            $this->requestData['classes'] = $tresForm;
            $this->requestData['parent_id'] = $updeClass->parent_id;
            $this->requestData['class_name'] = $updeClass->class_name;
            $this->requestData['other_name'] = $updeClass->other_name;
            return $this->render('classification_update',$this->requestData);
        }

        $updeClass->class_name = $this->requestData['class_name'];
        $updeClass->other_name = $this->requestData['other_name'];
        $updeClass->parent_id = $this->requestData['parent_id'];
        $updeClass->update();

        $this->requestData['classes'] = $tresForm;
        $this->requestData['parent_id'] = $updeClass->parent_id;
        $this->requestData['class_name'] = $updeClass->class_name;
        $this->requestData['other_name'] = $updeClass->other_name;

        return $this->redirect(['classification/index']);
    }
}