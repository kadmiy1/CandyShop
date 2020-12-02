
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

            <div class="block rega">
                <form action="php/check.php" method="post">
                    <h1 title="Форма регистрации">Регистрация </h1>
                    <div class="group">
                        <!-- <label for="">Логин:</label> -->
                        <input type="text" required placeholder="Логин" name="login" id="login" minlength="4">
                    </div>
                    <div class="group">
                        <!-- <label for="">Имя:</label> -->
                        <input type="text"required placeholder="Имя" name="name" >
                    </div>
                    <div class="group">
                        <!-- <label for="">Пароль:</label> -->
                        <input type="password" required  placeholder="Пароль" name="pass" id="pass" minlength="4">
                    </div>
                    <div class="group">
                       <!--  <label for="">Повтор пароля:</label> -->
                        <input type="password"required placeholder="Повтор пароля" name="pass2" id="pass2" minlength="4">
                    </div>
                    

                    <div class="groupa">

                        <center><button type="submit" name="reg">Регистрация</button></center>
                    </div>
                </form>
            </div>
        </div>
    </div>
    </article>

</body>

</html>