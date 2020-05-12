<!DOCTYPE html>
<html lang="en">

<head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js">
    </script>
    <link rel="stylesheet" href="style.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>test_table</title>
    <link rel="stylesheet" href="style.css">
    <!--     <script src="demo.js"></script>
 -->


</head>

<body class="gradient">
    <table border="1px" class="color_table">
        <tr class="main_colom">
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
        $qresult = mysqli_query($connect, "SELECT *  FROM List2");
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
                    <td><input type="checkbox" name="check<?php print("$legth_table"); ?>"> Поверенно </td>
                    <td>
                        <input type="submit" value="Отправить">
                    </td>



                <?php

                if (isset($_POST["id$legth_table"]) && $_POST["id$legth_table"]) {
                    $temp = mysqli_query($connect, "UPDATE List2 SET check_=1 WHERE A=$legth_table");
                }
            }
                ?>
                </tr>
    </table>
    <?php
    mysqli_close($connect);
    ?>
    </form>
</body>

</html>