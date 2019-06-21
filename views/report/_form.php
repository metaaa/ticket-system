<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Report */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="report-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'room')->textInput() ?>

    <?= $form->field($model, 'status')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'reporterId')->textInput() ?>

    <?= $form->field($model, 'suspectId')->textInput() ?>

    <?= $form->field($model, 'calmDown')->textInput() ?>

    <?= $form->field($model, 'comment')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
