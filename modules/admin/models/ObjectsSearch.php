<?php

namespace app\modules\admin\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\admin\models\Objects;

/**
 * ObjectsSearch represents the model behind the search form about `app\modules\admin\models\Objects`.
 */
class ObjectsSearch extends Objects
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'cat_id', 'square_plot', 'square_house', 'price'], 'integer'],
            [['cat_alias', 'title', 'adress', 'description', 'metadesc', 'lead', 'lead_phone'], 'safe'],
            [['coord_x', 'coord_y'], 'number'],
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
        $query = Objects::find()->with('category');

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

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'cat_id' => $this->cat_id,
            'square_plot' => $this->square_plot,
            'square_house' => $this->square_house,
            'price' => $this->price,
            'coord_x' => $this->coord_x,
            'coord_y' => $this->coord_y,
        ]);

        $query->andFilterWhere(['like', 'cat_alias', $this->cat_alias])
            ->andFilterWhere(['like', 'title', $this->title])
            ->andFilterWhere(['like', 'adress', $this->adress])
            ->andFilterWhere(['like', 'description', $this->description])
            ->andFilterWhere(['like', 'metadesc', $this->metadesc])
            ->andFilterWhere(['like', 'lead', $this->lead])
            ->andFilterWhere(['like', 'lead_phone', $this->lead_phone]);

        return $dataProvider;
    }
}
