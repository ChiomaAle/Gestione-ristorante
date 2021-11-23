<!DOCTYPE html>
<html lang="it">
    <head>
        <title>Ristorante Ristorantoso</title>
        <meta name="viewport" content="width-device-width, initial-scale-1.0">
        <meta charset="UTF-8">
        <link rel="stylesheet" href="stylePrenotazioni.css">

    </head>
    <body>
        <div class="topnav">
            <div class="navElements">
                <a href="index.html">Home</a>
                <a href="menu.php">Menù</a>
                <a href="">Prenotazioni</a>
            </div>
        </div>

        <div class="titoloPagina">
            <h1 class="titolo">
                Gestisci prenotazioni
            </h1>
        </div>

        <div class="sezioneBottoni">
           <a href="prenotazioni.php" class="btn-rounded">Vuoi prenotare un tavolo?</a> 
        </div>
        
        <div class="sezioneDati">
        <form action="" action="post">
                <input type="text" name="nome" placeholder="Nome e cognome">
                <input type="email" name="email" placeholder="Indirizzo email">
                <input type="number" name="posti" placeholder="Numero di posti">
                <p>Inserisci la data e l'ora</p>
                <input type="datetime-local" name="data">
                <input type="submit" value="Modifica prenotazione">
            </form>
        </div>
    </body>
</html>