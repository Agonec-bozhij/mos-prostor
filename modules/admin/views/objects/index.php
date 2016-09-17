<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\admin\models\ObjectsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Объекты';
?>
<div class="objects-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Создать новый объект', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
//            'cat_id',
            [
                'attribute' => 'cat_id',
                'value' => function($data) {
                    return $data->category->name;
                }
            ],
//            'cat_alias',
//            'title:ntext',
             'adress:ntext',
             'square_plot',
             'square_house',
             'square_apartment',
             'description:ntext',
             'price',
            // 'coord_x',
            // 'coord_y',
            // 'metadesc:ntext',
             'lead',
            // 'lead_phone',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
