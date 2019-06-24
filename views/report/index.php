<?php

use app\models\Report;
use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ReportSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Reports';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="report-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Report', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            'room',
            'status',
            'reporterId',
            'suspectId',
            'calmDown',
            'comment',
            'reported',


            ['class' => 'yii\grid\ActionColumn',
                 'template' => '{view} {report}',
                 'buttons' => [
                     'report' => function ($model, $key, $index) {
                         if (true) {
                             $options = [
                                 'title' => Yii::t('yii', 'Report'),
                             ];
                             return Html::a('Report', ['create'], ['class' => 'btn btn-success']);
                         };
                         //return Html::a('Create Report', ['create'], ['class' => 'btn btn-success']);
                     },
                 ]
            ],
        ],
    ]); ?>


</div>
