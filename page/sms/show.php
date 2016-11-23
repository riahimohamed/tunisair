<?php
require_once '../../const.php';
require_once ROOT.'init.php';

$id = $_GET['id'];

$result= $con->query("SELECT * FROM email WHERE id = '$id' ");

$row = mysqli_fetch_assoc($result);

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
    <link rel="stylesheet" href="../../web/css/sms.css" type="text/css" media="all">

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

<section>
    <div class="row">

        <div class="col-sm-10 text-center">
            <a href="index.php"><h4><span class="glyphicon glyphicon-repeat"></h4></span></a>
        </div>

        <div>
            <table class="table">

                <tr>
                    <td><strong>Par :</strong></td>
                    <td><?php echo $row['fromhow']; ?></td>
                </tr>
                <tr>
                    <td><strong>Object :</strong></td>
                    <td><?php echo  $row['object']; ?></td>
                </tr>
                <tr>
                    <td><strong>message :</strong></td>
                    <td><?php echo  $row['message']; ?></td>
                </tr>
                <tr>
                    <td><strong>date a :</strong></td>
                    <td><?php echo  $row['date']; ?></td>
                </tr>

            </table>
        </div>


    </div>

</section>


<script src="../../web/js/jquery.js"></script>
<script src="../../web/js/bootstrap.min.js"></script>
<script src="../../web/js/script.js"></script>
</body>
</html>