<?php

namespace app\modules\Api;

/**
 * Api module definition class
 */
class Api extends \yii\base\Module
{
    /**
     * {@inheritdoc}
     */
    public $controllerNamespace = 'app\modules\Api\controllers';

    /**
     * {@inheritdoc}
     */
    public function init()
    {
      //added this config line for request object by tushar for rest api
        if(\Yii::$app instanceOf \yii\web\Application){
          \Yii::$app->request->enableCookieValidation = false;
          \Yii::$app->request->enableCsrfValidation = false;
          \Yii::$app->request->parsers = [
              'application/json' => 'yii\web\JsonParser',
          ] ;
        }

        parent::init();

        // custom initialization code goes here
    }

}
