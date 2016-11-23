<?php

$msg_send = "";


if(isset($_POST['sendmail'])) {

    $msg_send = "ok";

    $current_user = $_SESSION['userid'];
    $resul2 = $con->query("SELECT id,email FROM user WHERE id= '$current_user' ");
    $data2 = mysqli_fetch_assoc($resul2);

    $email = $_POST['email'];

    $rest = $con->query("SELECT id,email FROM user WHERE email= '$email' ");

    if ($rest) {

        $tohow = mysqli_fetch_assoc($rest);

        $recive = $tohow['id'];

        $tohow2 = $tohow['email'];

        $fromhow = $data2['email'];
        $object = str_replace("'", "\'", $_POST['object']);
        $msg = str_replace("'", "\'", $_POST['msg']);

        $datetime = date('Y-m-d H:i:s');

        $sql = $con->query("INSERT INTO email (recive_id, send_id, fromhow, tohow, object, message, date, del)
                            VALUES ('$recive', '$current_user', '$fromhow','$tohow2', '$object', '$msg', '$datetime', '1') ");

        $msg_send = "message envoyer";

    }else{
            $msg_send = "message n'envoyer pas !";
    }
}