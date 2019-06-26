<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ReportSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Submitted Reports';
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="report-index">

    <h1><?= Html::encode($this->title) ?></h1>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'rowOptions' => function($model) {
            if ($model->status == "down") {
                return ['class' => 'danger'];
            } elseif ($model->status == "clear") {
                return ['class' => 'success'];
            }
        },

        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'room',
            'status',
            'calmDown',
            'comment',
            'reported',

            ['class' => 'yii\grid\ActionColumn',]
        ],
    ]); ?>


</div>
