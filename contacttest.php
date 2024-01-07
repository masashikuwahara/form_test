<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>お問い合わせ一覧</title>
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

try
{
require_once('library.php');
$db=dbconnect();
$db->query('SET NAMES utf8');
$sql='SELECT * FROM contact WHERE 1';
$stmt=$db->prepare($sql);
$stmt->execute();

if (isset($_GET['page'])) {
	$page = (int)$_GET['page'];
} else {
	$page = 1;
}

if ($page > 1) {
	$start = ($page * 10) - 10;
} else {
	$start = 0;
}

$contacts = $db->prepare(" SELECT id, message, created_at FROM contact LIMIT {$start}, 10 ");

echo '<h1>お問い合わせ一覧</h1>';
echo '<form method="post" action="con_detail.php">';
$contacts->execute();
$contacts = $contacts->fetchAll(PDO::FETCH_ASSOC);

foreach ($contacts as $contact) {
	echo '<input type="radio" name="id" value="'.$contact['id'].'">';
	echo $contact['message'].'&nbsp;'. $contact['created_at'].'<br>';
}

$page_num = $db->prepare(" SELECT COUNT(*) id FROM contact ");
$page_num->execute();
$page_num = $page_num->fetchColumn();

$pagination = ceil($page_num / 10);

}
catch (Exception $e)
{
	echo 'ただいま障害により大変ご迷惑をお掛けしております。';
	exit();
}

?>

<?php for ($x=1; $x <= $pagination ; $x++) { ?>
	<a href="?page=<?php echo $x ?>"><?php echo $x; ?></a>
<?php } // End of for ?>

<?php
echo '<br/>';
echo '<br/>';
echo '<input class="btn" type="submit" value="参照">';
echo '</form>';
?>

<br />
<a href="../top.php">トップメニューへ</a><br />

</body>
</html>