<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\entities\Page */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Pages', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="page-view">
    <p>
        <?= Html::a('Редактировать', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Удалить', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'title',

            [
                    'attribute' => 'status',
                    'value' => function($model){
                        return $model->status == \backend\entities\Page::PUBLISHED ? 'Опубликованный' : 'Не опубликованный';
                    }
            ],
            [
                    'attribute' => 'alias',
                    'value' => function($model){
                        return Html::a('Перейти',Yii::$app->params['frontendHostInfo'].'/'.$model->alias);
                    },
                    'format' => 'raw'
            ],
            'text:html',
            'created_at:datetime',
            'updated_at:datetime',
        ],
    ]) ?>

</div>
