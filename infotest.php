<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>infoテスト</title>
</head>
<body>
    <!-- index.phpのinfo部分に下を追加 -->
    <?php
    try{
        require('connect.php');
        $dbh->query('SET NAMES utf8');
        $sql='SELECT * FROM info ORDER BY id DESC limit 3 ';
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
        
    }catch (Exception $e){
        echo 'ただいま障害により大変ご迷惑をお掛けしております。';
        exit();
    }
    ?>
    
    <div class="info">
        <a href="info.php">more</a>
    </div>
    <!-- ここまで -->
</body>
</html>