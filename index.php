<?php
    $test = "test";
    
    function calcola(float $capitale, int $n_rate, float $tasso_annuo){

    $quota = $capitale / $n_rate;
    $percentuale_tasso = ($tasso_annuo / 100) / 12;

    $debito_rimasto = $capitale;
    $ita=[];

    //FRANCESE

    $francese = $capitale * ($percentuale_tasso / (1 - pow(1 + $percentuale_tasso, - $n_rate)));

    //ITALIANO

    for($k = 1; $k < $n_rate; $k++){
        $interessi = $debito_rimasto * $percentuale_tasso;
        $rata = $quota + $interessi;
        $debito_rimasto = max(0, $debito_rimasto - $quota);

        $ita[] = [
            "numero rata" => $k,
            "quota del capitale" => $quota,
            "interessi" => $interessi,
            "rata" => $rata,
            "debito rimasto" => $debito_rimasto,
        ];
    }
    return [
        "Francese: " => $francese,
        "Italiano: " => $ita,
    ];
    }
?>