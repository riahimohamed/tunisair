<?php


require_once 'historic/delete.php';

if(isset($_POST['submithtc'])){
    $title = str_replace("'", "\'", $_POST['title']);
    $htext = str_replace("'", "\'", $_POST['htext']);

    $result = $con->query("INSERT INTO historic (title, htext)
                          VALUES ('$title','$htext')") or die(mysqli_error($con));
}