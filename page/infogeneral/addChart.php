<?php

require_once 'delete.php';

if(isset($_POST['submitchart'])){
    $title = str_replace("'", "\'", $_POST['title']);
    $htext = str_replace("'", "\'", $_POST['htext']);

    $result = $con->query("INSERT INTO chart (title, htext)
                          VALUES ('$title','$htext')") or die(mysqli_error($con));
}