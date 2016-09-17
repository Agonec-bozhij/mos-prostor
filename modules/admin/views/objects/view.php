<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Objects */

$this->title = $model->title;
?>

<?php
$img = $model->getImage();
$imgs = $model->getImages();
$images_arr = '';
foreach($imgs as $image) {
    $images_arr .= "<div class='block-delete-image'><img src='{$image->getUrl('x300')}'>";
    $images_arr .= "<button class='btn btn-danger delete-image' data-id='{$model->id}' data-image_id='{$image->id}'>Удалить</button></div>";
}
?>

<div class="objects-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Редактировать объект', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Удалить объект', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
//            'cat_id',
            [
                'attribute' => 'cat_id',
                'value' => $model->category->name
            ],
//            'cat_alias',
            'title:ntext',
            'adress:ntext',
            'square_plot',
            'square_house',
            'description:ntext',
            'price',
            'coord_x',
            'coord_y',
            'metadesc:ntext',
            'lead',
            'lead_phone',
            [
                'attribute' => 'image',
                'value' => "<img src='" .$img->getUrl('300x') . "'>",
                'format' => 'html'
            ],
            [
                'attribute' => 'gallery',
                'value' => $images_arr,
                'format' => 'raw'
            ],
        ],
    ]) ?>

</div>
