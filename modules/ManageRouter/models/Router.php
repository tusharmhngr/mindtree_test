<?php

namespace app\modules\ManageRouter\models;

use Yii;

/**
 * This is the model class for table "router".
 *
 * @property int $id
 * @property string|null $sapid
 * @property string|null $hostname
 * @property string|null $ip_address
 * @property string|null $mac_address
 * @property int $is_active
 * @property string $created_at
 * @property string $modified_at
 */
class Router extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'router';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['is_active'], 'integer'],
            [['created_at', 'modified_at'], 'safe'],
            ['sapid', 'string','min' => 18,'tooShort'=>'You cannot enter less than 18 characters',],
            ['hostname', 'string','min' => 24,'tooShort'=>'You cannot enter less than 24 characters',],
            ['mac_address', 'string','min' => 17,'tooShort'=>'You cannot enter less than 17 characters',],
            [['sapid','hostname'], 'match', 'pattern' => '/^[A-Za-z0-9_]+$/u', 'message' => 'please enter alphanumeric values for this field'],
            ['mac_address', 'match', 'pattern' => '/^([0-9A-Fa-f]{2}[:-]){5}([0-9A-Fa-f]{2})$/', 'message' => 'please enter alphanumeric values for this field'],
            [['hostname', 'ip_address', 'mac_address','sapid'], 'required'],
            ['ip_address', 'ip', 'ipv6' => false],
            ['ip_address', 'unique','on'=>'create'],
            ['hostname', 'unique','on'=>'create'],
            ['sapid', 'unique','on'=>'create'],
            ['mac_address', 'unique','on'=>'create']
            
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'sapid' => 'Sapid',
            'hostname' => 'Hostname',
            'ip_address' => 'Loopback(ipv4)',
            'mac_address' => 'Mac Address',
            'is_active' => 'Is Active',
            'created_at' => 'Created At',
            'modified_at' => 'Modified At',
            'created_from' => 'Created From',
        ];
    }
}
