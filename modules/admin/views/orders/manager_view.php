<?php

use yii\bootstrap\ActiveForm;
use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Objects */

$this->title = 'Просмотр заявки';
?>
<?php Pjax::begin(); ?>
<div class="order-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <div class="row">
        <div class="col-xs-12" style="margin-bottom: 20px;">
        <? $form = ActiveForm::begin([
            'action' => ['orders/add-comment', 'id' => $model->id],
            'method' => 'post',
            'options' => ['data-pjax' => '']
        ]) ?>

        <?= $form->field($model, 'manager_comment')->textarea() ?>

        <?= \yii\bootstrap\Html::submitButton('Оставить комментарий', ['class' => 'btn btn-info pull-right'])?>

        <? ActiveForm::end() ?>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-12">
            <?= DetailView::widget([
                'model' => $model,
                'attributes' => [
                    'id',
                    'name',
                    'email',
                    'phone',
                    'message:ntext',
                    'chosen_object',
                    'manager_comment'
                ],
            ]) ?>
        </div>
    </div>
</div>
<?php Pjax::end(); ?>