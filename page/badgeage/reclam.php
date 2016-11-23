<?php

if(isset($_POST['reclam'])){

    $user_mat = $_SESSION['mat'];

    $etat = $_POST['etat'];
    $desc = $_POST['desc'];

    $reclamt = $con->query("INSERT INTO reclamation (mat, etat, description)
                                 VALUES ('$user_mat', '$etat', '$desc') ") or die(mysqli_error($con));


}