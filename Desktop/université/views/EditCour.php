<?php
require_once("../models/Provider.php");
$id = $_GET['id'];
$cons = new Provider();
$edit = $cons->connection()->prepare("SELECT * FROM cour WHERE id = :id");
$edit->bindParam(':id', $id);
$edit->execute();
$key = $edit->fetch(PDO::FETCH_OBJ);
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <title> Modification Cour</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="../css/bootstrap.min.css" rel="stylesheet">
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
    <form action="../controllers/cour.php" method="POST">
        <div class="container">
            <div class="row">
                <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
                    <div class="card border-0 shadow rounded-3 my-5">
                        <div class="card-body p-4 p-sm-5">
                            <h3 class="card-title text-center mb-5 fw-light fs-5">Cour</h3>
                            <form action="connexion.php" method="POST">
                                <input type="hidden" name="id" value="<?= $key->id ?>">
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" id="floatingInput" name="libelle" placeholder="<?php $key->libelle ?>" required>
                                    <label for="floatingInput">Libelle</label>
                                </div>
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" id="floatingInput" name="niveau" placeholder="<?php $key->niveau ?>" required>
                                    <label for="floatingInput">Niveau</label>
                                </div>
                                <input type="hidden" name="idEn" value="<?= $key->idEn ?>">
                                <input type="hidden" name="idSal" value="<?= $key->idSal ?>">
                                <div class="d-grid">
                                    <button class="btn btn-primary btn-login text-uppercase fw-bold" type="submit" name="modifier"> Modifier </button>
                                </div>
                                <hr class="my-4">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</body>

</html>