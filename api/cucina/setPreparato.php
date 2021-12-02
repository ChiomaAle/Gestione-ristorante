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

    $idOrdinazione = $dati->idOrdinazione;

    if($ord->setPreparato($idOrdinazione)){
        echo json_encode(array('message' => 'Ordine impostato come preparato'));
    } else {
        echo json_encode(array('message' => 'Errore, impossibile impostare \' ordine come preparato!'));
    }
?>