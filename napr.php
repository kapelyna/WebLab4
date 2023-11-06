<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>PHP table</title>
        <link rel="stylesheet" href="Lr_4.css">
    </head>
    <body>
        <form class="choice" method="post">
        <?php
            $file = file('napr.txt', FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
            sort($file);

            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $select = $_POST['selected_item'];
                
                header("Location: data.php?select=" . $select);
                exit;
            }
            
            
            for ($i = 0; $i < count($file); $i++) {
                $item = trim($file[$i]);
                echo '<label><input type="radio" name="selected_item" value="' . htmlspecialchars($item) . '"> ' . htmlspecialchars($item) . '</label><br>';
            }
        ?>
        <input class="button" type="submit" value="Відправити запит">
        </form>
    </body>
</html>


