<?php

require_once 'delete.php';

if(isset($_POST['submiteq'])){

    $num_vol = $_POST['num_vol'];
    $contenu = $_POST['contenu'];
    $heure= $_POST['heure'];
    $date_vol= $_POST['date_vol'];


    $vol = $con->query("INSERT INTO equipage (num_vol, contenu, heure_vol, date_vol )
                                  VALUES ('$num_vol', '$contenu', '$heure', '$date_vol')")

    or die(mysqli_error($con));
}