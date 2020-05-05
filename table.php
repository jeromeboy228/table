<!-- Основная версия -->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Таблица приборов</title>
    <link rel="stylesheet" href="style.css">
</head>

<body class="gradient">

    <table border="1px">

        <tr>
            <td>Номер</td>
            <td>Марка прибора</td>
            <td>Тип прибора</td>
            <td>Серийный номер</td>
            <td>Месяц поверки</td>
            <td>Прочее</td>
            <td>Поверенно</td>
        </tr>
        <?php
        $leignt_table = 0;
        $connect = mysqli_connect("localhost", "echo", "Jerome112", "test");
        if (!$connect) die("con prob");
        $select = mysqli_select_db($connect, "test");
        if (!$select) die("select prob");
        $qresult = mysqli_query($connect, "SELECT * FROM List2");
        if (!$qresult) die("qres prob");
        while ($elem = mysqli_fetch_assoc($qresult)) {
            $leignt_table++;
        ?>
            <tr <?php
                if ($elem["check_"] == 1) print("class=\"for_pow\"");
                else
                { if ($elem["G"] == date("n")) print("class=\"new\"");}

                ?>>
                <form action="table.php" name="id<?php print("$leignt_table")?>" method="post">
                    <td><?php print("{$elem["A"]}") ?></td>
                    <td><?php print("{$elem["B"]}") ?></td>
                    <td><?php print("{$elem["C"]}") ?></td>
                    <td><?php print("{$elem["D"]}") ?></td>
                    <td><?php print("{$elem["E"]}") ?></td>
                    <td><?php print("{$elem["F"]}") ?></td>
                    <td>
                        <input type="checkbox" name="id<?php print("$leignt_table"); ?>">
                        <input type="submit" value="Отправить">
                    </td>

            </tr>
         <?php

            if (isset($_POST["id$leignt_table"]) && $_POST["id$leignt_table"]) 
            {
                $temp = mysqli_query($connect, "UPDATE List2 SET check_=1 WHERE A=$leignt_table");
                if (!$temp) die("temp prob");
            } 
            
        } 
        mysqli_close($connect);?>
        </form>
    </table>

</body>

</html>