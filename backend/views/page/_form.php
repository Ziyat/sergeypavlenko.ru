<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use backend\entities\Page;
use yii\helpers\Url;
use vova07\imperavi\Widget;
use zxbodya\yii2\galleryManager\GalleryManager;

/* @var $this yii\web\View */
/* @var $model backend\entities\Page */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="row">
    <?php $form = ActiveForm::begin(); ?>
    <div class="col-md-8">
        <div class="panel panel-default">
            <div class="panel-body">
                <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>
                <?= $form->field($model, 'text')->widget(Widget::className(), [
                    'settings' => [
                        'lang' => 'ru',
                        'minHeight' => 200,
                        'imageUpload' => Url::to(['/page/image-upload']),
                        'plugins' => [
                            'clips',
                            'fullscreen',
                            'table',
                            'video',
                        ]
                    ]
                ]) ?>
            </div>
        </div>
    </div>
        <div class="col-md-4 pull-right">
            <div class="panel panel-default">
                <div class="panel-body">
                    <?= $form->field($model, 'status')->dropDownList([
                        Page::PUBLISHED => 'Опубликованный', Page::UNPUBLISHED => 'Не опубликованный'
                    ]) ?>
                    <?= $form->field($model, 'alias',[
                            'template'=>'{label}<div class="input-group">
                    <span class="input-group-addon" id="basic-addon3">'.Yii::$app->params['frontendHostInfo'].'/</span>{input}</div>{hint}{error}']
                    )->textInput(['maxlength' => true]) ?>
                    <div class="form-group">
                        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-block btn-success']) ?>
                    </div>
                </div>
            </div>
        </div>

        <?php ActiveForm::end(); ?>
    <div class="col-md-12">

        <?php if ($model->isNewRecord): ?>
            <p>Can not upload images for new record</p>
        <?php else: ?>
            <?= GalleryManager::widget([
                'model' => $model,
                'behaviorName' => 'galleryBehavior',
                'apiRoute' => 'page/galleryApi'
            ]);
            ?>
        <?php endif; ?>
    </div>

</div>
<?php

$script = <<< JS
    transliterate = (
        function() {
            var
                rus = "щ   ш  ч  ц  ю  я  ё  ж  ъ  ы  э  а б в г д е з и й к л м н о п р с т у ф х ь".split(/ +/g),
                eng = "shh sh ch cz yu ya yo zh `` y' e` a b v g d e z i j k l m n o p r s t u f x `".split(/ +/g)
            ;
            return function(text, engToRus) {
                var x;
                for(x = 0; x < rus.length; x++) {
                    text = text.split(engToRus ? eng[x] : rus[x]).join(engToRus ? rus[x] : eng[x]);
                    text = text.split(engToRus ? eng[x].toUpperCase() : rus[x].toUpperCase()).join(engToRus ? rus[x].toUpperCase() : eng[x].toUpperCase());	
                }
                return text.replace(' ','-');
            }
        }
    )();
	$('#page-title').on('keyup',function(){
	    $('#page-alias').val((transliterate($(this).val())).toLowerCase());
	});

JS;


$this->registerJs(
    $script
);
?>

