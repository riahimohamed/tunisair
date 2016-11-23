<?php
require_once '../../../const.php';
require_once ROOT.'init.php';
require_once 'delete.php';

$result = $con->query("SELECT personne.*, user.*
                                      FROM personne, user
                                       WHERE personne.mat = user.mat");

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Inscription</title>
    <meta charset="utf-8">

    <link rel="stylesheet" type="text/css" href="../../../web/css/bootstrap.min.css" />

    <link rel="stylesheet" href="../../../web/css/reset.css" type="text/css" media="all">
    <link rel="stylesheet" href="../../../web/css/layout.css" type="text/css" media="all">
    <link rel="stylesheet" href="../../../web/css/style.css" type="text/css" media="all">

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

<section class="user">

    <div class="row">
        <h1>Liste des agents</h1>

        <div class="col-sm-12">
            <table class="table table-striped table-hover">
                <thead>
                <tr>
                    <th>Nom</th>
                    <th>Prénom</th>
                    <th>Adresse</th>
                    <th>Nom d'utilisateur</th>
                    <th>Mot de passe</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th>Post</th>
                    <th></th>
                    <th></th>
                </tr>
                </thead>
                <tbody>

                <?php

                if($result){
                    if(mysqli_num_rows($result) > 0) {

                        while ($row = $result->fetch_assoc()) {
                            echo "<tr><td>". $row['nom'] ."</td>";
                            echo "<td>". $row['prenom'] ."</td>";
                            echo "<td>". $row['adresse'] ."</td>";
                            echo "<td>". $row['username'] ."</td>";
                            echo "<td>". $row['password'] ."</td>";
                            echo "<td>". $row['email'] ."</td>";
                            echo "<td>". $row['role'] ."</td>";
                            echo "<td>". $row['post'] ."</td>";
                            ?>
                            <td><a href="edit.php?edit_id=<?php echo $row['id'];?>"><i class="glyphicon glyphicon-edit"></i></a></td>
                            <td><a href="index.php?del_id=<?php echo $row['id'];?>"><i class="text-danger glyphicon glyphicon-remove"></i></a></td></tr>
                        <?php
                        }
                    }
                }
                ?>

                </tbody>
            </table>

        </div>
    </div><!--row-->

</section>


<script src="../../../web/js/jquery.js"></script>
<script src="../../../web/js/bootstrap.min.js"></script>
<script src="../../../web/js/script.js"></script>
</body>
</html>