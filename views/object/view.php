<?//= debug($object) ?>

<?php
use yii\bootstrap\ActiveForm;
use yii\bootstrap\Modal;
use yii\helpers\Html;

$this->title = $object->title;
$this->registerMetaTag([
    'name' => 'description',
    'content' => $object->metadesc
]);

$this->registerJsFile('//api-maps.yandex.ru/2.1/?lang=ru_RU', ['position' => \yii\web\View::POS_HEAD]);
$images = $object->getImages();
?>
<div class="container">
    <div class="col-xs-6 position-info">
        <h1><?= $object->adress ?></h1>
        <p class="price"><?= number_format($object->price, 0, ',', ' ') . ' руб.'?></p>
        <br />
        <p class="info">Общая информация:</p>
        <p class="info">
            Площадь участка: <?=$object->square_plot . " кв.м."?><br />
            Площадь дома: <?=$object->square_house . " кв.м."?>
        </p>
        <br />
        <p><?= $object->description ?></p>
        <p style="position: relative;width: 600px;">Менеджер: <span style="font-style: italic; color: #6d9447; font-weight: 600"><?= $object->lead ?></span></p>
        <p style="position: relative;width: 600px;">Контактный телефон: <span style="font-style: italic; color: #6d9447; font-weight: 600"><?= $object->lead_phone ?></span></p>

        <? Modal::begin([
            'options' => [
                'class' => 'inner-object-modal'
            ],
            'header' => '<h3 class="text-center">У Вас есть вопросы по данному объекту?</h3>',
            'toggleButton' => [
                'label' => 'Узнать подробности',
                'tag' => 'button',
                'class' => 'btn btn-lg btn-block call-customer-modal',
            ],
        ]);
        ?>
        <h4 class="text-center">Наш менеджер свяжется с Вами в ближайшее время и подробно ответит на все Ваши вопросы.</h4>
        <? $form = ActiveForm::begin([
            'enableClientValidation' => true,
            'enableAjaxValidation' => false,
            'layout' => 'horizontal',
            'options' => [
                'id' => 'customer-request-form',
                'onSubmit' => 'sendAjax(event)'
            ]
        ]); ?>

        <?= $form->field($customer_form, 'name') ?>
        <?= $form->field($customer_form, 'email') ?>
        <?= $form->field($customer_form, 'phone')->widget(\yii\widgets\MaskedInput::className(), [
            'name' => 'phone',
            'mask' => '+7(999) 999-99-99'
        ]) ?>
        <!--                --><?//= $form->field($customer_form, 'phone') ?>
        <?= $form->field($customer_form, 'message')->textarea(['rows' => 3]) ?>
        <?= $form->field($customer_form, 'chosen_object')->textInput(['disabled' => false, 'value' => $object->id]) ?>


        <div class="form-group">
            <div class="col-xs-6 col-xs-offset-3">
                <?= Html::submitButton('Отправить запрос нашему менеджеру', ['class' => 'btn btn-success']) ?>
            </div>
        </div>

        <div class="loader-wrap">
            <div class="loader-line"></div>
            <div class="loader-text">Отправка...</div>
        </div>

        <? ActiveForm::end();?>
        <div class="alert success-message text-center" role="alert">Спасибо за заявку!</div>
        <? Modal::end(); ?>
    </div>

    <div class="col-xs-6 fotorama-block">
        <div class="fotorama" data-loop="true" data-height="100%" data-width="100%" data-fit="cover" data-nav="thumbs" data-arrows="always" data-allowFullScreen="true">
            <?php foreach($images as $image) { ?>
                <img src="<?= $image->getUrl(); ?>" />
            <?php } ?>
        </div>
    </div>


    <div class="col-xs-12">
        <!-- яндекс карта начало -->
        <div id="mymap" style="position:relative; margin:20px 16px; width:990px;"></div>

        <script type="text/javascript">
            ymaps.ready(init);

            function init () {
                var myMap = new ymaps.Map("mymap", {
                        center: [<?= $object->coord_x . ',' . $object->coord_y ?>],
                        zoom: 10
                    }, {
                        searchControlProvider: 'yandex#search'
                    }),

                // Создаем геообъект с типом геометрии "Точка".
                    myGeoObject = new ymaps.GeoObject({
                        // Описание геометрии.
                        geometry: {
                            type: "Point"
                        },
                        // Свойства.
                        properties: {
                            // Контент метки.

                        }
                    }, {
                        // Опции.
                        // Иконка метки будет растягиваться под размер ее содержимого.
                        preset: 'islands#blackStretchyIcon'
                        // Метку можно перемещать.

                    });

                myMap.geoObjects
                    .add(myGeoObject)
                    .add(new ymaps.Placemark([<?php if($object->coord_x) { echo $object->coord_x . ',' . $object->coord_y; } else { echo "0,0"; };?>], {

                        balloonContentHeader: '<?=$object->adress?>',
                        balloonContentBody: '<?=rtrim($object->description)?>',
                        hintContent: '<?=$object->adress?>'
                    }, {
                        preset: 'islands#icon',
                        iconColor: '#0095b6'
                    }));
            }

        </script>
        <!-- яндекс карта конец -->
    </div>
</div>