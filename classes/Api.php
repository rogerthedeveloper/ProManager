<?php

include("App.class.php");
include("Model.class.php");
include("Controller.class.php");
include("Security.class.php");

/**
 * Created by PhpStorm.
 * User: RSpro
 * Date: 24/05/16
 * Time: 14:13
 */

class Api extends Controller  {



    public function allRegistries($table) {

        $query = Controller::$connection->query("SELECT * FROM $table");

        if($query) {

            $data = $query->fetchAll(PDO::FETCH_NUM);
        }


        header('Content-Type: application/json');

        echo json_encode($data);

    }


    public function oneRegistry($table, $key, $cod) {

        $query = Controller::$connection->query("SELECT * FROM $table WHERE $key = '$cod' LIMIT 1");

        if($query) {

            $data = $query->fetchAll(PDO::FETCH_ASSOC);
        }


        header('Content-Type: application/json');

        echo json_encode($data);

    }



    public function create($table, $data) {



            $values = Controller::values($data);

            $query = Controller::$connection->query("INSERT INTO $table $values");


        header('Content-Type: application/json');


        if($query) {

            echo json_encode(["Inserted"]);

        }
        else {

            echo json_encode(["Not Inserted"]);

            print_r(Controller::$connection->errorInfo());

        }



    }


    public function update($table, $key, $cod, $data) {



            $setValues = Controller::updateValues($data);

            $query = Controller::$connection->query("UPDATE $table $setValues");


        header('Content-Type: application/json');


        if($query) {

            echo json_encode(["Updated"]);

        }
        else {

            echo json_encode(["Not Updated"]);

            print_r(Controller::$connection->errorInfo());

        }




    }


    public function delete($table, $key, $cod) {

        $query = Controller::$connection->query("DELETE FROM $table WHERE $key = '$cod' LIMIT 1");


        header('Content-Type: application/json');

        if($query) {

            echo json_encode(["Deleted"]);

        }
        else {

            echo json_encode(["Not Deleted"]);

            print_r(Controller::$connection->errorInfo());

        }


    }


    public function prev($table, $key, $cod) {

        $query = Controller::$connection->query("SELECT * FROM $table WHERE $key < '$cod' ORDER BY $key DESC LIMIT 1");

        if($query) {

            $data = $query->fetchAll(PDO::FETCH_ASSOC);

        }


        header('Content-Type: application/json');

        echo json_encode($data);

    }


    public function next($table, $key, $cod) {

        $query = Controller::$connection->query("SELECT * FROM $table WHERE $key > '$cod' ORDER BY $key ASC LIMIT 1");


        if($query) {

            $data = $query->fetchAll(PDO::FETCH_ASSOC);

        }


        header('Content-Type: application/json');

        echo json_encode($data);

    }


    public function login($loginData) {


        if(Security::login($loginData)) {


            header('Content-Type: application/json');

            echo json_encode(["OK"]);


        } else {


            header('Content-Type: application/json');

            echo json_encode(["Error"]);

        }


    }


    public function logout() {


        if(Security::logout()) {


            header('Content-Type: application/json');

            echo json_encode(["OK"]);


        } else {


            header('Content-Type: application/json');

            echo json_encode(["Error"]);

        }


    }


}

    if(isset($_POST["data"]) && isset($_GET["action"])) {


            $data = $_POST["data"];


            $table = $_POST["table"];

            $key = $_POST["key"];

            $cod = $_POST["cod"];


            $action = $_GET["action"];



            $request = new Api();


            switch ($action) {

                case 'all':

                    $request->allRegistries($table);

                    break;
                case 'one':

                    $request->oneRegistry($table, $key, $cod);

                    break;
                case 'create':

                    $request->create($table, $data);

                    break;
                case 'update':

                    $request->update($table, $key, $cod, $data);

                    break;
                case 'delete':

                    $request->delete($table, $key, $cod);

                    break;
                case 'prev':

                    $request->prev($table, $key, $cod);

                    break;
                case 'next':

                    $request->next($table, $key, $cod);

                    break;
                case 'login':

                    $request->login($data);

                    break;
                case 'logout':

                    $request->logout();

                    break;


        }



    }


