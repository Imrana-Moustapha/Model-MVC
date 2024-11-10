<?php

    require('../models/Cour/cour.php');

    $cour = new cour();

    var_dump($_POST);

    if(isset($_POST['ajouter'])) {
        $cour->add(
            $_POST['libelle'],
            $_POST['niveau'],
            $_POST['idEn'],
            $_POST['idSal']
        );
        header("Location:../views/ListCour.php");
    }

    if(isset($_POST['modifier'])) {
        $cour->edit(
            $_POST['id'],
            $_POST['libelle'],
            $_POST['niveau'],
            $_POST['idEn'],
            $_POST['idSal']
        );
        header("Location:../views/ListCour.php");
    }

    if($_GET['action'] == "supprimer") {
        $cour->delete( $_GET['id']);
        header("Location:../views/ListCour.php");
    }
    