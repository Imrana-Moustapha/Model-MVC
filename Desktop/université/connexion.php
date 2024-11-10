<?php

    require_once("models/Provider.php");

    $PDO = new Provider();

    if(isset($_POST['connecter'])) {
        $cons = $PDO->connection()->prepare("SELECT * FROM login WHERE email=? AND passe=?");
        $cons->execute([$_POST['email'], $_POST['passe']]);
        $tab = $cons->fetch(PDO::FETCH_OBJ);
        if($tab->email == $_POST["email"] && $tab->passe == $_POST["passe"]) {
            header("location:form.php");
        } else {
            header("location:login.php");
        }
    }

    if(isset($_POST['inscrire'])) {
        $cons = $PDO->connection()->prepare('INSERT INTO login (nom, prenom, email, sexe, passe) VALUES (:nom, :prenom, :email, :sexe, :passe)');
        if($cons->execute([
            'nom' => $_POST["nom"],
            'prenom' => $_POST["prenom"],
            'email' => $_POST["email"],
            'sexe' => $_POST["sexe"],
            'passe' => $_POST["passe"]
        ])) {
            header("location:index.php");
        }
        
    }