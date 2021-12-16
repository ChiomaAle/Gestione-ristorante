<?php
    class Prenotazione{
        private $conn;

        public function __construct($db){
            $this->conn = $db;
        }

        public function getPrenotazione($id, $email){
            $query = 'SELECT id, nome, email, numPosti, dataOra 
                        FROM db_ristorante.prenotazioni
                        WHERE id = \'' . $id . '\' AND email = \'' . $email . '\';';

            $output = $this->conn->prepare($query);
            $output->execute();

            return $output;
        }

        public function addPrenotazione($nome, $email, $numPosti, $dataOra){
            $query = 'INSERT INTO prenotazioni (nome, email, numPosti, dataOra)
                        VALUES (\'' . $nome . '\', \'' . $email . '\',\'' . $numPosti . '\', \''. $dataOra . '\');';

            $output = $this->conn->prepare($query);
            $output->execute();

            $query = 'SELECT MAX(id) as id FROM prenotazioni;';

            $output = $this->conn->prepare($query);
            $output->execute();

            return $output;
        }

        public function modificaPrenotazione($id, $nome, $email, $numPosti, $dataOra){
            $this->cancellaPrenotazione($id);
            $out = $this->addPrenotazione($nome, $email, $numPosti, $dataOra);

            $row = $out->fetch(PDO::FETCH_ASSOC);
            extract($row);
            $prenotazione = array(
                'id' => $id
            );

            return $prenotazione;

        }

        public function cancellaPrenotazione($id){
            $query = 'DELETE FROM prenotazioni WHERE id = \'' . $id . '\';';

            $output = $this->conn->prepare($query);
            $output->execute();
        }
    }
?>