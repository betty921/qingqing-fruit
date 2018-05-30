<?php
namespace frontend\controllers;

use common\common\ErrDesc;
use common\controllers\QQBaseController;
use common\models\Classification;
use common\models\OriginPlace;
use common\models\Product;
use common\models\ShoppingCart;

class ProductController extends QQBaseController {

    /**
     * 商品详情
     */
    public function actionDetail()
    {
        $product_id = $this->getClientParam('product_id');
        if(empty($product_id)) {
            return $this->redirect(['site/index']);
        }
        $product = Product::getOne($product_id);
        return $this->render('detail', ['product'=>$product]);
    }

    /**
     * 商品分类列表
     */
    public function actionCategory()
    {
        $top_class_id = $this->getClientParam('top_class_id');
        if(empty($top_class_id)) {
            return $this->redirect(['site/index']);
        }
        $top_class = Classification::find()->where(['class_id' => $top_class_id])->asArray()->one();
        $second_classes = Classification::find()->where(['parent_id' => $top_class_id])->asArray()->all();
        $origin_places = OriginPlace::find()->asArray()->all();
        $products = Product::getClassAll($top_class_id);
        return $this->render('category', ['top_class'=>$top_class, 'second_classes' => $second_classes, 'origin_places' => $origin_places, 'products' => $products]);
    }

    /**
     * 加入购物车
     * 加入购物车前，是否允许用户没有登录？
     * 1 先判断用户是否有登录态
     * 2 如果用户没有登录, 生成sessionid, 并入库
     * 3 如果用户有登录,
     */
    public function actionAjaxAddShopping()
    {
        session_start();
        $user_id = session_id();
        if(!empty(\Yii::$app->session['user_phone'])) {
            $user_id = \Yii::$app->session['user_phone'];
        }

        $product_id = $this->getClientParam('product_id');
        if(empty($product_id)) {
            return $this->rtJson(ErrDesc::ERR_PARAM);
        }
        $count = $this->getClientParam('count', 1);

        $isnew = false;
        $shoppingCart = ShoppingCart::find()->where(['user_id' => $user_id, 'product_id' => $product_id])->one();
        if(empty($shoppingCart)) {
            $shoppingCart = new ShoppingCart();
            $isnew = true;
            $shoppingCart->user_id = $user_id;
            $shoppingCart->product_id = $product_id;
            $shoppingCart->count = 0;
        }
        $shoppingCart->count += $count;
        $shoppingCart->ctime = time();
        if($isnew)
            $shoppingCart->insert();
        else
            $shoppingCart->update();

        $num = ShoppingCart::find()->where(['user_id' => $user_id])->count();

        return $this->rtJson(ErrDesc::OK, ['num'=>$num]);
    }

    /**
     * 获取购物车商品数量
     */
    public function actionCartNum()
    {
        session_start();
        $user_id = session_id();
        if(!empty(\Yii::$app->session['user_phone'])) {
            $user_id = \Yii::$app->session['user_phone'];
        }
        $num = ShoppingCart::find()->where(['user_id' => $user_id])->count();
        return $this->rtJson(ErrDesc::OK, ['num'=>$num]);
    }

    /**
     * 购物车页面
     */
    public function actionCart()
    {
        session_start();
        $user_id = session_id();
        $this->layout = 'qingqing2';
        if(!empty(\Yii::$app->session['user_phone'])) {
            $user_id = \Yii::$app->session['user_phone'];
        }
        $cart = ShoppingCart::find()->where(['user_id' => $user_id])->asArray()->all();
        $products = [];
        $total_money = 0;
        for($i=0; $i<count($cart); $i++) {
            $products[$i] = Product::getOne($cart[$i]['product_id']);
            $products[$i]['total_price'] = $cart[$i]['count'] * $products[$i]['origin_price'];
            $products[$i]['count'] = $cart[$i]['count'];
            $total_money += $products[$i]['total_price'];
        }

        return $this->render('cart', ['products'=>$products, 'total_money'=>$total_money]);
    }

    /**
     * 删除购物车商品
     */
    public function actionDelCart()
    {
        session_start();
        $user_id = session_id();
        if(!empty(\Yii::$app->session['user_phone'])) {
            $user_id = \Yii::$app->session['user_phone'];
        }
        $product_id = $this->getClientParam('product_id');
        if(empty($product_id)) {
            return $this->redirect(['cart']);
        }
        ShoppingCart::find()->where(['user_id' => $user_id, 'product_id' => $product_id])->one()->delete();
        return $this->redirect(['cart']);
    }
}