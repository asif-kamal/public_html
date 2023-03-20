var db_state = 0;
var run6_1 = 0;
var run6_2 = 0;
var report_state = 0;

$(document).ready(function() {
    $("#showAll").click(function() {
        if (db_state == 0) {
            db_state = 1;
            $("#showAll").html("<i class='fa-solid fa-plus'></i> Show Dashboard");
        } else {
            db_state = 0;
            $("#showAll").html("<i class='fa-solid fa-minus'></i> Hide Dashboard");
        };
    });
});

