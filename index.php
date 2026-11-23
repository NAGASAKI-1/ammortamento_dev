<?php
    require "./funzioni.php";
    //debug
    //echo("TEST <br>");
    
    //variabili
    $capitale = $_POST["importo"];
    $n_rate = $_POST["rate"];
    $tasso_annuo = $_POST["interesse"];
    $tipo_ammortamento = $_POST["tipo"];

    $piano = calcolaItaliano($capitale, $n_rate, $tasso_annuo);

    //debug
    /*
    echo("$capitale <br>");
    echo ("$n_rate <br>");
    echo ("$tasso_annuo <br>");
    echo ("$tipo_ammortamento <br>");
    */
?>

<!DOCTYPE html>
<html>
    <head>
        <base href="/ammortamento/">
        <meta charset="UTF-8">
        <title>Calcolatore piano di ammortamento</title>
        <link rel="stylesheet" href="style.css">
    </head>

    <body> 
        <?php echo $capitale ?>
        <br>
        <?php echo $n_rate ?>
        <br>
        <?php echo $tasso_annuo ?>
        <br>
        <?php echo $tipo_ammortamento ?>
        <br>
        <br>

        <table>
            <tr>
                <th>Rata</th>
                <th>Importo</th>
            </tr>
            <?php foreach ($piano as $rata_record): ?>
                <tr>
                    <td> <?php echo $rata_record["numero rata"] ?> </td>
                    <td> <?php echo $rata_record["rata"] ?> </td>
                </tr>
            <?php endforeach ?>
        </table>
    </body>
</html>