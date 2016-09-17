<!--<div style="border: 1px solid black">-->
<!--    <p>--><?//= $model->adress ?><!--</p>-->
<!--</div>-->

<?php
use yii\helpers\Html;
use yii\helpers\HtmlPurifier;
?>

<div class="for-positions">
    <div class="position-list">
        <div class="single-position-list">
            <div class="position-images">
<!--                --><?php
//                $img = '';
//                if($model->img) {
//                    $img = explode(',', $model->img);
//                }
//                ?>
<!--                --><?php //if($img) { ?>
<!--                    <div class="fotorama" data-height="270" data-loop="true" data-nav="false" data-fit="cover">-->
<!--                        --><?php //foreach($img as $k) { ?>
<!--                            <img src="/web/images/--><?//=$k?><!--" />-->
<!--                        --><?php //} ?>
<!--                    </div>-->
<!--                --><?php //} ?>
            </div>
            <div class="position-right-content">
                <div class="position-adress"><p class="list"><?=$model->adress?></p></div>
                <div><p class="list"><?=number_format($model->price, 0, ',', ' ') . ' руб.'?></p></div>
                <div class="clear"></div>
                <div class="list-cottage"><p class="list-cottage-p">Площадь дома: <?=$model->square_house . " кв.м."?></p></div>
                <div class="list-cottage"><p class="list-cottage-p">Площадь участка: <?=$model->square_plot . " кв.м."?></p></div>
                <div class="description-cottages"><?=mb_substr($model->description,0,150,'UTF-8') . "..."?></div>
                <div class="position-cottage-url"><a href="<?=Yii::$app->urlManager->createUrl(["objects/{$model->cat_alias}/{$model->id}"])?>">Подробнее &raquo;</a></div>
            </div>
        </div>
    </div>
</div>