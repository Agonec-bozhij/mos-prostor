<?php

use yii\grid\GridView;

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
                        return !$data->status ? '<span class="text-danger">Ожидание</span>' : '';
                    },
                    'format' => 'html'
                ],
                [
                    'class' => 'yii\grid\ActionColumn',
                    'template' => '{take}',
                    'buttons' => [
                        'take' => function($url, $model) {
                            return \yii\bootstrap\Html::a('Взять', $url, ['class' => 'btn btn-warning']);
                        }
                    ]
                ],
            ],
        ]); ?>
    </div>
</div>
