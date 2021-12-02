<?php
    class ordinazione{
        private $conn;

        public function __construct($db){
            $this->conn = $db;
        }

        public function getOrdinazioni(){
            $query = 'SELECT o.idTavolo, m.nomePietanza, po.quantita
                        FROM ordinazioni AS o, menu AS m, pietanzeordinate AS po
                        WHERE po.idOrdinazione = o.idOrdinazione AND m.id = po.idPietanza AND o.preparato = 0;';

            $output = $this->conn->prepare($query);
            $output->execute();

            return $output;
        }

        public function setTempoAttesa($tempoAttesa, $tavolo){
            $query = 'UPDATE ordinazioni SET tempoAttesa = ' . $tempoAttesa . ' WHERE idTavolo = ' . $tavolo . ';';

            $output = $this->conn->prepare($query);

            if($output->execute()){
                return true;
            }

            print("Impossibile effettuare l'ordinazione! " . $output->error);

            return false;
        }
    }
?>