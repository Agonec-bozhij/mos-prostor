<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 27.08.2016
 * Time: 19:07
 */

namespace app\models;


use yii\db\ActiveRecord;

class Category extends ActiveRecord
{
    public static function tableName() {
        return 'category';
    }

    public function getObjects() {
        return $this->hasMany(Object::className(), ['cat_id' => 'id']);
    }
}