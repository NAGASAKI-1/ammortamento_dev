<?php
    $test = "test";
    
    function calcola(float $importo, int $n_rate, float $tasso){

    $percentuale_tasso = ($tasso / 100) / 12;

    $rata = $importo * ($percentuale_tasso / (1 - pow(1 + $percentuale_tasso, - $n_rate)));

    }
?>