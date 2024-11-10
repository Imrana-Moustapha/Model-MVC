<?php

    require_once("../models/Provider.php");

    final class Salle {

        public function __construct() {
            
        }

        public function add(string $libelle = "", int $place = 0)
        {
            $cons = new Provider();
            $add = $cons->connection()->prepare("INSERT INTO salle(libelle, place) VALUES (:libelle, :place)");
            $add->execute([
                'libelle' => $libelle,
                'place' => $place,
            ]);
        }

        public function edit(int $id = 0, string $libelle = "", int $place = 0)
        {
            $cons = new Provider();
            $edit = $cons->connection()->prepare("UPDATE salle SET libelle = :libelle, place = :place WHERE id = :id");
            $edit->bindParam(':libelle', $libelle);
            $edit->bindParam(':place', $place);
            $edit->bindParam(':id', $id);
            $edit->execute();
        }


        public function getByMatricule(int $id = 0)
        {

        }

        public function getAll()
        {
            $cons = new Provider();
            $edit = $cons->connection()->query("SELECT * FROM salle");
            $edit->execute();
            return $edit->fetchAll(PDO::FETCH_OBJ);
        }

        public function delete(int $id = 0)
        {
            $cons = new Provider();
            $delete = $cons->connection()->prepare("DELETE FROM salle WHERE id = $id");
            $delete->execute();
        }
        
    }
    
