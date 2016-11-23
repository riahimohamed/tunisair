<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/tunisair/const.php';


if(isset($_POST['reclam'])){

    $immc = $_POST['immc'];
    $num_vol = $_POST['num_vol'];
    $esc_dep = $_POST['esc_dep'];
    $esc_arr= $_POST['esc_arr'];
    $etat_vol= $_POST['etat_vol'];
    $dep_prog= $_POST['dep_prog'];
    $arr_prog= $_POST['arr_prog'];
    $dep_est= $_POST['dep_est'];
    $arr_est= $_POST['arr_est'];
    $dep_act= $_POST['dep_act'];
    $arr_act= $_POST['arr_act'];


    $vol = $con->query("INSERT INTO vol (immc, num_vol, esc_dep, esc_arr, etat_vol, dep_prog, arr_prog, dep_est, arr_est, dep_act, arr_act)
                                  VALUES ('$immc', '$num_vol', '$esc_dep', '$esc_arr', '$etat_vol', '$dep_prog', '$arr_prog', '$dep_est', '$arr_est', '$dep_act', '$arr_act')")

    or die(mysqli_error($con));
}