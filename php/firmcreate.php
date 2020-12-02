<?php
require_once 'database/connect.php';
$link = mysqli_connect($host, $user, $password, $database)
    or die("Ошибка " . mysqli_error($link));

if (isset($_POST["reg"])) {

$name = filter_var(trim($_POST['name']),FILTER_SANITIZE_STRING);
$address =filter_var(trim($_POST['address']),FILTER_SANITIZE_STRING);
$phone =filter_var(trim($_POST['phone']),FILTER_SANITIZE_NUMBER_INT);

$sql = "SELECT name FROM `firms` WHERE firms.name = '$name'  ";
$result = mysqli_query($link, $sql) or die("Ошибка " . mysqli_error($link));
$rows = mysqli_num_rows($result);
for ($i = 0 ; $i < $rows ; ++$i)
{
    $row = mysqli_fetch_row($result);
    for ($j = 0 ; $j < 1 ; ++$j)
    {

        if($name == $row[$j])
        {

            echo "Такая фирма уже есть";
            exit();
        }
    }
}

 $query = "INSERT INTO `firms` (`id`, `name`, `address`,`phone`) VALUES(NULL, '$name', '$address','$phone')";

 $result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link));
mysqli_close($link);
header('Location: /candyshop/addfirm.php'); 
}
?> 