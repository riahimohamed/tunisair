<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/tunisair/init.php';

session_start();

$user_id = $_SESSION['userid'];


$target_dir = $_SERVER['DOCUMENT_ROOT']."/tunisair/web/images/uploads/";
$target_file = basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$fileType = pathinfo($target_file,PATHINFO_EXTENSION);
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
        header('Location: '.ROOT.'index.php');
        echo "<div class='alert alert-success'>votre PDF - " . $check["mime"] . " est Upload</div>";
        $uploadOk = 1;
        exit;
    } else {
        echo "<div class='alert alert-danger'>File is not an image</div>";
        $uploadOk = 0;
    }
}
// Check if file already exists
if (file_exists($target_file)) {
    echo "<div class='alert alert-danger'>Sorry, file already exists</div>";
    $uploadOk = 0;
}
// Check file size
if ($_FILES["fileToUpload"]["size"] > 500000) {
    echo "<div class='alert alert-danger'>Sorry, your file is too large.</div>";
    $uploadOk = 0;
}
// Allow certain file formats
if($fileType != "pdf") {
    echo "<div class='alert alert-danger'>Sorry, only PDF files are allowed.</div>";
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {

    $pathfile = "/tunisair/web/images/uploads/";
    $newfile = md5($target_file).'.'.$fileType;

    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_dir.$newfile)) {

        $name = $pathfile.$newfile;
        $content = $_POST['contenu'];

        $nom = $_POST['mat'];

        $result = $con->query("INSERT INTO seekfold (mat, contenu, url)
                      VALUES ('$user_id', '$content', '$name')") or die(mysqli_error($con));

        echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
        echo "<div class='alert alert-danger'>The file. basename".( $_FILES["fileToUpload"]["name"]). "</div>";
        header('Location: index.php');
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}