<?php
    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');
    header('Access-Control-Allow-Methods: POST');
    header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Access-Control-Allow-Methods, Authorization, X.Requested.With');

    include_once '../../config/Database.php';
    include_once '../../models/ordinazione.php';

    $database = new Database();
    $db = $database->connect();

    $ord = new Ordinazione($db);
    
    $dati = json_decode(file_get_contents("php://input"));

    $tempoAttesa = $dati->tempoAttesa;
    $tavolo = $dati->tavolo;

    if($ord->setTempoAttesa($tempoAttesa, $tavolo)){
        echo json_encode(array('message' => 'Tempo di attesa aggiunto!'));
    } else {
        echo json_encode(array('message' => 'Errore, tempo di attesa non aggiunto!'));
    }
?>