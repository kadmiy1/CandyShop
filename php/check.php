<?php
require_once 'database/connect.php';
$link = mysqli_connect($host, $user, $password, $database)
    or die("Ошибка " . mysqli_error($link));

if (isset($_POST["reg"])) {


$pass = filter_var(trim($_POST['pass']),FILTER_SANITIZE_STRING);
$pass2 = filter_var(trim($_POST['pass2']),FILTER_SANITIZE_STRING);


$login = filter_var(trim($_POST['login']),FILTER_SANITIZE_STRING);
$name = filter_var(trim($_POST['name']),FILTER_SANITIZE_STRING);
$sql = "SELECT login FROM `users` WHERE users.login = '$login'  ";
$result = mysqli_query($link, $sql) or die("Ошибка " . mysqli_error($link));
$rows = mysqli_num_rows($result);
for ($i = 0 ; $i < $rows ; ++$i)
{
    $row = mysqli_fetch_row($result);
    for ($j = 0 ; $j < 1 ; ++$j)
    {

        if($login == $row[$j])
        {

            echo "Такой пользователь уже зарегистрирован";
            exit();
        }
    }
}
if($pass != $pass2)
{
    echo "Пароли не совпали.";
    exit();
}
$pass = md5($pass."qwedhf547");

 $query = "INSERT INTO `users` (`id`, `login`, `password`,`name`) VALUES(NULL, '$login', '$pass','$name')";

 $result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link));
mysqli_close($link);
header('Location: /candyshop/index.php');
}
?>

