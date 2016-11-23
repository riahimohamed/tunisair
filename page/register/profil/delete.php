<?php

if(isset($_GET['del_id'])){
    $del_id = $_GET['del_id'];
    $del_per = $con->query("DELETE FROM personne WHERE id='$del_id'");
    $del_user = $con->query("DELETE FROM user WHERE id='$del_id'");

        header('location : ../index.php');
}