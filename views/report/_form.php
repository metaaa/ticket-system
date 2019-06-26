<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

$model->reporterId = Yii::$app->getUser()->id;
/* @var $this yii\web\View */
/* @var $model app\models\Report */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="report-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'room')->dropDownList(array('1' => '1', '2' => '2', '3' => '3')) ?>

    <?= $form->field($model, 'status')->dropDownList(array('down' => 'down', 'clear' => 'clear'))?>

    <?= $form->field($model, 'reporterId')->textInput(['readonly' => true]) ?>

    <?= $form->field($model, 'suspectId')->textInput() ?>

    <?= $form->field($model, 'calmDown')->textInput() ?>

    <?= $form->field($model, 'comment')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
