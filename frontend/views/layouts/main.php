<?php

/* @var $this \yii\web\View */

/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use frontend\assets\AppAsset;
use common\widgets\Alert;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <link rel="apple-touch-icon" sizes="180x180" href="/favicons/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/favicons/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/favicons/favicon-16x16.png">
    <link rel="manifest" href="/favicons/site.webmanifest">
    <link rel="mask-icon" href="/favicons/safari-pinned-tab.svg" color="#5bbad5">
    <meta name="msapplication-TileColor" content="#00aba9">
    <meta name="theme-color" content="#ffffff">
    <title><?= Html::encode($this->title) ?> / Сергей Павленко</title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<div class="wrap">
    <?php
    NavBar::begin([
//        'brandLabel' => Yii::$app->name,
//        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar-default navbar-fixed-top',
        ],
    ]);
    $menuItems = \backend\entities\Page::getNavArray();
    //    if (Yii::$app->user->isGuest) {
    //        $menuItems[] = ['label' => 'Signup', 'url' => ['/site/signup']];
    //        $menuItems[] = ['label' => 'Login', 'url' => ['/site/login']];
    //    } else {
    //        $menuItems[] = '<li>'
    //            . Html::beginForm(['/site/logout'], 'post')
    //            . Html::submitButton(
    //                'Logout (' . Yii::$app->user->identity->username . ')',
    //                ['class' => 'btn btn-link logout']
    //            )
    //            . Html::endForm()
    //            . '</li>';
    //    }
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right'],
        'items' => $menuItems,
    ]);
    NavBar::end();
    ?>
    <div id="headerwrap">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2">
                    <h1>Павленко Сергей Владимирович</h1>
                    <h3>Массажист</h3>
                    <h5>Новая методика лечения позвоночника</h5>
                    <h5>Методика массажа, способствующая хорошему кровообращению головного мозга.
                        <br> Оказывает положительное влияние на работу мозговых клеток.</h5>
                </div>
            </div><!-- /row -->
        </div> <!-- /container -->
    </div><!-- /headerwrap -->

    <div class="container">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>

        <div class="container mtb">
            <?= Alert::widget() ?>
            <?= $content ?>
        </div>
    </div>
</div>

<div id="footerwrap">
    <div class="container">
        <div class="row">
            <div class="col-lg-4">
                <h4>Биография</h4>
                <div class="hline-w"></div>
                <p>Павленко Сергей Владимирович родился в Казахстане 11 сентября 1973 год, ведет активную
                    профессиональную деятельность в области лечебного массажаболее 17-ти лет.</p>
            </div>
            <div class="col-lg-4">
                <h4>Cоциальные сети</h4>
                <div class="hline-w"></div>
                <p>
                    <a href="#"><i class="fa fa-vk"></i></a>
                    <a href="#"><i class="fa fa-facebook"></i></a>
                    <a href="#"><i class="fa fa-instagram"></i></a>
                    <a href="#"><i class="fa fa-odnoklassniki"></i></a>
                </p>
            </div>
            <div class="col-lg-4">
                <h4>Связь</h4>
                <div class="hline-w"></div>
                <p>
                    Телефон:<br>
                    <a href="tel:89663086371">8 966 308 63 71</a> (RU)<br>
                    <a href="tel:87772388339">8 777 238 83 39</a> (KZ)<br>
                    Email:<br>
                    <a href="mailto:sergey.pavlenko-ms@mail.ru">sergey.pavlenko-ms@mail.ru</a>

                </p>
            </div>

        </div>
        <! --/row -->
    </div>
    <! --/container -->
</div>
<! --/footerwrap -->

<?php $this->endBody() ?>

</body>
</html>
<?php $this->endPage() ?>
