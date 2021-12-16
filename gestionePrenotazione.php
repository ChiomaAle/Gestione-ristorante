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
            if(isSet($_GET['id'])){
                $id = $_GET['id'];
                $nome = $_GET['nome'];
                $email = $_GET['email'];
                $numPosti = $_GET['numPosti'];
                $dataOra = $_GET['dataOra'];
            } else {
                if($_REQUEST['submit_btn']=="Invia modifica"){
                    $del = $_GET['del'];
                    $id = $_POST['id'];
                    $nome = $_POST['nome'];
                    $email = $_POST['email'];
                    $numPosti = $_POST['numPosti'];
                    $dataOra = $_POST['dataOra'];

                    $dataOra = str_replace("T"," ", $dataOra);
                    $dataOra = $dataOra . ":00";

                    $json = ("{\"id\": \"$id\",\"nome\": \"$nome\",\"email\": \"$email\", \"numPosti\": \"$numPosti\", \"dataOra\": \"$dataOra\"}");
                    $url = 'https://sitoristorante.ddns.net/api/prenotazioni/modificaPrenotazione.php';
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
                    $id = $json['id'];

                    header("Location:https://sitoristorante.ddns.net/modificaEffettuata.php?id=".$id);
                    
                } else {
                    $id = $_POST['id'];
                    $json = ("{\"id\": \"$id\"}");

                    $url = 'https://sitoristorante.ddns.net/api/prenotazioni/cancellaPrenotazione.php?del=1';
                    $options = array(
                        'http' => array(
                            'header'  => "Content-type: application/json\r\n",
                            'method'  => 'POST',
                            'content' => $json
                        )
                    );
            
                    $context = stream_context_create($options);
                    $result = file_get_contents($url, false, $context);

                    header("Location:https://sitoristorante.ddns.net/modificaEffettuata.php");
                }
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
                Gestisci una prenotazione
            </h1>
        </div>
        
        <div class="sezioneDati">
        <form action="gestionePrenotazione.php" method="POST">
                <input type="hidden" name="id" value="<?php echo $id; ?>">
                <input type="text" name="nome" placeholder="Nome e cognome" required value="<?php echo $nome; ?>">
                <input type="email" name="email" placeholder="Indirizzo email" required value="<?php echo $email; ?>">
                <input type="number" name="numPosti" placeholder="Numero di posti" min="1" max="30" required value=<?php echo $numPosti; ?>>
                <p>Inserisci la data e l'ora</p>
                <input type="datetime-local" name="dataOra" required value="<?php echo $dataOra; ?>">
                <input type="submit" name="submit_btn" value="Invia modifica">
                <input type="submit" name="submit_btn" value="Cancella prenotazione">
            </form>
        </div>
    </body>
</html>