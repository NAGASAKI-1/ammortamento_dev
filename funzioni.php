<?php

function calcolarata(float $capitale, int $n_rate, float $tasso_annuo) : array{
    //TO ILARI FROM PIRAS: ma alla francese o all'italiana?

    $tasso_mensile = ($tasso_annuo / 100) / 12;
    $debito_rimasto = $capitale;
    $piano = [];

    $rata = $capitale * ($tasso_mensile / (1 - pow(1 + $tasso_mensile, - $n_rate))); //rata singola da sottrarre al capitale

    for($k = 1; $k <= $n_rate; $k++){
        $interessi = $debito_rimasto * $tasso_mensile;
        $quota_capitale = $rata - $interessi;
        $debito_rimasto = max(0.0, $debito_rimasto - $quota_capitale);

        $piano[] = [
            "numero_rata" => $k,
            "quota_capitale" => $quota_capitale,
            "interessi" => $interessi,
            "rata" => $rata,
            "debito_rimasto" => $debito_rimasto,
        ];
    }
    return $piano;
    
    }

    function calcolaItaliano(float $capitale, int $n_rate, float $tasso_annuo) : array{
    
    $quota = $capitale / $n_rate;
    $tasso_mensile = ($tasso_annuo / 100) / 12;

    $debito_rimasto = $capitale;
    $piano=[];

    for($k = 1; $k <= $n_rate; $k++){
        $interessi = $debito_rimasto * $tasso_mensile;
        $rata = $quota + $interessi;
        $debito_rimasto = max(0, $debito_rimasto - $quota);

        $piano[] = [
            "numero rata" => $k,
            "quota del capitale" => $quota,
            "interessi" => $interessi,
            "rata" => $rata,
            "debito rimasto" => $debito_rimasto,
        ];
    }
    return $ita;
    }

/////////////////////////////
//le funzioni da qui in avanti servono a costuire il codice HTML della pagina che viene creata
//per visualizzare i risultati

    function renderPagina(string $titolo, string $corpo) : void{
        $titolo = htmlspecialchars($titolo, ENT_QUOTES, 'UTF-8');

    echo "<!DOCTYPE html>
<html lang=\"it\">
        <head>
            <meta charset=\"UTF-8\">
                <title>$titolo</title>
        </head>
    <body>
    $corpo
    </body>
</html>";
    }

    function stampaRisultati() : void{
        if (($_SERVER["REQUEST_METHOD"] ?? "") !== "POST") { 
            //se il request method esiste, allora prende quel valore
            // altrimenti, con "" da errore di chiave mancante
        echo "<p>Nessun dato inviato. Compila prima il form.</p>";
        echo "<a href='index.html'>Torna al form</a></body></html>";
        return;
    }

    $capitale = filter_input(INPUT_POST, "importo", FILTER_VALIDATE_FLOAT); //controllo dei dati inviati
    $n_rate = filter_input(INPUT_POST, "rate", FILTER_VALIDATE_INT);
    $tasso_annuo = filter_input(INPUT_POST, "interesse", FILTER_VALIDATE_FLOAT);
    $tipo = $_POST["tipo"] ?? ""; //prende il tipo di ammortamento selezionato

    if ($capitale === false || $capitale <= 0 || $n_rate === false || $n_rate <= 0 || $tasso_annuo === false || $tasso_annuo < 0) {
        //controllo che assicura che i numero inseriti non siano pari a 0 o inferiori a 0
        $corpo = '<p>Dati non validi. Controlla importo, numero di rate e tasso.</p>
                  <p><a href="form.html">Torna al form</a></p>';
        renderPagina("Errore dati", $corpo);
        return;
    }
    }

?>