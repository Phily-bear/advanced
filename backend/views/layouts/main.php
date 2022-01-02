<?php

/* @var $this \yii\web\View */
/* @var $content string */

use backend\assets\AppAsset;
use common\models\Comment;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
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

<div class="body">

    <header id="header" class="header fixed-top d-flex align-items-center">

        <div class="d-flex align-items-center justify-content-between">
            <a href="<?=Yii::$app->homeUrl ?>" class="logo d-flex align-items-center">
                <span class="d-none d-lg-block">博客后台管理系统</span>
            </a>
            <i class="bi bi-list toggle-sidebar-btn"></i>
        </div><!-- End Logo -->


        <nav class="header-nav ms-auto">
            <ul class="d-flex align-items-center">

                <?php if(Yii::$app->user->isGuest){ ?>
                    <li class="nav-item ">
                        <a class="nav-link nav-profile d-flex align-items-center pe-0"
                           href="<?=Yii::$app->homeUrl ?>?r=site/login" >
                            <span class="d-none d-md-block  ps-lg-2">
                                登录&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            </span>
                        </a>
                    </li>
                <?php }else{?>
                    <li class="nav-item dropdown">

                        <a class="nav-link nav-icon" href="#" data-bs-toggle="dropdown">
                            <i class="bi bi-bell"></i>
                            <span class="badge bg-primary badge-number">
                                <?= Comment::getPengdingCommentCount() ?>
                            </span>
                        </a><!-- End Notification Icon -->

                        <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow notifications">
                            <li class="dropdown-header">
                                有<?= Comment::getPengdingCommentCount() ?>条评论待审核
                                <a href="<?= Yii::$app->homeUrl ?>?r=comment/index">
                                    <span class="badge rounded-pill bg-primary p-2 ms-2">
                                        查看所有</span></a>
                            </li>
                        </ul><!-- End Notification Dropdown Items -->

                    </li><!-- End Notification Nav -->

                    <li class="nav-item dropdown pe-3">
                        <a class="nav-link nav-profile d-flex align-items-center pe-0"
                           href="" data-bs-toggle="dropdown">
                            <span class="d-none d-md-block dropdown-toggle ps-2">
                                <?=  Yii::$app->user->identity->username ?>
                            </span>
                        </a><!-- End Profile Iamge Icon -->

                        <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
                            <li>
                                <a class="dropdown-item d-flex align-items-center" href="">
                                    <i class="bi bi-gear"></i>
                                    <span>Account Settings</span>
                                </a>
                            </li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>

                            <li>
                                <form action="<?= Yii::$app->homeUrl ?>?r=site/logout" method="post">
                                    <input type="hidden"
                                           name="_adminCSRF" id="_adminCSRF"
                                           value="<?= Yii::$app->request->csrfToken ?>">
                                    <input type="submit"
                                           class="dropdown-item d-flex align-items-center" value="注销"/>
                                </form>
                            </li>
                        </ul><!-- End Profile Dropdown Items -->
                    </li><!-- End Profile Nav -->
                <?php } ?>

            </ul>
        </nav><!-- End Icons Navigation -->

    </header><!-- End Header -->


    <!-- ======= Sidebar ======= -->
    <aside id="sidebar" class="sidebar">

        <ul class="sidebar-nav" id="sidebar-nav">

            <li class="nav-item">
                <a class="nav-link " href="<?=Yii::$app->homeUrl ?>">
                    <i class="bi bi-grid"></i>
                    <span>统计页面</span>
                </a>
            </li><!-- End Dashboard Nav -->

            <li class="nav-item">
                <a class="nav-link " href="<?=Yii::$app->homeUrl ?>?r=post/index">
                    <i class="bi bi-grid"></i>
                    <span>文章管理</span>
                </a>
            </li><!-- End Dashboard Nav -->

            <li class="nav-item">
                <a class="nav-link " href="<?=Yii::$app->homeUrl ?>?r=comment/index">
                    <i class="bi bi-grid"></i>
                    <span>评论管理</span>
                </a>
            </li><!-- End Dashboard Nav -->

            <li class="nav-item">
                <a class="nav-link " href="<?=Yii::$app->homeUrl ?>?r=user/index">
                    <i class="bi bi-grid"></i>
                    <span>用户管理</span>
                </a>
            </li><!-- End Dashboard Nav -->

            <li class="nav-item">
                <a class="nav-link " href="<?=Yii::$app->homeUrl ?>?r=adminuser/index">
                    <i class="bi bi-grid"></i>
                    <span>管理员</span>
                </a>
            </li><!-- End Dashboard Nav -->
        </ul>
    </aside>

</div>

<main id="main" class="main">
    <div class="container">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= Alert::widget() ?>
        <?= $content ?>
        <a href="#" class="back-to-top d-flex align-items-center justify-content-center active">
            <i class="bi bi-arrow-up-short"></i></a>
    </div>
</main>

<footer id="footer" class="footer">
    <div class="copyright">
        © Copyright <strong><span></span></strong>. All Rights Reserved
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
