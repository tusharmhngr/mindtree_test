<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\ManageRouter\models\RouterSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Routers';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="router-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Router', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            // 'id',
            'sapid',
            'hostname',
            'ip_address',
            'mac_address',
            'created_from',
            //'is_active',
            //'created_at',
            //'modified_at',

            [   
                'class' => 'yii\grid\ActionColumn',
                'header' => "Actions",
                'template' => '{update}{delete}',

            ],
        ],
    ]); ?>


</div>
