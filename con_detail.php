<?php
$contacts_id=$_GET['id'];
require('library.php');
$db = dbconnect();
$db->query('SET NAMES utf8');
$sql = 'SELECT * FROM contact WHERE id=?';
$stmt = $db->prepare($sql);
$data[]=$contacts_id;
$stmt->execute($data);

$con =$stmt->fetch(PDO::FETCH_ASSOC);
$contact_name=$con['name'];
$contact_email=$con['email'];
$contact_mes=$con['message'];
$contact_time=$con['created_at'];
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>お問い合わせ詳細</title>
    <style>
        .btn{
            width: 100px;
            height: 50px;
            background-color: #00bfff;
            border-radius: 20px;
            border: none;
            color: #ffffff;
        }
        .btn:hover {
            background-color: #ed6fb5;
        }
    </style>
</head>
<body>
    <h1>お問い合わせ詳細</h1>

    <h2>お名前</h2>
    <?php echo $contact_name;?>
    <br />
    <h2>メールアドレス</h2>
    <?php echo $contact_email;?>
    <br />
    <h2>お問い合わせ内容</h2>
    <?php echo $contact_mes;?>
    <br />
    <h2>お問い合わせ時間</h2>
    <?php echo $contact_time;?>
    <br />
    <br />
    <form>
    <input class="btn" type="button" onclick="history.back()" value="戻る">
    </form>
    
</body>
</html>