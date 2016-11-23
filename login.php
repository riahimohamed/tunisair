<?php

session_start();

require_once 'init.php';
require_once 'app/login/auth.php';

?>

<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title></title>
    <link rel="stylesheet" type="text/css" href="web/css/bootstrap.min.css" />
    <link rel="stylesheet" href="web/css/login.css" type="text/css">
</head>

<body class="login-body">
<section class="login-page">

    <div class="container">
        <div class="row">
            <div class="alert alert-success <?php echo $registerSucces; ?>"><?php echo $registerMsg; ?></div>
            <div class="login-page">
                <div class="alert alert-danger <?php echo $check ?> ">Votre nom d'utilisateur ou mot de passe incorrect</div>
                <div class="form">
                    <form action="<?php $_SERVER['PHP_SELF']; ?>" method="post" class="register-form">
                        <input type="text" name="name" placeholder="name" required="required"/>
                        <input type="password" name="password" placeholder="password" required="required"/>
                        <input type="email" name="email" placeholder="email address" required="required"/>
                        <input type="hidden" name="role" value="user">
                        <button type="submit" name="register">create</button>
                        <p class="message">Already registered? <a href="#">Sign In</a></p>
                    </form>
                    <form action="<?php $_SERVER['PHP_SELF']; ?>" method="post" class="login-form">
                        <input type="text" name="username" placeholder="username" required="required"/>
                        <input type="password" name="pass" placeholder="password" required="required"/>

                        <button type="submit" name="login">login</button>
                        <p class="message">Not registered? <a href="#">Create an account</a></p>
                    </form>
                </div>
            </div>

        </div>
    </div>

</section>


<script src="web/js/jquery.js"></script>
<script src="web/js/bootstrap.js"></script>
<script src="web/js/script.js"></script>
</body>
</html>