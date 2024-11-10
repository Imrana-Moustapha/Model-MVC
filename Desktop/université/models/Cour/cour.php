<?php

    require_once("../models/Provider.php");

    final class Cour {

        public function __construct() {
            
        }

        public function add(string $libelle = "", string $niveau = "", int $idEn = 0, int $idSal = 0)
        {
            $cons = new Provider();
            $add = $cons->connection()->prepare("INSERT INTO cour(libelle, niveau, idEn, idSal) VALUES (:libelle, :niveau, :idEn, :idSal)");
            $add->execute([
                'libelle' => $libelle,
                'niveau' => $niveau,
                'idEn' => $idEn,
                'idSal' => $idSal
            ]);
        }

        public function edit(int $id = 0, string $libelle = "", string $niveau = "", int $idEn = 0, int $idSal = 0)
        {
            $cons = new Provider();
            $edit = $cons->connection()->prepare("UPDATE cour SET libelle = :libelle, niveau = :niveau, idEn = :idEn, idSal = :idSal WHERE id = :id");
            $edit->bindParam(':libelle', $libelle);
            $edit->bindParam(':niveau', $niveau);
            $edit->bindParam(':idEn', $idEn);
            $edit->bindParam(':idSal', $idSal);
            $edit->bindParam(':id', $id);
            $edit->execute();
        }

        public function getAll()
        {
            $cons = new Provider();
            $edit = $cons->connection()->query("SELECT * FROM cour");
            $edit->execute();
            return $edit->fetchAll(PDO::FETCH_OBJ);
        }

        public function delete($id)
        {
            $cons = new Provider();
            $delete = $cons->connection()->prepare("DELETE FROM cour WHERE id = $id");
            $delete->execute();
        }
        
    }
    