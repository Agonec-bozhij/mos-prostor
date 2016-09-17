<?php

/* @var $this \yii\web\View */
/* @var $content string */

use app\components\MenuWidget;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;
use app\assets\ltAppAsset;

AppAsset::register($this);
ltAppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>

    <?php
        $this->registerJsFile('js/html5shiv.js', ['position' => \yii\web\View::POS_HEAD, 'condition' => 'lte IE9']);
        $this->registerJsFile('js/respond.min.js', ['position' => \yii\web\View::POS_HEAD, 'condition' => 'lte IE9']);
    ?>

    <link rel="shortcut icon" href="images/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="images/ico/apple-touch-icon-57-precomposed.png">
</head><!--/head-->

<body>
<?php $this->beginBody() ?>
<header id="header"><!--header-->
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-3 col-lg-offset-1">
                <a href="<?= \yii\helpers\Url::to(['/']) ?>">
                    <?= Html::img('@web/images/common/logo.png', ['alt' => 'АН Московские просторы', 'class' => 'logo-img'])?>
                </a>
            </div>
            <div class="col-lg-5">

            </div>
            <div class="col-lg-3">
                <p class="header-phone">
                    <i class="fa fa-phone" aria-hidden="true"></i>
                    <span>8 (499) 390 78 35</span>
                </p>
                <p class="header-phone">
                    <i class="fa fa-phone" aria-hidden="true"></i>
                    <span>8 (499) 390 78 34</span>
                </p>
            </div>
        </div>
    </div>

    <nav class="navbar navbar-default">
        <div class="container-fluid">

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <?= MenuWidget::widget(['tpl' => 'menu']) ?>
                </ul>
            </div><!-- /.navbar-collapse -->
        </div><!-- /.container-fluid -->
    </nav>

</header><!--/header-->


<div class="container">
<?= $content ?>
</div>

<footer class="footer">
    <div class="container">
        <p class="pull-left">&copy; Московские просторы <?= date('Y') ?></p>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>