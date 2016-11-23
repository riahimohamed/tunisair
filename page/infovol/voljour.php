<?php

require_once '../../const.php';
require_once ROOT.'init.php';

?>
<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/html">
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

<section class="vol">
    <div class="row">

        <div class="alert alert-text">
            <div class="col-sm-10">
                <h5 class="text-info">Les voles du jour (Les horaires sont en GMT) heur locale = GMT + 1</h5>
                <h5 class="text-info">Les voles  du : 22/52 2016-03-22</h5>
                <?php
                if(isset($_SESSION['role'])) {
                if (($_SESSION['role'] == 'admin') && ($_SESSION['post'] == 'admin') || $_SESSION['post'] == 'doc') {
                ?>
                <a href="#" data-toggle="modal" data-target="#vol"><h4 class="text-info"><strong>Ajouter vol</strong></h4></a>
                <?php
                }
                }
                ?>
            </div>
            <div class="col-sm-2">
                <h4>legend</h4>
                <div class="progress">
                    <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="40"
                         aria-valuemin="0" aria-valuemax="100" style="width:100%">
                        En vol
                    </div>
                </div>
                <div class="progress">
                    <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="40"
                         aria-valuemin="0" aria-valuemax="100" style="width:100%">
                        Annuler
                    </div>
                </div>
                <div class="progress">
                    <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="40"
                         aria-valuemin="0" aria-valuemax="100" style="width:100%">
                        Retardé
                    </div>
                </div>
                <div class="progress">
                    <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="40"
                         aria-valuemin="0" aria-valuemax="100" style="width:100%; background-color: #189fdd;">
                        Programmé
                    </div>
                </div>
            </div>
        </div>

        <div class="body-vol">
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th>IMMC</th>
                        <th>Num de vol</th>
                        <th>Escale depart</th>
                        <th>Escale arrivé</th>
                        <th>Etat de vol</th>
                        <th>Depar prog</th>
                        <th>Arrivé prog</th>
                        <th>Départ EST</th>
                        <th>Arrivé EST</th>
                        <th>Départ act</th>
                        <th>Arrivé act</th>
                    </tr>
                </thead>
                <tbody>

                <?php

                    $resutl = $con->query("SELECT * FROM vol");


                if($resutl){
                    if(mysqli_num_rows($resutl) > 0) {

                        while ($row = $resutl->fetch_assoc()) {
                            echo "<tr><td><strong>". $row['immc'] ."</strong></td>";
                            echo "<td>". $row['num_vol'] ."</td>";
                            echo "<td>". $row['esc_dep'] ."</td>";
                            echo "<td>". $row['esc_arr'] ."</td>";
                            if($row['etat_vol'] == 1){
                                echo "<td><h5 style='color: #f0ad4e;'><span class='glyphicon glyphicon-stop'></span> </h5></td>";
                            }else if($row['etat_vol'] == 2){
                                echo "<td><h5 style='color: #ff0000;'><span class='glyphicon glyphicon-stop'></span> </h5></td>";

                            }else if($row['etat_vol'] == 3){
                                echo "<td><h5 style='color: #5bc0de;'><span class='glyphicon glyphicon-stop'></span> </h5></td>";

                            }else if($row['etat_vol'] == 4){
                                echo "<td><h5 style='color: #189fdd;'><span class='glyphicon glyphicon-stop'></span> </h5></td>";
                            }

                            echo "<td>". $row['dep_prog'] ."</td>";
                            echo "<td>". $row['arr_prog'] ."</td>";
                            echo "<td>". $row['dep_est'] ."</td>";
                            echo "<td>". $row['arr_est'] ."</td>";
                            echo "<td>". $row['dep_act'] ."</td>";
                            echo "<td>". $row['arr_act'] ."</td></tr>";
                            ?>
                        <?php
                        }
                    }else{
                        echo "<tr><td colspan='11'><h4 class='text-danger text-center'>Aucune Vol</h4></td></tr>";
                    }
                }
                ?>

                </tbody>
            </table>
        </div>

        <?php require 'addvol.php'; ?>

    </div><!--row-->

    <!-- Modal -->
    <div class="modal fade" id="vol" tabindex="-1" role="dialog" aria-labelledby="myModalLabel3">
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
                                <input type="text" name="immc" class="form-control" placeholder="IMMC" required="required">
                            </div>
                            <br>
                            <div>
                                <input type="text" name="num_vol" class="form-control" placeholder="Num vol" required="required">
                            </div>
                            <br>
                            <div>
                                <input type="text" name="esc_dep" class="form-control" placeholder="Escale depart" required="required">
                            </div>
                            <br>
                            <div>
                                <input type="text" name="esc_arr" class="form-control" placeholder="Escale arrivé" required="required">
                            </div>
                            <br>
                            <div>
                                <select name="etat_vol" class="form-control">

                                    <option value="1">En vol</option>
                                    <option value="2">Annuler</option>
                                    <option value="3">Retardé</option>
                                    <option value="4">Programmé</option>

                                </select>
                            </div>
                            <br>
                            <div>
                                <input type="text" name="dep_prog" class="form-control" placeholder="Depar prog" required="required">
                            </div>
                            <br>
                            <div>
                                <input type="text" name="arr_prog" class="form-control" placeholder="Arrivé prog" required="required">
                            </div>
                            <br>
                            <div>
                                <input type="text" name="dep_est" class="form-control" placeholder="Départ EST" required="required">
                            </div>
                            <br>
                            <div>
                                <input type="text" name="arr_est" class="form-control" placeholder="Arrivé EST" required="required">
                            </div>
                            <br>
                            <div>
                                <input type="text" name="dep_act" class="form-control" placeholder="Départ act" required="required">
                            </div>
                            <br>
                            <div>
                                <input type="text" name="arr_act" class="form-control" placeholder="Arrivé act" required="required">
                            </div>
                            <br>

                            <div>
                                <button type="submit" name="reclam" class="btn btn-success" id="btn-send">Ajouter</button>
                                <button type="reset" class="btn btn-default">Ignorer</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

</section>


<script src="../../web/js/jquery.js"></script>
<script src="../../web/js/bootstrap.min.js"></script>
</body>
</html>