<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Таблиця з інформацією про напрямок</title>
    <link rel="stylesheet" href="Lr_4.css">
</head>
<body>
    <form>
    <?php
        $file = file('data.txt', FILE_IGNORE_NEW_LINES);
        $input_data = trim(htmlspecialchars($_GET['select']));
        $found = false;

        echo "<h1>" . htmlspecialchars(urldecode($input_data)) . "</h1>";
        echo '<table class="table_data">';
        echo "<tr>";
        echo "<th width='50'>№</th>";
        echo "<th width='150'>Середній бал вступників на бюджет</th>";
        echo "<th width='150'>Число, вступивших на бюджет</th>";
        echo "<th width='150'>Недобір</th>";
        echo "<th width='150'>Число контрактників</th>";
        echo "<th width='400'>ВУЗ</th>";
        echo "</tr>";

        $count = 1;

        for ($i = 0; $i < count($file); $i++) {
            if (trim($file[$i]) === $input_data) {
                $found = true;
                $i++; 
                while (empty(trim($file[$i+1]) != true)) {
                    $num =$count;
                    $serBvB = $file[$i + 2];
                    $nedobir = "-";
                    $numContr = $file[$i + 3];
                    $vnz = $file[$i + 4];

                    echo '<tr>';
                    echo "<td>" . htmlspecialchars($count) . "</td>";
                    echo "<td>" . htmlspecialchars($serBvB) . "</td>";
                    echo "<td>" . htmlspecialchars($num) . "</td>";
                    echo "<td>" . htmlspecialchars($nedobir) . "</td>";
                    echo "<td>" . htmlspecialchars($numContr) . "</td>";
                    echo "<td>" . htmlspecialchars($vnz) . "</td>";
                    echo '</tr>';
                    $i += 4;
                    $count++;
                }
                break; 
            }
        }

        echo '</table>';

        if (!$found) {
            echo 'Запис не знайдено';
        }
    ?>
    </form>
</body>
</html>
