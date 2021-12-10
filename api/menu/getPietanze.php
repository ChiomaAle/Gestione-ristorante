<?php
    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');

    include_once '../../config/Database.php';
    include_once '../../models/menu.php';

    $database = new Database();
    $db = $database->connect();

    $menu = new Menu($db);
    $output = $menu->getPietanze();

    $count = $output->rowCount();
    if($count > 0){
        $arrPietanze = array();
        $arrPietanze['data'] = array();

        while($row = $output->fetch(PDO::FETCH_ASSOC)){
            extract($row);

            $pietanza = array(
                'id' => $id,
                'nome' => $nomePietanza,
                'desc' => $descrizione,
                'prezzo' => $prezzo,
                'idCategoria' => $idCategoria,
                'img' => $immagine
            );

            array_push($arrPietanze['data'], $pietanza);
        }

        echo json_encode($arrPietanze);
    } else {
        echo json_encode(array('message' => 'Nessuna pietanza trovata!'));
    }
?>