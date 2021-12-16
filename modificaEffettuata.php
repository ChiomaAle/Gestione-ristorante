<!DOCTYPE html>
<html lang="it">
    <head>
        <title>Ristorante Ristorantoso</title>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="css/styleMenu.css">
    </head>
    <body>
        <?php
            if(!isset($_GET["del"])){
                $id = $_GET["id"];
        ?>
                <div class="titoloPagina">
                    <h1 class="titolo">
                        Modifica effettuata con successo!
                    </h1>
                    <h1 class="sottoTitolo">
                        Il nuovo codice della sua prenotazione è: <?php echo $id;?>
                    </h1>
                </div>
        <?php
            } else {
        ?>
                <div class="titoloPagina">
                    <h1 class="titolo">
                        Prenotazione cancellata con successo.
                    </h1>
                </div>
        <?php
            }
        ?>
    </body>
</html>