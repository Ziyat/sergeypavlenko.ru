<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\entities\AttrProduct */

$this->title = 'Update Attr Product: {nameAttribute}';
$this->params['breadcrumbs'][] = ['label' => 'Attr Products', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="attr-product-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
