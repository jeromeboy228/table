<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="style.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <table border="1px">
        <tr>
            <td>Номер</td>
            <td>Тип прибора</td>
            <td>Марка прибора</td>
            <td>Серийный номер</td>
            <td>Месяц поверки</td>
            <td>Прочее</td>
            <td>Статус поверки</td>
        </tr>
        <?php
        $legth_table = 0;
        $connect = mysqli_connect("localhost", "echo", "Jerome112", "test");
        if (!$connect) die("ошибка подключения к БД");
        $select = mysqli_select_db($connect, "test");
        if (!$select) die("ошибка выбора БД");
        $qresult = mysqli_query($connect, "SELECT *  FROM Sheet1");
        if (!$qresult) die("Ошибка с таблицей");
        while ($elem = mysqli_fetch_assoc($qresult)) {
            $legth_table++; ?>
            <form name="id<?php print("$legth_table"); ?>" action="test_table.php" method="post">
                <tr <?php if ($elem["G"] == date("n")) print("class=\"new\"") ?>>
                    <td><?php print("$legth_table") ?></td>
                    <td><?php print("{$elem["B"]}") ?></td>
                    <td><?php print("{$elem["C"]}") ?></td>
                    <td><?php print("{$elem["D"]}") ?></td>
                    <td><?php print("{$elem["E"]}") ?></td>
                    <td><?php print("{$elem["F"]}") ?></td>
                    <td><input type="checkbox" name="id<?php print("$legth_table"); ?>"> Поверенно(поз.<?php print("$legth_table"); ?>) </td>
                </tr>

        <?php 
        if(isset($_POST["id$legth_table"]) && $_POST["id$legth_table"])
        echo $_POST["id$legth_table"];
        else echo "problems";
    }
        ?>
    </table>
    <input type="submit"  value="lol" >
    </form>

</body>

</html>