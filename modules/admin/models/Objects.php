<?php

namespace app\modules\admin\models;

use app\models\Category;
use Yii;

/**
 * This is the model class for table "objects".
 *
 * @property string $id
 * @property integer $cat_id
 * @property string $cat_alias
 * @property string $title
 * @property string $adress
 * @property integer $square_plot
 * @property integer $square_house
 * @property string $description
 * @property integer $price
 * @property double $coord_x
 * @property double $coord_y
 * @property string $metadesc
 * @property string $lead
 * @property string $lead_phone
 */
class Objects extends \yii\db\ActiveRecord
{
    public $image;
    public $gallery;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'objects';
    }

    public function getCategory() {
        return $this->hasOne(Category::className(), ['id' => 'cat_id']);
    }

    public function behaviors()
    {
        return [
            'image' => [
                'class' => 'rico\yii2images\behaviors\ImageBehave',
            ]
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['cat_id', 'title', 'adress', 'description', 'price', 'metadesc', 'lead', 'lead_phone'], 'required'],
            [['cat_id', 'square_plot', 'square_house', 'square_apartment', 'price'], 'integer'],
            [['title', 'adress', 'description', 'cat_alias', 'metadesc'], 'string'],
            [['coord_x', 'coord_y'], 'number'],
            [['cat_alias', 'lead', 'lead_phone'], 'string', 'max' => 255],
            [['image'], 'file', 'extensions' => 'png, jpg'],
            [['gallery'], 'file', 'extensions' => 'png, jpg', 'maxFiles' => 20]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'Идентификатор',
            'cat_id' => 'Идентификатор категории',
            'cat_alias' => 'Алиас категории',
            'title' => 'Заголовок (для поисковиков, так же отображается в названии вкладки в браузере)',
            'adress' => 'Адрес',
            'square_plot' => 'Площадь участка',
            'square_house' => 'Площадь дома',
            'square_apartment' => 'Площадь дома',
            'description' => 'Описание объекта',
            'price' => 'Цена',
            'coord_x' => 'Координаты по Х ( Например: 55.837512)',
            'coord_y' => 'Координаты по Y ( Например: 37.713777)',
            'metadesc' => 'Метаописание (для поисковиков)',
            'lead' => 'Кто ведет объект',
            'lead_phone' => 'Телефон ведущего',
            'image' => 'Главное изображение',
            'gallery' => 'Галерея'
        ];
    }

    public function upload() {

        if($this->validate()) {

            $path = 'upload/store/' . $this->image->baseName . '.' . $this->image->extension;
            $this->image->saveAs($path);
            $this->attachImage($path, true);
            unlink($path);

            return true;
        } else {
            return false;
        }
    }

    public function uploadGallery() {

        if($this->validate()) {

            foreach($this->gallery as $file) {

                $path = 'upload/store/' . $file->baseName . '.' . $file->extension;
                $file->saveAs($path);
                $this->attachImage($path);
                unlink($path);
            }

            return true;
        } else {

            return false;
        }
    }

    public function get_coords() {
        $params = array(
            'geocode' => $this->adress, 							// адрес
            'format'  => 'json',                          // формат ответа
            'results' => 1                               // количество выводимых результатов

        );

        $response = json_decode(file_get_contents('https://geocode-maps.yandex.ru/1.x/?geocode=' . http_build_query($params, '', '&')));

        if ($response->response->GeoObjectCollection->metaDataProperty->GeocoderResponseMetaData->found > 0)
        {
            $res_coords = explode(" ",$response->response->GeoObjectCollection->featureMember[0]->GeoObject->Point->pos);
//            $coords = $res_coords[1].','.$res_coords[0];

        }
        else {
            $res_coords = '0.0000,0.0000';
        }
        return $res_coords;
    }
}
