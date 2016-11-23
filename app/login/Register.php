<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/tunisair/const.php';

$registerMsg ='';
$registerSucces = 'hidden';

if(isset($_POST['register'])){

    /*  personne */
    $mat = $_POST['mat'];
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $adr = $_POST['adr'];

    /* user */
    $username = $_POST['username'];
    $password = $_POST['password'];
    $email = $_POST['email'];
    $role = $_POST['role'];
    $post = $_POST['post'];


    $per = $con->query("INSERT INTO personne (mat, nom, prenom, adresse)
                          VALUES ('$mat', '$nom', '$prenom', '$adr')") or die(mysqli_error($conn));

    $user = $con->query("INSERT INTO user (mat, username, password, email, role, post)
                          VALUES ('$mat', '$username', '$password', '$email', '$role', '$post')") or die(mysqli_error($conn));

    if($user && $per){
        $registerMsg = '« Bonjour, merci de votre inscription, Mr.'.$nom;
        $registerSucces = 'show';
        header("location:".HOME."index.php");
    }else{
        $registerMsg = 'Pardon Mr';
        $registerSucces = 'show';
    }
}