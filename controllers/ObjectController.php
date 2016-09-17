<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 09.09.2016
 * Time: 18:30
 */

namespace app\controllers;

use app\models\CustomerRequestObjectForm;
use app\modules\admin\models\Objects;
use Yii;
use app\models\Category;
use app\models\Object;
use app\models\ObjectSearch;
use yii\web\NotFoundHttpException;

class ObjectController extends AppController
{

    public function actionList($type) {

        $item = Category::find()->where(['alias' => $type])->one();
        $title = $item->name;
        $filter_type = $item->filter_type;

        $searchModel = new ObjectSearch();
        $dataProvider = $searchModel->search(\Yii::$app->request->queryParams);

        return $this->render('list', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'type' => $type,
            'title' => $title,
            'filter_type' => $filter_type
        ]);
    }

    public function actionView($type, $id) {

//        $object = Object::findOne($id);
        $object = Objects::findOne($id);
//        $model = $this->findModel($id);
        $customer_form = new CustomerRequestObjectForm();

        return $this->render('view', compact('object', 'customer_form'));
    }

    public function actionValForm() {

        if(Yii::$app->request->isAjax) {
            $model = new CustomerRequestObjectForm();
            $response = [];
            if($model->load(Yii::$app->request->post()))  {
                if($model->validate()) {
                   if($model->save()) {
                       $response['success'] = true;
                       $response['message'] = 'Успешная отправка формы';
                       return json_encode($response);
                   } else {
                       $response['success'] = false;
                       $response['message'] = 'Ошибка сохранения';
                       return json_encode($response);
                   }
                } else {
                    $response['success'] = false;
                    $response['message'] = 'Ошибка валидации';
                    return json_encode($response);
                }
            } else {
                $response['success'] = false;
                $response['message'] = 'Данные не загружены';
                return json_encode($response);
            }
        }
        return 'error';
    }

    protected function findModel($id)
    {
        if (($model = Object::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}