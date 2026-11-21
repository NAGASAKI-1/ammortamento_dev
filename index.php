<!DOCTYPE html>
<html lang="it">
    <head>
        <title>
            calcolatore piano ammortamento
        </title>
    </head>
    <body> 
    <!-- Il form usa il metodo POST che permette di inviare dati alla stessa pagina -->
        <form method="POST" action="/index.php">

        <label>Inserire l'importo in €</label>
        <input type="number" id="importo" name="importo" required>
        <br><br>
        
        <label>Inserire Il numero di rate</label>
        <input type="number" id="rate" name="rate" required>
        <br><br>

        <label>Inserire il tasso di interesse annuo (in %)</label>
        <input type="number" id="interesse" name="interesse" required>
        <br><br>

        <button type="submit">Calcola</button>
        </form>

    </body>
</html>