<?php
/* @var $entity \backend\entities\Page*/



use \yii\helpers\Html;
$this->title = $entity->title;
?>


<h1><?= $this->title ?></h1>

<?= Html::decode($entity->text) ?>
