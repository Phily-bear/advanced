<?php

    $posts = \common\models\Post::find()->select(['title','read'])
        ->orderBy('read desc')
        ->all();

    $postsTitle = array();
    $postsRead = array();

    for ($i = 0;$i<count($posts);$i++){
        $postsTitle[$i] = $posts[$i]['title'];
        $postsRead[$i] = $posts[$i]['read'];
    }

    $postsTitleStr = implode(',',$postsTitle);
    $postsReadStr = implode(',',$postsRead);

?>

<!--<div class="col-xxl-8 col-md-8">-->
<div class="card-body">
    <h5 class="card-title">文章阅读量</h5>

    <!-- Bar Chart -->
    <canvas id="barChart" style="max-height: 400px; display: block; box-sizing: border-box; height: 248px; width: 496.8px;" width="621" height="310"></canvas>
    <script>
        let dataName = "<?= $postsTitleStr ?>".split(',');
        let dataCount = "<?= $postsReadStr ?>".split(',');
        document.addEventListener("DOMContentLoaded", () => {
            new Chart(document.querySelector('#barChart'), {
                type: 'bar',
                data: {
                    labels: dataName,
                    datasets: [{
                        label: '阅读量',
                        data: dataCount,
                        backgroundColor: [
                            'rgba(54, 162, 235, 0.2)',
                        ],
                        borderColor: [
                            'rgb(54, 162, 235)',
                        ],
                        borderWidth: 1
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
    <!-- End Bar CHart -->
</div>
<!--</div>-->
