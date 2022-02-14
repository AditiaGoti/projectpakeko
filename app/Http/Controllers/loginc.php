<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Symfony\Component\Console\Input\Input;

class loginc extends Controller
{
    function index()
    {
        return view('/login');
    }


    function login(Request $request)
    {
        // return $request->all();

        $login_email = $request->input('email');
        $login_password = $request->input('password');

        $fields = array(
            'email' => urlencode($login_email),
            'password' => urlencode($login_password),
        );
        $fields_string = "";
        foreach ($fields as $key => $value) {
            $fields_string .= $key . '=' . $value . '&';
        }
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => 'http://api.klubaderai.com/api/login',
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
        $decoded = json_decode($response);
        curl_close($curl);
        // echo $response;



        $token = $decoded->token;
        $id = $decoded->data->id;
        $name = $decoded->data->name;
        $email = $decoded->data->email;
        $type = $decoded->data->type;



        session_start();

        // Storing session data

        $_SESSION["token"] = $token;
        $_SESSION["id"] = $id;
        $_SESSION["name"] = $name;
        $_SESSION["email"] = $email;
        $_SESSION["type"] = $type;

        switch ($type) {
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
}
