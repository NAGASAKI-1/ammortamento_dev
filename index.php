<?php
    require "./funzioni.php";
    //debug
    //echo("TEST <br>");
    
    //variabili
    $capitale = $_POST["importo"];
    $n_rate = $_POST["rate"];
    $tasso_annuo = $_POST["interesse"];
    $tipo_ammortamento = $_POST["tipo"];
    $piano =  [];

    if($tipo_ammortamento == "italiano"){
    $piano = calcolaItaliano($capitale, $n_rate, $tasso_annuo);
    }
    else if($tipo_ammortamento == "francese"){
        $piano = calcolaFrancese($capitale, $n_rate, $tasso_annuo);
    }
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
        <meta charset="UTF-8">
        <title>Calcolatore piano di ammortamento</title>
        <link rel="stylesheet" href="style.css">
    </head>

    <body> 
        <div class ="divPHP">
        <?php echo number_format((float)($capitale ?? 0), 2, ',', '.'); ?>
<!-- number_format è stato aggiunto come controllo e come formattazione, ?? 0 offre un valore alternativo (0)
 in caso $capitale sia NULL, poi viene formattato con 2 decimali e detto di usare , come separatore di deciali
 e . come separatore di migliaia-->
        </div>
        
        <div class ="divPHP">
        <?php echo (int)($n_rate ?? 0); ?>
        </div>

        <div class="divPHP">
        Tasso annuo: <?php echo number_format((float)($tasso_annuo ?? 0), 2, ',', '.'); ?> %
        </div>

        <div class="divPHP">
        Tipo ammortamento: <?php echo $tipo_ammortamento; ?>
        </div>

        <table class = "tablePHP">
            <thead>
            <tr>
                <th>Rata</th>
            <th>Importo rata</th>
            <th>Quota interessi</th>
            <th>Debito residuo</th>
            <th>Quota capitale</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($piano as $rata_record): ?>
                <tr>
                        <td><?php echo (int)($rata_record["numero_rata"] ?? 0); ?></td>
                        <td><?php echo number_format((float)($rata_record["rata"] ?? 0), 2, ',', '.'); ?> €</td>
                        <td><?php echo number_format((float)($rata_record["quota_interessi"] ?? 0), 2, ',', '.'); ?> €</td>
                        <td><?php echo number_format((float)($rata_record["debito_rimasto"] ?? 0), 2, ',', '.'); ?> €</td>
                        <td><?php echo number_format((float)($rata_record["quota_capitale"] ?? 0), 2, ',', '.'); ?> €</td>
                </tr>
            <?php endforeach ?>
            </tbody>
            <br>
        </table>
    </body>
</html>