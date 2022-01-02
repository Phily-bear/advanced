
<?php
        $adminUser = \common\models\Adminuser::find()->all();
//        var_dump($adminUser);

        $authors = array();
        for ($i =0;$i<count($adminUser);$i++){
            $nickname = $adminUser[$i]->nickname;
            $authors[$nickname] = ['nickname'=>$nickname,
                'postSum'=>count($adminUser[$i]->posts)];
        }
//        var_dump($authors);
        arsort($authors);
//        var_dump($authors);
?>

    <div class="card recent-sales col-xxl-3 col-md-3">
        <div class="card-body">
            <h5 class="card-title">作者 <span>| Today</span></h5>

            <table class="table table-borderless datatable">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">作者</th>
                    <th scope="col">文章数</th>
<!--                    <th scope="col">获得评论数</th>-->
<!--                    <th scope="col">Status</th>-->
                </tr>
                </thead>
                <tbody>
                <?php
                    $i = 1;
                    foreach ($authors as $author): ?>
                <tr>
                    <th scope="row"><?= $i++ ?></a></th>
                    <td><a href="#" class="text-primary"><?= $author['nickname'] ?></a></td>
                    <td><?= $author['postSum'] ?></td>
<!--                    <td>$64</td>-->
<!--                    <td><button class="badge bg-danger ">Approved</button></td>-->
                </tr>
                <?php endforeach; ?>

                </tbody>
            </table>
        </div>
    </div>
