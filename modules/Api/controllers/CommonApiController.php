<?php
/*
*purpose common api  for all
*@author Tushar mahangare
*Date 29-01-2019
*/
namespace app\modules\Api\controllers;

use Yii;

use app\modules\ManageRouter\models\Router;
use app\modules\Api\models\ApiToken;
use yii\rest\Controller;
use yii\filters\VerbFilter;
use yii\helpers\ArrayHelper;
use yii\web\Response;
use yii\filters\AccessControl;


class CommonApiController extends Controller
{

    public function behaviors()
    {
      return [
        'verbs' => [
              'class' => VerbFilter::className(),
              'actions' => [
                  'GetRouterBySapid'  => ['POST'],
                  'Create'  => ['POST'],
              ],
          ],
          [
              'class' => 'yii\filters\ContentNegotiator',
              'formats' => [
                  'application/json' => Response::FORMAT_JSON,
              ],
          ],

        ];
    }


   public function beforeAction($action)
    { 
       

        $headers = Yii::$app->request->headers;
        $is_json = explode(",",$headers['content-type']);
        $is_host = explode(",",$headers['host']);
        if($_SERVER['REQUEST_METHOD']=='GET' || $_SERVER['REQUEST_METHOD']=='POST'){
          if (in_array("application/json", $is_json)){
            // returns the Accept header value
           
            $token = $headers->get('token');
            $is_valid_token=ApiToken::validateToken($token);
            if($is_valid_token){
                return parent::beforeAction($action);
            }else{
                $response = Yii::$app->response;
                $response->format = \yii\web\Response::FORMAT_JSON;
                $response->data = ['status'=>'failure','msg'=>'Unauthorized request!!!'];
              return false;
            }
          }else{
            $response = Yii::$app->response;
              $response->format = \yii\web\Response::FORMAT_JSON;
              $response->statusCode = 415;
              $response->data = ['status'=>'failure','msg'=>'Unsupported Media Type!!!'];
            return false;
          }
        }else{
          $response = Yii::$app->response;
            $response->format = \yii\web\Response::FORMAT_JSON;
            $response->statusCode = 405;
            $response->data = ['status'=>'failure','msg'=>'Method Not Allowed!!!'];
          return false;
        }
       
    }


   
    //excercise : 3.1.d
    //url : http://localhost:81/basictest/web/Api/common-api/get-router-by-sapid
    //send token in header and send {"sapid":"wewgwegewgwegewgwgwrgewwegrwgw"} in param 
    // method : POST
    public function actionGetRouterBySapid(){
        $sapid=Yii::$app->request->post('sapid');
        if(isset($sapid) && !empty($sapid)){
            $routerdata=Router::find()->where(['sapid'=>$sapid,'is_active'=>1])->asArray()->all();
                if(isset($routerdata) && !empty($routerdata)){
                    $response['status']='success';
                    $response['data']=$routerdata;
                }else{
                  $response['status']='failure';
                  $response['data']=['No such device found'];
                }
        }else{
                $response['status']='failure';
                $response['data']=['invalid input please provide sapid'];
        }
      return $response;
    }

    //excercise : 3.1.c
    public function actionUpdateRouteByIp(){
        $ip_address=Yii::$app->request->post('ip_address');
        $sapid=Yii::$app->request->post('sapid');
        $hostname=Yii::$app->request->post('hostname');
        $mac_address=Yii::$app->request->post('mac_address');
        if(isset($ip_address) && !empty($ip_address)){
            $routerModel= Router::find()->where(['is_active' => 1,'ip_address'=>$ip_address])->one();
            $routerModel->sapid=$sapid;
            $routerModel->hostname=$hostname;
            $routerModel->ip_address=$ip_address;
            $routerModel->mac_address=$mac_address;
            if($routerModel->save()){
                $response['status']='success';
                $response['msg']='recrord inserted succesfully';
            }else{
                $response['status']='failure';
                $response['data']=$routerModel->getErrors();
            }
        }else{
                $response['status']='failure';
                $response['data']=['invalid input please provide ip address'];
        }
      return $response;
    }

   
    //excercise : 3.1.b
    public function actionCreate()
    {
        $ip_address=Yii::$app->request->post('ip_address');
        $sapid=Yii::$app->request->post('sapid');
        $hostname=Yii::$app->request->post('hostname');
        $mac_address=Yii::$app->request->post('mac_address');
        if(isset($ip_address) && !empty($ip_address)){
            $routerModel=new Router();
            $routerModel->sapid=$sapid;
            $routerModel->hostname=$hostname;
            $routerModel->ip_address=$ip_address;
            $routerModel->mac_address=$mac_address;
            if($routerModel->save()){
                $response['status']='success';
                $response['msg']='recrord inserted succesfully';
            }else{
                $response['status']='failure';
                $response['data']=$routerModel->getErrors();
            }
        }else{
                $response['status']='failure';
                $response['data']=['invalid input please provide ip address'];
        }
        return $response;
    }

   
}
