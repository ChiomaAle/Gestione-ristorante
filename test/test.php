<!DOCTYPE html>
<html lang="it">
    <head>
        <title>Ristorante Ristorantoso</title>
        <meta name="viewport" content="width-device-width, initial-scale-1.0">
        <meta charset="UTF-8">
    </head>
    <body>
        <?php
            $start = microtime(true);

            function getOrdini(){
                $url = 'https://sitoristorante.ddns.net/api/cucina/getOrdinazioni.php';
                $response = file_get_contents($url);
                return $response;
            }

            function addOrdine(){
                $json = ("{\"nTavolo\": 1, \"nPersone\": 1, \"listaPietanze\": [{\"idPietanza\": 1, \"quantita\": 1}]}");

                $url = 'https://sitoristorante.ddns.net/api/cucina/aggiungiOrdine.php';
                $options = array(
                    'http' => array(
                        'header'  => "Content-type: application/json\r\n",
                        'method'  => 'POST',
                        'content' => $json
                    )
                );

                $context = stream_context_create($options);
                $result = file_get_contents($url, false, $context);
                return $result;
            }

            function setPreparato($idOrd){
                $json = ("{\"idOrdinazione\": $idOrd}");

                $url = 'https://sitoristorante.ddns.net/api/cucina/setPreparato.php';
                $options = array(
                    'http' => array(
                        'header'  => "Content-type: application/json\r\n",
                        'method'  => 'POST',
                        'content' => $json
                    )
                );

                $context = stream_context_create($options);
                $result = file_get_contents($url, false, $context);
                return $result;
            }

            function contains($string, $key){
                return(strpos($string, $key));
            }

            if(contains(getOrdini(), "Nessuna")){
                //Aggiunta ordine
                if(!contains(addOrdine(), "fatto")){
                    die("L'aggiunta dell'ordine è fallita");
                }
                
                $result = getOrdini();

                if(contains($result, "Nessuna")){
                    die("Non ci sono ordini aggiunti!");
                }

                $result = substr($result, 1, -1);
                $json = json_decode($result, true);

                if($json['idTavolo'] != 1){
                    die("Numero tavolo non corretto!");
                } 

                if($json['nomePietanza'] != "Insalata"){
                    die("Pietanza aggiunta non corretta!");
                } 

                if($json['quantita'] != 1){
                    die("Quantità aggiunta non corretta!");
                }

                
                $idOrd = $json['idOrdinazione'];
                if(!contains(setPreparato($idOrd), impostato)){
                    die("L'ordine non è stato impostato come preparato");
                }

                if(contains(getOrdini(), "Nessuna")){
                    print_r("Tutti i test case sono andati a buon fine.</br>");
                } else {
                    die("Non ci dovrebbero essere ordine non preparati, ma ci sono.");
                }
                
            } else {
                die("Ci sono ordini presenti, la prego di impostare tutti gli ordini come preparati.");
            }

            print_r("Tempo di esecuzione: " . (microtime(true) - $start)*60 . "ms");
        ?>
    </body>
</html>