<?php

if(isset($_GET['del_id'])){
    $del_id = $_GET['del_id'];
    $del = $con->query("DELETE FROM annuaire WHERE id='$del_id'");

    header('location : ../annuaire.php');
}

if(isset($_GET['deltel_id'])){
    $del_id = $_GET['deltel_id'];
    $del = $con->query("DELETE FROM telutil WHERE id='$del_id'");

    header('location : ../annuaire.php');
}