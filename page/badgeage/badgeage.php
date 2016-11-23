<?php

require_once '../../const.php';
require_once ROOT.'init.php'

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

        <div class="menu">
            <div class="parallelogram">
                <h4>Recherche</h4>
            </div>
            <hr>
        </div>

        <div class="col-sm-6">
            <a href="index.php"><h4><span class="glyphicon glyphicon-repeat"></span></h4></a>
        </div>

        <div class="col-sm-6">
            <a href="#" data-toggle="modal" data-target="#rec"><h5>Reclamation</h5></a>
        </div>

        <div class="search-body">
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th>Matricule</th>
                        <th>Nom&prenom</th>
                        <th>Date pointage</th>
                        <th>8h</th>
                        <th>13h</th>
                        <th>14h</th>
                        <th>17h</th>
                        <th>commentaire</th>
                        <th></th>
                    </tr>
                    </thead>
                <tbody>

                <?php

                $resutl = $con->query("SELECT badgeage.*, personne.nom, personne.prenom
                                      FROM badgeage, personne
                                       WHERE badgeage.mat = personne.mat");

                if($resutl){
                    if(mysqli_num_rows($resutl) > 0) {

                        while ($row = $resutl->fetch_assoc()) {
                            echo "<tr><td>". $row['mat'] ."</td>";
                            echo "<td>". $row['nom']." ". $row['prenom'] ."</td>";
                            echo "<td><strong>". $row['datepoint'] ."</strong></td>";
                            echo "<td>". $row['h8'] ."</td>";
                            echo "<td>". $row['h13'] ."</td>";
                            echo "<td>". $row['h14'] ."</td>";
                            echo "<td>". $row['h17'] ."</td>";
                            echo "<td>". $row['commentaire'] ."</td>";
                            ?>
                            <td>
                                <a href="edit.php?edit_id=<?php echo $row['id'];?>"><i class="glyphicon glyphicon-edit"></i></a>
                            </td>
                            </tr>
                        <?php
                        }
                    }else{
                        echo "<h4 class='text-danger text-center'>Tableau badgeage est vide!</h4>";
                    }
                }
                ?>

                </tbody>
                </table>
            </div>
        </div>

    </div><!--row-->

    <!-- Modal -->
    <div class="modal fade" id="rec" tabindex="-1" role="dialog" aria-labelledby="myModalLabel3">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4>Reclamation</h4>
                </div>
                <div class="modal-body">

                    <table class="table table-striped table-hover">
                        <thead>
                        <tr>
                            <th>Nom&prenom</th>
                            <th>Etat</th>
                            <th>Description</th>
                        </tr>
                        </thead>
                        <tbody>

                        <?php

                        $reclam = $con->query("SELECT reclamation.*, personne.nom, personne.prenom
                                                FROM reclamation, personne
                                                WHERE reclamation.mat = personne.mat");

                        if($reclam){
                            if(mysqli_num_rows($reclam) > 0) {

                                while ($row = $reclam->fetch_assoc()) {
                                    echo "<tr><td>". $row['nom']." ".$row['prenom'] ."</td>";;
                                    echo "<td>". $row['etat'] ."</td>";
                                    echo "<td>". $row['description'] ."</td></tr>";
                                    ?>
                                <?php
                                }
                            }else{
                                echo "<h4 class='text-danger text-center'>Aucune description</h4>";
                            }
                        }
                        ?>

                        </tbody>
                    </table>


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