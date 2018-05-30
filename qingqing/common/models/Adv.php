<?php
namespace common\models;

use yii\db\ActiveRecord;

class Adv extends ActiveRecord {

    public static function tableName()
    {
        return '{{%qq_advertisement}}';
    }
}