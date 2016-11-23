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

<section class="guide-per">
    <div class="row">

        <div class="panel panel-default">
            <div class="panel-heading"><h3>Le guide personnel</h3></div>
            <div class="panel-body">
                <h4>A SUBTITLE</h4>
            </div>
            <div class="panel-footer">
                <div class="btn-param pull-right">
                    <button type="button" class="btn btn-primary">Enregistrer</button>
                    <button type="button" class="btn btn-primary">Modifier</button>
                    <button type="button" class="btn btn-danger">Supprimer</button>
                </div>
            </div>
        </div>

    </div><!--row-->
</section>


<script src="../../web/js/jquery.js"></script>
<script src="../../web/js/bootstrap.min.js"></script>
</body>
</html>