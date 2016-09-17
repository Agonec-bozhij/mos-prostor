<?//= debug($object) ?>

<?php
$this->title = $object->title;
$this->registerMetaTag([
    'name' => 'description',
    'content' => $object->metadesc
]);

$this->registerJsFile('//api-maps.yandex.ru/2.1/?lang=ru_RU', ['position' => \yii\web\View::POS_HEAD]);

?>
<div class="for-positions">
    <div class="single-position">
        <div class="position-info">
            <h1>
                <?= $object->adress ?>
            </h1>
            <p class="price">
                <?= number_format($object->price, 0, ',', ' ') . ' руб.'?>
            </p>
            <br />
            <p class="info">
                Общая информация:
            </p>
            <p class="info">
                Площадь участка: <?=$object->square_plot . " кв.м."?><br />
                Площадь дома: <?=$object->square_house . " кв.м."?>
            </p>
            <br />
            <p>
                <?= $object->description ?>
            </p>

            <p style="position: relative;width: 600px;">
                Менеджер: <span style="font-style: italic; color: #6d9447; font-weight: 600"><?= $object->lead ?></span>
            </p>
            <p style="position: relative;width: 600px;">
                Контактный телефон: <span style="font-style: italic; color: #6d9447; font-weight: 600"><?= $object->lead_phone ?></span>
            </p>


        </div>
<!--        --><?php //if($img) { ?>
<!--            <div class="demo">-->
<!--                <div class="fotorama" data-height="420" data-loop="true" data-fit="cover" data-nav="thumbs">-->
<!--                    --><?php //foreach($img as $k) { ?>
<!--                        <img src="/web/images/--><?//=$k?><!--" />-->
<!--                    --><?php //} ?>
<!--                </div>-->
<!--            </div>-->
<!--        --><?php //} ?>

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
    </div> <!-- single-position -->
</div>
