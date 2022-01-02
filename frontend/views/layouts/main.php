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

AppAsset::addCss($this,Yii::$app->request->baseUrl."/font-awesome/css/font-awesome.min.css");
AppAsset::addCss($this,Yii::$app->request->baseUrl."/layui/css/layui.css");
AppAsset::addCss($this,Yii::$app->request->baseUrl."/css/master.css");
AppAsset::addCss($this,Yii::$app->request->baseUrl."/css/gloable.css");
AppAsset::addCss($this,Yii::$app->request->baseUrl."/css/nprogress.css");
AppAsset::addCss($this,Yii::$app->request->baseUrl."/css/blog.css");
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<!--header是导航栏部分-->
<header class="gird-header">
    <div class="header-fixed">
        <div class="header-inner">
            <a href="<?=Yii::$app->homeUrl ?>" class="header-logo" id="logo">BlogDemo2</a>
            <nav class="nav" id="nav">
                <ul >
                    <li><a href="<?=Yii::$app->homeUrl ?>?r=site/about">关于我们</a></li>
                    <li><a href="<?=Yii::$app->homeUrl ?>?r=site/contact">联系我们</a></li>
                    <?php if(Yii::$app->user->isGuest): ?>
                    <li >
                        <a href="<?=Yii::$app->homeUrl ?>?r=site/signup" >注册</a>
                    </li>
                    <li >
                        <a href="<?=Yii::$app->homeUrl ?>?r=site/login" >登录</a>
                    </li>
                    <?php endif; ?>

                </ul>
            </nav>
            <a href="" class="blog-user">
                <?php if(!Yii::$app->user->isGuest): ?>
                    <li>
                        <form action="<?= Yii::$app->homeUrl ?>?r=site/logout" method="post"
                              id="test">
                            <input type="hidden"
                                   name="_csrf" id="_csrf"
                                   value="<?= Yii::$app->request->csrfToken ?>">
                            <input type="submit" id="submit" class="btn btn-danger"
                                   value="注销（<?= Yii::$app->user->identity->username ?>）"/>
                        </form>
                    </li>
                <?php endif; ?>
            </a>

        </div>
    </div>
</header>
<div class="wrap">
    <?php
//    NavBar::begin([
//        'brandLabel' => 'BlogDemo2',
//        'brandOptions'=>['style'=>'color:yellow;font-size:23px'],
//        'brandUrl' => Yii::$app->homeUrl,
//        'options' => [
//            'class' => 'navbar-inverse navbar-fixed-top',
//        ],
//    ]);
//    $menuItems = [
//        ['label' => '关于我们', 'url' => ['/site/about']],
//        ['label' => '联系我们', 'url' => ['/site/contact']],
//    ];
//    if (Yii::$app->user->isGuest) {
//        $menuItems[] = ['label' => '注册', 'url' => ['/site/signup']];
//        $menuItems[] = ['label' => '登录', 'url' => ['/site/login']];
//    } else {
//        $menuItems[] = '<li>'
//            . Html::beginForm(['/site/logout'], 'post')
//            . Html::submitButton(
//                '退出 (' . Yii::$app->user->identity->username . ')',
//                ['class' => 'btn btn-link']
//            )
//            . Html::endForm()
//            . '</li>';
//    }
//    echo Nav::widget([
//        'options' => ['class' => 'navbar-nav navbar-right'],
//        'items' => $menuItems,
//    ]);
//    NavBar::end();
    ?>

    <div class="container">
        <div class="container-fixed">
            <?= Breadcrumbs::widget([
                'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
            ]) ?>
            <?= Alert::widget() ?>
            <?= $content ?>
        </div>
    </div>
</div>

<footer class="footer">
    <div class="container">
        <p class="pull-left">&copy;BlogDemo2<?= date('Y') ?></p>

        <p class="pull-right"><?= Yii::powered() ?></p>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
