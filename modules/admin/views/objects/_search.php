<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\ObjectsSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="objects-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'adress') ?>

    <?php  echo $form->field($model, 'square_plot') ?>

    <?php  echo $form->field($model, 'square_house') ?>

    <?php  echo $form->field($model, 'square_apartment') ?>

    <?php  echo $form->field($model, 'description') ?>

    <?php  echo $form->field($model, 'price') ?>

    <?php // echo $form->field($model, 'coord_x') ?>

    <?php // echo $form->field($model, 'coord_y') ?>

    <?php // echo $form->field($model, 'metadesc') ?>

    <?php  echo $form->field($model, 'lead') ?>

    <?php // echo $form->field($model, 'lead_phone') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
