<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */

/* @var $model \frontend\models\ContactForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\captcha\Captcha;

$this->title = 'Контакты';
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-contact">

    <div class="row">
        <div class="col-lg-6">
            <h3><?= Html::encode($this->title) ?></h3>
            <p>
                Телефон:<br>
                <a href="tel:89663086371">8 966 308 63 71</a> (RU)<br>
                <a href="tel:87772388339">8 777 238 83 39</a> (KZ)<br>
                Email:<br>
                <a href="mailto:sergey.pavlenko-ms@mail.ru">sergey.pavlenko-ms@mail.ru</a>

            </p>
        </div>
        <div class="col-lg-6">
            <h3>Оставить заявку на консультацию</h3>
            <?php $form = ActiveForm::begin(['id' => 'contact-form']); ?>

            <?= $form->field($model, 'name')->label('Ф.И.О.')->textInput(['autofocus' => true]) ?>

            <?= $form->field($model, 'email')->label('Эл.Почта') ?>
            <?= $form->field($model, 'phone')->label('Телефон') ?>

            <?= $form->field($model, 'date')->label('Выберите дату и время') ?>

            <?= $form->field($model, 'body')->label('Опишите проблему   ')->textarea(['rows' => 6]) ?>

            <?= $form->field($model, 'verifyCode')->widget(Captcha::className(), [
                'template' => '<div class="row"><div class="col-lg-3">{image}</div><div class="col-lg-6">{input}</div></div>',
            ])->label('Введите код безопастности') ?>

            <div class="form-group">
                <?= Html::submitButton('Отправить', ['class' => 'btn btn-primary', 'name' => 'contact-button']) ?>
            </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>

</div>
