<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 28.08.2016
 * Time: 13:01
 */

namespace app\models;

use Yii;
use yii\db\ActiveRecord;
use yii\filters\AccessControl;

class Object extends ActiveRecord
{
    public $image;
    public $gallery;

    public static function tableName() {
        return 'objects';
    }

    public function behaviors()
    {
        return [
            'image' => [
                'class' => 'rico\yii2images\behaviors\ImageBehave',
            ],
        ];
    }

    public function getCategory() {
        return $this->hasOne(Category::className(), ['id' => 'cat_id']);
    }

    public function rules()
    {
        return [
            [['cat_id', 'title', 'adress', 'square_plot', 'square_house', 'description', 'price', 'metadesc', 'lead', 'lead_phone'], 'required'],
            [['cat_id', 'square_plot', 'square_house', 'price'], 'integer'],
            [['title', 'adress', 'description', 'cat_alias', 'metadesc'], 'string'],
            [['coord_x', 'coord_y'], 'number'],
            [['cat_alias', 'lead', 'lead_phone'], 'string', 'max' => 255],
            [['image'], 'file', 'extensions' => 'png, jpg'],
            [['gallery'], 'file', 'extensions' => 'png, jpg', 'maxFiles' => 20]
        ];
    }

    public function attributeLabels()
    {
        return [
//            'square_plot_min' => 'Площадь участка от',
//            'square_plot_max' => 'до',
//            'square_house_min' => 'Площадь дома от',
//            'square_house_max' => 'до',
//            'price_min' => 'Цена от',
//            'price_max' => 'до',
            'image' => 'Главное изображение',
            'gallery' => 'Галерея',
            'square_plot_filter' => 'Площадь участка',
            'square_house_filter' => 'Площадь дома',
            'square_apartment_filter' => 'Площадь квартиры',
            'price_filter' => 'Цена',
        ];
    }
}