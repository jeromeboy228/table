<!DOCTYPE html>
<html lang="en">

<head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js">
    </script>
    <link rel="stylesheet" href="style.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
    <!--     <script src="demo.js"></script>
 -->
    <style type="text/css">
        .color_table th,
        #first_tr {
            background-color: lightblue;
        }
    </style>

</head>

<body class="gradient">
    <table border="1px" class="color_table">
        <tr>
            <td>Номер</td>
            <td>Тип прибора</td>
            <td>Марка прибора</td>
            <td>Серийный номер</td>
            <td>Месяц поверки</td>
            <td>Прочее</td>
            <td>Статус поверки</td>
            <td>Stat</td>
            <!-- <td>button</td> -->
        </tr>
        <?php
        $legth_table = 0; // длинна таблицы
        $flag; // проверка состояния прибора (поверен или нет)
        $connect = mysqli_connect("localhost", "echo", "Jerome112", "test");
        if (!$connect) die("ошибка подключения к БД");
        $select = mysqli_select_db($connect, "test");
        if (!$select) die("ошибка выбора БД");
        $qresult = mysqli_query($connect, "SELECT *  FROM Sheet1");
        if (!$qresult) die("Ошибка с таблицей");
        while ($elem = mysqli_fetch_assoc($qresult)) {
            $legth_table++; ?>
            <form name="id<?php print("$legth_table"); ?>" action="test_table.php" method="POST">
                <tr <?php
                    if ($elem["check_"] == 1) print("class=\"for_pow\"");
                    else
                    if ($elem["G"] == date("n")) print("class=\"new\"");
                    ?>>
                    <td><?php print("{$elem["A"]}") ?></td>
                    <td><?php print("{$elem["B"]}") ?></td>
                    <td><?php print("{$elem["C"]}") ?></td>
                    <td><?php print("{$elem["D"]}") ?></td>
                    <td><?php print("{$elem["E"]}") ?></td>
                    <td><?php print("{$elem["F"]}") ?></td>
                    <td><input type="checkbox" name="id<?php print("$legth_table"); ?>"> Поверенно
                        <input type="hidden" name="check_<?php print("$legth_table"); ?>" value="1">
                    </td>
                    <td>
                        <input type="submit" value="lol">
                    </td>



                <?php
                if (isset($_POST["id$legth_table"]) && $_POST["id$legth_table"]) {
                    $flag = $_POST["check_$legth_table"];

                    $temp = mysqli_query($connect, "UPDATE List2 SET check_=1 WHERE A=$legth_table");

                    if (!$temp) echo "bad =(";
                    /* printf("<td>$flag</td>"); */
                } else {
                    $flag = 0;
                    /*  printf("<td>$flag</td>"); */
                }
            }
                ?>
                </tr>
    </table>
    <!--  <input type="submit" value="lol"> -->

    <?php
    mysqli_close($connect);
    /* $temp=mysqli_query($connect,"UPDATE List2 SET check_=1 WHERE A=3");
if(!$temp) die("Проблемы отправки формы"); 
    echo "its all good,check DB";*/

    ?>

    </form>

</body>

</html>
<!-- 
qresult=mysqli_query($connect,"INSERT  INTO table_work(type_dev,mark_dev,serial_num,mouth,exet)
    values
    ('".$type_dev."','".$mark_dev."','".$serial_num."','".$mounth."','".$exet."')
    "); -->
