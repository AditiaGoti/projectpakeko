<?php

use League\CommonMark\Node\Block\Document;

session_start();
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

    <div class="limiter" style="background-image: url(assets/images/club.png); background-size: 1400px; background-repeat: no-repeat;">
        <div class="container-login100" style="background-image: url(assets/images/club.png); background-size: 1400px; background-repeat: no-repeat;">
            <div class="wrap-login100">
                <form class="login100-form validate-form">
                    <span class="login100-form-title p-b-26">
                        Selamat Datang
                    </span>

                    <p> Email </p>
                    <div class="wrap-input100 validate-input" data-validate="Valid email is: a@b.c">
                        <input id="login_id" class="input100" type="text" name="email">
                        <span class="focus-input100"></span>
                    </div>
                    <p> Password </p>
                    <div class="wrap-input100 validate-input" data-validate="Enter password">
                        <span class="btn-show-pass">
                            <i class="zmdi zmdi-eye"></i>
                        </span>
                        <input id="login_pass" class="input100" type="password" name="pass">
                        <span class="focus-input100"></span>
                    </div>
                </form>
                <div class="container-login100-form-btn">
                    <div class="wrap-login100-form-btn">
                        <div class="login100-form-bgbtn"></div>
                        <button onclick="login()" type="submit" class="login100-form-btn">
                            Login
                        </button>
                    </div>
                </div>
                <?php

                $curl = curl_init();
                $Email = $_GET['email'];
                $Password = $_GET['pass'];
                $fields = array(
                    'name' => urlencode($Email),
                    'password' => urlencode($Password),
                );
                $fields_string = "";
                foreach ($fields as $key => $value) {
                    $fields_string .= $key . '=' . $value . '&';
                }
                curl_setopt_array($curl, array(
                    CURLOPT_URL => 'api.klubaderai.com/api/login',
                    CURLOPT_RETURNTRANSFER => true,
                    CURLOPT_ENCODING => '',
                    CURLOPT_MAXREDIRS => 10,
                    CURLOPT_TIMEOUT => 0,
                    CURLOPT_FOLLOWLOCATION => true,
                    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                    CURLOPT_CUSTOMREQUEST => 'POST',
                    CURLOPT_POSTFIELDS => $fields_string,
                    CURLOPT_HTTPHEADER => array(
                        'Content-Type: application/x-www-form-urlencoded'
                    ),
                ));

                $response = curl_exec($curl);

                curl_close($curl);
                echo $response;
                ?>

                <!-- <script>
                    function login() {
                        const data = {
                            email: document.getElementById("login_id").value,
                            password: document.getElementById("login_pass").value
                        };

                        //POST request with body equal on data in JSON format
                        fetch('https://api.klubaderai.com/api/login', {
                                method: 'POST',
                                headers: {
                                    'Content-Type': 'application/json',
                                },
                                body: JSON.stringify(data),
                            })
                            .then((response) => response.json())
                            //Then with the data from the response in JSON...
                            .then((data) => {
                                console.log('Success:', data);
                                <?php
                                $_SESSION['login'] = true;
                                ?>
                            })
                            //Then with the error genereted...
                            .catch((error) => {
                                console.error('Error:', error);
                            })

                        ;

                    }
                </script> -->
            </div>
        </div>
    </div>

</body>

</html>