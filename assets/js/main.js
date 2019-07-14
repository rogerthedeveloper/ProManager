/**
 * Created by RSpro on 23/05/16.
 */

$("input, textarea, select").val("");


var table_details = $('.detail_table').DataTable({

    responsive: true,
    dom: 'Bfrtlip',
    buttons: [
        'excel', 'pdf', 'print'
    ],
    select: true,
    pageLength: 10,
    scrollY:    150

});


$('.detail_table tbody').on( 'click', 'tr', function () {


    if ( $(this).hasClass('selected') ) {


            var control = $(this).closest('.panel').find('.create');

            var form = $(control).closest(".panel");


            var table = $(this).closest(".detail_table").attr("id");

            var key = 'ID';

            var cod = table_details.row(this).data()[0];



        $.ajax({

            url: "../classes/Api.php?action=one",
            method: "POST",
            data: { "data": cod, "table": table, "key": key, "cod": cod },
            dataType: "JSON",
            success: function(r) {


                if(r != "") {

                    switchUD(control, true);
                    //refreshDetail(form);

                }

                $.each(r[0], function(key, value) {


                    $(form).find("#"+key).val(value);

                });

            }


        });



    }


} );


function adjustHeaders() {


    table_details.columns.adjust().draw();


}

setTimeout(function(){ adjustHeaders(); }, 100);



$(".panel-title").on("click", function()  {


    setTimeout(function(){ adjustHeaders(); }, 100);


});


$(window).resize(function() {


    setTimeout(function(){ adjustHeaders(); }, 100);


});



$("button.new").on("click", function()     {

    var control = this;

    var form = $(control).closest(".panel");

    $(this).closest(".panel").find("input, textarea, select").val("");
    switchUD(control, false);
    refreshDetail(form);


});


$("button.create").on("click", function()  {


    var control = this;

    var fields = $(this).closest(".panel").find(".inputs_wrapper").find("input, textarea, select");

    var form = $(control).closest(".panel");


    var arrayFields = [];


    $.each(fields, function(key, value) {


        arrayFields[value.id] = $(value).val();


    });

    var obj = $.extend({}, arrayFields);


    var table = $(this).closest(".panel").attr("id");

    var key = $(this).closest(".panel").find("input").first().attr("id");

    var cod = $(this).closest(".panel").find("input").first().val();


    $.ajax({

        url: "../classes/Api.php?action=create",
        method: "POST",
        data: { "data": obj, "table": table, "key": key, "cod": cod },
        dataType: "JSON",
        success: function(r) {


            if(r == "Inserted") {

                $(form).closest(".panel").find("input, textarea, select").val("");
                switchUD(control, false);
                refreshDetail(form);

            }


        }


    });



});


$("button.update").on("click", function()  {


    var control = this;

    var fields = $(this).closest(".panel").find(".inputs_wrapper").find("input, textarea, select");

    var arrayFields = [];


    $.each(fields, function(key, value) {


        arrayFields[value.id] = $(value).val();


    });

    var obj = $.extend({}, arrayFields);


    var table = $(this).closest(".panel").attr("id");

    var key = $(this).closest(".panel").find("input").first().attr("id");

    var cod = $(this).closest(".panel").find("input").first().val();


    $.ajax({

        url: "../classes/Api.php?action=update",
        method: "POST",
        data: { "data": obj, "table": table, "key": key, "cod": cod },
        dataType: "JSON",
        success: function(r) {


            if(r == "Updated") {

                refreshDetail(control);

            }


        }


    });


});

$("button.delete").on("click", function()  {


    var control = this;

    var fields = $(this).closest(".panel").find("input").first().val();

    var form = $(control).closest(".panel");


    var table = $(this).closest(".panel").attr("id");

    var key = $(this).closest(".panel").find("input").first().attr("id");

    var cod = $(this).closest(".panel").find("input").first().val();


    $.ajax({

        url: "../classes/Api.php?action=delete",
        method: "POST",
        data: { "data": fields, "table": table, "key": key, "cod": cod },
        dataType: "JSON",
        success: function(r) {


            if(r == "Deleted") {

                $(form).closest(".panel").find("input, textarea, select").val("");
                switchUD(control, false);
                refreshDetail(control);

            }

        }


    });



});

