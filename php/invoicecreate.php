<?php
require_once 'database/connect.php';
$link = mysqli_connect($host, $user, $password, $database) or die("Ошибка " . mysqli_error($link));

$quant = $_POST['quant'];

$price = $_POST['price'];


$summ = $_POST['summ'];

$number = filter_var(trim($_POST['number']),FILTER_SANITIZE_NUMBER_INT);
$date = filter_var(trim($_POST['date']),FILTER_SANITIZE_STRING);
$firm_id = filter_var(trim($_POST['firm']),FILTER_SANITIZE_NUMBER_INT);

$sql = "SELECT id FROM `candys` ORDER BY id" ;
$candy = mysqli_query($link, $sql) or die("Ошибка " . mysqli_error($link));
$rows = mysqli_num_rows($candy);
for ($i = 0 ; $i < $rows ; ++$i)
{
    $row = mysqli_fetch_row($candy);
    $candy_id[] = $row[0];
}



$query = "INSERT INTO `invoices` (`id`, `number`, `id_firm`,`date`,`sum`) VALUES(NULL, '$number', '$firm_id','$date','$summ')";

$result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link));

$last_id = mysqli_insert_id($link);

for ($i = 0; $i < count($candy_id); $i++) {
    if($quant[$i]!=0){
        $query = "INSERT INTO `candy_invoice` (`id`, `id_invoice`, `id_candy`,`quantity`,`total`) VALUES(NULL, '$last_id', '$candy_id[$i]','$quant[$i]','$price[$i]')";
        $result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link));

    }
}
mysqli_close($link);
header('Location: /candyshop/index.php'); 
?> 