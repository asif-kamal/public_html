var db_state = 0;
var run6_1_state = 0;
var run6_2_state = 0;
var report_state = 0;

var loopBtn_state = 0;
var performingBtn_state = 0;
var scalabilityBtn_state = 0;

var bubbleBtn_state = 0;
var chevronLabSixOne_state = 0;
var projectReportBtn_state = 0;
var chevronLabSixReport_state = 0;

var loopRunBtn_state = 0;
var performanceResultsBtn_state = 0;
var scalabilityRunBtn_state = 0;


$(document).ready(function () {
    $("#showAll").click(function () {
        if (db_state == 0) { //Hide all objects
            db_state = 1;
            $("#showAll").html("<a class='nav-link active' href='#'><i class='fa-solid fa-plus'></i> Show Dashboard</a>");
            $("#run6_1").html("<a class='nav-link active' href='#'><i class='fas fa-stop'></i> Show Lab 6.1</a>");
            $("#run6_2").html("<a class='nav-link active' href='#'><i class='fas fa-stop'></i> Show Lab 6.2</a>");
            $("#report").html("<a class='nav-link active' href='#'><i class='fas fa-stop'></i> Show Project Report</a>");
            $("#Lab6_1").hide();
            $("#Lab6_2").hide();
            $("#Report").hide();
        } else {
            db_state = 0;
            $("#showAll").html("<a class='nav-link active' href='#'><i class='fa-solid fa-minus'></i> Hide Dashboard</a>");
            $("#run6_1").html("<a class='nav-link active' href='#'><i class='fas fa-square-check'></i> Hide Lab 6.1</a>");
            $("#run6_2").html("<a class='nav-link active' href='#'><i class='fas fa-square-check'></i> Hide Lab 6.2</a>");
            $("#report").html("<a class='nav-link active' href='#'><i class='fas fa-square-check'></i> Hide Project Report</a>");
            $("#Lab6_1").show();
            $("#Lab6_2").show();
            $("#Report").show();
        };
    });

    $("#run6_1").click(function () {
        if (run6_1_state == 0) { //Hide 
            run6_1_state = 1;
            $("#Lab6_1").hide();
            $("#run6_1").html("<a class='nav-link active' href='#'><i class='fas fa-stop'></i> Show Lab 6.1</a>");
            $("#showAll").html("<a class='nav-link active' href='#'><i class='fa-solid fa-plus'></i> Show Dashboard</a>");
        } else {
            if (run6_2_state == 0 && report_state == 0) {
                run6_1_state = 0;
                $("#Lab6_1").show();
                $("#run6_1").html("<a class='nav-link active' href='#'><i class='fas fa-square-check'></i> Hide Lab 6.1</a>");
                $("#showAll").html("<a class='nav-link active' href='#'><i class='fa-solid fa-minus'></i> Hide Dashboard</a>");
            } else {
                run6_1_state = 0;
                $("#Lab6_1").show();
                $("#run6_1").html("<a class='nav-link active' href='#'><i class='fas fa-square-check'></i> Hide Lab 6.1</a>");
            };
        };
    });

    $("#run6_2").click(function () {
        if (run6_2_state == 0) { //Hide
            run6_2_state = 1;
            $("#Lab6_2").hide();
            $("#run6_2").html("<a class='nav-link active' href='#'><i class='fas fa-stop'></i> Show Lab 6.2</a>");
            $("#showAll").html("<a class='nav-link active' href='#'><i class='fa-solid fa-plus'></i> Show Dashboard</a>");
        } else {
            if (run6_1_state == 0 && report_state == 0) {
                run6_2_state = 0;
                $("#Lab6_2").show();
                $("#run6_2").html("<a class='nav-link active' href='#'><i class='fas fa-square-check'></i> Hide Lab 6.2</a>");
                $("#showAll").html("<a class='nav-link active' href='#'><i class='fa-solid fa-minus'></i> Hide Dashboard</a>");
            } else {
                run6_2_state = 0;
                $("#Lab6_2").show();
                $("#run6_2").html("<a class='nav-link active' href='#'><i class='fas fa-square-check'></i> Hide Lab 6.2</a>");
            };
        };
    });

    $("#report").click(function () {
        if (report_state == 0) { //Hide
            report_state = 1;
            $("#Report").hide();
            $("#report").html("<a class='nav-link active' href='#'><i class='fas fa-stop'></i> Show Project Report</a>");
            $("#showAll").html("<a class='nav-link active' href='#'><i class='fa-solid fa-plus'></i> Show Dashboard</a>");
        } else {
            if (run6_1_state == 0 && run6_2_state == 0) {
                report_state = 0;
                $("#Report").show();
                $("#report").html("<a class='nav-link active' href='#'><i class='fas fa-square-check'></i> Hide Project Report</a>");
                $("#showAll").html("<a class='nav-link active' href='#'><i class='fa-solid fa-minus'></i> Hide Dashboard</a>");
            } else {
                report_state = 0;
                $("#Report").show();
                $("#report").html("<a class='nav-link active' href='#'><i class='fas fa-square-check'></i> Hide Project Report</a>");
            };
        };
    });

    $("#LoopBtn").click(function () {
        if (loopBtn_state == 0) {
            loopBtn_state = 1;
            $("#LoopBtn").html("Loop Order Correctness Monitor Console")
        } else {
            loopBtn_state = 0;
            $("#LoopBtn").html('Loop Order Correctness Investigation');
        };
    });

    $("#LoopBtn").click(function () {
        if (loopBtn_state == 0) {
            loopRunBtn_state = 1;
            $("#LoopRun").hide();
        } else {
            loopRunBtn_state = 0;
            $("#LoopRun").show();
        }
    })

    $("#PerformingBtn").click(function () {
        if (performingBtn_state == 0) {
            performingBtn_state = 1;
            $("#PerformingBtn").html("Best Performing Order Monitor Console");
        } else {
            performingBtn_state = 0;
            $("#PerformingBtn").html("Best Performing Order Investigation");
        };
    });

    $("#PerformingBtn").click(function () {
        if (performingBtn_state == 0) {
            performanceResultsBtn_state = 1;
            $("#Results").hide();
        } else {
            performanceResultsBtn_state = 0;
            $("#Results").show();
        };
    });

    $("#ScalabilityBtn").click(function () {
        if (scalabilityBtn_state == 0) {
            scalabilityBtn_state = 1;
            $("#ScalabilityBtn").html("Best Order Scalability Monitor");
        } else {
            scalabilityBtn_state = 0;
            $("#ScalabilityBtn").html("Best Order Scalability Investigation");
        };
    });

    $("#ScalabilityBtn").click(function () {
        if (scalabilityBtn_state == 0) {
            scalabilityRunBtn_state = 1;
            $("#ScalabilityRun").hide();
        } else {
            scalabilityRunBtn_state = 0;
            $("#ScalabilityRun").show();
        }
    })

    $("#BubbleBtn").click(function () {
        if (bubbleBtn_state == 0) {
            bubbleBtn_state = 1;
            $("#bubbleSort").toggle();
            $("#BubbleBtn").text("Magic of Bubble Sort Console");
        } else {
            bubbleBtn_state = 0;
            $("#bubbleSort").toggle();
            $("#BubbleBtn").html("<h7>Magic of Bubble Sort</h7>");
        };
    });

    $("#projectReportBtn").click(function () {
        if (projectReportBtn_state == 0) {
            projectReportBtn_state = 1;
            $("#projectFinalReport").hide();
            $("#projectReportBtn").text("Project Report");
        } else {
            projectReportBtn_state = 0;
            $("#projectFinalReport").show();
            $("#projectReportBtn").html("<h7>Details</h7>");
        };
    });

    $('#chevronLabSixOne').click(() => {
        if (chevronLabSixOne_state = 0) {
            chevronLabSixOne_state = 1;
            $("#Lab6_1_online").toggle();
        } else {
            chevronLabSixOne_state = 0;
            $("#Lab6_1_online").toggle();
        };
    });

    $('#chevronLabSixReport').click(() => {
        if (chevronLabSixReport_state = 0) {
            chevronLabSixReport_state = 1;
            $("#projectReport").toggle();
        } else {
            chevronLabSixReport_state = 0;
            $("#projectReport").toggle();
        };
    });
});