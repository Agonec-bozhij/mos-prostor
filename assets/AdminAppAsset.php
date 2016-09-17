<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 08.09.2016
 * Time: 13:50
 */

namespace app\assets;


use yii\web\AssetBundle;

class AdminAppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/site.css',
    ];
    public $js = [
        'js/admin_scripts.js'
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}