<?php

namespace app\modules\admin\controllers;

use app\models\Category;
use Yii;
use app\modules\admin\models\Objects;
use app\modules\admin\models\ObjectsSearch;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

/**
 * ObjectsController implements the CRUD actions for Objects model.
 */
class ObjectsController extends AppAdminController
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Objects models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ObjectsSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Objects model.
     * @param string $id
     * @return mixed
     */
    public function actionView($id)
    {
        $model = $this->findModel($id);

        $object = $model->category;

        return $this->render('view', [
            'model' => $model,
            'object' => $object
        ]);
    }

    /**
     * Creates a new Objects model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Objects();

        if ($model->load(Yii::$app->request->post())) {

            $cat_alias = Category::findOne($model->cat_id);

            $model->cat_alias = $cat_alias['alias'];

            if(! $model->coord_x || ! $model->coord_y) {

                $coords = $model->get_coords();

                $model->coord_x = $coords[1];
                $model->coord_y = $coords[0];
                if($model->coord_x == '.') {
                    $model->coord_x = NULL;
                    $model->coord_y = NULL;
                }
                if($model->save()) {

                    $model->image = UploadedFile::getInstance($model, 'image');

                    if($model->image) {
                        $model->upload();
                    }
                    unset($model->image);

                    $model->gallery = UploadedFile::getInstances($model, 'gallery');
                    $model->uploadGallery();

                    Yii::$app->session->setFlash('success', 'Объект успешно создан');

                    return $this->redirect(['view', 'id' => $model->id]);
                }
            }

        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Objects model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);


        if ($model->load(Yii::$app->request->post())) {
            $model->category;
            $model->cat_alias = $model->category->alias;
            if($model->save()) {
                $model->image = UploadedFile::getInstance($model, 'image');

                if($model->image) {
                    $model->upload();
                }
                unset($model->image);

                $model->gallery = UploadedFile::getInstances($model, 'gallery');
                $model->uploadGallery();

                Yii::$app->session->setFlash('success', 'Объект успешно обновлен');

                return $this->redirect(['view', 'id' => $model->id]);
            }

        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Objects model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        Yii::$app->session->setFlash('success', 'Объект успешно удален');

        return $this->redirect(['index']);
    }

    /**
     * Finds the Objects model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return Objects the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Objects::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    public function actionDeleteImage($id, $image_id) {

        if(Yii::$app->request->isAjax) {
            $model = $this->findModel($id);
            $images = $model->getImages();
            foreach($images as $image) {
                if($image_id == $image->id) {
                    $model->removeImage($image);
                }
            }
            return true;
        }

        return false;
    }
}
