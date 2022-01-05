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

<footer class="grid-footer">
    <div class="footer-fixed">
        <div class="copyright">
            <div class="info">
                <div class="contact">
                    <a href="https://github.com/wanliu2021" class="github" target="_blank"><i class="fa fa-github"></i></a>
                    <a href="https://wpa.qq.com/msgrd?v=3&uin=1692894189&site=qq&menu=yes" class="qq" target="_blank" title="1692894189"><i class="fa fa-qq"></i></a>
                    <a href="https://mail.qq.com/cgi-bin/qm_share?t=qm_mailme&email=g7K1urG7ureyu7rD8vKt4Ozu" class="email" target="_blank" title="1692894189@qq.com"><i class="fa fa-envelope"></i></a>
<!--                    <a href="javascript:void(0)" class="weixin"><i class="fa fa-weixin"></i></a>-->
                </div>
                <p class="mt05">
                    Copyright &copy; 2021-2022 web实践博客 All Rights Reserved V.3.1.3 Power by csj-yh
                </p>
            </div>
        </div>
    </div>
</footer>


<?php $this->endBody() ?>
</body>

<script src="https://eqcn.ajz.miesnfu.com/wp-content/plugins/wp-3d-pony/live2dw/lib/L2Dwidget.min.js"></script>
<script>
    L2Dwidget.init({
        "model": {
            jsonPath: "https://unpkg.com/live2d-widget-model-koharu@1.0.5/assets/koharu.model.json",
            "scale": 1
        },
        "display": {
            "position": "left", //看板娘的表现位置
            "width": 100,  //小萝莉的宽度
            "height": 200, //小萝莉的高度
            "hOffset": 0,//小萝莉的X偏移量
            "vOffset": -20//小萝莉的Y偏移量
        },
        "mobile": {
            "show": true,
            "scale": 0.5
        },
        "react": {
            "opacityDefault": 0.7,//小萝莉的透明度
            "opacityOnHover": 0.2
        }
    });
</script>
</html>
<?php $this->endPage() ?>
