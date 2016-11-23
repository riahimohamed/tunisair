<?php

require_once '../../const.php';
require_once ROOT.'init.php';
require_once 'add.php';

$agence = $con->query('SELECT id,agence FROM reseau');

$result = $con->query('SELECT * FROM reseau');

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

        <div class="col-sm-7">
            <div class="panel panel-default">
                <div class="plus-pdf pull-right">
                    <h4>
                        <?php
                        if(isset($_SESSION['role'])) {
                            if (($_SESSION['role'] == 'admin') && ($_SESSION['post'] == 'admin')) {
                                ?>
                                <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#addhtc">
                                    <span class="glyphicon glyphicon-plus"></span>
                                </button>
                            <?php
                            }
                        }
                        ?>
                    </h4>
                </div>
                <div class="page-header"> <h3>Annuaire des représentation a l'etranger</h3></div>
                <div class="panel-body">
                    <h4>Sélectionnez une représentation</h4>
                    <select class="form-control" id="reseau">
                        <?php
                        if($agence) {
                            if (mysqli_num_rows($agence) > 0) {
                                while ($row = $agence->fetch_assoc()) {
                                    echo "<option value='.agence".$row['id']."'>".$row['agence']."</option>";
                                }
                            }else{
                                echo "<option value='agence'>Aucune agence</option>";
                            }
                        }
                        ?>
                    </select>
                </div>
            </div>
        </div>

        <div class="col-sm-5 map">
            <!--<script src='https://maps.googleapis.com/maps/api/js?v=3.exp'></script><div style='overflow:hidden;height:440px;width:100%;'><div id='gmap_canvas' style='height:440px;width:700px;'></div><div><small><a href="http://embedgooglemaps.com">									embed google maps							</a></small></div><div><small><a href="http://www.proxysitereviews.com/">proxy sites</a></small></div><style>#gmap_canvas img{max-width:none!important;background:none!important}</style></div><script type='text/javascript'>function init_map(){var myOptions = {zoom:10,center:new google.maps.LatLng(36.85073325118626,10.23505500006105),mapTypeId: google.maps.MapTypeId.ROADMAP};map = new google.maps.Map(document.getElementById('gmap_canvas'), myOptions);marker = new google.maps.Marker({map: map,position: new google.maps.LatLng(36.85073325118626,10.23505500006105)});infowindow = new google.maps.InfoWindow({content:'<strong>tunisair</strong><br>Tunis-Carthage International Airport, Tunis, Tunisia<br>'});google.maps.event.addListener(marker, 'click', function(){infowindow.open(map,marker);});infowindow.open(map,marker);}google.maps.event.addDomListener(window, 'load', init_map);</script>-->
        </div>

        <div class="col-sm-9">
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th>Agence</th>
                    <th>Adresse</th>
                    <th>Tél</th>
                    <th>Fax</th>
                    <th>email</th>
                </tr>
                </thead>
                <tbody>

                <?php
                if($result) {
                if (mysqli_num_rows($result) > 0) {
                while ($row2 = $result->fetch_assoc()) {
                ?>
                <tr class="agence<?php echo $row2['id'] ?>"><td><?php echo $row2['agence']; ?></td>
                    <?php
                    echo "<td>". $row2['adresse'] ."</td>";
                    echo "<td>". $row2['tel'] ."</td>";
                    echo "<td>". $row2['fax'] ."</td>";
                    echo "<td>". $row2['email'] ."</td>";
                    if(isset($_SESSION['role'])) {
                        if (($_SESSION['role'] == 'admin') && ($_SESSION['post'] == 'admin')) {
                            ?>
                            <td><a href="edit.php?edit_id=<?php echo $row2['id']; ?>"><i
                                        class="glyphicon glyphicon-edit"></i></a></td>
                            <td><a href="index.php?del_id=<?php echo $row2['id']; ?>"><i
                                        class="text-danger glyphicon glyphicon-remove"></i></a></td></tr>
                        <?php
                        }
                    }
                    }
                    }
                    }
                    ?>

                </tbody>
            </table>
        </div>

        <div class="centered service col-sm-2 pull-right">
            <a href="../sms/index.php">
                <div class="circle-border zoom-in circle">
                    <img class="img-circle" src="../../web/images/img/sms.png" alt="service 3">
                </div>
                <h3>Service mail</h3>
            </a>
        </div>

    </div><!--row-->
</section>

<!-- Modal -->
<div class="modal fade" id="addhtc" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4>Ajouter Agence</h4>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" action="<?php $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data"  role="form">

                    <input type="text" class="form-control" name="agence" placeholder="Agence" required="required">
                    <br>

                    <input type="text" class="form-control" name="adr" placeholder="Adresse" required="required">
                    <br>

                    <input type="text" class="form-control" name="tel" placeholder="Tél" required="required">
                    <br>

                    <input type="text" class="form-control" name="fax" placeholder="Fax" required="required">
                    <br>

                    <input type="text" class="form-control" name="email" placeholder="Email" required="required">
                    <br>

                    <div class="pull-right">
                        <button type="submit" name="submithtc" class="btn btn-primary">Enregistrer</button>
                    </div>
                    <br>
                    <br>
                </form>
            </div>
        </div>
    </div>
</div>


<script src="../../web/js/jquery.js"></script>
<script src="../../web/js/bootstrap.min.js"></script>
<script src="../../web/js/script.js"></script>
</body>
</html>