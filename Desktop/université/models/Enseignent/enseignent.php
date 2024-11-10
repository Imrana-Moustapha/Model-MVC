<?php

    require_once("../models/Provider.php");

    final class Enseignent {

        public function __construct() {
            
        }

        public function add(string $nom = "", string $prenom = "", $sexe = '', string $email = "", string $adress = "")
        {
            $cons = new Provider();
            $add = $cons->connection()->prepare("INSERT INTO enseignent(nom, prenom, sexe, email, adresse) VALUES (:nom, :prenom, :sexe, :email, :adresse)");
            $add->execute([
                'nom' => $nom,
                'prenom' => $prenom,
                'sexe' => $sexe,
                'email' => $email,
                'adresse' => $adress
            ]);
        }

        public function edit(int $id = 0, string $nom = "", string $prenom = "", $sexe = '', string $email = "", string $adress = "")
        {
            $cons = new Provider();
            $edit = $cons->connection()->prepare("UPDATE enseignent SET nom = :nom, prenom = :prenom, sexe = :sexe, email = :email, adresse = :adresse WHERE id = :id");
            $edit->bindParam(':nom', $nom);
            $edit->bindParam(':prenom', $prenom);
            $edit->bindParam(':sexe', $sexe);
            $edit->bindParam(':email', $email);
            $edit->bindParam(':adresse', $adress);
            $edit->bindParam(':id', $id);
            $edit->execute();
        }


        public function getByMatricule()
        {

        }

        public function getAll()
        {
            $cons = new Provider();
            $edit = $cons->connection()->query("SELECT * FROM enseignent");
            $edit->execute();
            return $edit->fetchAll(PDO::FETCH_OBJ);
        }

        public function delete($id)
        {
            $cons = new Provider();
            $delete = $cons->connection()->prepare("DELETE FROM enseignent WHERE id = $id");
            $delete->execute();
        }
        
    }
    