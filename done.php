<?php
require('library.php');
?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>送信結果</title>
</head>
<body>
<?php
    $name = htmlspecialchars($_POST["n"],ENT_QUOTES);
    $email = htmlspecialchars($_POST["e"],ENT_QUOTES);
    $message = htmlspecialchars($_POST["m"],ENT_QUOTES);

    if( !empty($name) && ($email) && ($message)){
        $db = dbconnect();
        $db->query("INSERT INTO contact (id, name, email, message, created_at)
            VALUES (NULL,'$name','$email','$message',NOW())");
        echo "送信しました<br>";
    }else{
        echo 'お名前とメールアドレスとお問い合わせ内容を入力してください<br />';
    }
    echo '<a href="' . $_SERVER['HTTP_REFERER'] . '">前に戻る</a>';
    ?>
</body>
</html>