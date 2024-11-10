<?php

    require('../models/Etudiant/etudiant.php');

    $etudiant = new Etudiant();

    if(isset($_POST['ajouter'])) {
        $etudiant->add($_POST['nom'], $_POST['prenom'], $_POST['sexe']);
        header("Location:../views/ListEtudiant.php");
    }

    if(isset($_POST['modifier'])) {
        $etudiant->edit(
            $_POST['id'],
            $_POST['nom'],
            $_POST['prenom'],
            $_POST['sexe']
        );
        header("Location:../views/ListEtudiant.php");
    }

    if($_GET['action'] == "supprimer") {
        $etudiant->delete($_GET['id']);
        header("Location:../views/ListEtudiant.php");
    }