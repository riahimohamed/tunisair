<?php

require_once '../../../const.php';
require_once ROOT.'init.php';

$con = new Database();

$edit_id = $_GET['edit_id'];

$result = $con->query("SELECT personne.*, user.*
                              FROM personne, user
                              WHERE personne.mat = user.mat AND personne.mat = '$edit_id' ");


if(isset($_POST['editper'])) {

    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $adr = $_POST['adr'];

    $username = $_POST['username'];
    $pwd = $_POST['pwd'];
    $email = $_POST['email'];
    $role = $_POST['role'];
    $post = $_POST['post'];

    $edit_per= $con->query("UPDATE personne SET nom='$nom',
                                            prenom='$prenom',
                                            adresse = '$adr'
                                            WHERE id='$edit_id' ");

    $edit_user= $con->query("UPDATE user SET username='$username',
                                              password='$pwd',
                                              email = '$email',
                                              role= '$role',
                                              post='$post'
                                              WHERE id='$edit_id' ");
    header('location: index.php');
}

?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <title>Tunisair</title>
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

    <section class="historic">
        <div class="row">

            <div class="pull-right"><a href="index.php"><h3><i class="glyphicon glyphicon-arrow-left"></i></h3></a></div>

            <div class="col-sm-10 col-sm-offset-1">
                <h1>Modifier Historique</h1>
                <form class="form-horizontal" action="<?php $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data"  role="form">

                    <?php
                    if($result) {
                        if (mysqli_num_rows($result) > 0) {
                            while ($row = $result->fetch_assoc()) {
                                ?>

                                <input type="text" class="form-control" name="nom" value="<?php echo $row['nom'] ?>" required="required">
                                <br>

                                <input type="text" class="form-control" name="prenom" value="<?php echo $row['prenom'] ?>" required="required">
                                <br>

                                <input type="text" class="form-control" name="adr" value="<?php echo $row['adresse'] ?>" required="required">
                                <br>

                                <input type="text" class="form-control" name="username" value="<?php echo $row['username'] ?>" required="required">
                                <br>

                                <input type="password" class="form-control" name="pwd" value="<?php echo $row['password'] ?>" required="required">
                                <br>

                                <input type="email" class="form-control" name="email" value="<?php echo $row['email'] ?>" required="required">
                                <br>

                                <select class="form-control" name="role">
                                    <option value="admin">Admin</option>
                                    <option selected="selected" value="agent">Agent</option>
                                </select>
                                <br>

                                <select class="form-control" name="post">
                                    <option value="non">Agent</option>
                                    <option value="ss">Agent SS</option>
                                    <option value="st">Agent St</option>
                                    <option value="rh">Agent RH</option>
                                    <option value="dco">Agent DCO</option>
                                </select>
                                <br>

                            <?php
                            }
                        }
                    }
                    ?>

                    <div class="pull-right">
                        <button type="submit" name="editper" class="btn btn-primary">Enregistrer</button>
                    </div>
                    <br>
                </form>
            </div>

        </div><!--row-->

    </section>


    <script src="../../../web/js/jquery.js"></script>
    <script src="../../../web/js/bootstrap.min.js"></script>
    <script src="../../../web/js/script.js"></script>

    </body>
    </html>
<?php

if(isset($_POST['edit'])){


}