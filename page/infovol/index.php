<?php
require_once '../../const.php';
require_once ROOT . 'Database.php';

$con = new Database();

if(isset($_POST['logvol'])) {
    if(!empty($_POST['username']) && $_POST['pwd']) {

        $username = $_POST['username'];
        $pass = $_POST['pwd'];

        $con->checkPass($username, $pass);

        $con->setCheck('hidden');

        $result = $con->query("select * from user where username='$username' AND password='$pass'");

        $row2 = mysqli_fetch_assoc($result);

        $post = $row2['post'];



        if ($result) {
            $row = mysqli_num_rows($result);
            if (($row > 0) && ($row2['post'] == 'admin')||($row2['post'] == 'iocc')) {
                header('Location: equipevol.php');
            } else {
                $con->setCheck('show');
            }
        }

    }
}

$check = $con->getCheck();

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

<section class="vol">
    <div class="row">

        <div class="col-sm-6">
            <div class="text-equipe">
                <h4>
                    Authentifiez vous pour avoir accés a toutes les ressources
                    du module pogramme pn pour une nouvelle inscription adressez
                    vous a aviation IT service AFRIC
                </h4>
            </div>
            <div class="form-login">
                <div class="alert alert-danger <?php echo $check ?> ">Votre nom d'utilisateur ou mot de passe incorrect</div>
                <form action="index.php" method="post" class="form-horizontal">

                    <input type="text" class="form-control" name="username" placeholder="Nom d'utilisateur" required="required">
                    <br>

                    <input type="password" class="form-control" name="pwd" placeholder="Mot de passe" required="required">
                    <br>
                    <button type="submit" name="logvol" class="btn btn-primary pull-right">Connexion</button>
                    <br>
                </form>
            </div>

        </div>
        <div class="col-sm-6">
            <div class="centered service col-sm-6">
                <a href="../sms/index.php">
                    <div class="circle-border zoom-in circle">
                        <img class="img-circle" src="../../web/images/img/sms.png" alt="service 3">
                    </div>
                    <h3>Service mail</h3>
                </a>
            </div>
        </div>

    </div><!--row-->
</section>


<script src="../../web/js/jquery.js"></script>
<script src="../../web/js/bootstrap.min.js"></script>
</body>
</html>