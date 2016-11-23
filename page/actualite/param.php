<?php
require_once '../../const.php';
require_once ROOT.'init.php';

if(isset($_GET['del_id'])){
    $del_id = $_GET['del_id'];
    $del = $con->query("DELETE FROM pdfStore WHERE id='$del_id'");

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
            <h3>Actualité</h3>

            <div class="listmdl">
                <table class="table table-striped table-hover">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Titre</th>
                        <th></th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php

                    $user_id = $_SESSION['userid'];

                    $resutl = $con->query("SELECT * FROM pdfStore");

                    if($resutl){
                        if(mysqli_num_rows($resutl) > 0) {
                            while ($row = $resutl->fetch_assoc()) {
                                echo "<tr><td>". $row['id'] ."</td>";

                                echo "<td>". $row['title'] ."</td>";

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


</section>


<script src="../../web/js/jquery.js"></script>
<script src="../../web/js/bootstrap.min.js"></script>
<script src="../../web/js/script.js"></script>
</body>
</html>