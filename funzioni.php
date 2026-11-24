<?php

function calcolaFrancese(float $capitale, int $n_rate, float $tasso_annuo) : array{

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
            "quota_interessi" => $interessi,
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
            "numero_rata" => $k,
            "quota_capitale" => $quota,
            "quota_interessi" => $interessi,
            "rata" => $rata,
            "debito_rimasto" => $debito_rimasto,
        ];
    }
    return $piano;
    }
