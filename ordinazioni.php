<!DOCTYPE html>
<html lang="it">
    <head>
        <title>Ristorante Ristorantoso</title>
        <meta name="viewport" content="width-device-width, initial-scale-1.0">
        <meta charset="UTF-8">
        <link rel="stylesheet" href="styleMenu.css">

    </head>
    <body>
        <?php
            $host = "localhost";
            $connection = new mysqli($host, "user", "ciaone");
            
            $request = 'http://localhost/api/menu/getPietanze.php';
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

        <form action = "mandaOrdine.php" method="post">
            <div class="sezionePersone">
                <h1 class="intestazioneSezione">Per quante persone stai ordinando?</h1>
                <input type="number" id="nPersone" value="1" class="personeOrdinanti">
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
                                    <input type="number" id=<?php echo "qta_" . $id;?> value=0>
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
                                    <input type="number" id=<?php echo "qta_" . $id;?> value=0>
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
                                    <input type="number" id=<?php echo "qta_" . $id;?> value=0>
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
                                    <input type="number" id=<?php echo "qta_" . $id;?> value=0>
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
                                    <input type="number" id=<?php echo "qta_" . $id;?> value=0>
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