$("button.prev").on("click", function()    {

    var control = this;

    var fields = $(this).closest(".panel").find("input").first().val();

    var form = $(control).closest(".panel");


    var table = $(this).closest(".panel").attr("id");

    var key = $(this).closest(".panel").find("input").first().attr("id");

    var cod = $(this).closest(".panel").find("input").first().val();


    $.ajax({

        url: "../classes/Api.php?action=prev",
        method: "POST",
        data: { "data": fields, "table": table, "key": key, "cod": cod },
        dataType: "JSON",
        success: function(r) {

            if(r != "") {

                switchUD(control, true);
                refreshDetail(control);

            }

            $.each(r[0], function(key, value) {

                $(form).find("#"+key).val(value);

            });

        }


    });



});


$("button.next").on("click", function()    {


    var control = this;

    var fields = $(this).closest(".panel").find("input").first().val();

    var form = $(control).closest(".panel");


    var table = $(this).closest(".panel").attr("id");

    var key = $(this).closest(".panel").find("input").first().attr("id");

    var cod = $(this).closest(".panel").find("input").first().val();


    $.ajax({

        url: "../classes/Api.php?action=next",
        method: "POST",
        data: { "data": fields, "table": table, "key": key, "cod": cod },
        dataType: "JSON",
        success: function(r) {


            if(r != "") {

                switchUD(control, true);
                refreshDetail(form);

            }

            $.each(r[0], function(key, value) {

                $(form).find("#"+key).val(value);

            });

        }


    });



});

function refreshDetail(control) {


    var fields = $(control).closest(".panel").find("input").first().val();

    var table = $(control).closest(".panel").attr("id");

    var key = $(control).closest(".panel").find("input").first().attr("id");

    var cod = $(control).closest(".panel").find("input").first().val();


    $.ajax({

        url: "../classes/Api.php?action=all",
        method: "POST",
        data: { "data": fields, "table": table, "key": key, "cod": cod },
        dataType: "JSON",
        success: function(r) {


            if (r) {


                $(control).closest(".panel").find('.detail_table').DataTable().clear().draw();

                $(control).closest(".panel").find('.detail_table').DataTable().rows.add(r).draw();


            }

        }

    });



}


function switchUD(control, option) {

    if(option) {

        $(control).closest(".panel").find("#delete").removeAttr("disabled");
        $(control).closest(".panel").find("#update").removeAttr("disabled");
        $(control).closest(".panel").find("#create").attr("disabled", true);

    }
    else {

        $(control).closest(".panel").find("#delete").attr("disabled", true);
        $(control).closest(".panel").find("#update").attr("disabled", true);
        $(control).closest(".panel").find("#create").removeAttr("disabled");

    }


}



    $('input').on('keyup', function(e) {

        if (e.which === 13) {

            $(this).next('input').focus();

        }


});


$(".loginForm").on("submit", function(e)  {


    e.preventDefault();


    var arrayFields = [];


    var fields = $(this).find("input");



    $.each(fields, function(key, value) {


        arrayFields[value.id] = $(value).val();


    });


    var obj = $.extend({}, arrayFields);


    $.ajax({

        url: "../classes/Api.php?action=login",
        method: "POST",
        data: { "data": obj, "table": 'login', "key": 'user', "cod": 0 },
        dataType: "JSON",
        success: function(r) {


            if(r == "OK") {

                location.replace("../app/dashboard.php");


            }
            else {

                alert("Login Incorrecto!");

            }


        }


    });



});

$(".btnLogout").on("click", function(e)  {


    $.ajax({

        url: "../classes/Api.php?action=logout",
        method: "POST",
        data: { "data": 1, "table": 'login', "key": 'user', "cod": 0 },
        dataType: "JSON",
        success: function(r) {


            if(r == "OK") {

                location.replace("../app/login.php")


            }


        }


    });





});



$(".datepicker").datepicker({

    dateFormat: "yy-mm-dd"

});



$('input, button, select').keydown(function (e) {
    if (e.which === 13) {

        var index = $('input, button, select').index(this) + 1;
        $('input, button, select').eq(index).focus();

    }
});




/* Custom JS for Views */



