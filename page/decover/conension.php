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

<section class="convension">
    <div class="row">

        <div class="ann-body">
            <div class="panel panel-default">
                <div class="page-header"> <h3>Les convesions : Classification par spécialité</h3></div>
                <div class="panel-body">
                    <h4>Sélectionnez une représentation</h4>
                    <ul>
                        <li><a href="#">Annuaire AISA</a></li>
                        <li><a href="#">Téléphone utiles</a></li>
                        <li><a href="#">Rensignement pratique en Tunise</a></li>
                        <li><a href="#">Fuseux horaires</a></li>
                        <li><a href="#">Compagnies Aériénnes</a></li>
                        <li><a href="#">Ambassades</a></li>
                        <li><a href="#">Information générales</a></li>
                        <li><a href="#">Distance kilométrique</a></li>
                    </ul>
                </div>
            </div>
        </div>

    </div><!--row-->
</section>


<script src="../../web/js/jquery.js"></script>
<script src="../../web/js/bootstrap.min.js"></script>
</body>
</html>