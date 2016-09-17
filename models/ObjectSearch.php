<?php

namespace app\models;

use app\modules\admin\models\Objects;
use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Object;

/**
 * ObjectSearch represents the model behind the search form about `app\models\Object`.
 */
class ObjectSearch extends Object
{
    public $square_plot_min;
    public $square_plot_max;
    public $square_house_min;
    public $square_house_max;
    public $square_apartment_min;
    public $square_apartment_max;
    public $price_min;
    public $price_max;

    public $square_plot_filter;
    public $square_house_filter;
    public $square_apartment_filter;
    public $price_filter;

    public function rules()
    {
        return [
            [
                ['id', 'cat_id', 'square_plot', 'square_house', 'price', 'coord_x', 'coord_y'],
                'integer'
            ],
            [
                ['square_plot_min', 'square_plot_max', 'square_house_min', 'square_house_max', 'square_apartment_min', 'square_apartment_max', 'price_min', 'price_max'],
                'integer'
            ],
            [
                ['cat_alias', 'title', 'adress', 'description', 'metadesc', 'lead', 'lead_phone'],
                'safe'
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Objects::find()->where(['cat_alias' => Yii::$app->controller->actionParams['type']]);

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere(['>=', 'square_plot', $this->square_plot_min])
            ->andFilterWhere(['<=', 'square_plot', $this->square_plot_max])
            ->andFilterWhere(['>=', 'square_house', $this->square_house_min])
            ->andFilterWhere(['<=', 'square_house', $this->square_house_max])
            ->andFilterWhere(['>=', 'price', $this->price_min])
            ->andFilterWhere(['<=', 'price', $this->price_max])
            ->andFilterWhere(['cat_alias' => $this->cat_alias]);

        return $dataProvider;
    }
}
