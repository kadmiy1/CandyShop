<?php
require_once 'database/connect.php';
$link = mysqli_connect($host, $user, $password, $database)
    or die("Ошибка " . mysqli_error($link));

if (isset($_POST["auth"])) {


$login = filter_var(trim($_POST['login']),FILTER_SANITIZE_STRING);
$pass = filter_var(trim($_POST['pass']),FILTER_SANITIZE_STRING);



$pass = md5($pass."qwedhf547");

$mysql = $link;

$query = "SELECT * FROM `users` WHERE `login` = '$login' AND `password` = '$pass'";

$result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link));

$user = $result->fetch_assoc();
if(count($user) == 0)
{
    echo "Такой пользователь не найден.";
    exit();
}

setcookie('name', $user['name'], time() + 3600, "/candyshop/");

mysqli_close($link);


header('Location: /candyshop/index.php');
}
?>
