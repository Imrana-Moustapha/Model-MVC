<?php

    require_once("../models/Provider.php");

    final class Etudiant {

        public function __construct() {
            
        }

        public function add(string $nom = "", string $prenom = "", $sexe = '')
        {
            $cons = new Provider();
            $add = $cons->connection()->prepare("INSERT INTO etudiant(nom, prenom, sexe) VALUES (:nom, :prenom, :sexe)");
            $add->execute([
                'nom' => $nom,
                'prenom' => $prenom,
                'sexe' => $sexe
            ]);
        }

        public function edit(int $id = 0, string $nom = "", string $prenom = "", $sexe = '')
        {
            $cons = new Provider();
            $edit = $cons->connection()->prepare("UPDATE etudiant SET nom = :nom, prenom = :prenom, sexe = :sexe WHERE id = :id");
            $edit->bindParam(':nom', $nom);
            $edit->bindParam(':prenom', $prenom);
            $edit->bindParam(':sexe', $sexe);
            $edit->bindParam(':id', $id);
            $edit->execute();
        }


        public function getByMatricule(int $id = 0)
        {

        }

        public function getAll()
        {
            $cons = new Provider();
            $edit = $cons->connection()->query("SELECT * FROM etudiant");
            $edit->execute();
            return $edit->fetchAll(PDO::FETCH_OBJ);
        }

        public function delete(int $id = 0)
        {
            $cons = new Provider();
            $delete = $cons->connection()->prepare("DELETE FROM etudiant WHERE id = $id");
            $delete->execute();
        }
        
    }
    