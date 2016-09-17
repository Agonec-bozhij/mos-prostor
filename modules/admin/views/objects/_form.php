<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Objects */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="objects-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

    <div class="form-group field-objects-cat_id has-success">
        <label class="control-label" for="objects-cat_id">Родительская категория</label>
        <select id="objects-cat_id" class="form-control" name="Objects[cat_id]">
            <?= \app\components\MenuWidget::widget(['tpl' => 'select_category', 'model' => $model])?>
        </select>
    </div>

<!--    --><?//= $form->field($model, 'cat_id')->textInput() ?>

<!--    --><?//= $form->field($model, 'cat_alias')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'title')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'adress')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'square_plot')->textInput() ?>

    <?= $form->field($model, 'square_house')->textInput() ?>

    <?= $form->field($model, 'square_apartment')->textInput() ?>

    <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'price')->textInput() ?>

    <?= $form->field($model, 'coord_x')->textInput() ?>

    <?= $form->field($model, 'coord_y')->textInput() ?>

    <?= $form->field($model, 'metadesc')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'lead')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'lead_phone')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'image')->fileInput() ?>

    <?= $form->field($model, 'gallery[]')->fileInput(['multiple' => true, 'accept' => 'image/*']) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Создать объект' : 'Обновить данные по объекту', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
