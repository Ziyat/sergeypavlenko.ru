<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\entities\Page */

$this->title = 'Создать страницу';
$this->params['breadcrumbs'][] = ['label' => 'Pages', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="page-create">
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
