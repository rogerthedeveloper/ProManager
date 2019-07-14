<?php
/**
 * Created by PhpStorm.
 * User: RSpro
 * Date: 22/05/16
 * Time: 14:02
 */

error_reporting(E_ALL);


foreach (glob("../classes/*.class.php") as $filename)    {

    include $filename;

}


?>


<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">

<meta charset="UTF-8">

<!-- jQuery v2 -->
<script src="../assets/libs/js/jquery.js"></script>

<!-- Angular JS -->
<script src="../assets/libs/js/angular.js"></script>


<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="../assets/libs/bootstrap/css/bootstrap.min.css">

<!-- Optional theme -->
<link rel="stylesheet" href="../assets/libs/bootstrap/css/bootstrap-theme.min.css">

<!-- Latest compiled and minified JavaScript -->
<script src="../assets/libs/bootstrap/js/bootstrap.min.js"></script>

<!-- DataTables -->
<link rel="stylesheet" type="text/css" href="../assets/libs/datatables/datatables.min.css"/>

<script type="text/javascript" src="../assets/libs/datatables/datatables.min.js"></script>

<!-- Jquery Confirm -->
<link rel="stylesheet" type="text/css" href="../assets/libs/jquery-confirm/jquery-confirm.min.css"/>

<script type="text/javascript" src="../assets/libs/jquery-confirm/jquery-confirm.min.js"></script>

<!-- Select2 JS -->
<script type="text/javascript" src="../assets/libs/select2/js/select2.full.min.js"></script>

<!-- Select2 CSS -->
<link rel="stylesheet" href="../assets/libs/select2/css/select2.min.css">

<!-- Google Charts -->
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

<!-- Jquery Confirm -->

<link rel="stylesheet" type="text/css" href="../assets/libs/jquery-ui/jquery-ui.min.css"/>

<script type="text/javascript" src="../assets/libs/jquery-ui/jquery-ui.min.js"></script>

