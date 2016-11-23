<?php

require_once '../../const.php';
require_once ROOT.'init.php';

$edit_id = $_GET['edit_id'];

$resutl = $con->query("SELECT * FROM reseau WHERE id = '$edit_id' ");

if(isset($_POST['edithtc'])) {

    $agence =  $_POST['agence'];
    $adr = $_POST['adr'];
    $tel =  $_POST['tel'];
    $fax = $_POST['fax'];
    $email =  $_POST['email'];

    $edit= $con->query("UPDATE reseau SET agence='$agence',
                                          adresse='$adr',
                                          tel='$tel',
                                          fax='$fax',
                                          email='$email'
                                           WHERE id='$edit_id'");

    header('location: index.php');
}

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

<section class="reseau">
    <div class="row">
        <div class="pull-right"><a href="index.php"><h3><i class="glyphicon glyphicon-arrow-left"></i></h3></a></div>

        <div class="col-sm-10 col-sm-offset-1">
            <h1>Modifier Agence</h1>
            <form class="form-horizontal" action="<?php $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data"  role="form">

                <?php
                if($resutl) {
                    if (mysqli_num_rows($resutl) > 0) {
                        while ($row = $resutl->fetch_assoc()) {
                            ?>
                            <input type="text" class="form-control" name="agence" placeholder="Agence" value="<?php echo $row['agence'] ?>" required="required">
                            <br>

                            <input type="text" class="form-control" name="adr" placeholder="Adresse"value="<?php echo $row['adresse'] ?>" required="required">
                            <br>

                            <input type="text" class="form-control" name="tel" placeholder="Tél"value="<?php echo $row['tel'] ?>" required="required">
                            <br>

                            <input type="text" class="form-control" name="fax" placeholder="Fax"value="<?php echo $row['fax'] ?>" required="required">
                            <br>

                            <input type="text" class="form-control" name="email" placeholder="Email"value="<?php echo $row['email'] ?>" required="required">
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