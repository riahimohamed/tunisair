<?php

require_once '../../const.php';
require_once ROOT.'init.php';

$con = new Database();

$edit_id = $_GET['edit_id'];

$resutl = $con->query("SELECT * FROM badgeage WHERE id = '$edit_id' ");


if(isset($_POST['editbdg'])) {
    $id = $_GET['edit_id'];
    $d1 = $_POST['d1'];
    $d2 = $_POST['d2'];
    $d3 = $_POST['d3'];
    $d4 = $_POST['d4'];
    $d5 = $_POST['d5'];
    $comment = $_POST['comment'];

    $edit= $con->query("UPDATE badgeage SET datepoint='$d1',
                                            h8='$d2',
                                            h13 = '$d3',
                                            h14 = '$d4',
                                            h17 = '$d5',
                                            commentaire = '$comment'
                                             WHERE id='$id'");
    header('location: badgeage.php');
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

    <section class="historic">
        <div class="row">

            <div class="pull-right"><a href="badgeage.php"><h3><i class="glyphicon glyphicon-arrow-left"></i></h3></a></div>

            <div class="col-sm-10 col-sm-offset-1">
                <h1>Modifier Badgeage</h1>
                <form class="form-horizontal" action="<?php $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data"  role="form">

                    <?php
                    if($resutl) {
                        if (mysqli_num_rows($resutl) > 0) {
                            while ($row = $resutl->fetch_assoc()) {
                                ?>
                                <input type="text" class="form-control" name="d1" value="<?php echo $row['datepoint'] ?>"
                                       required="required">
                                <br>
                                <input type="text" class="form-control" name="d2" value="<?php echo $row['h8'] ?>"
                                       required="required">
                                <br>
                                <input type="text" class="form-control" name="d3" value="<?php echo $row['h13'] ?>"
                                       required="required">
                                <br>
                                <input type="text" class="form-control" name="d4" value="<?php echo $row['h14'] ?>"
                                       required="required">
                                <br>
                                <input type="text" class="form-control" name="d5" value="<?php echo $row['h17'] ?>"
                                       required="required">
                                <br>
                                <textarea name="comment" class="form-control" name="comment" rows="8"><?php echo $row['commentaire'] ?></textarea>
                                <br>
                            <?php
                            }
                        }
                    }
                    ?>

                    <div class="pull-right">
                        <button type="submit" name="editbdg" class="btn btn-primary">Enregistrer</button>
                    </div>
                    <br>
                </form>
            </div>

        </div><!--row-->

    </section>


    <script src="../../web/js/jquery.js"></script>
    <script src="../../web/js/bootstrap.min.js"></script>
    <script src="../../web/js/script.js"></script>

    </body>
    </html>
<?php

if(isset($_POST['edit'])){


}