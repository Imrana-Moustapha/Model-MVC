<?php

    var_dump($_POST);

    require('../models/Salle/salle.php');

    $salle = new Salle();

    if(isset($_POST['ajouter'])) {
        $salle->add($_POST['libelle'], $_POST['place']);
        header("Location:../views/ListSalle.php");
    }

    if(isset($_POST['modifier'])) {
        $salle->edit(
            $_POST['id'],
            $_POST['libelle'],
            $_POST['place']
        );
        header("Location:../views/ListSalle.php");
    }

    if($_GET['action'] == "supprimer") {
        $salle->delete($_GET['id']);
        header("Location:../views/ListSalle.php");
    }