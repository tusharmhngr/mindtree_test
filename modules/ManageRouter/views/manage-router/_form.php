<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\ManageRouter\models\Router */
/* @var $form yii\widgets\ActiveForm */

?>

<div class="router-form">

    <?php $form = ActiveForm::begin([
        'id' => 'router-form', 
        'enableAjaxValidation' => true,
        // 'action' => Url::to(['role-criteria/add-new-rolecriteria']),
        'validationUrl' => 'validateform',//
        'validationUrl' => (empty($model->id)) ? 'validate-addform' : 'validate-updateform',
       

    ]); ?>

    <?= $form->field($model, 'sapid')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'hostname')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ip_address')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'mac_address')->textInput(['maxlength' => true]) ?>


    
    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success' ,'name' => 'router-button']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
