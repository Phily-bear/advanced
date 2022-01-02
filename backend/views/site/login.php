<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \common\models\LoginForm */

use backend\assets\AppAsset;
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
AppAsset::register($this);

AppAsset::addCss($this,Yii::$app->request->baseUrl."/css/xadmin.css");
AppAsset::addCss($this,Yii::$app->request->baseUrl."/css/font.css");
AppAsset::addCss($this,Yii::$app->request->baseUrl."/css/login.css");

$this->title = '登录';
?>

    <div class="login row">
        <div class="card-title text-center pb-0 fs-4"><h2>后台系统登录</h2></div>
        <br/>
<!--        <div id="darkbannerwrap"></div>-->
        <?php $form = ActiveForm::begin(['id' => 'login-form',
            'options' => [
                'class'=>'layui-form'
            ],
        ]); ?>

        <?= $form->field($model, 'username')->textInput(['autofocus' => true,'class'=>'layui-input']) ?>

        <?= $form->field($model, 'password')->passwordInput(['class'=>'form-control']) ?>

        <?= $form->field($model, 'rememberMe')->checkbox(['class'=>'form-check-input',]) ?>


        <div class="form-group">
            <?= Html::submitButton('登录', ['class' => 'btn btn-primary w-100', 'name' => 'login-button','style'=>[
                'display'=>'inline-block' ,
                'padding'=>'12px 24px',
                'width'=>'100%',
                'margin'=>'0px',
                'font-size'=>'18px',
                'line-height'=>'20px',
                'text-align'=>'center',
                'white-space'=>'nowrap',
//                'background-color'=>'#189F92',
//                'color'=>'#ffffff',
                'vertical-align'=>'middle',
                'border'=>'none',
                'border-radius'=>'3px',
                '-webkit-appearance'=>'none',
                'cursor'=>'pointer',
            ],]) ?>
        </div>
        <?php ActiveForm::end(); ?>
    </div>

