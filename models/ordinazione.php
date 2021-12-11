<?php
    class ordinazione{
        private $conn;

        public function __construct($db){
            $this->conn = $db;
        }

        public function getOrdinazioni(){
            $query = 'SELECT o.idTavolo, m.nomePietanza, po.quantita, o.idOrdinazione
                        FROM ordinazioni AS o, menu AS m, pietanzeordinate AS po
                        WHERE po.idOrdinazione = o.idOrdinazione AND m.id = po.idPietanza AND o.preparato = 0;';

            $output = $this->conn->prepare($query);
            $output->execute();

            return $output;
        }

        public function aggiungiOrdine($nTavolo, $nPersone, $listaPietanze){
            $query = 'INSERT INTO ordinazioni (personeOrdinanti, idTavolo, preparato, tempoAttesa)
                        VALUES (' . $nPersone . ' , ' . $nTavolo . ', 0, 0);';

            $output = $this->conn->prepare($query);

            if(!$output->execute()){
                print("Impossibile inserire l'ordinazione! " . $output->error);
            }

            $query = 'SELECT idOrdinazione
                        FROM ordinazioni
                        ORDER BY idOrdinazione DESC;';

            $output = $this->conn->prepare($query);
            
            if(!$output->execute()){
                print("Impossibile estrarre l'ultima ordinazione! " . $output->error);
            }

            $row = $output->fetch(PDO::FETCH_ASSOC);
            extract($row);

            foreach($listaPietanze as $pietanza) {
                $quantita = $pietanza->quantita;
                $idPietanza = $pietanza->idPietanza;

                if($quantita > 0){
                    $query = 'INSERT INTO pietanzeordinate (idOrdinazione, idPietanza, quantita)
                        VALUES (' . $idOrdinazione . ' , ' . $idPietanza . ' , ' . $quantita . ');';
                    
                    $output = $this->conn->prepare($query);

                    if(!$output->execute()){
                        print("Impossibile inserire le pietanze! " . $output->error);
                    }
                }
            }
        }

        public function setTempoAttesa($tempoAttesa, $idOrdinazione){
            $query = 'UPDATE ordinazioni SET tempoAttesa = ' . $tempoAttesa . ' WHERE idOrdinazione = ' . $idOrdinazione . ';';

            $output = $this->conn->prepare($query);

            if($output->execute()){
                return true;
            }

            print("Impossibile effettuare l'ordinazione! " . $output->error);

            return false;
        }

        public function setPreparato($idOrdinazione){
            $query = 'UPDATE ordinazioni SET preparato = 1 WHERE idOrdinazione = ' . $idOrdinazione . ';';

            $output = $this->conn->prepare($query);

            if($output->execute()){
                return true;
            }

            print("Impossibile effettuare l'ordinazione! " . $output->error);

            return false;
        }
    }
?>