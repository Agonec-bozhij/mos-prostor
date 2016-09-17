<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 28.08.2016
 * Time: 12:25
 */

namespace app\controllers;


use app\models\Category;

class CategoryController extends AppController
{
    public function actionView($alias) {
        $alias = \Yii::$app->request->get('alias');

        $items = Category::find()->where(['alias' => $alias])->with('objects')->all();

        return debug($items);
    }
}