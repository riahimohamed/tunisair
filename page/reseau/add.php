<?php


require_once 'delete.php';

if(isset($_POST['submithtc'])){

    $agence =  $_POST['agence'];
    $adr = $_POST['adr'];
    $tel =  $_POST['tel'];
    $fax = $_POST['fax'];
    $email =  $_POST['email'];

    $result = $con->query("INSERT INTO reseau (agence, adresse, tel, fax, email)
                          VALUES ('$agence','$adr','$tel','$fax','$email')") or die(mysqli_error($con));
}