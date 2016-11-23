<?php

session_start();

if(isset($_POST['logout'])){
    session_destroy();
    unset($_SESSION['userid']);

}

if(empty($_SESSION['userid'])){
    header('location: /tunisair/login.php');
}