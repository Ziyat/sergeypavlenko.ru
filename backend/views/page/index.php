<?php

use yii\helpers\Html;
use yii\grid\GridView;
use backend\entities\Page;

/* @var $this yii\web\View */
/* @var $searchModel backend\entities\PageSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Страницы';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="page-index">

    <p>
        <?= Html::a('Создать страницу', ['create'], ['class' => 'btn btn-success']) ?>
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
