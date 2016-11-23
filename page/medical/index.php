<?php
require_once '../../const.php';
require_once ROOT.'init.php';

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
                <?php
                if(isset($_SESSION['role'])) {
                    if (($_SESSION['role'] == 'admin') && ($_SESSION['post'] == 'admin') || ($_SESSION['post'] == 'ss') ) {
                        ?>
                        <ul class="nav navbar-nav">
                            <li><a href="param.php"><h4><span class="glyphicon glyphicon-cog"></span></h4></a></li>
                        </ul>
                    <?php
                    }
                }
                ?>
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

                        $user_mat = $_SESSION['mat'];

                        $resutl = $con->query("SELECT * FROM seekfold WHERE mat= '$user_mat' ");

                        if($resutl){
                            if(mysqli_num_rows($resutl) > 0) {
                                while ($row = $resutl->fetch_assoc()) {
                                    echo "<tr><td>". $row['mat'] ."</td>";

                                    echo "<td>". $row['contenu'] ."</td>";
                                    ?>

                                    <td><a href="index.php?del_id=<?php echo $row['id']; ?>" download><h5><span class='glyphicon glyphicon-download'></span></h5></a></td>

                                    <?php
                                    echo "<td><a href=".$row['url']." target='_blank'><h5><span class='glyphicon glyphicon-eye-open'></span></h5></a></td></tr>";
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