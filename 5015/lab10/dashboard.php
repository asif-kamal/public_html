<?php
    session_start();
    if ($_SESSION["RegState"] != 4) {
        $_SESSION["RegState"] = 0;
        $_SESSION["Message"] = "Please Login.";
        header("Location:index.php");
        exit();
    }
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Asif Kamal based on Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Jekyll v3.8.5">
    <title>Asif's Lab 10 - Secure Web Service I</title>
    <link rel="icon" type="image/x-icon" href="images/favicon.ico">



    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">


    <style>
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }
    </style>
    <!-- Custom styles for this template -->
    <link href="css/dashboard.css" rel="stylesheet">
    <!--load all Font Awesome styles -->
    <link href="css/fa/all.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <script src="js/fa/all.min.js" crossorigin="anonymous"></script>
    <script src="js/jquery-3.6.4.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/feather.min.js"></script>
    <script src="js/Chart.min.js"></script>
    <script src="js/dashboard.js"></script>
    <script src="js/lab_8.js"></script>
</head>

<body>
    <nav class="navbar navbar-dark fixed-top bg-dark flex-md-nowrap p-0 shadow">
        <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="#">tua90776</a>
        <input class="form-control form-control-dark w-100" type="text" placeholder="Search" aria-label="Search">
        <ul class="navbar-nav px-3">
            <li class="nav-item text-nowrap">
                <a class="nav-link" href="php/logout.php">Sign out</a>
            </li>
        </ul>
    </nav>

    <div class="container-fluid">
        <div class="row">
            <nav class="col-md-2 d-none d-md-block bg-light sidebar">
                <div class="sidebar-sticky">
                    <ul class="nav flex-column">
                        <li class="nav-item" id="showAll">
                            <a class="nav-link active" href="#">
                                <!-- <span data-feather="home"></span> -->
                                <i class="fa-solid fa-minus"></i>
                                Hide Dashboard <span class="sr-only">(current)</span>
                            </a>
                        </li>
                        <li class="nav-item" id="run6_1">
                            <a class="nav-link" href="#">
                                <!-- <span data-feather="refresh-cw"></span> -->
                                <i class="fa-solid fa-stop"></i>
                                Hide Lab 6.1
                            </a>
                        </li>
                        <li class="nav-item" id="run6_2">
                            <a class="nav-link" href="#">
                                <!-- <span data-feather="refresh-cw"></span> -->
                                <i class="fa-solid fa-stop"></i>
                                Hide Lab 6.2
                            </a>
                        </li>
                        <li class="nav-item" id="report">
                            <a class="nav-link" href="#">
                                <!-- <span data-feather="file"></span> -->
                                <i class="fa-solid fa-stop"></i>
                                Hide Project Report
                            </a>
                        </li>
            </nav>

            <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
                <div
                    class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <h1 class="h2">CIS5015: Web Service Scripting</h1>
                    <div class="btn-toolbar mb-2 mb-md-0">
                        <div class="btn-group mr-2">
                            <button type="button" class="btn btn-sm btn-outline-secondary">Share</button>
                            <button type="button" class="btn btn-sm btn-outline-secondary">Export</button>
                        </div>
                        <button type="button" class="btn btn-sm btn-outline-secondary dropdown-toggle">
                            <span data-feather="calendar"></span>
                            This week
                        </button>
                    </div>
                </div>

                <!-- <canvas class="my-4 w-100" id="myChart" width="900" height="380"></canvas> -->

                <div id="Lab6_2">
                    <h2 data-toggle="collapse" id="chevron-change_6_2" href="#card6_2">
                        Lab 6.2 Online
                        <i class="fa-solid fa-chevron-down"></i>
                    </h2>
                    <div class="card" id="card6_2">
                        <h6 class="card-header">Locality and Matrix Performance</h6>
                        <div class="card-body">
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item">
                                    <h2 class="btn btn-primary btn-block" id="LoopBtn" href="#card6_2">
                                        Loop Order Correctness Investigation
                                    </h2>
                                    <div id="LoopRun" class="input-group mb-3">
                                        <form>
                                            Size(3-20):
                                            <input type="number" name="mSize" min="3" max="20" required>
                                            <button id="lab6_2a" class="btn btn-medium btn-primary">Run</button>
                                        </form>
                                        <hr>
                                        <div class="row mt-3">
                                            <div class="col">
                                                <h5>Results:</h5>
                                                <div id="results6_2a"></div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li class="list-group-item">
                                    <h2 class="btn btn-primary btn-block" id="PerformingBtn" href="#card6_2">
                                        Best Performing Order Investigation
                                    </h2>
                                    <div class="container mt-5" id="Results">
                                        <div class="row">
                                            <div class="col">
                                                <form>
                                                    <div class="mb-3">
                                                        <label for="input1" class="form-label">Size(100-800)</label>
                                                        <input type="number" class="form-control" value="0" min="100"
                                                            max="800" id="input1" placeholder="Enter input 1">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="input2" class="form-label">Repetitions(2-5)</label>
                                                        <input type="number" class="form-control" value="0" min="2"
                                                            max="5" id="input2" placeholder="Enter input 2">
                                                    </div>
                                                    <button type="submit" class="btn btn-primary">Run</button>
                                                </form>
                                            </div>
                                        </div>
                                        <div class="row mt-3">
                                            <div class="col">
                                                <h5>Results:</h5>
                                                <div id="results6_2b"></div>
                                            </div>
                                        </div>
                                        <hr>
                                        <button id="plot6_2b" class="btn btn-primary">Plot</button>
                                        <canvas class="my-4" id="myChart" width="900" height="380"></canvas>
                                    </div>
                                </li>
                                <li class="list-group-item">
                                    <h2 class="btn btn-primary btn-block" id="ScalabilityBtn" href="#card6_2">
                                        Best Order Scalability Investigation
                                    </h2>
                                    <div class="container mt-5" id="ScalabilityRun">
                                        <h5>Loop Order and Inputs:</h5>
                                        <div class="row">
                                            <div class="col">
                                                <form class="form-signin align-items-center">
                                                    <div class="mb-3">
                                                        <label for="loopOrder" class="form-label">Loop Order</label>
                                                        <input type="text" list="order" class="mb-2" name="loopOrder"
                                                            placeholder="Enter loop order">
                                                        <datalist id="order">
                                                            <option value="ijk"></option>
                                                            <option value="ikj"></option>
                                                            <option value="jik"></option>
                                                            <option value="jki"></option>
                                                            <option value="kij"></option>
                                                            <option value="kji"></option>
                                                        </datalist>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="input1" class="form-label">Input 1</label>
                                                        <input type="number" class="form-control" value="0" min="100"
                                                            max="800" id="input1" placeholder="Start(N): 100-800">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="input2" class="form-label">Input 2</label>
                                                        <input type="number" class="form-control" value="0" min="100"
                                                            max="800" id="input2" placeholder="End(N): 100-800">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="input3" class="form-label">Input 3</label>
                                                        <input type="number" class="form-control" value="0" min="50"
                                                            max="100" id="input3" placeholder="Step: 50-100">
                                                    </div>
                                                    <button type="submit" class="btn btn-primary">Run</button>
                                                </form>
                                            </div>
                                        </div>
                                        <div class="row mt-3">
                                            <div class="col">
                                                <h5>Results:</h5>
                                                <div id="results6_2c"></div>
                                            </div>
                                        </div>
                                        <hr>
                                        <button id="plot6_2c" class="btn btn-primary">Plot</button>
                                        <canvas class="my-4" id="myChart2" width="900" height="380"></canvas>

                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <br />
                <div id="Lab6_1">
                    <h2 data-toggle="collapse" id="chevronLabSixOne" href="#card6_1">
                        Lab 6.1 Online
                        <i class="fa-solid fa-chevron-down"></i>
                    </h2>
                    <div class="card collapse" id="Lab6_1_online" style="width: 100%;">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <h5>Sort Magic</h5>
                        </div>
                        <div class="card-body">
                            <ul class="list-group">
                                <span class="btn btn-primary btn-block" id="BubbleBtn" data-toggle="collapse"
                                    href="#bubbleSort">
                                    Magic of Bubble Sorting
                                </span>
                                <div id="bubbleSort" class="collapse">
                                    <form class="form-signin">
                                        <div class="row">
                                            <input type="number" name="sSize" min="1000" max="9000"
                                                class="col form-control" placeholder="Sort size(N) [1000-9000]"
                                                required>
                                            <input type="number" name="sRep" min="1" max="5" class="col form-control"
                                                placeholder="Repeat[1-5]" required>
                                        </div>
                                        <button id="lab42" class="btn btn-small btn-primary mt-2">
                                            Run
                                        </button>
                                    </form>
                                    <hr>
                                    <div id="bubbleMonitor" class="card-body">
                                        Results
                                    </div>
                                    <hr>
                                    <button id="plot42" class="btn btn-primary">Plot</button>
                                    <canvas class="my-4" id="myChart3" width="900" height="380"></canvas>
                                </div>
                            </ul>
                        </div>
                    </div>
                </div>
                <br />
                <div id="Report">
                    <h2 data-toggle="collapse" href="#projectReport">
                        Lab 6 Project Report
                        <i class="fa-solid fa-chevron-down" id="chevronLabSixReport"></i>
                    </h2>
                    <div class="card collapse" id="projectReport">
                        <h6 class="card-header">Asif Kamal - 2023/03/08</h6>
                        <div class="card-body" id="projectReportCard">
                            <ul class="list-group">
                                <span class="btn btn-primary btn-small" id="projectReportBtn" data-toggle="collapse"
                                    href="#projectReport">
                                    Details
                                </span>
                                <div id="projectFinalReport" class="collapse">
                                    This is the final project report.
                                </div>
                            </ul>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>
</body>

</html>