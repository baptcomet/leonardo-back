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

include('src/checklogged.php');
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
                    <div class="col-md-6">
                        <div class="panel panel-primary table-responsive">
                            <div class="panel-heading">
                                <h1 class="panel-title">Actualités</h1>
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
                                        <a class="pull-right">Actions</a>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- COURS -->
                    <div class="col-md-6">
                        <div class="panel panel-warning table-responsive">
                            <div class="panel-heading">
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
                                        <a class="pull-right">Actions</a>
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
                                        <a class="pull-right">Actions</a>
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
                                        <a class="pull-right">Actions</a>
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
                                        <a class="pull-right">Actions</a>
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
