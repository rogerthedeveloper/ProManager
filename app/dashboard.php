<?php
/**
 * Created by PhpStorm.
 * User: RSpro
 * Date: 22/05/16
 * Time: 13:59
 */

 require_once("../assets/config.php");

?>


<?php include("../assets/layouts/header.php"); ?>


<script type="text/javascript">

    // Load the Visualization API and the corechart package.
    google.charts.load('current', {'packages':['corechart']});

    // Set a callback to run when the Google Visualization API is loaded.
    google.charts.setOnLoadCallback(drawChart);

    // Callback that creates and populates a data table,
    // instantiates the pie chart, passes in the data and
    // draws it.
    function drawChart() {

        // Create the data table.
        var data = new google.visualization.DataTable();
        data.addColumn('string', 'Topping');
        data.addColumn('number', 'Slices');
        data.addRows([
            ['Client', 2]
        ]);


        // Instantiate and draw our chart, passing in some options.
        var chart = new google.visualization.PieChart(document.getElementById('chart_div'));
        chart.draw(data);

        $(window).resize(function(){

            chart.draw(data);

        });

    }




</script>


<div class="container">

    <div class="col-md-6">



        <div class="panel panel-default">

            <div class="panel-heading">
                <h3 class="panel-title"><span class="glyphicon glyphicon-stats" aria-hidden="true"></span>

                    Top 10 Clients

                </h3>

            </div>

            <div class="panel-collapse collapse in">

                <div class="panel-body">


                    <div id="chart_div"></div>


                </div>

                <div class="panel-footer">

                    <div style="text-align: center;">

                        <button id="print" type="button" class="print btn btn-default btn-md">
                            <span class="glyphicon glyphicon-print" aria-hidden="true"></span> Print
                        </button>

                    </div>

                </div>



            </div>

        </div>



    </div>


    <div class="col-md-6">



        <div class="panel panel-default">

            <div class="panel-heading">
                <h3 class="panel-title"><span class="glyphicon glyphicon-stats" aria-hidden="true"></span>

                    Today Sales

                </h3>

            </div>

            <div class="panel-collapse collapse in">

                <div class="panel-body">


                    <div id="chart_div"></div>


                </div>

                <div class="panel-footer">

                    <div style="text-align: center;">

                        <button id="print" type="button" class="print btn btn-default btn-md">
                            <span class="glyphicon glyphicon-print" aria-hidden="true"></span> Print
                        </button>

                    </div>

                </div>



            </div>

        </div>



    </div>




</div>




<?php include("../assets/layouts/footer.php"); ?>







