<?php

/* @var $this yii\web\View */

use yii\helpers\Url;

$this->title = 'My Yii Application';
?>

<div class="container-fluid">
    <div class="row">
        <h2 class="text-center">Квартиры</h2>
        <div class="col-xs-12">
            <div class="col-xs-4">
                <a href="<?= Url::to(['object/list', 'type' => 'resale']) ?>">
                    <p class="text-center">Вторичка</p>
                    <img src="/images/main_page_imgs/resale.jpg" alt="">
                </a>
            </div>
            <div class="col-xs-4">
                <a href="<?= Url::to(['object/list', 'type' => 'new-buildings']) ?>">
                <p class="text-center">Новостройки</p>
                <img src="/images/main_page_imgs/new-buildings.jpg" alt="">
                </a>
            </div>
            <div class="col-xs-4">
                <a href="<?= Url::to(['object/list', 'type' => 'special-offer-apartments']) ?>">
                <p class="text-center">Специальные предложения</p>
                <img src="/images/main_page_imgs/special-offer-apartments.jpg" alt="">
                </a>
            </div>
        </div>
    </div>
    <hr>
    <div class="row">
        <h2 class="text-center">Загородная недвижимость</h2>
        <div class="col-xs-12">
            <div class="col-xs-4">
                <a href="<?= Url::to(['object/list', 'type' => 'land-plots']) ?>">
                <p class="text-center">Земелиные участки</p>
                <img src="/images/main_page_imgs/land-plots.jpg" alt="">
                </a>
            </div>
            <div class="col-xs-4">
                <a href="<?= Url::to(['object/list', 'type' => 'houses-and-chalets']) ?>">
                <p class="text-center">Дома и дачи</p>
                <img src="/images/main_page_imgs/houses-and-chalets.jpg" alt="">
                </a>
            </div>
            <div class="col-xs-4">
                <a href="<?= Url::to(['object/list', 'type' => 'cottage-villages']) ?>">
                <p class="text-center">Коттеджные поселки</p>
                <img src="/images/main_page_imgs/cottage-villages.jpg" alt="">
                </a>
            </div>
        </div>
    </div>
    <hr>
    <div class="row">
        <h2 class="text-center">Аренда недвижимости</h2>
        <div class="col-xs-12">
            <div class="col-xs-3">
                <a href="<?= Url::to(['object/list', 'type' => 'rent-apartments']) ?>">
                <p class="text-center">Квартиры</p>
                <img src="/images/main_page_imgs/rent-apartments.jpg" alt="">
                </a>
            </div>
            <div class="col-xs-3">
                <a href="<?= Url::to(['object/list', 'type' => 'rent-rooms']) ?>">
                <p class="text-center">Комнаты</p>
                <img src="/images/main_page_imgs/rent-rooms.jpg" alt="">
                </a>
            </div>
            <div class="col-xs-3">
                <a href="<?= Url::to(['object/list', 'type' => 'rent-houses']) ?>">
                <p class="text-center">Дома и дачи</p>
                <img src="/images/main_page_imgs/rent-houses.jpg" alt="">
                </a>
            </div>
            <div class="col-xs-3">
                <a href="<?= Url::to(['object/list', 'type' => 'rent-cottage-villages']) ?>">
                <p class="text-center">Коттеджные поселки</p>
                <img src="/images/main_page_imgs/rent-cottage-villages.jpg" alt="">
                </a>
            </div>
        </div>
    </div>
    <hr>
    <div class="row">
        <h2 class="text-center">Коммерческая недвижимость</h2>
        <div class="col-xs-12">
            <div class="col-xs-3">
                <a href="<?= Url::to(['object/list', 'type' => 'offices']) ?>">
                <p class="text-center">Офисы</p>
                <img src="/images/main_page_imgs/offices.jpg" alt="">
                </a>
            </div>
            <div class="col-xs-3">
                <a href="<?= Url::to(['object/list', 'type' => 'retail-space']) ?>">
                <p class="text-center">Торговые помещения</p>
                <img src="/images/main_page_imgs/retail-space.jpg" alt="">
                </a>
            </div>
            <div class="col-xs-3">
                <a href="<?= Url::to(['object/list', 'type' => 'commercial-land-plots']) ?>">
                <p class="text-center">Земельные участк</p>
                <img src="/images/main_page_imgs/commercial-land-plots.jpg" alt="">
                </a>
            </div>
            <div class="col-xs-3">
                <a href="<?= Url::to(['object/list', 'type' => 'warehouses']) ?>">
                <p class="text-center">Складские помещения</p>
                <img src="/images/main_page_imgs/warehouses.jpg" alt="">
                </a>
            </div>
        </div>
    </div>
</div>