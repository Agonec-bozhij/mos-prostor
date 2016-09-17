<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

?>

<div class="object-search">
    <?php $form = ActiveForm::begin([
        'action' => ['/objects/' . $type],
        'method' => 'get',
        'options' => ['class' => 'form-inline', 'data-pjax' => '']
    ]); ?>
    <div class="row filters">
        <? if($filter_type === 'land-plots' || $filter_type === 'cottages') : ?>
        <div class="col-xs-<? if($filter_type === 'land-plots') : ?>6<? else : ?>4<? endif; ?>">
        <?= $form->field($model, 'square_plot_filter')->widget(\yii2mod\slider\IonSlider::className(), [
            'pluginOptions' => [
                'type' => 'double',
                'min' => 0,
                'max' => 5000,
                'from' => $model->square_plot_min ? $model->square_plot_min : 0,
                'to' => $model->square_plot_max ? $model->square_plot_max : 5000,
                'step' => 1,
                'postfix' => ' м&sup2;',
                'onChange' => new \yii\web\JsExpression('
                    function(data) {
                        console.log(data.from);
                        $("#objectsearch-square_plot_min").val(data.from);
                        $("#objectsearch-square_plot_max").val(data.to);
                    }
                ')
            ]
        ]) ?>
        </div>
        <? endif; ?>
        <? if($filter_type === 'cottages') : ?>
        <div class="col-xs-4">
        <?= $form->field($model, 'square_house_filter')->widget(\yii2mod\slider\IonSlider::className(), [
            'pluginOptions' => [
                'type' => 'double',
                'min' => 0,
                'max' => 5000,
                'from' => $model->square_house_min ? $model->square_house_min : 0,
                'to' => $model->square_house_max ? $model->square_house_max : 5000,
                'step' => 1,
                'postfix' => ' м&sup2;',
                'onChange' => new \yii\web\JsExpression('
                    function(data) {
                        console.log(data.from);
                        $("#objectsearch-square_house_min").val(data.from);
                        $("#objectsearch-square_house_max").val(data.to);
                    }
                ')
            ]
        ]) ?>
        </div>
        <? endif; ?>
        <? if($filter_type === 'apartments') : ?>
        <div class="col-xs-6">
        <?= $form->field($model, 'square_apartment_filter')->widget(\yii2mod\slider\IonSlider::className(), [
            'pluginOptions' => [
                'type' => 'double',
                'min' => 0,
                'max' => 5000,
                'from' => $model->square_apartment_min ? $model->square_apartment_min : 0,
                'to' => $model->square_apartment_max ? $model->square_apartment_max : 5000,
                'step' => 1,
                'postfix' => ' м&sup2;',
                'onChange' => new \yii\web\JsExpression('
                    function(data) {
                        console.log(data.from);
                        $("#objectsearch-square_apartment_min").val(data.from);
                        $("#objectsearch-square_apartment_max").val(data.to);
                    }
                ')
            ]
        ]) ?>
        </div>
        <? endif; ?>
        <div class="col-xs-<? if($filter_type === 'land-plots' || $filter_type === 'apartments') : ?>6<? else : ?>4<? endif; ?>">
        <?= $form->field($model, 'price_filter')->widget(\yii2mod\slider\IonSlider::className(), [
            'pluginOptions' => [
                'type' => 'double',
                'min' => 0,
                'max' => 50000000,
                'from' => $model->price_min ? $model->price_min : 0,
                'to' => $model->price_max ? $model->price_max : 50000000,
                'step' => 1,
                'postfix' => ' <i class="fa fa-rub" aria-hidden="true"></i>',
                'onChange' => new \yii\web\JsExpression('
                    function(data) {
                        console.log(data.from);
                        $("#objectsearch-price_min").val(data.from);
                        $("#objectsearch-price_max").val(data.to);
                    }
                ')
            ]
        ]) ?>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-3">
            <?= $form->field($model, 'square_plot_min')->label('')->hiddenInput() ?>
            <?= $form->field($model, 'square_plot_max')->label('')->hiddenInput() ?>
        </div>
        <div class="col-xs-3">
            <?= $form->field($model, 'square_house_min')->label('')->hiddenInput() ?>
            <?= $form->field($model, 'square_house_max')->label('')->hiddenInput() ?>
        </div>
        <div class="col-xs-3">
            <?= $form->field($model, 'square_apartment_min')->label('')->hiddenInput() ?>
            <?= $form->field($model, 'square_apartment_max')->label('')->hiddenInput() ?>
        </div>
        <div class="col-xs-3">
            <?= $form->field($model, 'price_min')->label('')->hiddenInput() ?>
            <?= $form->field($model, 'price_max')->label('')->hiddenInput() ?>
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