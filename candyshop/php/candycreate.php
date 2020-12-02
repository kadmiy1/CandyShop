<?php
require_once 'database/connect.php';
$link = mysqli_connect($host, $user, $password, $database)
    or die("Ошибка " . mysqli_error($link));

if (isset($_POST["reg"])) {

$name = filter_var(trim($_POST['name']),FILTER_SANITIZE_STRING);
$description =filter_var(trim($_POST['description']),FILTER_SANITIZE_STRING);
$price =filter_var(trim($_POST['price']),FILTER_SANITIZE_NUMBER_INT);

$sql = "SELECT name FROM `candys` WHERE candys.name = '$name'  ";
$result = mysqli_query($link, $sql) or die("Ошибка " . mysqli_error($link));
$rows = mysqli_num_rows($result);
for ($i = 0 ; $i < $rows ; ++$i)
{
    $row = mysqli_fetch_row($result);
    for ($j = 0 ; $j < 1 ; ++$j)
    {

        if($name == $row[$j])
        {

            echo "Такая сладость уже есть";
            exit();
        }
    }
}

 $query = "INSERT INTO `candys` (`id`, `name`, `description`,`price`) VALUES(NULL, '$name', '$description','$price')";

 $result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link));
mysqli_close($link);
header('Location: /candyshop/addcandy.php'); 
}
?> 