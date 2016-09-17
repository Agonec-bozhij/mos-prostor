<?//= debug(Yii::$app->controller->actionParams) ?>
<li class="<? if(($category['alias'] === Yii::$app->controller->actionParams['type']) || ($category['alias'] === '/' && Yii::$app->request->url == Yii::$app->homeUrl)) : ?> active <? endif; ?><? if( isset($category['childs']) ) : ?> dropdown <? endif; ?>">
    <a href="<? if($category['name'] === 'Главная') : ?><?= \yii\helpers\Url::to(['/']) ?><? else : ?><?= \yii\helpers\Url::to(['object/list', 'type' => $category['alias']]) ?><? endif;?>"
    <? if( isset($category['childs']) ) : ?>class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"<? endif; ?>>
        <?= $category['name'] ?>
        <? if( isset($category['childs']) ) : ?><span class="caret"></span><? endif; ?>
    </a>
    <? if( isset($category['childs']) ) : ?>
        <ul class="dropdown-menu">
            <?= $this->getMenuHtml($category['childs']) ?>
        </ul>
    <? endif; ?>
</li>






