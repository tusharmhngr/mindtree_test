<?php

namespace app\modules\ManageRouter\controllers;

use Yii;
use app\modules\ManageRouter\models\Router;
use app\modules\ManageRouter\models\RouterSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\Response;
use yii\widgets\ActiveForm;

/**
 * ManageRouterController implements the CRUD actions for Router model.
 */
class ManageRouterController extends Controller
{
    /**
     * {@inheritdoc}
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
     * Lists all Router models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new RouterSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Router model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Router model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Router();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            // return $this->redirect(['view', 'id' => $model->id]);
            Yii::$app->session->setFlash('success', "Router details added successfully.");
            return $this->redirect(['index']);


        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Router model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            // return $this->redirect(['view', 'id' => $model->id]);
            Yii::$app->session->setFlash('success', "Router details updated successfully.");
            return $this->redirect(['index']);
        }

        return $this->render('update', [
            'model' => $model,

        ]);
    }

    /**
     * Deletes an existing Router model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {   
        $model = $this->findModel($id);
        $model->is_active=0;
        $model->save();
        return $this->redirect(['index']);
    }

    /**
     * Finds the Router model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Router the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Router::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    public function actionValidateAddform()
    {
        $model = new Router(['scenario'=>'create']);
        if(Yii::$app->request->isAjax && $model->load(Yii::$app->request->post())){
           Yii::$app->response->format = Response::FORMAT_JSON;
           return ActiveForm::validate($model);
        }
    }

    public function actionValidateUpdateform()
    {
        $model = new Router();
        if(Yii::$app->request->isAjax && $model->load(Yii::$app->request->post())){
           Yii::$app->response->format = Response::FORMAT_JSON;
           return ActiveForm::validate($model);
        }
    }

    public function actionDrawShape(){
        header("Content-type: image/png");
 
        $img_width = 800;
        $img_height = 600;
         
        $img = imagecreatetruecolor($img_width, $img_height);
         
        $black = imagecolorallocate($img, 0, 0, 0);
        $white = imagecolorallocate($img, 255, 255, 255);
        $red   = imagecolorallocate($img, 255, 0, 0);
        $green = imagecolorallocate($img, 0, 255, 0);
        $blue  = imagecolorallocate($img, 0, 0, 255);
        $orange = imagecolorallocate($img, 255, 200, 0);
         
        imagefill($img, 0, 0, $white);
         
        imageline($img, 100, 100,$img_width-100 , 100, $black);
        imageline($img, 100, 100,$img_width/3-50 , $img_height/2, $black);
        imageline($img, $img_width/3+300, $img_height/2,$img_width-100 , 100, $black);
        imageline($img, $img_width/3+300, $img_height/2,$img_width/2, $img_height/2+130, $black);
        imageline($img, $img_width/3-50,  $img_height/2,$img_width/2, $img_height/2+130, $black);


        imagefilledellipse($img, 100, 100, 100, 100, $white);
        imagearc($img, 100, 100, 100, 100,  0, 360, $black);

        imagefilledellipse($img, $img_width-100, 100, 100, 100, $white);
        imagearc($img, $img_width-100, 100, 100, 100,  0, 360, $black);

        imagefilledellipse($img, $img_width/3+300,  $img_height/2, 100, 100, $white);
        imagearc($img, $img_width/3+300,  $img_height/2, 100, 100,  0, 360, $black);

        imagefilledellipse($img, $img_width/3-50,  $img_height/2, 100, 100, $white);
        imagearc($img, $img_width/3-50,  $img_height/2, 100, 100,  0, 360, $black);

        imagefilledellipse($img, $img_width/2, $img_height/2+130, 100, 100, $white);
        imagearc($img, $img_width/2, $img_height/2+130, 100, 100,  0, 360, $black);
        imagepng($img);
    }
}
