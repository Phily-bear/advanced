<?php

use common\models\Comment;
use common\models\Post;
use common\models\User;
use Hisune\EchartsPHP\ECharts;

/* @var $this yii\web\View */

$this->title = '后台统计信息';
?>
<div class="site-index ">

    <div class="col-12">
        <div class="card col-xxl-9 col-md-9">
        <?php
        $postCount = Post::find()->count();
        $commentCount = Comment::find()->count();
        $userCount = User::find()->count();

        $chart = new ECharts();
        $chart->tooltip->show = true;
        $chart->title->text = '博客统计';
        $chart->title->left = 'center';
//        $chart->color = ['blue','red','yellow'];
        $chart->legend->data[] = '数量';
        $chart->legend->left = 'right';
        $chart->legend->inactiveColor = '#548047';
//        var_dump($chart->getOption());;


        $chart->xAxis[] = array(
            'type' => 'value'
        );
        $chart->yAxis[] = array(
            'type' => 'category',
            'data' => [
            ['文章数'],
            ['评论数'],
            ['用户数'],
        ]
        );
        $chart->series[] = array(
            'name' => '数量',
            'type' => 'bar',
            'data' => [
                [
                    'value' => $postCount,
                    'itemStyle' => ['color' => '#93cc74'],
                    'url'=>['/post/index']
                ],
                [
                    'value' => $commentCount,
                    'itemStyle' => ['color' => '#a90000']
                ],
                [
                    'value' => $userCount,
                    'itemStyle' => ['color' => '#5470c6']
                ],
            ],
        );
        echo $chart->render('simple-custom-id');
        ?>
        </div>

        <?= $this->render('_statistics') ?>
        <div class="card col-xxl-9 col-md-9">
            <?= $this->render('_postReadChart') ?>
        </div>

        <?= $this->render('_authorRank') ?>

    </div>



    <div class="col-9">
            <?php
                $posts = Post::find()->select("create_time")->all();
                $years = array();
                for ($i = 0;$i<count($posts);$i++){
                    $year = date('Y',$posts[$i]['create_time']);
                    $years[$year] = $year;
                }
                $years = array_reverse($years);
//                var_dump($years);
            ?>
            <?php foreach ($years as $year): ?>
                <?= $this->render('_postCountCharts', [
                    'year'=>$year,
                ]) ?>
                <?php break;?>
            <?php endforeach;  ?>
    </div>
</div>

