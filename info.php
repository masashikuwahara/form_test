<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>更新情報</title>
</head>
<body>
    <p class="update">更新情報</p>
    <div class="info">
        <ul class="info2">
            <?php 
                try{
                    require('connect.php');
                    $dbh->query('SET NAMES utf8');
                    $sql='SELECT * FROM info ORDER BY id DESC ';
                    $stmt=$dbh->prepare($sql);
                    $stmt->execute();
              
                    $dbh=null;
                    while(true)
                    {
                        $rec=$stmt->fetch(PDO::FETCH_ASSOC);
                        if($rec==false)
                        {
                        break;
                        }
                        if($rec['number']==null)
                        {
                        echo '<li class="info3">'.
                        '<a href="'.$rec['url'].'">'.$rec['day'].'&nbsp;'.$rec['information'].'</a>'.
                        '</li>';
                        }elseif($rec['kinds'] == 1){
                        echo '<li class="info3">'.
                        '<a href="detail.php?id='.$rec['number'].'">'.$rec['day'].'&nbsp;'.$rec['information'].'</a>'.
                        '</li>';
                        }else{
                        echo '<li class="info3">'.
                        '<a href="culturals_detail.php?id='.$rec['number'].'">'.$rec['day'].'&nbsp;'.$rec['information'].'</a>'.
                        '</li>';
                        }
                    }
                }
                catch (Exception $e)
                {
                    echo 'ただいま障害により大変ご迷惑をお掛けしております。';
                    exit();
                }
            ?>
        </ul>
    </div>
</body>
</html>