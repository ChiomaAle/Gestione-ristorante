<?php 
    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');
    header('Access-Control-Allow-Methods: POST');

    include_once '../../config/Database.php';
    include_once '../../models/prenotazione.php';

    $database = new Database();
    $db = $database->connect();

    $pre = new Prenotazione($db); 
    
    $dati = json_decode(file_get_contents("php://input"));
    
    $nome = $dati->nome;
    $email = $dati->email;
    $numPosti = $dati->numPosti;
    $dataOra = $dati->dataOra;

    $out = $pre->addPrenotazione($nome, $email, $numPosti, $dataOra);

    $row = $out->fetch(PDO::FETCH_ASSOC);
    extract($row);
    $prenotazione = array(
        'id' => $id
    );
    echo json_encode($prenotazione);
?>