<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="CSS/style.css">

    <title>CandyShop</title>
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
                     <div class="groups"> 
                        <form action="php/exit.php" method="post">
                        <button type="submit" name="exit">Выйти</button>

                        </form>
                     </div> 
                </div>
            </div>
        </div>
    </header>

<article>
    <div class="intro">
        <div class="container">

            <div class="block rega">
                <form action="php/firmcreate.php" method="post">
                    <h1 title="Добавление фирмы">Создание накладной</h1>
                    <div class="group">
                        <!-- <label for="">Логин:</label> -->
                        <input type="text" required  placeholder="Номер" name="number" id="number" minlength="2">
                    </div>
                    <div class="group">
                        <!-- <label for="">Имя:</label> -->
                        <input type="text" required  placeholder="Id Фирмы" name="id_firm" >
                    </div>
                    <div class="group">
                        <!-- <label for="">Пароль:</label> -->
                        <input type="date" required  placeholder="Дата заказа" name="date" id="date">
                    </div>
                    
                    <div class="groupa">

                        <center><button type="submit" name="reg">Добавить</button></center>
                    </div>
                </form>
            </div>
        </div>
    </div>
    </article>

</body>

</html>