<?php


?>

<div class="col-xxl-6 col-md-3">
    <div class="card info-card sales-card">
        <div class="card-body">
            <h5 class="card-title">用户 <span>| Today</span></h5>

            <div class="d-flex align-items-center">
                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                    <i class="bi bi-people"></i>
                </div>
                <div class="ps-3">
                    <h2><?= \common\models\User::find()->count() ?></h2>
                </div>
            </div>
        </div>
    </div>

    <div class="card info-card sales-card">
        <div class="card-body">
            <h5 class="card-title">管理员 <span>| Today</span></h5>

            <div class="d-flex align-items-center">
                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                    <i class="bi bi-people-fill"></i>
                </div>
                <div class="ps-3">
                    <h2><?= \common\models\Adminuser::find()->count() ?></h2>
                </div>
            </div>
        </div>
    </div>

    <div class="card info-card sales-card">
        <div class="card-body">
            <h5 class="card-title">总文章数 <span>| Today</span></h5>

            <div class="d-inline-flex align-items-center ">
                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center ps-lg-2">
                    <i class="bi bi-people-fill"></i>
                </div>
                <div class="ps-3">
                    <h2 class="card-text"><?= \common\models\Post::find()->count() ?> 篇</h2>
                </div>
            </div>
        </div>
    </div>
</div>
