<?php

namespace app\modules\Api\models;

use Yii;

/**
 * This is the model class for table "api_token".
 *
 * @property int $id
 * @property string $token
 * @property string $updated
 */
class ApiToken extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
	
	
    public static function tableName()
    {
        return 'api_token';
    }

    

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['token'], 'string', 'max' => 250],
            
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'token' => 'Token',
        ];
    }

    public static function validateToken($module, $token) {
        return self::find()->where( ['token' => $token] )->exists();
    }
	
	
}
