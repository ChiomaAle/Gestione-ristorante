<!DOCTYPE html>
<html lang="it">
    <head>
        <title>Ristorante Ristorantoso</title>
        <meta name="viewport" content="width-device-width, initial-scale-1.0">
        <meta charset="UTF-8">
        <link rel="stylesheet" href="stylePrenotazioni.css">

    </head>
    <body>
        <?php
            $host = "localhost";
            if(isSet($_POST['nome'])){
                $connection = new mysqli($host, "user", "ciaone") or die("Connessione fallita");

                $nome = $_POST['nome'];
                $email = $_POST['email'];
                $posti = $_POST['posti'];
                $data = $_POST['data'];
                $sql = "SELECT SUM(numPosti as np) FROM db_ristorante.prenotazioni WHERE dataOra='" . $data . "';";
                $success = false;

                $result = $connection->query($sql);

                if($result->num_rows > 0){
                    $row = $result->fetch_assoc();
                    if($row["np"] + $posti <= 100){
                        $success = true;
                    }
                }
                
                if($success){
                    $sql = "INSERT INTO db_ristorante.prenotazioni (nome, email, numPosti, dataOra) VALUES ('" . $nome . "', '" . $email . "', '" . $posti . "', '" . $data . "');";

                    if(!mysqli_query($connection, $sql)){
                        die("Impossibile completare l'utente");
                    }

                    ?>
                    <div class="sezioneRisultato">

                    </div>
                    <?php
                }
                
            } else{
                echo "Non c'è una sega nel post!";
            }
        ?>
    </body>
</html>