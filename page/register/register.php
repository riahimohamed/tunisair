<?php
require_once '../../const.php';
require_once ROOT.'init.php';

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Inscription</title>
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

<section class="insc">

    <div class="row">
        <div class="col-sm-10 col-sm-offset-1">

            <h4>Inscription</h4>

            <form action="<?php $_SERVER['PHP_SELF']; ?>" method="post" class="register-form">

                <input type="text" class="form-control" name="mat" placeholder="Matricule" required="required"/><br>
                <input type="text" class="form-control" name="nom" placeholder="Nom" required="required"/><br>
                <input type="text" class="form-control" name="prenom" placeholder="Prénom" required="required"/><br>
                <input type="text" class="form-control" name="adr" placeholder="Adresse" required="required"/><br>

                <input type="text" class="form-control" name="username" placeholder="Nom d'utilisateur" required="required"/><br>
                <input type="password" class="form-control" name="password" placeholder="password" required="required"/><br>
                <input type="email" class="form-control" name="email" placeholder="email" required="required"/><br>

                <select class="form-control" name="role">
                    <option value="admin">Admin</option>
                    <option value="agent">Agent</option>
                </select>
                <br>

                <select class="form-control" name="post">
                    <option value="ss">Agent</option>
                    <option value="ss">Agent SS</option>
                    <option value="st">Agent St</option>
                    <option value="rh">Agent RH</option>
                    <option value="iocc">Agent IOCC</option>
                    <option value="dco">Agent DCO</option>
                </select>
                <br>

                <button type="submit" class="btn btn-primary pull-right" name="register">Ajouter</button>
            </form>

        </div>

    </div><!--row-->

</section>


<script src="../../web/js/jquery.js"></script>
<script src="../../web/js/bootstrap.min.js"></script>
<script src="../../web/js/script.js"></script>
</body>
</html>