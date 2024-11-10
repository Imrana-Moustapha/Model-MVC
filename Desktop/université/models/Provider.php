<?php

    class Provider
    {
        private $serve = "localhost";
        private $user = "root";
        private $password = "";
        private $database = "universite";
        private $port = 3306;

        public function connection() {
            try {
                $cons = new PDO("mysql:host=$this->serve;dbname=$this->database;port=$this->port", $this->user, $this->password);
                $cons->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                return $cons;
            } catch (PDOException $th) {
                die("Erreur : ".$th->getMessage());
            }
        }
    }
    
