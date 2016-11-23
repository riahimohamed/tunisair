<?php require_once '../../const.php'; ?>
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

        <div class="col-sm-5">
            <h4>Equipage du vol</h4>
            <div class="vol-param">
                <form action="#" class="form-horizontal">
                    <label>De</label>
                    <select class="form-control">
                        <option value="choix1">airport Tunis Carthage</option>
                        <option value="choix2">airport Tunis TabarKa</option>
                        <option value="choix3">airport Tunis Safex</option>
                        <option value="choix4">airport Tunis Djerba</option>
                    </select>
                    <br>
                    <label>Vers</label>
                    <select class="form-control">
                        <option value="choix1">airport Paris only</option>
                        <option value="choix2">airport Paris</option>
                        <option value="choix3">airport Miami</option>
                        <option value="choix4">airport UK</option>
                    </select>
                    <br>
                    <h4><input type="date" style="width: 90%"> <span class="glyphicon glyphicon-calendar"></span></h4>
                    <br>
                    <label>Numero de vol</label>
                    <input type="number" class="form-control" required="required">
                    <br>
                    <button type="submit" class="btn btn-success pull-right">Recherche</button>
                    <br>
                </form>
            </div>
        </div>
    </div>

    <div class="search-body">
        <ul class="nav navbar-nav">
            <li><a href="#">Num de vol</a></li>
            <li><a href="#">Heur départ</a></li>
            <li><a href="#">Heur arrivée</a></li>
            <li><a href="#">Depart</a></li>
            <li><a href="#">Destination</a></li>
            <li><a href="#">PNT</a></li>
            <li><a href="#">PNC</a></li>
        </ul>
        <ul class="nav navbar-nav">
            <li><a href="#">12:03l</a></li>
            <li><a href="#">10:00</a></li>
            <li><a href="#">14:30</a></li>
            <li><a href="#">Tunis</a></li>
            <li><a href="#">Dubai</a></li>
            <li><a href="#">Commanda Pilote</a></li>
            <li>
                <a href="#">Hotesse</a>
            </li>
        </ul>
    </div>

    </div><!--row-->
</section>


<script src="../../web/js/jquery.js"></script>
<script src="../../web/js/bootstrap.min.js"></script>
</body>
</html>