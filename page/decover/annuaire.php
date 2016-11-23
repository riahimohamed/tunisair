<?php
require_once '../../const.php';
require_once ROOT.'init.php';
require_once 'annuaire/add.php';

$resutl = $con->query('SELECT * FROM annuaire');
$telUtil = $con->query('SELECT * FROM telutil');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Tunisair</title>
    <meta charset="utf-8">

    <link rel="stylesheet" type="text/css" href="../../web/css/bootstrap.min.css" />

    <link rel="stylesheet" href="../../web/css/reset.css" type="text/css" media="all">
    <link rel="stylesheet" href="../../web/css/layout.css" type="text/css" media="all">
    <link rel="stylesheet" href="../../web/css/style.css" type="text/css" media="all">

</head>
<body id="page1">
<div class="main">
    <!--header -->
    <header>
        <?php require_once NAV.'nav.php'; ?>
    </header>
</div>
<!-- / header -->
<!--content -->

<section>
    <div class="row">
        <div class="ann-search">
            <div class="col-sm-6">
                <h4>Choisissez le critére de recherche ...</h4>
            </div>
            <div class="col-sm-3">
                <select class="form-control">
                    <option value="post" selected>Post</option>
                    <option value="nom">Nom</option>
                    <option value="direction">Direction</option>
                </select>
            </div>
            <div class="col-sm-3">
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Recherche">
                        <span class="input-group-btn">
                            <button class="btn btn btn-default" type="button">Go</button>
                        </span>
                </div>
            </div>
        </div>
        <div class="ann-body">
            <h3>Liste des numéros abrégés</h3>
            <ul>
                <li>
                    <a href="#" data-toggle="modal" data-target="#aisa">Annuaire AISA</a>
                            <?php
                            if(isset($_SESSION['role'])) {
                                if (($_SESSION['role'] == 'admin') && ($_SESSION['post'] == 'admin')) {
                                    ?>
                                    <span class="glyphicon glyphicon-plus-sign btn-ann" data-toggle="modal" data-target="#addaisa"></span>
                                <?php
                                }
                            }
                            ?>
                </li>
                <li>
                    <a href="#" data-toggle="modal" data-target="#tel">Téléphone utiles</a>
                    <?php
                    if(isset($_SESSION['role'])) {
                        if (($_SESSION['role'] == 'admin') && ($_SESSION['post'] == 'admin')) {
                            ?>
                            <span class="glyphicon glyphicon-plus-sign btn-ann" data-toggle="modal" data-target="#addtel"></span>
                        <?php
                        }
                    }
                    ?>
                </li>
                <li><a href="#">Rensignement pratique en Tunise</a></li>
                <li><a href="#">Fuseux horaires</a></li>
                <li><a href="#">Compagnies Aériénnes</a></li>
                <li><a href="#">Ambassades</a></li>
                <li><a href="#">Information générales</a></li>
                <li><a href="#">Distance kilométrique</a></li>
            </ul>
        </div>

    </div><!--row-->


    <div class="modal fade ann" id="aisa" tabindex="-1" role="dialog" aria-labelledby="myModalLabel3">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4>Annuaire AISA</h4>
                </div>
                <div class="modal-body">

                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Adresse</th>
                                <th>Code Postal</th>
                                <th>Ville</th>
                                <th>Pays</th>
                                <th>Téléphone</th>
                                <th>Fax</th>
                                <th>Email</th>
                            </tr>
                        </thead>
                        <tbody>
                                <?php
                                if($resutl) {
                                    if (mysqli_num_rows($resutl) > 0) {
                                        while ($row = $resutl->fetch_assoc()) {

                                            echo "<tr></tr><td>" . $row['adresse'] . "</td>";
                                            echo "<td>" . $row['codeP'] . "</td>";
                                            echo "<td>" . $row['ville'] . "</td>";
                                            echo "<td>" . $row['pays'] . "</td>";
                                            echo "<td>" . $row['tel'] . "</td>";
                                            echo "<td>" . $row['fax'] . "</td>";
                                            echo "<td>" . $row['email'] . "</td>";
                                            if(isset($_SESSION['role'])) {
                                                if (($_SESSION['role'] == 'admin') && ($_SESSION['post'] == 'admin') || $_SESSION['post'] == 'st') {
                                                    ?>
                                            ?>
                                            <td><a href="annuaire/edit.php?edit_id=<?php echo $row['id']; ?>"><i class="glyphicon glyphicon-edit"></i></a></td>
                                            <td><a href="annuaire.php?del_id=<?php echo $row['id']; ?>"><i class="glyphicon glyphicon-remove"></i></a></td></tr>
                                        <?php
                                                }
                                            }
                                        }
                                    }else{
                                        echo "<tr><td colspan='7'><h4>Tableau est vide!</h4></td></tr>";
                                    }
                                }
                                ?>
                        </tbody>
                    </table>


                </div>
            </div>
        </div>
    </div>

    <div class="modal fade ann" id="tel" tabindex="-1" role="dialog" aria-labelledby="myModalLabel3">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4>Téléphone utiles</h4>
                </div>
                <div class="modal-body">

                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th>tel</th>
                            <th></th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        if($telUtil) {
                            if (mysqli_num_rows($telUtil) > 0) {
                                while ($row = $telUtil->fetch_assoc()) {

                                    echo "<tr><td>" . $row['tel'] . "</td>";
                                    if(isset($_SESSION['role'])) {
                                        if (($_SESSION['role'] == 'admin') && ($_SESSION['post'] == 'admin') || $_SESSION['post'] == 'st') {
                                            ?>
                                            <td><a href="annuaire/edittel.php?edit_id=<?php echo $row['id']; ?>"><i class="glyphicon glyphicon-edit"></i></a></td>
                                            <td><a href="annuaire.php?deltel_id=<?php echo $row['id']; ?>"><i class="glyphicon glyphicon-remove"></i></a></td></tr>
                                        <?php
                                        }
                                    }
                                }
                            }else{
                                echo "<tr><td colspan='7'><h4>Tableau est vide!</h4></td></tr>";
                            }
                        }
                        ?>
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="addaisa" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4>Ajouter AISA</h4>
                </div>
                <div class="modal-body">
                    <form class="form-horizontal" action="<?php $_SERVER['PHP_SELF']; ?>" method="post" role="form">

                        <input type="text" class="form-control" name="adr" placeholder="Adresse" required="required">
                        <br>
                        <input type="text" class="form-control" name="codeP" placeholder="Code Postal" required="required">
                        <br>
                        <input type="text" class="form-control" name="ville" placeholder="Ville" required="required">
                        <br>
                        <input type="text" class="form-control" name="pays" placeholder="Pays" required="required">
                        <br>
                        <input type="text" class="form-control" name="tel" placeholder="Tél" required="required">
                        <br>
                        <input type="text" class="form-control" name="fax" placeholder="Fax" required="required">
                        <br>
                        <input type="text" class="form-control" name="email" placeholder="Email" required="required">
                        <br>

                        <div class="pull-right">
                            <button type="submit" name="submitaisa" class="btn btn-primary">Enregistrer</button>
                        </div>
                        <br>
                        <br>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="addtel" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4>Téléphone utiles</h4>
                </div>
                <div class="modal-body">
                    <form class="form-horizontal" action="<?php $_SERVER['PHP_SELF']; ?>" method="post" role="form">

                        <input type="text" class="form-control" name="tel" placeholder="Tél" required="required">
                        <br>

                        <div class="pull-right">
                            <button type="submit" name="submitel" class="btn btn-primary">Enregistrer</button>
                        </div>
                        <br>
                        <br>
                    </form>
                </div>
            </div>
        </div>
    </div>

</section>


<script src="../../web/js/jquery.js"></script>
<script src="../../web/js/bootstrap.min.js"></script>
<script src="../../web/js/script.js"></script>
</body>
</html>