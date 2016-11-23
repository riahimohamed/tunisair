<?php

require_once 'const.php';
require_once 'init.php';

$resutl = $con->query('SELECT * FROM pdfStore');

?>

<!DOCTYPE html>
<html lang="en">
<head>
<title>Tunisair</title>
<meta charset="utf-8">

<link rel="stylesheet" type="text/css" href="web/css/bootstrap.min.css" />

<link rel="stylesheet" href="web/css/reset.css" type="text/css" media="all">
<link rel="stylesheet" href="web/css/layout.css" type="text/css" media="all">
<link rel="stylesheet" href="web/css/style.css" type="text/css" media="all">

</head>
<body id="page1">
<div class="main">
  <!--header -->
  <header>
      <?php require_once NAV.'nav.php';?>
  </header>
    </div>
  <!-- / header -->
  <!--content -->

  <section class="content">
      <div class="row">
          <div class="col-sm-6 bih">
              <div class="panel panel-default">
                  <div class="panel-heading"><h3>Actulalité</h3></div>
                  <div class="panel-body">
                      <h2>BHI</h2>
                      <p>
                          Bulletin d'un formation hebdomadaire Tunisair
                      </p>
                      <table class="table table-striped table-hover">
                          <tr>
                              <?php
                              if($resutl){
                                  if(mysqli_num_rows($resutl) > 0) {
                                      $i = 0;
                                      $ln = 4;
                                      while ($row = $resutl->fetch_assoc()) {
                                          $i++;
                                          echo "<td><a data-toggle='tooltip' data-placement='top' title='". $row['title'] ."' target='_blank' href=" . $row['url'] . ">N°" . $row['id'] . "</a></td>";

                                          if($i >= $ln){
                                              echo '<tr>';
                                              $ln*=2;
                                          }
                                      }
                                  }else{
                                      echo '<h5 class="text-primary">upload des fichiers pdf, table est vide!</h5>';
                                  }
                              }
                              ?>
                          </tr>
                      </table>
                  </div>
              </div>
          </div><!--BIH-->
          <div class="col-sm-6">
              <h6 class="bih-text">
                  Fidelys est le programme de fidélité de Tunisair qui vous
                  toutes les attentions.place au coeur de
                  Il a pour objet de récompenser les clients fidèles de Tunisair en leur attribuant
                  des Miles, en contrepartie des voyages effectués sur ses lignes, leur permettant
                  de bénéficier d'une vaste gamme d’avantages et de Primes exclusifs.
                  Il vise également l’amélioration du confort de ses membres lors de leurs voyages
                  et ce, par la personnalisation de son offre et l’attribution de multiples avantages
                  et opportunités de gagner et de dépenser des Miles.
                  Avec Fidelys, l’adhérent est immédiatement identifié comme étant un client
                  privilégié.Une suite donnée aux réciamations
                  Une écoute des attentes des agents pour plus d'information vous a Aviation IT Service Africo<br>
                  Tél : 71942322/70837000 Post 3126
              </h6>
          </div>

      </div>
  </section>

  <section class="content">
      <div class="row">
          <div class="col-sm-3">
              <div class="centered service">
                  <a href="page/sms/index.php">
                      <div class="circle-border zoom-in circle">
                          <img class="img-circle" src="web/images/img/sms.png" alt="service 1">
                      </div>
                      <h3>Service SMS</h3>
                  </a>
              </div>
          </div>
          <div class="col-sm-3">
              <div class="centered service">
                  <a href="page/actualite/index.php">
                      <div class="circle-border zoom-in circle">
                          <img class="img-circle" src="web/images/img/news.png" alt="service 2" />
                      </div>
                      <h3>Actualiter</h3>
                  </a>
              </div>
          </div>
          <div class="col-sm-3">
              <div class="centered service">
                  <a href="page/medical/index.php">
                      <div class="circle-border zoom-in circle">
                          <img class="img-circle" src="web/images/img/3.png" alt="service 3">
                      </div>
                      <h3>Dossier Medicale</h3>
                  </a>
              </div>
          </div>
          <div class="col-sm-3">
              <div class="centered service">
                  <a href="page/badgeage/index.php">
                      <div class="circle-border zoom-in circle">
                          <img class="img-circle" src="web/images/img/4.png" alt="service 3">
                      </div>
                      <h3>Badgeage</h3>
                  </a>
              </div>
          </div>
      </div>

  </section>
<footer>
    <h4>2013 TUNISAIR, Tous droit réservés | Conditions générales de transport</h4>
</footer>

<script src="web/js/jquery.js"></script>
<script src="web/js/bootstrap.min.js"></script>
<script src="web/js/script.js"></script>
</body>
</html>