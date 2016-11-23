<?php require_once ROOT.'app/login/logout.php'; ?>

<div class="wrapper">
    <div class="col-sm-6">
        <a href="<?php echo HOME ?>index.php" id="logo"></a>
    </div>

    <div class="logout pull-right">
        <form action="<?php echo HOME ?>app/login/logout.php" method="post" class="form" role="form">
            <button type="submit" name="logout">
                Déconnexion <i class="glyphicon glyphicon-log-out"></i>
            </button>
        </form>
    </div>

    <?php
    if(isset($_SESSION['role'])) {
    if (($_SESSION['role'] == 'admin') && ($_SESSION['post'] == 'admin')) {
    ?>
    <div class="register pull-right">
        <ul>
            <li><a href="<?php echo ROOT_PUB ?>register/register.php">Inscription</a></li>
            <li><a href="<?php echo ROOT_PUB ?>register/profil/index.php">Gestion profil</a></li>
        </ul>
    </div>
    <?php
    }
    }
    ?>

    <div class="elanin col1">
        <img src="<?php echo WEB ?>images/img/elanin.png" />
    </div>
</div>
<nav class="navbar">
    <ul id="menu" class="nav navbar-nav">
        <li class="dropdown menu_active">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                Découvrire tunisair <span class="caret"></span>
            </a>
            <ul class="dropdown-menu">
                <li><a href="<?php echo ROOT_PUB ?>decover/historic.php">Historique</a></li>
                <li class="dropdown-submenu">
                    <a href="<?php echo ROOT_PUB ?>decover/annuaire.php">Annuair</a>
                </li>
                <li class="dropdown-submenu">
                    <a tabindex="-1" href="">chart sociale <i class="glyphicon glyphicon-chevron-right"></i></a>
                    <ul class="dropdown-menu">
                        <li><a tabindex="-1" href="<?php echo ROOT_PUB ?>decover/guidePer.php">Le guide personnel</a></li>
                        <li><a tabindex="-1" href="<?php echo ROOT_PUB ?>decover/convension.php">Les convension</a></li>
                    </ul>
                </li>
            </ul>
        </li>
        <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                Information vol <span class="caret"></span>
            </a>
            <ul class="dropdown-menu">
                <li><a href="<?php echo ROOT_PUB ?>infovol/voljour.php">vol du jour</a></li>
                <li><a href="<?php echo ROOT_PUB ?>infovol/index.php">equipage du vol</a></li>
            </ul>
        </li>
        <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                Information générale <span class="caret"></span>
            </a>
            <ul class="dropdown-menu">
                <li class="dropdown-submenu">
                    <a tabindex="-1" href="#">espace sécurite informatique <i class="glyphicon glyphicon-chevron-right"></i></a>
                    <ul class="dropdown-menu">
                        <li><a tabindex="-1" href="<?php echo ROOT_PUB ?>infogeneral/index.php">Chart de sécurite de tunisair</a></li>
                    </ul>
                </li>
                <li class="dropdown-submenu">
                    <a tabindex="-1" href="#">espace grand projet <i class="glyphicon glyphicon-chevron-right"></i></a>
                    <ul class="dropdown-menu">
                        <li><a tabindex="-1" href="#">Programmation integrée TARSCOP</a></li>
                        <li><a href="#">ERP</a></li>
                    </ul>
                </li>
                <li class="dropdown-submenu">
                    <a tabindex="-1" href="#">espace Délegation générale pour tunisair <i class="glyphicon glyphicon-chevron-right noright"></i></a>
                    <ul class="dropdown-menu">
                        <li><a href="#">consulter note</a></li>
                        <li><a href="#">consulter contrat</a></li>
                        <li><a href="#">Administration</a></li>
                        <li><a href="#">espace Qualité</a></li>
                        <li><a href="#">Plan audit</a></li>
                        <li><a href="#">Politique Qualité</a></li>
                    </ul>
                </li>
            </ul>
        </li>
        <li><a href="<?php echo ROOT_PUB ?>reseau/index.php">reseaux tunisair</a></li>
        <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                Application <span class="caret"></span>
            </a>
            <ul class="dropdown-menu">
                <li><a href="<?php echo ROOT_PUB ?>sms/index.php">Service SMS</a></li>
                <li><a href="<?php echo ROOT_PUB ?>actualite/index.php">Actualité</a></li>
                <li><a href="<?php echo ROOT_PUB ?>medical/index.php">Dossier medicale</a></li>
                <li><a href="<?php echo ROOT_PUB ?>badgeage/index.php">Badgeage</a></li>
            </ul>
        </li>
    </ul>
</nav>