<?php

require_once '../../const.php';
require_once ROOT.'init.php';

$con = new Database();

$edit_id = $_GET['edit_id'];

$resutl = $con->query("SELECT * FROM chart WHERE id = '$edit_id' ");

if(isset($_POST['edithtc'])) {
    $id = $_GET['edit_id'];
    $title = $_POST['title'];
    $htext = $_POST['htext'];

    $edit= $con->query("UPDATE chart SET title='$title', htext='$htext' WHERE id='$id'");
    header('location: index.php');
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

            <div class="pull-right"><a href="index.php"><h3><i class="glyphicon glyphicon-arrow-left"></i></h3></a></div>

            <div class="col-sm-10 col-sm-offset-1">
                <h1>Modifier Chart de sécurité</h1>
                <form class="form-horizontal" action="<?php $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data"  role="form">

                <?php
                if($resutl) {
                    if (mysqli_num_rows($resutl) > 0) {
                        while ($row = $resutl->fetch_assoc()) {
                            ?>
                            <input type="text" class="form-control" name="title" value="<?php echo $row['title'] ?>"
                                   required="required">
                            <br>
                            <textarea name="htext" class="form-control" rows="15"><?php echo $row['htext'] ?></textarea>
                            <br>
                        <?php
                        }
                    }
                }
                ?>

                    <div class="pull-right">
                        <button type="submit" name="edithtc" class="btn btn-primary">Enregistrer</button>
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