<!DOCTYPE html>
<html lang="it">
    <head>
        <title>Ristorante Ristorantoso</title>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="css/styleMenu.css">
    </head>
    <body>
        <?php
            if(isset($_GET["id"])){
                $id = $_GET["id"];
        ?>
                <div class="titoloPagina">
                    <h1 class="titolo">
                        Prenotazione effettuata con successo!
                    </h1>
                    <h2 class = sottoTitolo>
                        Il codice della sua prenotazione è: <?php echo $id;?>
                    </h2>
                </div>
        <?php
            } else {
        ?>
                <div class="titoloPagina">
                    <h1 class="titolo">
                        Impossibile effettuare la prenotazione!
                    </h1>
                    <h2 class = "sottoTitolo">
                        Ci dispiace per l'errore. La preghiamo di riprovare.
                    </h2>
                </div>
        <?php
            }
        ?>
    </body>
</html>