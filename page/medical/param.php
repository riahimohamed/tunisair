<?php
require_once '../../const.php';
require_once ROOT.'init.php';

if(isset($_GET['del_id'])){
    $del_id = $_GET['del_id'];
    $del = $con->query("DELETE FROM seekfold WHERE id='$del_id'");

    if($del){
        header('location:index.php');
    }
}

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

<section class="medical">
    <div class="row">

        <div class="foldmdl">
            <h4>Votre dossier medical</h4>
            <div class="navhead-mdl pull-right">
                <ul class="nav navbar-nav">
                    <li><a href="#" data-toggle="modal" data-target="#addfold"><h4><span class="glyphicon glyphicon-plus-sign"></span></h4></a></li>
                </ul>
            </div>
            <div class="listmdl">
                <table class="table table-striped table-hover">
                    <thead>
                    <tr>
                        <th>Matricle</th>
                        <th>Contenu</th>
                        <th></th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php

                    $user_id = $_SESSION['userid'];

                    $resutl = $con->query("SELECT * FROM seekfold ");

                    if($resutl){
                        if(mysqli_num_rows($resutl) > 0) {
                            while ($row = $resutl->fetch_assoc()) {
                                echo "<tr><td>". $row['mat'] ."</td>";

                                echo "<td>". $row['contenu'] ."</td>";

                                echo "<td><a href=".$row['url']." download><h5><span class='glyphicon glyphicon-download'></span></h5></a></td>";

                                echo "<td><a href=".$row['url']." target='_blank'><h5><span class='glyphicon glyphicon-eye-open'></span></h5></a></td>";
                                ?>

                                <td><a href="param.php?del_id=<?php echo $row['id']; ?>"><h5 class="text-danger"><span class='glyphicon glyphicon-remove'></span></h5></a></td></tr>
                            <?php
                    }
                        }else{
                            echo '<h5 class="text-primary">upload des fichiers pdf, table est vide!</h5>';
                        }
                    }
                    ?>
                    </tbody>
                </table>
            </div>
        </div>

    </div><!--row-->

    <!-- Modal -->
    <div class="modal fade" id="addfold" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4>Ajouter Dossier Maladie</h4>
                </div>
                <div class="modal-body">
                    <form class="form-horizontal" action="upload.php" method="post" enctype="multipart/form-data"  role="form">

                        <div class="browse-wrap">
                            <div class="title">Choisissez fichier a upload</div>
                            <input type="file" name="fileToUpload" id="fileToUpload" class="upload" title="Choose a file to upload" required="required">
                        </div>
                        <span class="upload-path">Nom de dossier (pdf)</span>

                        <input class="form-control" name="mat" list="bieres" type="text" required="required">
                        <datalist id="bieres">
                            <?php

                            $resutl = $con->query("SELECT nom,mat FROM personne ");

                            if($resutl) {
                                if (mysqli_num_rows($resutl) > 0) {
                                    while ($row = $resutl->fetch_assoc()) {

                                        echo "<option value ='". $row['mat'] ."'>";

                                    }
                                }
                            }
                            ?>
                        </datalist><br>

                        <input type="text" class="form-control" name="contenu" placeholder="contenu dossier de maladie" required="required">
                        <br>

                        <div class="pull-right">
                            <button type="submit" class="btn btn-primary">Charger</button>
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