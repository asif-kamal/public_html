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
            $("#run6_1").html("<a class='nav-link active' href='#'><i class='fas fa-stop'></i> Show Lab 6.1</a>");
            $("#run6_2").html("<a class='nav-link active' href='#'><i class='fas fa-stop'></i> Show Lab 6.2</a>");
            $("#report").html("<a class='nav-link active' href='#'><i class='fas fa-stop'></i> Show Project Report</a>");
        } else if (run6_1_state == 1 && run6_2_state == 1 && report_state == 1) {
            db_state = 1;
            $("#Lab6_2").hide();
            $("#Lab6_1").hide();
            $("#Report").hide();
            $("#showAll").html("<a class='nav-link active' href='#'><i class='fa-solid fa-plus'></i> Show Dashboard</a>");
            $("#run6_1").html("<a class='nav-link active' href='#'><i class='fas fa-stop'></i> Show Lab 6.1</a>");
            $("#run6_2").html("<a class='nav-link active' href='#'><i class='fas fa-stop'></i> Show Lab 6.2</a>");
            $("#report").html("<a class='nav-link active' href='#'><i class='fas fa-stop'></i> Show Project Report</a>");
        } else if (run6_1_state == 0 && run6_2_state == 0 && report_state == 0) {
            db_state = 0;
            $("#Lab6_2").show();
            $("#Lab6_1").show();
            $("#Report").show();
            $("#showAll").html("<a class='nav-link active' href='#'><i class='fa-solid fa-minus'></i> Hide Dashboard</a>");
            $("#run6_1").html("<a class='nav-link active' href='#'><i class='fas fa-square-check'></i> Hide Lab 6.1</a>");
            $("#run6_2").html("<a class='nav-link active' href='#'><i class='fas fa-square-check'></i> Hide Lab 6.2</a>");
            $("#report").html("<a class='nav-link active' href='#'><i class='fas fa-square-check'></i> Hide Project Report</a>");
        } else {
            db_state = 0;
            $("#Lab6_2").show();
            $("#Lab6_1").show();
            $("#Report").show();
            $("#showAll").html("<a class='nav-link active' href='#'><i class='fa-solid fa-minus'></i> Hide Dashboard</a>");
            $("#run6_1").html("<a class='nav-link active' href='#'><i class='fas fa-square-check'></i> Hide Lab 6.1</a>");
            $("#run6_2").html("<a class='nav-link active' href='#'><i class='fas fa-square-check'></i> Hide Lab 6.2</a>");
            $("#report").html("<a class='nav-link active' href='#'><i class='fas fa-square-check'></i> Hide Project Report</a>");
        };
    });

    $("#run6_1").click(function() {
        if (run6_1_state == 0) { //Hide 
            run6_1_state = 1;
            $("#Lab6_1").hide();
            $("#run6_1").html("<a class='nav-link active' href='#'><i class='fas fa-stop'></i> Show Lab 6.1</a>");
        } else if (run6_1_state == 0 && run6_2_state == 1 && report_state == 1) {
            run6_1_state = 1;
            db_state = 1
            $("#Lab6_1").hide();
            $("#run6_1").html("<a class='nav-link active' href='#'><i class='fas fa-stop'></i> Show Lab 6.1</a>");
            $("#showAll").html("<a class='nav-link active' href='#'><i class='fa-solid fa-plus'></i> Show Dashboard</a>");
        } else if (run6_1_state == 1 && run6_2_state == 0 && report_state == 0) {
            run6_1_state = 0;
            db_state = 0;
            $("#Lab6_1").show();
            $("#run6_1").html("<a class='nav-link active' href='#'><i class='fas fa-square-check'></i> Hide Lab 6.1</a>");
            $("#showAll").html("<a class='nav-link active' href='#'><i class='fa-solid fa-minus'></i> Hide Dashboard</a>");
        } else {
            run6_1_state = 0;
            db_state = 0;
            $("#Lab6_1").show();
            $("#run6_1").html("<a class='nav-link active' href='#'><i class='fas fa-square-check'></i> Hide Lab 6.1</a>");
        };
    });

    $("#run6_2").click(function() {
        if (run6_2_state == 0) { //Hide 
            run6_2_state = 1;
            $("#Lab6_2").hide();
            $("#run6_2").html("<a class='nav-link active' href='#'><i class='fas fa-stop'></i> Show Lab 6.2</a>");
        } else if (run6_2_state == 0 && run6_1_state == 1 && report_state == 1) {
            run6_2_state = 1;
            db_state = 1;
            $("#Lab6_2").hide();
            $("#run6_2").html("<a class='nav-link active' href='#'><i class='fas fa-stop'></i> Show Lab 6.2</a>");
            $("#showAll").html("<a class='nav-link active' href='#'><i class='fa-solid fa-plus'></i> Show Dashboard</a>");
        } else if (run6_2_state == 1 && run6_2_state == 0 && report_state == 0) {
            run6_2_state = 0;
            db_state = 0;
            $("#Lab6_2").show();
            $("#run6_2").html("<a class='nav-link active' href='#'><i class='fas fa-square-check'></i> Hide Lab 6.2</a>");
            $("#showAll").html("<a class='nav-link active' href='#'><i class='fa-solid fa-minus'></i> Hide Dashboard</a>");
        } else {
            run6_2_state = 0;
            db_state = 0
            $("#Lab6_2").show();
            $("#run6_2").html("<a class='nav-link active' href='#'><i class='fas fa-square-check'></i> Hide Lab 6.2</a>");
        };
    });

    $("#report").click(function() {
        if (report_state == 0) { //Hide
            report_state = 1;
            $("#Report").hide();
            $("#report").html("<a class='nav-link active' href='#'><i class='fas fa-stop'></i> Show Project Report</a>");
        } else if (report_state == 0 && run6_1_state == 1 && run6_2_state == 1) {
            report_state = 1;
            db_state = 1;
            $("#Report").hide();
            $("#report").html("<a class='nav-link active' href='#'><i class='fas fa-stop'></i> Show Project Report</a>");
            $("#showAll").html("<a class='nav-link active' href='#'><i class='fa-solid fa-plus'></i> Show Dashboard</a>");
        } else if (report_state == 1 && run6_2_state == 0 && run6_1_state == 0) {
            report_state = 0;
            db_state = 0;
            $("#Report").show();
            $("#report").html("<a class='nav-link active' href='#'><i class='fas fa-square-check'></i> Hide Project Report</a>");
            $("#showAll").html("<a class='nav-link active' href='#'><i class='fa-solid fa-minus'></i> Hide Dashboard</a>");
        } else {
            report_state = 0;
            db_state = 0
            $("#Report").show();
            $("#report").html("<a class='nav-link active' href='#'><i class='fas fa-square-check'></i> Hide Project Report</a>");
        };
    });
});