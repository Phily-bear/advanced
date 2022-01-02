<?php

use common\models\Commentstatus;
use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\CommentSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '评论';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="comment-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            //['class' => 'yii\grid\SerialColumn'],

            ['attribute'=>'id','contentOptions'=>['width'=>'30px']],
            //'content:ntext',
            ['attribute'=>'content',
                'value'=>'beginning',
//                'value'=>function($model){
//                    $tempStr = strip_tags($model->content);
//                    $tempLen = mb_strlen($tempStr);
//                    return mb_substr($tempStr,0,20,'utf-8').(($tempLen>20)?'...':'');
//                }
            ],

            //'userid',
            ['attribute'=>'user.username',
                'label'=>'用户','value'=>'user.username',
                'contentOptions'=>['width'=>'50px'],],
            //'status',
            ['attribute'=>'status',
                'value'=>'status0.name',
                'filter'=> Commentstatus::find()
                        ->select(['name','id'])
                        ->orderBy('position')
                        ->indexBy('id')
                        ->column(),
                'contentOptions'=>function($model){
                    return ($model->status==1)?['class'=>'bg-danger']:[];
                }
            ],
            'create_time:datetime',

            'post.title',
            // 'email:email',
            // 'url:url',
            // 'post_id',
            // 'remind',

            ['class' => 'yii\grid\ActionColumn',
                'template'=>'{view}{delete}{approve}',
                'buttons'=>[
                       'approve'=>function($url,$model,$key){
                            $options=[
                                'titles'=>Yii::t('yii','审核'),
                                'aria-label'=>Yii::t('yii','审核'),
                                'data-confirm'=>Yii::t('yii','你确定通过这条评论吗'),
                                'data-method'=>'post',
                                'data-pjax'=>'0',
                            ];
                            return " ".Html::a('<span class="glyphicon glyphicon-check"> </span>',$url,$options);
                       }
                ],
                'contentOptions'=>['width'=>'60px'],
            ],
        ],
    ]); ?>
</div>
