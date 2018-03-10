<?php

namespace frontend\assets;

use yii\web\AssetBundle;

/**
 * Main frontend application asset bundle.
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/style.css',
        'css/font-awesome.min.css',
    ];
    public $js = [
        'https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js',
        'js/bootstrap.min.js',
        'js/retina-1.1.0.js',
        'js/jquery.hoverdir.js',
        'js/jquery.hoverex.min.js',
        'js/jquery.prettyPhoto.js',
        'js/jquery.isotope.min.js',
        'js/custom.js'
    ];
    public $jsOptions = [
        'position'=>\yii\web\View::POS_END
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];

    public function registerAssetFiles($view)
    {
        parent::registerAssetFiles($view);

        $manager = $view->getAssetManager();
        $view->registerJsFile($manager->getAssetUrl($this, 'js/html5shiv.js'), ['condition' => 'lte IE9', 'position'=>\yii\web\View::POS_HEAD]);
        $view->registerJsFile($manager->getAssetUrl($this, 'js/respond.js'), ['condition' => 'lte IE9', 'position'=>\yii\web\View::POS_HEAD]);
        $view->registerJsFile($manager->getAssetUrl($this, 'js/modernizr.js'), [ 'position'=>\yii\web\View::POS_HEAD]);
    }

}
