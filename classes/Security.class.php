<?php

/**
 * Created by PhpStorm.
 * User: RSpro
 * Date: 4/07/16
 * Time: 10:04
 */
class Security extends App  {


    private static $user;

    private static $token;
    private static $status;



    public function __construct()   {

        session_start();

        if(isset($_SESSION["token"])) {

            Security::$token = $_SESSION["token"];

        }


        $scriptName = strtolower(basename($_SERVER["SCRIPT_FILENAME"], '.php'));


        if(!Security::$token && $scriptName != 'login' && $scriptName != 'api') {

           header("Location: ../app/login.php");

        }
        elseif(Security::$token && $scriptName == 'login') {


            header("Location: ../app/dashboard.php");


        }


    }


    public static function login($loginData) {

        $user = $loginData["user"];
        $pass = $loginData["pass"];


        $query = Controller::$connection->query("SELECT * FROM login WHERE user = '$user' AND pass = '".md5($pass)."'");


        if($query->rowCount()) {

            $_SESSION["token"] = session_id();


            return true;

        }

        return false;


    }

    public static function logout() {

        session_destroy();

        session_unset();

        unset($_SESSION);


        $query = Controller::$connection->query("SELECT * FROM login WHERE user = 'roger'");


        if($query->rowCount()) {


            return true;

        }

        return false;



    }



}


new Security();





