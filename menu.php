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
            
        ?>

        <div class="topnav">
            <div class="navElements">
                <a href="index.html">Home</a>
                <a href="">Menù</a>
                <a href="prenotazioni.php">Prenotazioni</a>
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

        <div class="sezioneAntipasti" id="antipasti">
            <h1 class="intestazioneSezione">Antipasti</h1>
            <?php
                $sql = "SELECT nomePietanza, descrizione, immagine FROM db_ristorante.menu WHERE idCategoria=1";
                $result = $connection->query($sql) or die($connection->error);

                while($row = $result->fetch_assoc()){
                    $nome = $row['nomePietanza'];
                    $descrizione = $row['descrizione'];
                    $immagine  = $row['immagine'];
                    ?>
                        <div class="pietanza">
                            <img class="imgPiatto" src="<?php echo $immagine;?>" alt="<?php echo $nome;?>">
                            <div class="descrizione">
                                <h2><?php echo $nome;?></h2>
                                <a><?php echo $descrizione;?></a>
                            </div>
                        </div>
                    <?php
                }
            ?>
        </div>

        <div class="sezionePrimi" id="primi">
            <h1 class="intestazioneSezione">Primi</h1>
            
            <?php
                $sql = "SELECT nomePietanza, descrizione, immagine FROM db_ristorante.menu WHERE idCategoria=2";
                $result = $connection->query($sql) or die($connection->error);

                while($row = $result->fetch_assoc()){
                    $nome = $row['nomePietanza'];
                    $descrizione = $row['descrizione'];
                    $immagine  = $row['immagine'];
                    ?>
                        <div class="pietanza">
                            <img class="imgPiatto" src="<?php echo $immagine;?>" alt="<?php echo $nome;?>">
                            <div class="descrizione">
                                <h2><?php echo $nome;?></h2>
                                <a><?php echo $descrizione;?></a>
                            </div>
                        </div>
                    <?php
                }
            ?>
        </div>

        <div class="sezioneSecondi" id="secondi">
            <h1 class="intestazioneSezione">Secondi</h1>
            
            <?php
                $sql = "SELECT nomePietanza, descrizione, immagine FROM db_ristorante.menu WHERE idCategoria=3";
                $result = $connection->query($sql) or die($connection->error);

                while($row = $result->fetch_assoc()){
                    $nome = $row['nomePietanza'];
                    $descrizione = $row['descrizione'];
                    $immagine  = $row['immagine'];
                    ?>
                        <div class="pietanza">
                            <img class="imgPiatto" src="<?php echo $immagine;?>" alt="<?php echo $nome;?>">
                            <div class="descrizione">
                                <h2><?php echo $nome;?></h2>
                                <a><?php echo $descrizione;?></a>
                            </div>
                        </div>
                    <?php
                }
            ?>
        </div>

        <div class="sezioneBevande" id="bevande">
            <h1 class="intestazioneSezione">Bevande</h1>
            
            <?php
                $sql = "SELECT nomePietanza, descrizione, immagine FROM db_ristorante.menu WHERE idCategoria=4";
                $result = $connection->query($sql) or die($connection->error);

                while($row = $result->fetch_assoc()){
                    $nome = $row['nomePietanza'];
                    $descrizione = $row['descrizione'];
                    $immagine  = $row['immagine'];
                    ?>
                        <div class="pietanza">
                            <img class="imgPiatto" src="<?php echo $immagine;?>" alt="<?php echo $nome;?>">
                            <div class="descrizione">
                                <h2><?php echo $nome;?></h2>
                                <a><?php echo $descrizione;?></a>
                            </div>
                        </div>
                    <?php
                }
            ?>
        </div>

        <div class="dolci" id="dolci">
            <h1 class="intestazioneSezione">Dolci</h1>
            
            <?php
                $sql = "SELECT nomePietanza, descrizione, immagine FROM db_ristorante.menu WHERE idCategoria=5";
                $result = $connection->query($sql) or die($connection->error);

                while($row = $result->fetch_assoc()){
                    $nome = $row['nomePietanza'];
                    $descrizione = $row['descrizione'];
                    $immagine  = $row['immagine'];
                    ?>
                        <div class="pietanza">
                            <img class="imgPiatto" src="<?php echo $immagine;?>" alt="<?php echo $nome;?>">
                            <div class="descrizione">
                                <h2><?php echo $nome;?></h2>
                                <a><?php echo $descrizione;?></a>
                            </div>
                        </div>
                    <?php
                }
            ?>
        </div>

        <div class="sezioneContatti">
            <h1>Contatti</h1>
            <div>
                Potrete contattarci mediate i seguenti mezzi:
                <ul class="listaContatti">
                    <li>E-Mail: contact@nomeristorante.it</li>
                    <li>Telefono: 0461 420690</li>
                    <li>Indirizzo: via Sommarive 9, Povo (TN)</li>
                </ul>
            </div>
            <div>
                Oppure tramite i seguenti social network:
                <div class="socialContainer">
                    <a href="https://it-it.facebook.com/" target="_blank">
                        <img class="icon" src="svg/facebook.svg">
                    </a>
                    <a href="https://www.instagram.com/" target="_blank">
                        <img class="icon" src="svg/instagram.svg">
                    </a>
                    <a href="https://www.tripadvisor.it/" target="_blank">
                        <img class="icon" src="svg/tripadvisor.svg">
                    </a>
                </div>
            </div>
        </div>
    </body>
</html>