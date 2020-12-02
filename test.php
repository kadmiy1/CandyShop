<?php require_once 'php/database/connect.php'
?> 
<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script type="text/javascript" src="js/chosen.jquery.min.js"></script>
    <link rel="stylesheet" href="css/chosen.min.css" />
    <link href="https://fonts.googleapis.com/css?family=Open+Sans&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    
    <title>MyStorage</title>
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
                        <a class="nav__link" href="addcandy.php">Добавить сладость</a>
                        <a class="nav__link" href="addfirm.php">Добавить фирму</a>
                        <a class="nav__link" href="candylist.php">Список сладостей</a>
                        <a class="nav__link" href="firmlist.php">Cписок фирм</a>
                    </nav>
                </div>
            </div>
        </div>
    </header>
    <article>
    <div class="intro">
        <div class="container">

            <div class="block zak">
                <form action="php/invoicecreate.php" method="post">
                    <h1 title="Создание накладной">Создание накладной</h1>
                    <div class="group">
                        <center>Укажите номер накладной</center>
                        <!-- <label for="">Логин:</label> -->
                        <input type="text" required  placeholder="Номер" name="number" id="number" minlength="2">
                    </div>
                    
                    <div class="group"><center>Укажите дату заказа</center>
               
                        <!-- <label for="">Пароль:</label> -->
                        <input type="date" required placeholder="Дата заказа" name="date" id="date">
                    </div>
                    <div class= "group">  

                        <center> Выберите фирму </center>
                            <select name= "firm" class="select-chosen">
                                    <?php 
                                    $link = mysqli_connect($host, $user, $password, $database) or die("Ошибка " . mysqli_error($link));
                                    $sql = "SELECT id, name FROM `firms`" ;
                        
                                    $result = mysqli_query($link, $sql) or die("Ошибка " . mysqli_error($link));
                                    $rows1 = mysqli_num_rows($result);

                                    for ($i = 0 ; $i < $rows1 ; ++$i)
                                    {
                                        $row = mysqli_fetch_row($result);
                                        for ($j = 0 ; $j < 1 ; ++$j) echo "<option value=$row[0]>$row[1]</option>";
                                    }
                                    ?>
                            </select>
                        </center>
                    </div>
                    <div>
                        <table id="tab_1">
                        <tr>
                            <td>Товар</td>
                            <td>Цена</td>
                            <td>Количество</td>
                            <td>Сумма</td>
                            <td></td>
                        </tr>
                        </table>

                        <input class="butadd" type="button" value="+" id="add_1">
                    
                        <div class="groupa"> 
                            
                            <center><button type="submit" name="reg">Добавить</button></center>
                        </div>
                    </div>
                    
                </form>
            </div>
        </div>
    </div>
    </article>


    

</body>

</html>
<?php 
    $link = mysqli_connect($host, $user, $password, $database) or die("Ошибка " . mysqli_error($link));
    $sql = "SELECT id, name, price FROM `candys`" ;

    $result = mysqli_query($link, $sql) or die("Ошибка " . mysqli_error($link));
    $rows1 = mysqli_num_rows($result);

    
?>
<script>
    $(function select(){
        $('.select-chosen').chosen({
            width: 200,
            no_results_text: "Нет такого продукта!",
            placeholder_text_single: "Выберите продукт",
            search_contains: true,
            max_shown_results: 10
        });
    })
    var str = '<tr><td><select  onchange="getval(this);" class="select-chosen" id="select" name="candy[]">'+
    '<?php 
        echo "<option value=0>Выберите сладость</option>";
    for ($i = 0 ; $i < $rows1 ; ++$i)
    {
        $row = mysqli_fetch_row($result);
        for ($j = 0 ; $j < 1 ; ++$j) echo "<option value=$row[2]>$row[1]</option>";   
        ;
    } 
    ?></td>'+
    '<td>0</td>'+
    '<td><input class="inputadd" type="text" required placeholder="Граммы" name="mass[]"></td>'+
    '<td></td>'+
    '<td><input type="button" value="-" class="delrow"></td>'+
    '</select></td></tr>';
    $(function table() {
    //добавить строку таблицы
    $('#add_1').click(function(){
        $('#tab_1').append(str);
        $('tr')
        .find('td')
        .parent()//traversing to 'tr' Element
        .append('');
     



        $('.delrow').click(function(){
            $(this).parent().parent().remove(); //Deleting the Row (tr) Element
        });
        $(function select(){
            $('.select-chosen').chosen({
                width: 100,
                no_results_text: "Нет такого продукта!",
                placeholder_text_single: "Выберите продукт",
                search_contains: true,
                max_shown_results: 10
            });
        })
    })
})


    function getval(sel)
{
    
    alert(sel.value);

} 
</script>