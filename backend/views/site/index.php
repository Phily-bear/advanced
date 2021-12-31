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

            $nowYear = date('Y',time());

            $posts = Post::find()->select('create_time')->all();

            $yearPostCount = array();
            for ($i = 0;$i<12;$i++)
                $yearPostCount[$i] = 0;
            for ($i = 0;$i<count($posts);$i++){
                if (date('Y',$posts[$i]['create_time'])== $nowYear)
                {
                    $month = date('m',$posts[$i]['create_time']);
                    $yearPostCount[$month-1] ++ ;
                }
            }
//            var_dump($yearPostCount);

            $chart = new ECharts();
            $chart->tooltip->show = true;
            $chart->title->text = $nowYear.'-文章统计';
            $chart->title->left = 'center';
            //        $chart->color = ['blue','red','yellow'];
            $chart->legend->data[] = '数量';
            $chart->legend->left = 'right';
            $chart->legend->inactiveColor = '#548047';

            $chart->xAxis[] = array(
                'type' => 'category',
                'data' => [$nowYear.'-'.'01',$nowYear.'-'.'02',$nowYear.'-'.'03',
                    $nowYear.'-'.'04',$nowYear.'-'.'05',$nowYear.'-'.'06',
                    $nowYear.'-'.'07',$nowYear.'-'.'08',$nowYear.'-'.'09',
                    $nowYear.'-'.'10',$nowYear.'-'.'11',$nowYear.'-'.'12',]

            );
            $chart->yAxis[] = array(
                'type' => 'value'
            );
            $chart->series[] = array(
                'name' => '数量',
                'type' => 'line',
                'data' => $yearPostCount
            );
            echo $chart->render('second');
            ?>
        </div>
    </div>
</div>
