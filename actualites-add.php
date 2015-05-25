<?php

use JacaDanseBack\Database;

require_once('autoload.php');

include 'src/checklogged.php';
include 'src/bddconnect.php';
$activePage = 'actualites';
$insertedFailed = false;

if (isset($_POST['titre'])) {
    $database = new Database();
    $database->connect();
    $inserted = $database->insertActualite($_POST['titre'], $_POST['description'], $_POST['date']);
    $database->close();

    debug($inserted);

    if ($inserted) {
        header("Location: actualites.php");
    } else {
        $insertedFailed = true;
    }
}

?>
<!DOCTYPE html>
<html lang="en">
  <?php include 'partial/dashboardheader.php' ?>
  <body>
    <?php include 'partial/navbar.php' ?>
    <div class="container-fluid">
        <div class="row">
            <?php include 'partial/menuleft.php' ?>
            <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
                <div class="page-header">
                    <h1>Ajouter une Actualité</h1>
                </div>

                <?php if ($insertedFailed) : ?>
                    <div class="alert alert-danger">Erreur lors de la création de l'actualité</div>
                <?php endif ?>

                <form action="actualites-add.php" method="POST">
                    <div class="form-group">
                        <label for="titre">Titre</label>
                        <input type="text" class="form-control" id="titre" name="titre" placeholder="Titre">
                    </div>
                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea class="form-control" rows="3" id="description" name="description" placeholder="Description"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="date">Date</label>
                        <input type="date" name="date" class="form-control" id="date">
                    </div>
                    <div class="form-group">
                        <label for="photo">Photo</label>
                        <input type="file" id="photo" name="photo">
                    </div>
                    <ul class="list-inline pull-right">
                        <li>
                            <a href="actualites.php" class="btn btn-default">Annuler</a>
                        </li>
                        <li>
                            <button type="submit" class="btn btn-success">
                                <span class="glyphicon glyphicon-ok"></span>
                                Créer
                            </button>
                        </li>
                    </ul>
                </form>
            </div>
        </div>
    </div>

  <?php include 'partial/scripts.php' ?>
  </body>
</html>
