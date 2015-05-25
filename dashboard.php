<?php
/*
 * - Données en base
 *      caroussel
 *      actualités
 *      photos
 *      cours et horaires
 *      articles de presse
 *      professeurs
 */

require_once('autoload.php');

include 'src/checklogged.php';
include 'src/bddconnect.php';
$activePage = 'dashboard';

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
                <h1 class="page-header">Tableau de Bord</h1>

                <div class="row">
                    <!-- ACTUALITES -->
                    <?php $actualites = $database->fetchActualites() ?>
                    <div class="col-md-6">
                        <div class="panel panel-primary table-responsive">
                            <div class="panel-heading">
                                <ul class="list-inline pull-right">
                                    <li>
                                        <a href="actualites.php" class="btn btn-default btn-xs">
                                            <span class="glyphicon glyphicon-menu-hamburger"></span>
                                            <span class="hidden-xs">Tout voir</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="actualites-add.php" class="btn btn-success btn-xs">
                                            <span class="glyphicon glyphicon-plus"></span>
                                            <span class="hidden-xs">Ajouter une Actualité</span>
                                        </a>
                                    </li>
                                </ul>
                                <h1 class="panel-title">Actualités</h1>
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
                                <div class="panel-body text-danger">
                                    <span class="glyphicon glyphicon-warning-sign"></span>
                                    Il n'y a aucune actualité
                                </div>
                            <?php endif ?>
                        </div>
                    </div>
                    <!-- COURS -->
                    <div class="col-md-6">
                        <div class="panel panel-warning table-responsive">
                            <div class="panel-heading">
                                <ul class="list-inline pull-right">
                                    <li>
                                        <a href="cours.php" class="btn btn-default btn-xs">
                                            <span class="glyphicon glyphicon-menu-hamburger"></span>
                                            <span class="hidden-xs">Tout voir</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="btn btn-success btn-xs">
                                            <span class="glyphicon glyphicon-plus"></span>
                                            <span class="hidden-xs">Ajouter un Cours</span>
                                        </a>
                                    </li>
                                </ul>
                                <h1 class="panel-title">Cours</h1>
                            </div>
                            <table class="table">
                                <thead>
                                <tr>
                                    <th>Nom</th>
                                    <th>Présentation</th>
                                    <th></th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td>...</td>
                                    <td>...</td>
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
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- PROFESSEURS -->
                    <div class="col-md-6">
                        <div class="panel panel-success table-responsive">
                            <div class="panel-heading">
                                <ul class="list-inline pull-right">
                                    <li>
                                        <a href="professeurs.php" class="btn btn-default btn-xs">
                                            <span class="glyphicon glyphicon-menu-hamburger"></span>
                                            <span class="hidden-xs">Tout voir</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="btn btn-success btn-xs">
                                            <span class="glyphicon glyphicon-plus"></span>
                                            <span class="hidden-xs">Ajouter un Professeur</span>
                                        </a>
                                    </li>
                                </ul>
                                <h1 class="panel-title">Professeurs</h1>
                            </div>
                            <table class="table">
                                <thead>
                                <tr>
                                    <th>Nom</th>
                                    <th>Présentation</th>
                                    <th></th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td>...</td>
                                    <td>...</td>
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
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- PHOTOS -->
                    <div class="col-md-6">
                        <div class="panel panel-info table-responsive">
                            <div class="panel-heading">
                                <ul class="list-inline pull-right">
                                    <li>
                                        <a href="photos.php" class="btn btn-default btn-xs">
                                            <span class="glyphicon glyphicon-menu-hamburger"></span>
                                            <span class="hidden-xs">Tout voir</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="btn btn-success btn-xs">
                                            <span class="glyphicon glyphicon-plus"></span>
                                            <span class="hidden-xs">Ajouter un Photo</span>
                                        </a>
                                    </li>
                                </ul>
                                <h1 class="panel-title">Photos</h1>
                            </div>
                            <table class="table">
                                <thead>
                                <tr>
                                    <th>Date</th>
                                    <th>Titre</th>
                                    <th></th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td>...</td>
                                    <td>...</td>
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
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- PRESSE -->
                    <div class="col-md-6">
                        <div class="panel panel-danger table-responsive">
                            <div class="panel-heading">
                                <ul class="list-inline pull-right">
                                    <li>
                                        <a href="presse.php" class="btn btn-default btn-xs">
                                            <span class="glyphicon glyphicon-menu-hamburger"></span>
                                            <span class="hidden-xs">Tout voir</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="btn btn-success btn-xs">
                                            <span class="glyphicon glyphicon-plus"></span>
                                            <span class="hidden-xs">Ajouter un Article</span>
                                        </a>
                                    </li>
                                </ul>
                                <h1 class="panel-title">Articles de Presse</h1>
                            </div>
                            <table class="table">
                                <thead>
                                <tr>
                                    <th>Date</th>
                                    <th>Titre</th>
                                    <th></th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td>...</td>
                                    <td>...</td>
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
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

  <?php include 'partial/scripts.php' ?>
  </body>
</html>
