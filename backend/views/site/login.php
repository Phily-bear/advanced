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
<div >
    <div class="login   ">
        <div class="message">后台系统登录</div>
        <div id="darkbannerwrap"></div>
        <?php $form = ActiveForm::begin(['id' => 'login-form',
            'options' => [
                'class'=>'layui-form'
            ],
        ]); ?>

        <?= $form->field($model, 'username')->textInput(['autofocus' => true,'class'=>'layui-input']) ?>

        <?= $form->field($model, 'password')->passwordInput(['class'=>'layui-input']) ?>

        <?= $form->field($model, 'rememberMe')->checkbox() ?>

        <div class="form-group">
            <?= Html::submitButton('登录', ['class' => 'lay-submit', 'name' => 'login-button','style'=>[
                'display'=>'inline-block' ,
                'padding'=>'12px 24px',
                'width'=>'100%',
                'margin'=>'0px',
                'font-size'=>'18px',
                'line-height'=>'24px',
                'text-align'=>'center',
                'white-space'=>'nowrap',
                'background-color'=>'#189F92',
                'color'=>'#ffffff',
                'vertical-align'=>'middle',
                'border'=>'none',
                'border-radius'=>'3px',
                '-webkit-appearance'=>'none',
                'cursor'=>'pointer',
            ],]) ?>
        </div>
        <?php ActiveForm::end(); ?>
    </div>
</div>

