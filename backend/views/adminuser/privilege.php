<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Adminuser */
/* @var $id backend\controllers\AdminuserController */
/* @var $AuthAssignmentArray backend\controllers\AdminuserController */
/* @var $allPrivilegesArray backend\controllers\AdminuserController */

$model = \common\models\Adminuser::findOne($id);
$this->title = '权限管理: ' . $model->username;
$this->params['breadcrumbs'][] = ['label' => '权限管理', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $id, 'url' => ['view', 'id' => $id]];
$this->params['breadcrumbs'][] = '权限设置';
?>
<div class="adminuser-privilege-form">

    <h1><?= Html::encode($this->title) ?></h1>

    <?php $form = ActiveForm::begin(); ?>

    <?= Html::checkboxList('newPri',$AuthAssignmentArray,$allPrivilegesArray);?>

    <div class="form-group">
        <?= Html::submitButton('确认' ,['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>