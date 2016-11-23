<?php

if(isset($_GET['del_id'])){
    $del_id = $_GET['del_id'];
    $del = $con->query("DELETE FROM historic WHERE id='$del_id'");

    if($del){
        header('location : historic.php');
    }
}