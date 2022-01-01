<?php

use frontend\assets\AppAsset;
use yii\helpers\Html;
use yii\helpers\Url;


AppAsset::register($this);

AppAsset::addCss($this,Yii::$app->request->baseUrl."/font-awesome/css/font-awesome.min.css");
AppAsset::addCss($this,Yii::$app->request->baseUrl."/layui/css/layui.css");
AppAsset::addCss($this,Yii::$app->request->baseUrl."/css/master.css");
AppAsset::addCss($this,Yii::$app->request->baseUrl."/css/gloable.css");
AppAsset::addCss($this,Yii::$app->request->baseUrl."/css/nprogress.css");
AppAsset::addCss($this,Yii::$app->request->baseUrl."/css/blog.css");
?>

<section class="article-item zoomIn article">

    <h5 class="title">
        <span class="fc-blue">【原创】</span>
        <a href="<?= $model->url;?>"><?= Html::encode($model->title); ?></a>
    </h5>
    <div class="time">
        <span class="day"><?=date('d',$model->create_time)?></span>
        <span class="month fs-18"><?=date('m',$model->create_time)?><span class="fs-14">月</span></span>
        <span class="year fs-18 ml10"><?=date('Y',$model->create_time)?></span>
    </div>

    <div class="author">
        <span class="glyphicon glyphicon-user" aria-hidden="true"></span><em><?=Html::encode($model->author->nickname) ?></em>
    </div>
    <div class="content">
        <a href="<?= $model->url;?>" class="cover img-light">
            <img src="<?php echo Url::to('@web/image/web.jpg'); ?>" alt="图片">
        </a>
        <?= $model->beginning;?>
    </div>

    <div class="read-more">
        <a href="<?= $model->url;?>" class="fc-black f-fwb">继续阅读</a>
    </div>
    <aside class="f-oh footer">
        <div class="f-fl tags">
            <span class="fa fa-tags fs-16"></span>
            <a class="tag"><?= implode('',$model->tagLinks);?></a>
        </div>
        <div class="f-fr">
            <span class="ml20">
                <i class="fa fa-comments fs-16"></i>
                <?= Html::a("评论({$model->commentCount})",$model->url.'#comments')?>|最后修改于<?= date('Y-m_s H:i:s',$model->update_time)?>
            </span>
        </div>
    </aside>
</section>
