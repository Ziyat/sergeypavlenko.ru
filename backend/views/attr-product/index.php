<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\entities\AttrProductSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Attr Products';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="attr-product-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Attr Product', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'key',
            'value',
            'product_id',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
