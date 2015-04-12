<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="content-type" content="text/html; charset=utf-8">
        <link rel="StyleSheet" type="text/css" href="styl.css" />
        <title>Graf</title>
    </head>
    <body>
        <div id="main">
            <form action="index.php" method="POST">
                Hodnoty:
                <input type="text" name="hodnoty" value="<?php echo (isset($_POST['hodnoty']) && !empty($_POST['hodnoty'])) ? $_POST['hodnoty'] : ''; ?>"> 
                <input type="submit" name="submit" value="Vykreslit graf">
            </form>
            <?php
            require 'graf.php';
            if (isset($_POST['submit'])) {
                if (isset($_POST['hodnoty']) and !empty($_POST['hodnoty'])) {
                    $graf1 = new Graf($_POST['hodnoty']);
                    echo $graf1;
                } else {
                    echo 'Nebyly zadány hodnoty pro vykreslení grafu.';
                }
            }
            ?>
        </div>
    </body>
</html>


