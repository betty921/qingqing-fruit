<?php
namespace backend\controllers;

use common\common\ErrDesc;
use common\common\Tree;
use common\controllers\QQBaseController;
use common\models\Classification;
use common\models\OriginPlace;
use common\models\Product;
use common\models\Standard;

class ProductController extends QQBaseController {
    public $layout = 'qingqing';
    public $enableCsrfValidation = false;

    public function actionIndex()
    {
        $products = Product::getAll();
        return $this->render('index', ['products' => $products]);
    }

    /**
     * 商品添加页面
     */
    public function actionAddPage()
    {
        // 商品顶级分类
        $topMenus = Classification::find()->where(['parent_id' => -1])->asArray()->all();
        // 顶级分类下的第一个子分类
        $secondMenus = Classification::find()->where(['parent_id' => $topMenus[0]['class_id']])->asArray()->all();
        // 产地
        $originPlaces = OriginPlace::find()->asArray()->all();
        $standards = Standard::find()->asArray()->all();

        return $this->render('add', ['topMenus'=>$topMenus, 'secondMenus'=>$secondMenus, 'originPlaces'=>$originPlaces, 'standards'=>$standards, 'errmsg'=>$this->getClientParam('errmsg')]);
    }

    /**
     * 获取子目录
     */
    public function actionAjaxChildMenu()
    {
        $class_id = $this->getClientParam('class_id');
        if(empty($class_id)) {
            return $this->rtJson(ErrDesc::ERR_PARAM);
        }
        $secondMenus = Classification::find()->where(['parent_id' => $class_id])->asArray()->all();
        return $this->rtJson(ErrDesc::OK, $secondMenus);
    }

    /**
     * 商品添加
     */
    public function actionAdd()
    {
        /*echo '<pre>';
        print_r($_POST);
        echo '</pre>';*/
        $product = new Product();
        $product->attributes = $this->requestData;
        $product->roll_images_src =$this->getClientParam('roll_images_src');
        $rst = $product->Add();
        return $this->redirect(['add-page', 'errmsg'=>ErrDesc::$DESC[$rst]]);
    }

    /**
     * 编辑页面
     */
    public function actionEdit()
    {
        $product_id = $this->getClientParam('product_id');
        if(empty($product_id)) {
            return $this->redirect(['index']);
        }
        $product = Product::getOne($product_id);

        // 商品顶级分类
        $topMenus = Classification::find()->where(['class_id' => $product['top_class_id']])->asArray()->all();
        // 顶级分类下的第一个子分类
        $secondMenus = Classification::find()->where(['class_id' => $product['second_class_id']])->asArray()->all();
        // 产地
        $originPlaces = OriginPlace::find()->asArray()->all();
        $standards = Standard::find()->asArray()->all();

        return $this->render('edit', ['product'=>$product, 'topMenus'=>$topMenus, 'secondMenus'=>$secondMenus, 'originPlaces'=>$originPlaces, 'standards'=>$standards, 'errmsg'=>$this->getClientParam('errmsg')]);
    }

    /**
     * 更新
     */
    public function actionUpdate()
    {
        $product_id = $this->getClientParam('product_id');
        if(empty($product_id)) {
            return $this->redirect(['index']);
        }
        Product::editOne($this->requestData);
        return $this->redirect(['index']);
    }

    /**
     * 删除
     */
    public function actionDelete()
    {
        $product_id = $this->getClientParam('product_id');
        if(empty($product_id)) {
            return $this->redirect(['index']);
        }
        $product = Product::find()->where(['product_id' => $product_id])->one();
        $product->delete();
        return $this->redirect(['index']);
    }
}