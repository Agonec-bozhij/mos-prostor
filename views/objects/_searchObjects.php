<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

?>

<div class="object-search">
    <?php $form = ActiveForm::begin([
        'action' => [$type],
        'method' => 'get',
        'options' => ['class' => 'form-inline', 'data-pjax' => '']
    ]); ?>
    <div class="row">
        <?= $form->field($model, 'sp_min')->widget(\yii2mod\slider\IonSlider::className(), [
            'pluginOptions' => [
                'min' => 0,
                'max' => 5000,
                'step' => 1,
                'onChange' => new \yii\web\JsExpression('
                    function(data) {
                        console.log(data);
                    }
                ')
            ]
        ]) ?>
    </div>
    <div class="row">
        <div class="col-xs-4">
            <?= $form->field($model, 'square_plot_min') ?>
            <?= $form->field($model, 'square_plot_max') ?>
        </div>
        <div class="col-xs-4">
            <?= $form->field($model, 'square_house_min') ?>
            <?= $form->field($model, 'square_house_max') ?>
        </div>
        <div class="col-xs-4">
            <?= $form->field($model, 'price_min') ?>
            <?= $form->field($model, 'price_max') ?>
            <?= $form->field($model, 'cat_alias')->label('')->hiddenInput(['value' => $type]) ?>
        </div>
    </div>
    <div class="row">
        <div class="form-group">
            <?= Html::submitButton('Искать', ['class' => 'btn btn-primary']) ?>
        </div>
    </div>
    <?php ActiveForm::end(); ?>
</div>