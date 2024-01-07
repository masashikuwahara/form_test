<?php
require('library.php');

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>修正内容確認</title>
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
    <?php

    $post=$_POST;
    var_dump($post);
    $confirm_id=$post['id'];
    $confirm_c=$post['c'];

        echo'本当に更新しますか？<br />';
        echo'<form method="post" action="done.php">';
        echo'<input type="hidden" name="id" value="'.$confirm_id.'">';
        echo'<input type="hidden" name="cas" value="'.$confirm_c.'">';
        echo'<br />';
        echo'<input class="btn" type="button" onclick="history.back()" value="戻る">&nbsp;';
        echo'<input class="btn" type="submit" value="更新する">';
        echo'</form>';
    ?>
</body>
</html>