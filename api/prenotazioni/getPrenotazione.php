<?php
    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');

    include_once '../../config/Database.php';
    include_once '../../models/prenotazione.php';

    $database = new Database();
    $db = $database->connect();

    $pre = new Prenotazione($db);

    $dati = json_decode(file_get_contents("php://input"));

    $id = $dati->id;
    $email = $dati->email;

    $output = $pre->getPrenotazione($id, $email);
    
    $count = $output->rowCount();
    if($count > 0){
        $row = $output->fetch(PDO::FETCH_ASSOC);
        extract($row);

        $prenotazione = array(
            'id' => $id,
            'nome' => $nome,
            'email' => $email,
            'numPosti' => $numPosti,
            'dataOra' => $dataOra
        );

        echo json_encode($prenotazione);
    } else {
        echo json_encode(array('message' => 'Nessuna prenotazione trovata!'));
    }
?>