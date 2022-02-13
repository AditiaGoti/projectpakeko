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

        $email = $request->input('email');
        $password = $request->input('password');

        $fields = array(
            'email' => urlencode($email),
            'password' => urlencode($password),
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

        curl_close($curl);
        echo $response;
    }
}
