<?php
require_once '../../const.php';
require_once ROOT.'init.php';
require_once 'addequipe.php';
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

        <div class="col-sm-10 col-sm-offset-1 body-vol">

            <div class="pull-right">
                <a href="#" data-toggle="modal" data-target="#addhtc"><h4><i class="glyphicon glyphicon-plus-sign"></i></h4></a>
            </div>

            <h2 class="col-sm-5">Equipage de vol</h2>

            <table class="table table-bordered table-striped table-hover">
                <thead>
                <tr>
                    <th>Num de vol</th>
                    <th>Heure</th>
                    <th>Date</th>
                    <th></th>
                    <th></th>
                </tr>
                </thead>
                <tbody>

                <?php

                $resutl = $con->query("SELECT * FROM equipage");


                if($resutl){
                    if(mysqli_num_rows($resutl) > 0) {

                        while ($row = $resutl->fetch_assoc()) {
                            echo "<tr><td>". $row['num_vol'] ."</td>";
                            echo "<td>". $row['heure_vol'] ."</td>";
                            echo "<td>". $row['date_vol'] ."</td>";
                            ?>
                            <td class='equipevol'><a  href="equipevol.php?id_show=<?php echo $row['id'] ?>" >equipe <i class='glyphicon glyphicon-eye-open'></i></a></td>
                            <td><a href="equipevol.php?del_id=<?php echo $row['id'];?>"><h5 class="text-danger"><i class="glyphicon glyphicon-remove"></i></h5></a></td></tr>
                        <?php
                        }
                        //str_replace(' ', '<br>', $row['contenu'])

                    }else{
                        echo "<tr><td colspan='11'><h4 class='text-danger text-center'>Aucune equipage</h4></td></tr>";
                    }
                }
                ?>

                <div class="equipe">
                    <?php
                        if(isset($_GET['id_show'])){
                            $id = $_GET['id_show'];
                            $resutl2 = $con->query("SELECT * FROM equipage WHERE id= '$id' ");
                            while ($row2 = $resutl2->fetch_assoc()) {
                                echo "<h4>" . str_replace(' ', '<br>', $row2['contenu']) . "</h4>";
                            }
                        }else{
                            echo "<h4>Selectionner vol</h4>";}
                    ?>
                </div>

                </tbody>
            </table>
        </div>

    </div><!--row-->
</section>

<!-- Modal -->
<div class="modal fade" id="addhtc" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4>Ajouter Historique</h4>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" action="<?php $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data"  role="form">

                    <input type="number" class="form-control" name="num_vol" placeholder="Num de vol" required="required">
                    <br>

                    <textarea class="form-control" name="contenu" placeholder="Nom Personne <espace> Nom Personne" required="required"></textarea>
                    <br>

                    <label>Heure de vol</label>
                    <input type="time" class="form-control" name="heure" required="required">
                    <br>

                    <label>Date de vol</label>
                    <input type="date" class="form-control" name="date_vol" required="required">
                    <br>

                    <div class="pull-right">
                        <button type="submit" name="submiteq" class="btn btn-primary">Enregistrer</button>
                    </div>
                    <br>
                    <br>
                </form>
            </div>
        </div>
    </div>
</div>


<script src="../../web/js/jquery.js"></script>
<script src="../../web/js/bootstrap.min.js"></script>
<script src="../../web/js/script.js"></script>
</body>
</html>