<?php

use yii\bootstrap\Html;
use yii\grid\GridView;
use yii\helpers\Url;

$this->title = 'Заявки';

?>

<div class="container">
    <div class="row">
        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],

                'id',
                'name',
                'email',
                'phone',
                'message:ntext',
                'chosen_object',
                [
                    'attribute' => 'status',
                    'value' => function($data) {
                        return $data->status == 1 ? '<span class="text-warning">В работе</span>' : '';
                    },
                    'format' => 'html'
                ],
                [
                    'class' => 'yii\grid\ActionColumn',
                    'template' => '{view}',
                    'buttons' => [
                        'view' => function($url, $model) {
                            return Html::a('Просмотреть', Url::to(['orders/manager-view', 'id' => $model->id]), ['class' => 'btn btn-info']);
                        }
                    ]
                ],
                [
                    'class' => 'yii\grid\ActionColumn',
                    'template' => '{done}',
                    'buttons' => [
                        'done' => function($url, $model) {
                            return Html::a('Завершить', $url, ['class' => 'btn btn-success']);
                        }
                    ]
                ],
            ],
        ]); ?>
    </div>
</div>
