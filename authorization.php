<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="CSS/style.css">
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

<article>
    <div class="intro">
        <div class="container">
            <div class="block autha">
                <form action="php/auth.php" method="post">
                    <h1 title="Форма авторизации">Авторизация</h1>
                    <div class="group">
                        <!-- <label for="">Имя пользователя:</label> -->
                        <input type="text" required  placeholder="Имя пользователя" name="login" id="login" minlength="5">
                    </div>
                    <div class="group">
                       <!--  <label for="">Пароль:</label> -->
                        <input type="password" required  placeholder="Пароль" name="pass" id="pass">
                    </div>

                    <div class="group">
                        <center><button type="submit" name="auth">Войти</button></center>
                    </div>
                </form>
            </div>

        </div>

    </div>

    </article>

</body>

</html>