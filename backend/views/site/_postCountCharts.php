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

//    $chart = new ECharts();
//    $chart->tooltip->show = true;
//    $chart->title->text = $nowYear.'-文章统计';
//    $chart->title->left = 'center';
//    //        $chart->color = ['blue','red','yellow'];
//    $chart->legend->data[] = '篇数';
//    $chart->legend->left = 'right';
//    $chart->legend->inactiveColor = '#548047';
//
//    $chart->xAxis[] = array(
//        'type' => 'category',
//        'data' => [$nowYear.'-'.'01',$nowYear.'-'.'02',$nowYear.'-'.'03',
//            $nowYear.'-'.'04',$nowYear.'-'.'05',$nowYear.'-'.'06',
//            $nowYear.'-'.'07',$nowYear.'-'.'08',$nowYear.'-'.'09',
//            $nowYear.'-'.'10',$nowYear.'-'.'11',$nowYear.'-'.'12',]
//
//    );
//    $chart->yAxis[] = array(
//        'type' => 'value'
//    );
//    $chart->series[] = array(
//        'name' => '篇数',
//        'type' => 'line',
//        'data' => $yearPostCount
//    );

    $yearPostCountStr = implode(',',$yearPostCount);
//    var_dump($yearPostCountStr);

//    echo $chart->render('second'.$nowYear);
?>

    <div class="card-body">
        <h5 class="card-title"><?= $nowYear ?>-文章统计</h5>
        <!-- Line Chart -->
        <canvas id="lineChart<?= $nowYear ?>" style="max-height: 400px; display: block; box-sizing: border-box; height: 248px; width: 496.8px;" width="621" height="310"></canvas>
        <script>
            let strData = "<?= $yearPostCountStr ?>";
            let arrData = strData.split(',');
            //[65, 59, 80, 81, 56, 55, 40,50,60,70,80,90]
            document.addEventListener("DOMContentLoaded", () => {
                new Chart(document.querySelector('#lineChart'+'<?= $nowYear ?>'), {
                    type: 'line',
                    data: {
                        labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'June', 'July',
                            'Aug','Sept','Oct','Nov','Dec'],
                        datasets: [{
                            label: <?= $nowYear ?> + '-各月文章数',
                            data: arrData,
                            fill: false,
                            borderColor: 'rgb(75, 192, 192)',
                            tension: 1
                        }]
                    },
                    options: {
                        scales: {
                            y: {
                                beginAtZero: true
                            }
                        }
                    }
                });
            });
        </script>
        <!-- End Line CHart -->

    </div>

</div>
