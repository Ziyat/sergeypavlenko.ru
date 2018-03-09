<?php

use yii\helpers\Html;
use yii\grid\GridView;
use backend\entities\Page;

/* @var $this yii\web\View */
/* @var $searchModel backend\entities\PageSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Pages';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="page-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Page', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'title',
            [
               'attribute' => 'status',
               'value' => function ($model){
                   return (Page::getStatusArray())[$model->status];
               },
               'filter' => Page::getStatusArray()
            ],
            'alias',
            'created_at:date',
            'updated_at:date',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
