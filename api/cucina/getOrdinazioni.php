<?php
    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');

    include_once '../../config/Database.php';
    include_once '../../models/ordinazione.php';

    $database = new Database();
    $db = $database->connect();

    $ord = new Ordinazione($db);
    $output = $ord->getOrdinazioni();

    $count = $output->rowCount();
    if($count > 0){
        $arrOrdinazioni = array();

        while($row = $output->fetch(PDO::FETCH_ASSOC)){
            extract($row);

            $ordine = array(
                'idTavolo' => $idTavolo,
                'nomePietanza' => $nomePietanza,
                'quantita' => $quantita,
                'idOrdinazione' => $idOrdinazione
            );

            array_push($arrOrdinazioni, $ordine);
        }

        echo json_encode($arrOrdinazioni);
    } else {
        echo json_encode(array('message' => 'Nessuna ordinazione trovata!'));
    }
?>