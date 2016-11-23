<?php

require_once ROOT . 'Database.php';

$con = new Database();

if(isset($_POST['login'])) {
    if(!empty($_POST['username']) && $_POST['pass']) {

        $username = $_POST['username'];
        $pass = $_POST['pass'];

        $con->checkPass($username, $pass);
        $result = $con->getCurrentUser($username, $pass);

        $_SESSION['userid'] = $result['id'];
        $_SESSION['mat'] = $result['mat'];
        $_SESSION['role'] = $result['role'];
        $_SESSION['post'] = $result['post'];

        $current_id = $_SESSION['userid'];

    }
}

$check = $con->getCheck();




