<?php

    require('../models/Enseignent/enseignent.php');

    $enseignent = new Enseignent();

    if(isset($_POST['ajouter'])) {
        $enseignent->add(
            $_POST['nom'],
            $_POST['prenom'],
            $_POST['sexe'],
            $_POST['email'],
            $_POST['adresse']
        );
        header("Location:../views/ListEnseignent.php");
    }

    if(isset($_POST['modifier'])) {
        $enseignent->edit(
            $_POST['id'],
            $_POST['nom'],
            $_POST['prenom'],
            $_POST['sexe'],
            $_POST['email'],
            $_POST['adresse']
        );
        header("Location:../views/ListEnseignent.php");
    }

    if($_GET['action'] == "supprimer") {
        $enseignent->delete( $_GET['id']);
        header("Location:../views/ListEnseignent.php");
    }
    