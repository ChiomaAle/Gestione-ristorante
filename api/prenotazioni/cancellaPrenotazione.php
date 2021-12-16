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
    
    $id = $dati->id;

    $out = $pre->cancellaPrenotazione($id);

    echo json_encode("Prenotazione eliminata con successo!");
?>