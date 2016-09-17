<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 17.09.2016
 * Time: 0:39
 */

namespace app\modules\admin\models;


use yii\base\Model;
use yii\data\ActiveDataProvider;
use yii\db\Expression;

class OrdersSearch extends Orders
{
    public function scenarios()
    {
        return Model::scenarios();
    }

    public function search($params) {

        $query = Orders::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query
        ]);

        $this->load($params);

        if (!isset($params['user'])) {
            $query->andFilterWhere(['IS', 'user_id', (new Expression('Null'))]);
        } else {
            $query->andFilterWhere(['user_id' => $params['user']])
                ->andFilterWhere(['status' => '1']);
        }



        return $dataProvider;
    }
}