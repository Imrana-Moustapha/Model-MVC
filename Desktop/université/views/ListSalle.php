<?php
require_once("../models/Salle/salle.php");
$salle = new Salle();
$objet = $salle->getAll();
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <title> Liste des Salles </title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link href="../css/main.css" rel="stylesheet">
</head>

<body>
    <!-- Navigation-->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container px-5">
            <a class="navbar-brand" href="index.html">Université</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <li class="nav-item"><a class="nav-link" href="../index.php">Acceuil</a></li>
                    <li class="nav-item"><a class="nav-link" href="../login.php"> Connexion </a></li>
                    <li class="nav-item"><a class="nav-link" href="../inscrire.php">S'incrire</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <br> <br> <br> <br>
    <h1 style="text-align: center;"> Listes des Salles </h1> <br>
    <p style="padding-left: 32%;"> <a href="../views/AjoutSalle.php"> Ajouter </a> </p>
    <table>
        <thead>
            <tr>
                <th>&nbsp; ID &nbsp;</th>
                <th>&nbsp; LIBELLE &nbsp;</th>
                <th>&nbsp; PLACE &nbsp;</th>
                <th colspan="2">&nbsp; OPERATION &nbsp;</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <?php
                foreach ($objet as $key) {
                ?>
            <tr>
                <td>&nbsp; <?= $key->id ?> &nbsp;</td>
                <td>&nbsp; <?= $key->libelle ?> &nbsp;</td>
                <td>&nbsp; <?= $key->place ?> &nbsp;</td>
                <td style="color: green;">&nbsp; <a href="../views/EditSalle.php?id=<?= $key->id ?>"> MODIFIER </a> &nbsp;</td>
                <td>&nbsp; <a href="../controllers/salle.php?action=supprimer&id=<?= $key->id ?>"> SUPPRIMER </a> &nbsp;</td>
            </tr>
        <?php
                }
        ?>
        </tr>
        </tbody>
    </table>
</body>

</html>