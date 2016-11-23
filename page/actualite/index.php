<?php
require_once '../../const.php';
require_once ROOT.'init.php';

$resutl = $con->query('SELECT * FROM pdfStore');
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

<section class="content">
    <div class="row">
        <br>

        <div class="col-sm-9 col-sm-offset-1 bih">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <div class="plus-pdf pull-right"><h4>
                            <?php
                            if(isset($_SESSION['role'])) {
                                if (($_SESSION['role'] == 'admin') && ($_SESSION['post'] == 'admin')) {
                                    ?>
                                    <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#addpdf">
                                        <span class="glyphicon glyphicon-plus"></span>
                                    </button>
                                <?php
                                }
                            }
                            ?>
                        </h4></div>
                    <div class="plus-pdf pull-right"><h4>
                            <?php
                            if(isset($_SESSION['role'])) {
                                if (($_SESSION['role'] == 'admin') && ($_SESSION['post'] == 'admin')) {
                                    ?>
                                    <a href="param.php">
                                        <span class="glyphicon glyphicon-cog"></span>
                                    </a>
                                <?php
                                }
                            }
                            ?>
                        </h4></div>
                    <h3>Actulalité</h3>
                </div>
                <div class="panel-body">
                    <h2>BHI</h2>
                    <p>
                        Bulletin d'un formation hebdomadaire Tunisair
                    </p>
                    <table class="table table-striped table-hover">
                            <tr>
                                <?php
                                if($resutl){
                                    if(mysqli_num_rows($resutl) > 0) {
                                        $i = 0;
                                        $ln = 4;
                                        while ($row = $resutl->fetch_assoc()) {
                                            $i++;
                                            echo "<td><a data-toggle='tooltip' data-placement='top' title='". $row['title'] ."' target='_blank' href=" . $row['url'] . ">N°" . $row['id'] . "</a></td>";

                                            if($i >= $ln){
                                                echo '<tr>';
                                                $ln*=2;
                                            }
                                        }
                                    }else{
                                        echo '<h5 class="text-primary">upload des fichiers pdf, table est vide!</h5>';
                                    }
                                }
                                ?>
                            </tr>
                    </table>
                </div>
            </div>
        </div><!--BIH-->

        <!-- Modal -->
        <div class="modal fade" id="addpdf" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4>Ajouter un ou plusieur Fichiers de format PDF</h4>
                    </div>
                    <div class="modal-body">
                        <form class="form-horizontal" action="upload.php" method="post" enctype="multipart/form-data"  role="form">
                            <div class="browse-wrap">
                                <div class="title">Choisissez fichier a upload</div>
                                <input type="file" name="fileToUpload" id="fileToUpload" class="upload" title="Choose a file to upload" required="required">
                            </div>
                            <span class="upload-path">(PDF...)</span>
                            <input type="text" class="form-control" name="title" placeholder="PDF titre" required="required">
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

    </div>
</section>


<script src="../../web/js/jquery.js"></script>
<script src="../../web/js/bootstrap.min.js"></script>
<script src="../../web/js/script.js"></script>
</body>
</html>