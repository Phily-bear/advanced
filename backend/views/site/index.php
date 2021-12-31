<?php

use common\models\Comment;
use common\models\Post;
use common\models\User;
use Hisune\EchartsPHP\ECharts;

/* @var $this yii\web\View */

$this->title = '后台统计信息';
?>
<div class="site-index">

    <div class="body-content">
        <div class="">
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
        <br/><br/><br/><br/><br/><br/>
        <div>
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
            <?php endforeach;  ?>
        </div>
    </div>
</div>
