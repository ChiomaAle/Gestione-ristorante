<?php
    class menu{
        private $conn;
        private $table = 'menu';

        public function __construct($db){
            $this->conn = $db;
        }

        public function getPietanze(){
            $query = 'SELECT id, nomePietanza, descrizione, prezzo, idCategoria, immagine 
                        FROM db_ristorante.'.$this->table.';';

            $output = $this->conn->prepare($query);
            $output->execute();

            return $output;
        }
    }
?>