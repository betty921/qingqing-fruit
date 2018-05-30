<?php
namespace common\models;

use common\common\ErrDesc;
use yii\db\ActiveRecord;

class Product extends ActiveRecord {
    public $roll_images_src;

    const SCENARIO_UPDATE = 'update';

    public static function tableName()
    {
        return '{{%qq_product}}';
    }

    public function attributes()
    {
        return [
            "product_id",
            "top_class_id",
            "second_class_id",
            "product_type_tag",
            "origin_place_id",
            "standard_id",
            "product_no",
            "product_name",
            "product_brief",
            "product_gallery",
            "origin_price",
            "discount_price",
            "product_detail",
            "product_qr_code",
            "sweet",
            "storage_method",
            "product_remark",
            "ctime"
        ];
    }

    public function rules()
    {
        return [
          [["product_id","top_class_id","second_class_id","product_type_tag", "origin_place_id","standard_id","product_no","product_name","product_brief","product_gallery","origin_price","discount_price","product_detail","product_qr_code","sweet","storage_method","product_remark","ctime"], 'safe'],
        ];
    }

    public function Add()
    {
        if(empty($this->roll_images_src))
            return ErrDesc::ERR_PARAM;
        $this->origin_price = $this->origin_price * 100;
        $this->product_gallery = implode(';', $this->roll_images_src);
        $this->ctime = time();
        $this->insert();
        return ErrDesc::OK;
    }

    /**
     * 获取所有商品
     */
    public static function getAll($whereTypeTag=0)
    {
        if($whereTypeTag == 0) {
            $products = self::find()->asArray()->all();
        }
        else {
            $products = self::find()->where(['product_type_tag' => $whereTypeTag])->asArray()->all();
        }
        for($i = 0; $i < count($products); $i++) {
            $topClass = Classification::find()->select(['class_name'])->where(['class_id'=>$products[$i]['top_class_id']])->asArray()->one();
            $products[$i]['top_class_name'] = $topClass['class_name'];

            $secondClass = Classification::find()->select(['class_name'])->where(['class_id'=>$products[$i]['second_class_id']])->asArray()->one();
            $products[$i]['second_class_name'] = $secondClass['class_name'];

            $place = OriginPlace::find()->select(['origin_place_name'])->where(['origin_place_id'=>$products[$i]['origin_place_id']])->asArray()->one();
            $products[$i]['origin_place_name'] = $place['origin_place_name'];

            $standard_name = Standard::find()->select(['standard_name'])->where(['standard_id' => $products[$i]['standard_id']])->asArray()->one();
            $products[$i]['standard_name'] = $standard_name['standard_name'];
        }
        return $products;
    }

    /**
     * 获取分类目录下的所有商品
     */
    public static function getClassAll($class_id, $class="top")
    {
        if($class == 'top')
            $products = self::find()->where(['top_class_id'=>$class_id])->asArray()->all();
        else
            $products = self::find()->where(['second_class_id'=>$class_id])->asArray()->all();
        for($i = 0; $i < count($products); $i++) {
            $topClass = Classification::find()->select(['class_name'])->where(['class_id'=>$products[$i]['top_class_id']])->asArray()->one();
            $products[$i]['top_class_name'] = $topClass['class_name'];

            $secondClass = Classification::find()->select(['class_name'])->where(['class_id'=>$products[$i]['second_class_id']])->asArray()->one();
            $products[$i]['second_class_name'] = $secondClass['class_name'];

            $place = OriginPlace::find()->select(['origin_place_name'])->where(['origin_place_id'=>$products[$i]['origin_place_id']])->asArray()->one();
            $products[$i]['origin_place_name'] = $place['origin_place_name'];

            $standard_name = Standard::find()->select(['standard_name'])->where(['standard_id' => $products[$i]['standard_id']])->asArray()->one();
            $products[$i]['standard_name'] = $standard_name['standard_name'];
        }
        return $products;
    }

    /**
     * 获取单个商品信息
     */
    public static function getOne($product_id)
    {
        $product = self::find()->where(['product_id' => $product_id])->asArray()->one();

        $topClass = Classification::find()->select(['class_name'])->where(['class_id'=>$product['top_class_id']])->asArray()->one();
        $product['top_class_name'] = $topClass['class_name'];

        $secondClass = Classification::find()->select(['class_name'])->where(['class_id'=>$product['second_class_id']])->asArray()->one();
        $product['second_class_name'] = $secondClass['class_name'];

        $place = OriginPlace::find()->select(['origin_place_name'])->where(['origin_place_id'=>$product['origin_place_id']])->asArray()->one();
        $product['origin_place_name'] = $place['origin_place_name'];

        $standard_name = Standard::find()->select(['standard_name'])->where(['standard_id' => $product['standard_id']])->asArray()->one();
        $product['standard_name'] = $standard_name['standard_name'];

        return $product;
    }

    public static function editOne($params)
    {
        $product = Product::find()->where(['product_id' => $params['product_id']])->one();

        $product->top_class_id=$params['top_class_id'];
        $product->second_class_id=$params['second_class_id'];
        $product->product_type_tag=$params['product_type_tag'];
        $product->origin_place_id=$params['origin_place_id'];
        $product->standard_id=$params['standard_id'];
        $product->product_no=$params['product_no'];
        $product->product_name=$params['product_name'];
        $product->product_brief=$params['product_brief'];
        $product->product_gallery=implode(';', $params['roll_images_src']);
        $product->origin_price=$params['origin_price'];
        $product->discount_price=$params['discount_price'];
        $product->product_detail=$params['product_detail'];
        //$product->product_qr_code=$params['product_qr_code'];
        $product->sweet=$params['sweet'];
        $product->storage_method=$params['storage_method'];
        $product->product_remark=$params['product_remark'];

        $product->update();
    }
}