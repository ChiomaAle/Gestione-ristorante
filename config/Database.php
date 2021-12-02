<?php
    class Database {
        private $host = 'localhost';
        private $nome = 'db_ristorante';
        private $usr = 'user';
        private $psw = 'ciaone';
        private $conn;

        public function connect() {
            $this->conn = null;

            try{
                $this->conn = new PDO('mysql:host='.$this->host.';dbname='.$this->nome, $this->usr, $this->psw);
                $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch(PDOException $e){
                echo 'Connection error: ' . $e->getMessage();
            }

            return $this->conn;
        }
    }
?>