<?php

if(isset($_GET['del_id'])){
    $del_id = $_GET['del_id'];
    $del = $con->query("DELETE FROM chart WHERE id='$del_id'");

    if($del){
        header('location : index.php');
    }
}