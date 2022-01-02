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
        'css/site.css',
        'css/style.css',
//        'vendor/bootstrap/css/bootstrap.min.css',
        'vendor/bootstrap-icons/bootstrap-icons.css',
        'vendor/boxicons/css/boxicons.min.css',
        'vendor/quill/quill.snow.css',
        'vendor/quill/quill.bubble.css',
        'vendor/remixicon/remixicon.css',
        'vendor/simple-datatables/style.css',
    ];
    public $js = [
        'js/main.js',
        'vendor/apexcharts/apexcharts.min.js',
        'vendor/bootstrap/js/bootstrap.bundle.min.js',
        'vendor/chart.js/chart.min.js',
        'vendor/echarts/echarts.min.js',
        'vendor/quill/quill.min.js',
        'simple-datatables/simple-datatables.js',
        'vendor/tinymce/tinymce.min.js',
        'vendor/php-email-form/validate.js',
        'layui/layui.js',
        'js/yss/gloable.js',
        'js/plugins/nprogress.js',
        'js/yss/article.js',
    ];
//<script src="layui/layui.js"></script>
//<script src="js/yss/gloable.js"></script>
//<script src="js/plugins/nprogress.js"></script>
//<script>NProgress.start();</script>
//<script src="js/yss/article.js"></script>

    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];

    //定义按需加载JS方法，注意加载顺序在最后
    public static function addScript($view, $jsfile) {
        $view->registerJsFile($jsfile, [AppAsset::className(), 'depends' => 'frontend\assets\AppAsset']);
    }

    //定义按需加载css方法，注意加载顺序在最后
    public static function addCss($view, $cssfile) {
        $view->registerCssFile($cssfile, [AppAsset::className(), 'depends' => 'frontend\assets\AppAsset']);
    }
}
