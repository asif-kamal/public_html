var db_state = 0;
var run6_1_state = 0;
var run6_2_state = 0;
var report_state = 0;

$(document).ready(function() {
    $("#showAll").click(function() {
        if (db_state == 0) { //Hide all objects
            db_state = 1;
            $("#Lab6_2").hide();
            $("#Lab6_1").hide();
            $("#Report").hide();
            $("#showAll").html("<a class='nav-link active' href='#'><i class='fa-solid fa-plus'></i> Show Dashboard</a>");
        } else {
            db_state = 0;
            $("#Lab6_2").show();
            $("#Lab6_1").show();
            $("#Report").show();
            $("#showAll").html("<a class='nav-link active' href='#'><i class='fa-solid fa-minus'></i> Hide Dashboard</a>");
        };
    });
    $("#run6_1").click(function() {
        if (run6_1_state == 0) { //Hide all objects
            run6_1_state = 1;
            $("#Lab6_1").hide();
            $("#run6_1").html("<a class='nav-link active' href='#'><i class='fas fa-stop'></i> Show Lab 6.1</a>");
        } else {
            run6_1_state = 0;
            $("#Lab6_1").show();
            $("#run6_1").html("<a class='nav-link active' href='#'><i class='fas fa-square-check'></i> Hide Lab 6.1</a>");
        };
    });
    $("#run6_2").click(function() {
        if (run6_2_state == 0) { //Hide all objects
            run6_2_state = 1;
            $("#Lab6_2").hide();
            $("#run6_2").html("<a class='nav-link active' href='#'><i class='fas fa-stop'></i> Show Lab 6.2</a>");
        } else {
            run6_2_state = 0;
            $("#Lab6_2").show();
            $("#run6_2").html("<a class='nav-link active' href='#'><i class='fas fa-square-check'></i> Hide Lab 6.2</a>");
        };
    });
});