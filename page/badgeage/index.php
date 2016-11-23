<?php
require_once '../../const.php';
require_once ROOT.'init.php';

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

<section class="badgeage">
    <div class="row">

        <?php
        if(isset($_SESSION['role'])) {
            if (($_SESSION['role'] == 'admin') && ($_SESSION['post'] == 'admin') || ($_SESSION['post'] == 'rh')) {
            ?>
                <div class="pull-right">
                    <a href="badgeage.php"><h5>Gestion pointage</h5></a>
                </div>
            <?php
            }
        }
        ?>

        <div class="menu">
            <div class="parallelogram">
                <h4>Recherche</h4>
            </div>
            <hr>
        </div>
        <div class="col-sm-3 search">
            <h4>Veuillez choisir la date que vous voulez verifier votre pointage</h4>
            <br>

            <div class="btn-search">
                <form action="<?php $_SERVER['PHP_SELF']; ?>" method="post" role="form">
                    <div class="calendar">
                        <h4><input type="date" name="date"> <span class="glyphicon glyphicon-calendar"></span></h4>
                    </div>
                    <br>
                    <button type="submit" name="submit" class="btn btn-primary">Recherche</button>
                </form>
            </div>
        </div>
        <div class="col-sm-9">
            <div class="btn-search-body">
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#rec">Passer une reclamation</button>
            </div>
            <div class="search-body">
                <table class="table table-striped table-hover">
                    <thead>
                    <tr>
                        <th>Date</th>
                        <th>8h</th>
                        <th>13h</th>
                        <th>14h</th>
                        <th>17h</th>
                        <th>commentaire</th>
                    </tr>
                </thead>
                <tbody>

                <?php
                $date="";
                $user_mat = $_SESSION['mat'];

                if(isset($_POST['submit'])){

                    $date = $_POST['date'];

                    $resutl = $con->query("SELECT * FROM badgeage WHERE mat= '$user_mat' AND date = '$date' ");

                }else{
                    $resutl = $con->query("SELECT * FROM badgeage WHERE mat= '$user_mat' ");
                }

                if($resutl){
                    if(mysqli_num_rows($resutl) > 0) {

                    while ($row = $resutl->fetch_assoc()) {
                        echo "<tr><td><strong>". $row['datepoint'] ."</strong></td>";
                        echo "<td>". $row['h8'] ."</td>";
                        echo "<td>". $row['h13'] ."</td>";
                        echo "<td>". $row['h14'] ."</td>";
                        echo "<td>". $row['h17'] ."</td>";
                        echo "<td>". $row['commentaire'] ."</td></tr>";
                ?>
                <?php
                        }
                    }else{
                        if(isset($date)) {
                            echo "<h4 class='text-danger text-center'>Aucun pointage sur la date <strong>" . $date . "</strong></h4>";
                        }else{
                            echo "<h4 class='text-danger text-center'>Aucun pointage</h4>";
                        }
                    }
                }
                ?>

                </tbody>
                </table>
            </div>
        </div>

        <?php require 'reclam.php'; ?>

    </div><!--row-->

    <!-- Modal -->
    <div class="modal fade" id="rec" tabindex="-1" role="dialog" aria-labelledby="myModalLabel3">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4>Envoyer reclamation</h4>
                </div>
                <div class="modal-body">
                    <div class="form-send">
                        <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post" class="form-horizontal" role="form">
                            <div>
                                <input type="text" name="etat" class="form-control" placeholder="Etat" required="required">
                            </div>
                            <br>
                            <div>
                                <textarea class="form-control" name="desc"></textarea>
                            </div>
                            <br>

                            <div>
                                <button type="submit" name="reclam" class="btn btn-success" id="btn-send">Envoyer</button>
                                <button type="reset" class="btn btn-default">Ignorer</button>
                            </div>
                        </form>
                    </div>
                </div>
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