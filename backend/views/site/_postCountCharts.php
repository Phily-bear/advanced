<?php

use common\models\Post;
use Hisune\EchartsPHP\ECharts;
/* @var $year */
?>

<div class="col-md-12 card">
<?php
    //$nowYear = date('Y',time());
    $nowYear = $year;

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
    $chart->legend->data[] = '篇数';
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
        'name' => '篇数',
        'type' => 'line',
        'data' => $yearPostCount
    );
    echo $chart->render('second'.$nowYear);
?>
</div>
