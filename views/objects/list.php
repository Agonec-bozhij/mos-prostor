<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\widgets\Pjax;

$this->title = $title;
$this->params['breadcrumbs'][] = $this->title;
?>

<h1><?= Html::encode($this->title) ?></h1>

<?php Pjax::begin(); ?>

    <?= $this->render('_searchObjects', ['model' => $searchModel, 'type' => $type]) ?>

    <?= \yii\widgets\ListView::widget([
        'dataProvider' => $dataProvider,
        'itemView' => '_singleObject',
        'emptyText' => 'элементов не найдено'
    ]) ?>

<?php Pjax::end(); ?>