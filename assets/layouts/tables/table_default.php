<?php
/**
 * Created by PhpStorm.
 * User: RSpro
 * Date: 22/05/16
 * Time: 15:31
 */


/* Form Construct Data */

try {

    $fields = Controller::$connection->query("DESC $table_name");

    if($fields) {

        $fields = $fields->fetchAll(PDO::FETCH_NUM);
    }



}


catch(mysqli_sql_exception $e) {

    echo $e->getMessage();

}



try {


    $registries = Controller::$connection->query("SELECT * FROM $table_name");

    if($registries) {

    $registries = $registries->fetchAll(PDO::FETCH_NUM);

    }


}


catch(mysqli_sql_exception $e) {

    echo $e->getMessage();

}

/* End Form Construct Data */


?>

<div id="<?php echo $table_name; ?>" class="panel panel-default">

    <div class="panel-heading">
        <h3 class="panel-title"><span class="glyphicon glyphicon-search" aria-hidden="true"></span>

            <a data-toggle="collapse" data-target="#<?php echo $table_name."-panel"; ?>">
                <?php echo $table_title; ?>
            </a>

        </h3>

    </div>

    <div id="<?php echo $table_name."-panel"; ?>" class="panel-collapse collapse in">

    <div class="panel-body">


    <div class="col-md-<?php if(isset($options["photo"]) == true) { echo "8"; } else { echo "12"; } ?>">

        <div class="well">


            <div class="inputs_wrapper">

            <?php foreach($fields as $key => $value): ?>



               <?php if($value[3] == "MUL"): ?>


        <div class="form-group">

            <div class="input-group">
                <span class="input-group-addon" id="basic-addon">
                    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                    </span>

                <select id="<?php echo $value[0]; ?>" class="form-control" aria-describedby="basic-addon">

                    <option value="">Search <?php echo strtoupper($value[0]); ?></option>

                </select>

            </div>

        </div>

        <script>

            $(document).ready(function() {

                $("select#<?php echo $value[0]; ?>").select2({ data:[


                    <?php $FK_table = Controller::$connection->query("SELECT referenced_table_name as table_name
                  from information_schema.referential_constraints
                  where table_name = '$table_name'");

                    $FK_table = $FK_table->fetch(PDO::FETCH_NUM); ?>


                    <?php $FKData = Controller::$connection->query("SELECT * FROM $FK_table[0]");


                    $FKData = $FKData->fetchAll(PDO::FETCH_NUM); ?>



                <?php foreach($FKData as $key => $value): ?>

                        {
                            id: <?php echo $value[0]; ?>,
                            text: '<?php echo $value[0]; ?> - <?php echo $value[1]; ?>'
                        },


                <?php endforeach; ?>

                ],


                    minimumInputLength: 1


                })

            });


        </script>


                <?php else: ?>

        <div class="form-group">

            <div class="input-group">
                <span class="input-group-addon" id="basic-addon">
                    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                </span>
                <input id="<?php echo $value[0]; ?>" type="text" class="<?php if($value[1] == "date") { echo "datepicker"; } ?> form-control" placeholder="<?php echo strtoupper($value[0]); ?>" aria-describedby="basic-addon" <?php if($value[5] == "auto_increment") { echo "disabled"; } ?>>
            </div>

        </div>

                <?php endif; ?>


            <?php endforeach; ?>


            </div>

            <button id="create" type="button" class="create btn btn-primary btn-md btn-lg center-block">
                <span class="glyphicon glyphicon-save" aria-hidden="true"></span> Save
            </button>


        </div>


    </div>

        <?php if(isset($options["photo"]) == true): ?>

            <div class="col-md-4">

                <div class="well">

                    <div style="text-align: center;">

                    <img class="form_image" src="../assets/img/no_pic.jpg">

                    </div>

                </div>


            </div>

        <?php endif; ?>

        <?php if($options["detail"] == true): ?>

        <div class="col-md-12">

            <div class="well">


            <table id="<?php echo $table_name; ?>" class="detail_table display" cellspacing="0" width="100%">
                <thead>
                <tr>

                    <?php foreach($fields as $key => $value): ?>

                        <th><?php echo $value[0]; ?></th>

                    <?php endforeach; ?>

                </tr>
                </thead>

                <tbody>


                <?php foreach($registries as $key => $value): ?>
                <tr>


                    <?php foreach($value as $key => $value): ?>
                        <td><?php echo $value; ?></td>
                    <?php endforeach; ?>



                </tr>
                <?php endforeach; ?>



                </tbody>

                <tfoot>

                    <tr>

                        <?php foreach($fields as $key => $value): ?>

                            <th><?php echo $value[0]; ?></th>

                        <?php endforeach; ?>

                    </tr>


                </tfoot>



            </table>

                </div>

        </div>

        <?php endif; ?>

    </div>



    <div class="panel-footer">

        <div style="text-align: center;">

        <button id="new" type="button" class="new btn btn-success btn-md">
            <span class="glyphicon glyphicon-plus" aria-hidden="true"></span> New
        </button>

        <button id="update" type="button" class="update btn btn-info btn-md" disabled>
            <span class="glyphicon glyphicon-refresh" aria-hidden="true"></span> Update
        </button>

        <button id="delete" type="button" class="delete btn btn-danger btn-md" disabled>
            <span class="glyphicon glyphicon-remove" aria-hidden="true"></span> Delete
        </button>

        <button id="prev" type="button" class="prev btn btn-warning btn-md">
            <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span> Prev
        </button>

        <button id="next" type="button" class="next btn btn-warning btn-md">
            Next <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
        </button>

        </div>

    </div>

    </div>

</div>




