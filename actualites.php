<?php

require_once('autoload.php');

include 'src/checklogged.php';
include 'src/bddconnect.php';
$activePage = 'actualites';
$actualites = $database->fetchActualites();

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
                    <ul class="list-inline pull-right">
                        <li>
                            <a href="actualites-add.php" class="btn btn-success">
                                <span class="glyphicon glyphicon-plus"></span>
                                <span class="hidden-xs">Ajouter une Actualité</span>
                            </a>
                        </li>
                    </ul>
                    <h1>Actualités</h1>
                </div>

                <?php if (sizeof($actualites)) : ?>
                    <table class="table">
                        <thead>
                        <tr>
                            <th>Date</th>
                            <th>Titre</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($actualites as $actualite) : ?>
                            <tr>
                                <td><?php echo $actualite['date'] ?></td>
                                <td><?php echo $actualite['titre'] ?></td>
                                <td>
                                    <ul class="list-inline pull-right">
                                        <li>
                                            <a class="btn btn-primary btn-xs">
                                                <span class="glyphicon glyphicon-eye-open"></span>
                                            </a>
                                        </li>
                                        <li>
                                            <a class="btn btn-warning btn-xs">
                                                <span class="glyphicon glyphicon-pencil"></span>
                                            </a>
                                        </li>
                                        <li>
                                            <a class="btn btn-danger btn-xs">
                                                <span class="glyphicon glyphicon-trash"></span>
                                            </a>
                                        </li>
                                    </ul>
                                </td>
                            </tr>
                        <?php endforeach ?>
                        </tbody>
                    </table>
                <?php else : ?>
                    <div class="text-danger">
                        <span class="glyphicon glyphicon-warning-sign"></span>
                        Il n'y a aucune actualité
                    </div>
                <?php endif ?>
            </div>
        </div>
    </div>

  <?php include 'partial/scripts.php' ?>
  </body>
</html>
