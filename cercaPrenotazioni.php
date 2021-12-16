<!DOCTYPE html>
<html lang="it">
    <head>
        <title>Ristorante Ristorantoso</title>
        <meta name="viewport" content="width-device-width, initial-scale-1.0">
        <meta charset="UTF-8">
        <link rel="stylesheet" href="css/stylePrenotazioni.css">
    </head>
    <body>
        <?php
            if(isset($_POST['id'])){
                $id = $_POST['id'];
                $email = $_POST['email'];

                $json = ("{\"id\": \"" . $id . "\",\"email\": \"" . $email . "\"}");

                $url = 'https://sitoristorante.ddns.net/api/prenotazioni/getPrenotazione.php';
                $options = array(
                    'http' => array(
                        'header'  => "Content-type: application/json\r\n",
                        'method'  => 'POST',
                        'content' => $json
                    )
                );

                $context = stream_context_create($options);
                $result = file_get_contents($url, false, $context);

                $json = json_decode($result, true);

                if(!('' === "Nessuna" || false !== strpos($json, "Nessuna"))){
                    die("Nessuna prenotazione trovata");
                }

                $id = $json['id'];
                $nome = $json['nome'];
                $email = $json['email'];
                $numPosti = $json['numPosti'];
                $dataOra = $json['dataOra'];
                $dataOra = substr($dataOra, 0, -3);
                $dataOra = str_replace(" ","T", $dataOra);
                header("Location:https://sitoristorante.ddns.net/gestionePrenotazione.php?id=".$id."&nome=".$nome."&email=".$email."&numPosti=".$numPosti."&dataOra=".$dataOra);
            }
        ?>
        <div class="topnav">
            <div class="navElements">
                <a href="index.html">Home</a>
                <a href="menu.php">Menù</a>
                <a href="">Prenotazioni</a>
            </div>
        </div>

        <div class="titoloPagina">
            <h1 class="titolo">
                Trova prenotazione
            </h1>
        </div>

        <div class="sezioneBottoni">
           <a href="prenotazioni.php" class="btn-rounded">Non hai una prenotazione?</a> 
        </div>
        
        <div class="sezioneDati">
        <form onSubmit="cercaPrenotazioni.php" method="POST">
                <input type="text" name="id" placeholder="Code prenotazione">
                <input type="email" name="email" placeholder="Indirizzo email">
                <input type="submit" value="Cerca prenotazione">
            </form>
        </div>
    </body>
</html>