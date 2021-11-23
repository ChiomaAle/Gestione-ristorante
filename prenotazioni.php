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
                Prenota un tavolo
            </h1>
        </div>

        <div class="sezioneBottoni">
           <a href="gestionePrenotazioni.php" class="btn-rounded">Hai già una prenotazione?</a> 
        </div>
        
        <div class="sezioneDati">
        <form action="creaPrenotazione.php" method="POST">
                <input type="text" name="nome" placeholder="Nome e cognome" required>
                <input type="email" name="email" placeholder="Indirizzo email" required>
                <input type="number" name="posti" placeholder="Numero di posti" min="1" max="30" required>
                <p>Inserisci la data e l'ora</p>
                <input type="datetime-local" name="data" required>
                <input type="submit" value="Invia prenotazione">
            </form>
        </div>
    </body>
</html>