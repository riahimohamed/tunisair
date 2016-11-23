<?php


require_once 'delete.php';

if(isset($_POST['submitaisa'])){
    $adr = str_replace("'", "\'", $_POST['adr']);
    $codep = $_POST['codeP'];
    $ville = str_replace("'", "\'", $_POST['ville']);
    $pays = $_POST['pays'];
    $tel = $_POST['tel'];
    $fax = $_POST['fax'];
    $email = $_POST['email'];

    $result = $con->query("INSERT INTO annuaire (adresse, codeP, ville, pays, tel, fax, email)
                          VALUES ('$adr', '$codep', '$ville', '$pays', '$tel', '$fax', '$email' )") or die(mysqli_error($con));
}

if(isset($_POST['submitel'])){
    $tel = $_POST['tel'];

    $result = $con->query("INSERT INTO telutil (tel)
                          VALUES ( '$tel' )") or die(mysqli_error($con));
}