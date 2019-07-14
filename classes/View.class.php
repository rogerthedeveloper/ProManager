<?php

/**
 * Created by PhpStorm.
 * User: RSpro
 * Date: 22/05/16
 * Time: 14:01
 */


class View extends App
{

    public static function showViewFromTable($table_name, $table_title, $options, $view = "table_default")  {


        include("../assets/layouts/tables/".$view.".php");


    }


    public static function showView($options, $view = "view_default")  {


        include("../assets/layouts/views/".$view.".php");


    }

}

new View();