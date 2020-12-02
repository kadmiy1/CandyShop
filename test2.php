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
                        <input type="text"  placeholder="Номер" name="number" id="number" minlength="2">
                    </div>
                    
                    <div class="group"><center>Укажите дату заказа</center>          
                        <input type="date" placeholder="Дата заказа" name="date" id="date">
                    </div>
                    <div class= "group">  
                        <center> Выберите фирму </center>
                            <select  name= "firm" class="">
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
                        <table class="calc" id="tab_1">
                        <tr>
                            <td>Товар</td>
                            <td>Количество</td>
                            <td>Сумма</td>
                        </tr>
                        <?php 
                            $link = mysqli_connect($host, $user, $password, $database) or die("Ошибка " . mysqli_error($link));
                            $sql = "SELECT id, name, price FROM `candys`" ;

                            $result = mysqli_query($link, $sql) or die("Ошибка " . mysqli_error($link));
                            $rows1 = mysqli_num_rows($result);
                            for ($i = 0 ; $i < $rows1 ; ++$i)
                            {
                                echo '<tr  class="t-row">';
                                $row = mysqli_fetch_row($result);
                                for ($j = 0 ; $j < 1 ; ++$j){
                                    echo "<td>$row[1] -  $row[2] р/кг</td>"; 
                                    echo "<td> <div class='inp-group'>";
                                    echo "<input type='text' name='quant' value='0' class='quant form-control' data-step='1' data-price=$row[2] data-min='0' />";
                                    echo "</div></td>";
                                    echo "<td class='price'>0</td>";
                                }   
                                echo "</tr>";
                            } 
                            
                            

                        ?>


                        </table>
                        <p class="text-center result">Итого:<br /><span class="val">0</span> руб.</p>
                    
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

<script>

/*калькулятор*/
    /*Обрабатываем нажатия на кнопки + и - */
    $('.minpl').click(function() {
    /*Находим input*/
        $input = $(this).parent().find('.quant');
        var qty = Number($input.val());
        /*На случай, если количество не удалось определить (например, пользователь мог оставить поле пустым)*/
        if (isNaN(qty)) qty = 0;
            if ($(this).hasClass('plus')) {
                if (qty == 0) {
                    qty = $input.data('min');
                } else {
                qty += $input.data('step');
            }
        } else {
            qty -= $input.data('step');
        }
        var min = $input.data('min');
        if (qty >= min) {
            $input.val(qty).trigger('input');
        } else {
            $input.val(0).trigger('input');
        }
        /*Передаем функции подсчета, обновления*/
        updateCalc($input);
    });
    /*Обрабатываем ввод с клавиатуры */
    $('.quant').change(function() {
        var qty = $(this).val();
        if (isNaN(qty)) qty = 0;
        var min = $(this).data('min');
        var step = $(this).data('step');
        if (qty > 0) {
        /*Если вдруг число не кратно шагу, увеличиваем (только увеличение) до кратного*/
            qty = Math.ceil(qty/step)*step;
            if (qty < min) {
                qty = min;
            }
            $(this).val(qty).trigger('input');
        } else {
            $(this).val(0).trigger('input');
        }
        updateCalc($(this));
    });
    /*Считаем, обновляем значения*/
    function updateCalc($input){
        var qty = Number($input.val());
        if (isNaN(qty)) qty = 0;
        $input.parents('.t-row').find('.price').text(qty * $input.data('price')/$input.data('step'));
        var itog = 0;
        $input.parents('.calc').find('.price').each(function(){
            itog += parseInt($(this).text());
        });
        $input.parents('.calc').next().find('.val').text(itog);
    }

</script>
