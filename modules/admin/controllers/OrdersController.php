<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 17.09.2016
 * Time: 0:29
 */

namespace app\modules\admin\controllers;


use app\modules\admin\models\Objects;
use app\modules\admin\models\Orders;
use app\modules\admin\models\OrdersSearch;
use Yii;

class OrdersController extends AppAdminController
{
    public function actionIndex() {

        $searchModel = new OrdersSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', compact('searchModel', 'dataProvider'));
    }

    public function actionTake($id) {

        $order = Orders::findOne($id);
        $order->user_id = Yii::$app->user->identity->id;
        $order->status = 1;

        if($order->save()) {

            Yii::$app->session->setFlash('success', 'Заявка #' . $id . ' успешно зарегистрирована за Вами.');
            return $this->redirect(['index']);
        }
        return 'error';
    }

    public function actionUser() {

        $searchModel = new OrdersSearch();
        $dataProvider = $searchModel->search(['user' => Yii::$app->user->identity->id]);

        return $this->render('my_orders_view', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider
        ]);
    }

    public function actionManagerView($id) {

        $model = Orders::findOne($id);

        return $this->render('manager_view', [
            'model' => $model
        ]);
    }

    public function actionAddComment($id) {

        $model = Orders::findOne($id);
        //debug(Yii::$app->request->post()); die;
        if($model->load(Yii::$app->request->post())) {
            if($model->validate()) {
               if($model->save()) {
                   Yii::$app->session->setFlash('success', 'Комментарий менеджена добавлен.');
                   $this->redirect(['orders/manager-view', 'id' => $id]);
               } else {
                   Yii::$app->session->setFlash('error', 'Сохранение по пизде пошло.');
               }
            } else {
                Yii::$app->session->setFlash('error', 'Какая-то хуйня с валидацией.');
            }
        }
    }
}