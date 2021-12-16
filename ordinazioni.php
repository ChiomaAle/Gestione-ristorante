<!DOCTYPE html>
<html lang="it">
    <head>
        <title>Ristorante Ristorantoso</title>
        <meta name="viewport" content="width-device-width, initial-scale-1.0">
        <meta charset="UTF-8">
        <link rel="stylesheet" href="css/styleOrdinazioni.css">

    </head>
    <body>
        <?php
            if(isSet($_POST['nPersone'])){
                $nPersone = $_POST['nPersone'];
                $nTavolo = $_POST['nTavolo'];

                $json = ("{\"nTavolo\": " . $nTavolo . ",\"nPersone\": " . $nPersone . ", \"listaPietanze\": [");

                unset($_POST['nPersone']);
                unset($_POST['nTavolo']);
                
                foreach($_POST as $id => $qta){
                    $json = ($json . "{\"idPietanza\": " . $id . ",");
                    $json = ($json . "\"quantita\": " . $qta . "},");
                }

                $json = substr($json, 0, -1);
                $json = $json . "]}";

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

                header("Location:https://sitoristorante.ddns.net/ordineMandato.html");
            }

            $request = 'https://sitoristorante.ddns.net/api/menu/getPietanze.php';
            $response = file_get_contents($request);
            $json = json_decode($response, true);

            $nTavolo = 0;
            if(isset($_GET["nTavolo"])){
                $nTavolo = $_GET["nTavolo"];
            } else {
                die("Aprire il menù esclusivamente dal QR code!");
            }
        ?>

        <div class="topnavOrd">
            <div class="nTavolo">
                <a>Tavolo n° <?php echo $nTavolo;?></a>
            </div>
        </div>

        <div class="titoloPagina">
            <h1 class="titolo">
                Menù
            </h1>
        </div>

        <div class="categoriaContainer">
            <div class="categoria">
                <a href="#antipasti">Antipasti</a>
            </div>
            <div class="categoria">
                <a href="#primi">Primi</a>
            </div>
            <div class="categoria">
                <a href="#secondi">Secondi</a>
            </div>
            <div class="categoria">
                <a href="#bevande">Bevande</a>
            </div>
            <div class="categoria">
                <a href="#dolci">Dolci</a>
            </div>
        </div>

        <form onSubmit = "ordinazioni.php" method="POST">
            <div class="sezionePersone">
                <h1 class="intestazioneSezione">Per quante persone stai ordinando?</h1>
                <input type="number" name="nPersone" value=1 min=1 class="personeOrdinanti">
                <input type="hidden" name="nTavolo" value=<?php echo($nTavolo);?>>
            </div>
            <div class="sezioneAntipasti" id="antipasti">
                <h1 class="intestazioneSezione">Antipasti</h1>
                <?php
                    foreach ($json['data'] as $pietanza){
                        if($pietanza['idCategoria'] == 1){
                            $nome = $pietanza['nome'];
                            $desc = $pietanza['desc'];
                            $img = $pietanza['img'];
                            $id = $pietanza['id'];

                            ?>
                            <div class="pietanza">
                                <img class="imgPiatto" src="<?php echo $img;?>" alt="<?php echo $nome;?>">
                                <div class="descrizione">
                                    <h2><?php echo $nome;?></h2>
                                    <a><?php echo $desc;?></a>
                                </div>
                                <div class ="qtaPietanze">
                                    <label for="qtaPietanze"> Qtà </label>
                                    <input type="number" name=<?php echo $id;?> min=0 max=50 value=0>
                                </div>
                            </div>
                            <?php
                        }
                    }
                ?>
            </div>

            <div class="sezionePrimi" id="primi">
                <h1 class="intestazioneSezione">Primi</h1>
                <?php
                    foreach ($json['data'] as $pietanza){
                        if($pietanza['idCategoria'] == 2){
                            $nome = $pietanza['nome'];
                            $desc = $pietanza['desc'];
                            $img = $pietanza['img'];
                            $id = $pietanza['id'];

                            ?>
                            <div class="pietanza">
                                <img class="imgPiatto" src="<?php echo $img;?>" alt="<?php echo $nome;?>">
                                <div class="descrizione">
                                    <h2><?php echo $nome;?></h2>
                                    <a><?php echo $desc;?></a>
                                </div>
                                <div class ="qtaPietanze">
                                    <label for="qtaPietanze"> Qtà </label>
                                    <input type="number" name=<?php echo $id;?> min=0 max=50 value=0>
                                </div>
                            </div>
                            <?php
                        }
                    }
                ?>
            </div>

            <div class="sezioneSecondi" id="secondi">
                <h1 class="intestazioneSezione">Secondi</h1>
                <?php
                    foreach ($json['data'] as $pietanza){
                        if($pietanza['idCategoria'] == 3){
                            $nome = $pietanza['nome'];
                            $desc = $pietanza['desc'];
                            $img = $pietanza['img'];
                            $id = $pietanza['id'];

                            ?>
                            <div class="pietanza">
                                <img class="imgPiatto" src="<?php echo $img;?>" alt="<?php echo $nome;?>">
                                <div class="descrizione">
                                    <h2><?php echo $nome;?></h2>
                                    <a><?php echo $desc;?></a>
                                </div>
                                <div class ="qtaPietanze">
                                    <label for="qtaPietanze"> Qtà </label>
                                    <input type="number" name=<?php echo $id;?> min=0 max=50 value=0>
                                </div>
                            </div>
                            <?php
                        }
                    }
                ?>
            </div>

            <div class="sezioneBevande" id="bevande">
                <h1 class="intestazioneSezione">Bevande</h1>
                <?php
                    foreach ($json['data'] as $pietanza){
                        if($pietanza['idCategoria'] == 4){
                            $nome = $pietanza['nome'];
                            $desc = $pietanza['desc'];
                            $img = $pietanza['img'];
                            $id = $pietanza['id'];

                            ?>
                            <div class="pietanza">
                                <img class="imgPiatto" src="<?php echo $img;?>" alt="<?php echo $nome;?>">
                                <div class="descrizione">
                                    <h2><?php echo $nome;?></h2>
                                    <a><?php echo $desc;?></a>
                                </div>
                                <div class ="qtaPietanze">
                                    <label for="qtaPietanze"> Qtà </label>
                                    <input type="number" name=<?php echo $id;?> min=0 max=50 value=0>
                                </div>
                            </div>
                            <?php
                        }
                    }
                ?>
            </div>

            <div class="dolci" id="dolci">
                <h1 class="intestazioneSezione">Dolci</h1>
                <?php
                    foreach ($json['data'] as $pietanza){
                        if($pietanza['idCategoria'] == 5){
                            $nome = $pietanza['nome'];
                            $desc = $pietanza['desc'];
                            $img = $pietanza['img'];
                            $id = $pietanza['id'];

                            ?>
                            <div class="pietanza">
                                <img class="imgPiatto" src="<?php echo $img;?>" alt="<?php echo $nome;?>">
                                <div class="descrizione">
                                    <h2><?php echo $nome;?></h2>
                                    <a><?php echo $desc;?></a>
                                </div>
                                <div class ="qtaPietanze">
                                    <label for="qtaPietanze"> Qtà: </label>
                                    <input type="number" name=<?php echo $id;?> min=0 max=50 value=0>
                                </div>
                            </div>
                            <?php
                        }
                    }
                ?>
            </div>

            <input type="submit" value="Invia ordine">
        </form>
    </body>
</html>