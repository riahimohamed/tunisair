<?php
require_once '../../const.php';
require_once ROOT.'init.php';
require_once 'addhistoric.php';

$resutl = $con->query('SELECT * FROM historic');

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

<section class="historic">
    <div class="row">

        <div class="col-sm-10 col-sm-offset-1">

            <div class="plus-pdf pull-right">
                <h4>
                    <?php
                    if(isset($_SESSION['role'])) {
                    if (($_SESSION['role'] == 'admin') && ($_SESSION['post'] == 'admin')) {
                    ?>
                    <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#addhtc">
                        <span class="glyphicon glyphicon-plus"></span>
                    </button>
                    <?php
                    }
                    }
                    ?>
                </h4>
            </div>

            <?php
            if($resutl) {
                if (mysqli_num_rows($resutl) > 0) {
                    while ($row = $resutl->fetch_assoc()) {
            ?>

                <div class="text-head">
                    <h1><?php echo $row['title']; ?></h1>
                    <hr>
                </div>

                <div class="content">
                        <?php
                        if(isset($_SESSION['role'])) {
                            if ($_SESSION['role'] == 'admin') {
                                ?>
                    <div class="param">
                        <ul>
                            <li title="modifier">
                                <a href="historic/edit.php?edit_id=<?php echo $row['id'];?>"><h4><i class="glyphicon glyphicon-edit"></i></h4></a>
                            </li>
                            <li title="modifier">
                                <a href="historic.php?del_id=<?php echo $row['id'];?>"><h4 class="text-danger"><i class="glyphicon glyphicon-remove"></i></h4></a>
                            </li>
                        </ul>
                    </div>
                            <?php
                            }
                        }
                        ?>

                    <p>
                        <?php echo $row['htext']; ?>
                    </p>
                </div>

                <?php
                        }
                    }
                }
                ?>
        </div>
        <br>
        <br>

    </div><!--row-->

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
                        <input type="text" class="form-control" name="title" placeholder="Titre" required="required">
                        <br>
                        <textarea name="htext" class="form-control" rows="8"></textarea>
                        <br>
                        <div class="pull-right">
                            <button type="submit" name="submithtc" class="btn btn-primary">Enregistrer</button>
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