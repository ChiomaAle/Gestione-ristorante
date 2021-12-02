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