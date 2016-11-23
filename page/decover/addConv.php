<?php


require_once 'convension/delete.php';

if(isset($_POST['submitConv'])){
    $title = str_replace("'", "\'", $_POST['title']);
    $htext = str_replace("'", "\'", $_POST['htext']);

    $result = $con->query("INSERT INTO convension (title, htext)
                          VALUES ('$title','$htext')") or die(mysqli_error($con));
}