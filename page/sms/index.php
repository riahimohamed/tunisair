<?php
require_once '../../const.php';
require_once ROOT.'init.php';

if(isset($_GET['pre_id'])){
    $del_id = $_GET['pre_id'];
    $pre_del= $con->query("UPDATE email SET del= '0' WHERE id = '$del_id' ");

    if($pre_del){
        header('location: /tunisair/page/sms/index.php');
    }
}

if(isset($_GET['del_id'])){
    $del_id = $_GET['del_id'];
    $del = $con->query("DELETE FROM email WHERE id='$del_id'");

    if($del){
        header('location: /tunisair/page/sms/index.php');
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

        <div class="col-sm-3 menu-sms">
            <div class="sidebar-nav">
                <div class="navbar">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-navbar-collapse">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                    </div>
                    <div class="navbar-collapse collapse sidebar-navbar-collapse">
                        <ul class="nav navbar-nav" id="tabs">
                            <li><a href="#tab1">Boite de réception</a></li>
                            <li><a href="#tab2">Eléments envoyés</a></li>
                            <li><a href="#tab3">Eléments supprimés</a></li>
                        </ul>
                    </div><!--/.nav-collapse -->
                </div>
            </div>
        </div>

        <div class="col-sm-9 body-sms">
            <div class="head-nav">
                <ul class="nav navbar-nav">
                    <li><a href="#" data-toggle="modal" data-target="#sendsms">
                        <h5><span class="glyphicon glyphicon-plus-sign"></span> Nouveau</h5>
                    </a></li>
                </ul>
            </div>

            <!--reception-->
            <div id="tab1" class="tab-section">
                <table class="table table-hover">
                    <tbody>
                    <?php
                    $current_id = $_SESSION['userid'];

                    $resutl = $con->query("SELECT * FROM email WHERE recive_id= '$current_id' AND del= 1 ");

                    if($resutl){
                        if(mysqli_num_rows($resutl) > 0) {

                            while ($row = $resutl->fetch_assoc()) {
                                echo "<tr><td><strong>". $row['tohow'] ."</strong></td>";
                                echo "<td>". $row['object'] ."</td>";
                                echo "<td>". $row['date'] ."</td>";
                                ?>

                   <td><a href="show.php?id=<?php echo $row['id']; ?>"><h5><span class='glyphicon glyphicon-eye-open'></span></h5></a></td>
                   <td><a href="index.php?pre_id=<?php echo $row['id']; ?>"><h5 class="text-danger"><span class='glyphicon glyphicon-remove'></span></h5></a></td></tr>

                    <?php
                            }
                        }else{
                            echo '<h5 class="text-success text-center"> Boite de reception est vide!</h5>';
                        }
                    }
                    ?>
                    </tbody>
                </table>
            </div>

            <!--envoyer-->
            <div id="tab2" class="tab-section">
                <table class="table table-hover">
                    <tbody>
                    <?php
                    $current_id = $_SESSION['userid'];

                    $resutl = $con->query("SELECT * FROM email WHERE send_id= '$current_id' AND del= 1 ");

                    if($resutl){
                        if(mysqli_num_rows($resutl) > 0) {

                            while ($row = $resutl->fetch_assoc()) {
                                echo "<tr><td><strong>". $row['tohow'] ."</strong></td>";
                                echo "<td>". $row['object'] ."</td>";
                                echo "<td>". $row['date'] ."</td>";
                                ?>
                    <td><a href="show.php?id=<?php echo $row['id']; ?>"><span class='glyphicon glyphicon-eye-open'></span></a></td>
                    <td><a href="index.php?pre_id=<?php echo $row['id']; ?>" class="text-danger"><span class='glyphicon glyphicon-remove'></span></a></td></tr>
                            <?php
                            }
                        }else{
                            echo '<h5 class="text-success text-center"> Boite de envoyer est vide!</h5>';
                        }
                    }
                    ?>
                    </tbody>
                </table>
            </div>

            <!--supprimer-->
            <div id="tab3" class="tab-section">
                <table class="table table-hover">
                    <tbody>
                    <?php
                    $current_id = $_SESSION['userid'];

                    $resutl = $con->query("SELECT * FROM email WHERE recive_id= '$current_id' OR send_id= '$current_id' AND del= 0 ");

                    if($resutl){
                        if(mysqli_num_rows($resutl) > 0) {

                            while ($row = $resutl->fetch_assoc()) {
                                echo "<tr><td><strong>". $row['tohow'] ."</strong></td>";
                                echo "<td>". $row['object'] ."</td>";
                                echo "<td>". $row['date'] ."</td>";
                                ?>

                    <td><a href="show.php?id=<?php echo $row['id']; ?>"><span class='glyphicon glyphicon-eye-open'></span></a></td>
                    <td><a href="index.php?del_id=<?php echo $row['id']; ?>" class="text-danger"><span class='glyphicon glyphicon-remove'></span></a></td></tr>
            <?php
                            }
                        }else{
                            echo '<h5 class="text-success text-center"> Boite de suppression est vide!</h5>';
                        }
                    }
                    ?>
                    </tbody>
                </table>
            </div>

        </div>

        <?php require_once ROOT.'app/sms/sendsms.php'; ?>

        <h4 class="text-success text-center"><?php if(isset($msg_send)) echo $msg_send; ?></h4>

</section>

<!-- Modal -->
<div class="modal fade" id="sendsms" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4>Envoyer message</h4>
            </div>
            <div class="modal-body">
                <div class="form-send">
                    <form action="<?php $_SERVER['PHP_SELF']; ?>" method="post" class="form-horizontal mailform">
                        <div>
                            <input type="email" name="email" class="form-control" placeholder="A:" required="required">
                        </div>
                        <br>
                        <div>
                            <input type="text" name="object" class="form-control" placeholder="Ajouter un object">
                        </div>
                        <br>
                        <div>
                            <textarea class="form-control" name="msg" placeholder="Message" required="required"></textarea>
                        </div>
                        <br>
                        <div>
                            <button type="submit" name="sendmail" class="btn btn-success">Envoyer</button>
                            <button type="reset" class="btn btn-default">Ignorer</button>
                        </div>
                    </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<script src="../../web/js/jquery.js"></script>
<script src="../../web/js/bootstrap.min.js"></script>
<script src="../../web/js/script.js"></script>
</body>
</html>