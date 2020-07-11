<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\ManageRouter\models\Router */

$this->title = 'Create Router';
$this->params['breadcrumbs'][] = ['label' => 'Routers', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="router-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
