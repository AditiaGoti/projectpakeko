<?php

use League\CommonMark\Node\Block\Document;

session_start();

if (isset($_SESSION['login_status'])) {
    switch ($_SESSION['type']) {
        case 0:
            $_SESSION["login_status"] = true;
            header('location: /member');
            exit;
            break;
        case 1:
            $_SESSION["login_status"] = true;
            header('location: /admin');
            exit;
            break;
        case 2:
            $_SESSION["login_status"] = true;
            header('location: /owner');
            exit;
            break;
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Login</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="assets/vendor/bootstrap/css/bootstrap.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="assets/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="assets/vendor/animate/animate.css">
    <link rel="stylesheet" type="text/css" href="assets/css/util.css">
    <link rel="stylesheet" type="text/css" href="assets/css/main.css">
    <!--===============================================================================================-->
</head>

<body>

    <div class="limiter" style="background-image: url(assets/images/klubaderaibg.png);">
        <div class="container-login100">
            <div class="wrap-login100">
                <form method="POST" action="/login" class="login100-form validate-form">
                    <span class="login100-form-title p-b-26">
                        Selamat Datang
                    </span>
                    @csrf
                    <p> Email </p>
                    <div class="wrap-input100 validate-input" data-validate="Valid email is: a@b.c">
                        <input required id="email" class="input100" type="text" name="email">
                        <span class="focus-input100"></span>
                    </div>
                    <p> Password </p>
                    <div class="wrap-input100 validate-input" data-validate="Enter password">
                        <span class="btn-show-pass">
                            <i class="zmdi zmdi-eye"></i>
                        </span>
                        <input required id="login_pass" class="input100" type="password" name="password">
                        <span class="focus-input100"></span>
                    </div>
                    <div class="container-login100-form-btn">
                        <div class="wrap-login100-form-btn">
                            <div class="login100-form-bgbtn"></div>
                            <button name="submit" type="submit" class="login100-form-btn">
                                Login
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

</body>

</html>