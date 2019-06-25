<?php

use yii\grid\ActionColumn;
use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;

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
                 'template' => '{view} {delete} {report}',
                 'buttons' => [
                     'report' => function ($url, $model, $key) {
                         $options = [
                            'title' => Yii::t('yii', 'Report'),
                            'aria-label' => Yii::t('yii', 'Report'),
                            'data-pjax' => '0',
                         ];
                         $url = \yii\helpers\Url::toRoute(['report', 'id' => $key]);

                         return Html::a('<span class="glyphicon glyphicon-alert"></span>', $url, $options);
                     },

                     'urlCreator' => function ($action, $model, $key, $index) {
                         if ($action === 'report') {
                             return Url::toRoute(['report', 'id' => $model->id]);
                         } else {
                             return Url::toRoute([$action, 'id' => $model->id]);
                         }
                     }
                 ]
            ],
        ],
    ]); ?>


</div>
