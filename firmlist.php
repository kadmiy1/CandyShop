<?php require_once 'php/database/connect.php'
?>
<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="CSS/style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.0/jquery.mi.."></script>

    <title>MyStorage</title>
</head>

<body>
    <header>
        <div class="header">
            <div class="container">
                <div class="header__inner">
                    <div class="header__logo"><acronym title="Проект студента ФКН Кальченко Дмитрия Алексеевича ">CandyShop</acronym></div>

                     <nav class="nav">
                    
                     <a class="nav__link" href="addcandy.php">Добавить сладость</a>
                        <a class="nav__link" href="addfirm.php">Добавить фирму</a>
                        <a class="nav__link" href="candylist.php">Список сладостей</a>
                        <a class="nav__link" href="firmlist.php">Cписок фирм</a>
                        <a class="nav__link" href="registration.php">Регистрация</a>
                        <a class="nav__link" href="authorization.php">Авторизация</a>
                    </nav>
                </div>
            </div>
        </div>
    </header>

                               
    <div class="intro">
        <div class="container">
            <div class="block">
                   <div class="text">
                            <table><tr><th>Id</th><th>Фирма</th><th>Адрес</th><th>Телефон</th></tr>
                            <?php
                                $link = mysqli_connect($host, $user, $password, $database) or die("Ошибка " . mysqli_error($link));
                                $sql = "SELECT * FROM `firms`";
                                $result = mysqli_query($link, $sql) or die("Ошибка " . mysqli_error($link));
                                $rows = mysqli_num_rows($result);
                                for ($i = 0 ; $i < $rows ; ++$i)
                                {
                                    $row = mysqli_fetch_row($result);
                                    echo "<tr>";
                                    for ($j = 0 ; $j < 4 ; ++$j) 
                                        echo "<td>$row[$j]</td>";
                                      
                                    echo "</tr>";
                                }
                                mysqli_free_result($result);
                                mysqli_close($link);

                                ?>
                            </table>
                        </div>
            </div>
        </div>
    </div>
