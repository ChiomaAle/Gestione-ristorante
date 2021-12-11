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
    
    $nTavolo = $dati->nTavolo;
    $nPersone = $dati->nPersone;
    $listaPietanze = $dati->listaPietanze;

    $ord->aggiungiOrdine($nTavolo, $nPersone, $listaPietanze);
    echo json_encode(array('message' => 'Ho fatto qualcosa!'));  
?>