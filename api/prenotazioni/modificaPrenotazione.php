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
    $nome = $dati->nome;
    $email = $dati->email;
    $numPosti = $dati->numPosti;
    $dataOra = $dati->dataOra;
    $out = $pre->modificaPrenotazione($id, $nome, $email, $numPosti, $dataOra);

    echo json_encode($out);
?>