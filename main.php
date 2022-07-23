<?php

session_start();
date_default_timezone_set('Asia/Kolkata');
$c_d = date('Y-m-d');
if (isset($_SESSION['varname'])) {
} else {
    header("Location: login.php");
    die();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="/resources/demos/style.css">
    <script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>

    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <link rel="stylesheet" href="https://res.cloudinary.com/dxfq3iotg/raw/upload/v1569006288/BBBootstrap/choices.min.css?version=7.0.0">
    <script src="https://res.cloudinary.com/dxfq3iotg/raw/upload/v1569006273/BBBootstrap/choices.min.js?version=7.0.0"></script>


    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <script src="https://use.fontawesome.com/3582a84b00.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.3.1.min.js" type="text/javascript"></script>

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <style>
        .table td {
            padding: 5px;
        }
    </style>

</head>

<body id="page-top">
    <div id="wrapper">
        <?php require('connectDB.php');
        require('style.php');
        $role = $_SESSION['role'];
        if ($role == "Admin") {
            $sql = "SELECT COUNT(*) as c from country_info";
            $run = $conn->query($sql);
            $row = $run->fetch_assoc();
            $c_0 = $row['c'];
            $s1 = "SELECT COUNT(*) as c_1 from university_info";
            $run1 = $conn->query($s1);
            $row1 = $run1->fetch_assoc();
            $c_1 = $row1['c_1'];
            $s2 = "SELECT COUNT(*) as c_2 from agency_info";
            $run2 = $conn->query($s2);
            $row2 = $run2->fetch_assoc();
            $c_2 = $row2['c_2'];
            date_default_timezone_set('Asia/Kolkata');
            $current_year = date('Y');
            $s3 = "SELECT COUNT(*) as c_3 from ledger WHERE due_date LIKE '$current_year%'";
            $run3 = $conn->query($s3);
            $row3 = $run3->fetch_assoc();
            $c_3 = $row3['c_3'];
            if ($c_3 > 0) {
                $events_months = array();
                $jan_count = 0;
                $feb_count = 0;
                $mar_count = 0;
                $apr_count = 0;
                $may_count = 0;
                $jun_count = 0;
                $jul_count = 0;
                $aug_count = 0;
                $sep_count = 0;
                $oct_count = 0;
                $nov_count = 0;
                $dec_count = 0;
                $entry_count_month = array();
                $s0 = "SELECT due_date from ledger WHERE due_date LIKE '$current_year%'";
                $run0 = $conn->query($s0);

                while ($row3 = $run0->fetch_assoc()) {
                    $event_start_date = $row3['due_date'];
                    $current_year = substr($event_start_date, 0, 4);
                    if (strpos($event_start_date, "-06-") !== false) {
                        array_push($events_months, "June " . $current_year);
                        $jun_count++;
                    }
                    if (strpos($event_start_date, "-07-") !== false) {
                        array_push($events_months, "July " . $current_year);
                        $jul_count++;
                    }
                    if (strpos($event_start_date, "-08-") !== false) {
                        array_push($events_months, "August " . $current_year);
                        $aug_count++;
                    }
                    if (strpos($event_start_date, "-09-") !== false) {
                        array_push($events_months, "September " . $current_year);
                        $sep_count++;
                    }
                    if (strpos($event_start_date, "-10-") !== false) {
                        array_push($events_months, "October " . $current_year);
                        $oct_count++;
                    }
                    if (strpos($event_start_date, "-11-") !== false) {
                        array_push($events_months, "November " . $current_year);
                        $nov_count++;
                    }
                    if (strpos($event_start_date, "-12-") !== false) {
                        array_push($events_months, "December " . $current_year);
                        $dec_count++;
                    }
                    if (strpos($event_start_date, "-01-") !== false) {
                        array_push($events_months, "January " . $current_year);
                        $jan_count++;
                    }
                    if (strpos($event_start_date, "-02-") !== false) {
                        array_push($events_months, "February " . $current_year);
                        $feb_count++;
                    }
                    if (strpos($event_start_date, "-03-") !== false) {
                        array_push($events_months, "March " . $current_year);
                        $mar_count++;
                    }
                    if (strpos($event_start_date, "-04-") !== false) {
                        array_push($events_months, "April " . $current_year);
                        $apr_count++;
                    }
                    if (strpos($event_start_date, "-05-") !== false) {
                        array_push($events_months, "May " . $current_year);
                        $may_count++;
                    }
                }
                $events_months_unique = array_unique($events_months);
                array_push($entry_count_month, $jan_count);
                array_push($entry_count_month, $feb_count);
                array_push($entry_count_month, $mar_count);
                array_push($entry_count_month, $apr_count);
                array_push($entry_count_month, $may_count);
                array_push($entry_count_month, $jun_count);
                array_push($entry_count_month, $jul_count);
                array_push($entry_count_month, $aug_count);
                array_push($entry_count_month, $sep_count);
                array_push($entry_count_month, $oct_count);
                array_push($entry_count_month, $nov_count);
                array_push($entry_count_month, $dec_count);
            } else {
                $entry_count_month =  array(0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);
            }

            $s4 = "SELECT COUNT(*) as c_4 from ledger WHERE due_date LIKE '$current_year%' AND status=1";
            $run4 = $conn->query($s4);
            $row4 = $run4->fetch_assoc();
            $c_4 = $row4['c_4'];
            if ($c_4 > 0) {
                $events_months = array();
                $jan_count = 0;
                $feb_count = 0;
                $mar_count = 0;
                $apr_count = 0;
                $may_count = 0;
                $jun_count = 0;
                $jul_count = 0;
                $aug_count = 0;
                $sep_count = 0;
                $oct_count = 0;
                $nov_count = 0;
                $dec_count = 0;
                $entry_count_month_due = array();
                $s0 = "SELECT due_date from ledger WHERE due_date LIKE '$current_year%' AND status=1";
                $run0 = $conn->query($s0);

                while ($row3 = $run0->fetch_assoc()) {
                    $event_start_date = $row3['due_date'];
                    $current_year = substr($event_start_date, 0, 4);
                    if (strpos($event_start_date, "-06-") !== false) {
                        array_push($events_months, "June " . $current_year);
                        $jun_count++;
                    }
                    if (strpos($event_start_date, "-07-") !== false) {
                        array_push($events_months, "July " . $current_year);
                        $jul_count++;
                    }
                    if (strpos($event_start_date, "-08-") !== false) {
                        array_push($events_months, "August " . $current_year);
                        $aug_count++;
                    }
                    if (strpos($event_start_date, "-09-") !== false) {
                        array_push($events_months, "September " . $current_year);
                        $sep_count++;
                    }
                    if (strpos($event_start_date, "-10-") !== false) {
                        array_push($events_months, "October " . $current_year);
                        $oct_count++;
                    }
                    if (strpos($event_start_date, "-11-") !== false) {
                        array_push($events_months, "November " . $current_year);
                        $nov_count++;
                    }
                    if (strpos($event_start_date, "-12-") !== false) {
                        array_push($events_months, "December " . $current_year);
                        $dec_count++;
                    }
                    if (strpos($event_start_date, "-01-") !== false) {
                        array_push($events_months, "January " . $current_year);
                        $jan_count++;
                    }
                    if (strpos($event_start_date, "-02-") !== false) {
                        array_push($events_months, "February " . $current_year);
                        $feb_count++;
                    }
                    if (strpos($event_start_date, "-03-") !== false) {
                        array_push($events_months, "March " . $current_year);
                        $mar_count++;
                    }
                    if (strpos($event_start_date, "-04-") !== false) {
                        array_push($events_months, "April " . $current_year);
                        $apr_count++;
                    }
                    if (strpos($event_start_date, "-05-") !== false) {
                        array_push($events_months, "May " . $current_year);
                        $may_count++;
                    }
                }
                $events_months_unique = array_unique($events_months);
                array_push($entry_count_month_due, $jan_count);
                array_push($entry_count_month_due, $feb_count);
                array_push($entry_count_month_due, $mar_count);
                array_push($entry_count_month_due, $apr_count);
                array_push($entry_count_month_due, $may_count);
                array_push($entry_count_month_due, $jun_count);
                array_push($entry_count_month_due, $jul_count);
                array_push($entry_count_month_due, $aug_count);
                array_push($entry_count_month_due, $sep_count);
                array_push($entry_count_month_due, $oct_count);
                array_push($entry_count_month_due, $nov_count);
                array_push($entry_count_month_due, $dec_count);
            } else {
                $entry_count_month_due =  array(0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);
            }
            $s5 = "SELECT COUNT(*) as c_5 from ledger WHERE due_date LIKE '$current_year%' AND status=2";
            $run5 = $conn->query($s5);
            $row5 = $run5->fetch_assoc();
            $c_5 = $row5['c_5'];
            if ($c_5 > 0) {
                $events_months = array();
                $jan_count = 0;
                $feb_count = 0;
                $mar_count = 0;
                $apr_count = 0;
                $may_count = 0;
                $jun_count = 0;
                $jul_count = 0;
                $aug_count = 0;
                $sep_count = 0;
                $oct_count = 0;
                $nov_count = 0;
                $dec_count = 0;
                $entry_count_month_complete = array();
                $s0 = "SELECT due_date from ledger WHERE due_date LIKE '$current_year%' AND status=2";
                $run0 = $conn->query($s0);

                while ($row3 = $run0->fetch_assoc()) {
                    $event_start_date = $row3['due_date'];
                    $current_year = substr($event_start_date, 0, 4);
                    if (strpos($event_start_date, "-06-") !== false) {
                        array_push($events_months, "June " . $current_year);
                        $jun_count++;
                    }
                    if (strpos($event_start_date, "-07-") !== false) {
                        array_push($events_months, "July " . $current_year);
                        $jul_count++;
                    }
                    if (strpos($event_start_date, "-08-") !== false) {
                        array_push($events_months, "August " . $current_year);
                        $aug_count++;
                    }
                    if (strpos($event_start_date, "-09-") !== false) {
                        array_push($events_months, "September " . $current_year);
                        $sep_count++;
                    }
                    if (strpos($event_start_date, "-10-") !== false) {
                        array_push($events_months, "October " . $current_year);
                        $oct_count++;
                    }
                    if (strpos($event_start_date, "-11-") !== false) {
                        array_push($events_months, "November " . $current_year);
                        $nov_count++;
                    }
                    if (strpos($event_start_date, "-12-") !== false) {
                        array_push($events_months, "December " . $current_year);
                        $dec_count++;
                    }
                    if (strpos($event_start_date, "-01-") !== false) {
                        array_push($events_months, "January " . $current_year);
                        $jan_count++;
                    }
                    if (strpos($event_start_date, "-02-") !== false) {
                        array_push($events_months, "February " . $current_year);
                        $feb_count++;
                    }
                    if (strpos($event_start_date, "-03-") !== false) {
                        array_push($events_months, "March " . $current_year);
                        $mar_count++;
                    }
                    if (strpos($event_start_date, "-04-") !== false) {
                        array_push($events_months, "April " . $current_year);
                        $apr_count++;
                    }
                    if (strpos($event_start_date, "-05-") !== false) {
                        array_push($events_months, "May " . $current_year);
                        $may_count++;
                    }
                }

                $events_months_unique = array_unique($events_months);
                array_push($entry_count_month_complete, $jan_count);
                array_push($entry_count_month_complete, $feb_count);
                array_push($entry_count_month_complete, $mar_count);
                array_push($entry_count_month_complete, $apr_count);
                array_push($entry_count_month_complete, $may_count);
                array_push($entry_count_month_complete, $jun_count);
                array_push($entry_count_month_complete, $jul_count);
                array_push($entry_count_month_complete, $aug_count);
                array_push($entry_count_month_complete, $sep_count);
                array_push($entry_count_month_complete, $oct_count);
                array_push($entry_count_month_complete, $nov_count);
                array_push($entry_count_month_complete, $dec_count);
            } else {
                $entry_count_month_complete =  array(0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);
            }

            $s6 = "SELECT COUNT(*) as c_3 from ledger";
            $run6 = $conn->query($s6);
            $row6 = $run6->fetch_assoc();
            $c_6 = $row6['c_3'];
            $s4 = "SELECT COUNT(*) as c_4 from ledger WHERE status=1";
            $run4 = $conn->query($s4);
            $row4 = $run4->fetch_assoc();
            $c_7 = $row4['c_4'];
            $s5 = "SELECT COUNT(*) as c_5 from ledger WHERE status=2";
            $run5 = $conn->query($s5);
            $row5 = $run5->fetch_assoc();
            $c_8 = $row5['c_5'];

            $s1 = "SELECT id from agency_info";
            $run1 = $conn->query($s1);
            if ($run1->num_rows > 0) {
                $entries_agencies = array();
                while ($row1 = $run1->fetch_assoc()) {
                    $agency_id = $row1['id'];
                    $s2 = "SELECT COUNT(*) as c from ledger WHERE agency_id=$agency_id AND due_date LIKE '$current_year%'";
                    $run2 = $conn->query($s2);
                    $row2 = $run2->fetch_assoc();
                    $c = $row2['c'];
                    array_push($entries_agencies, $c);
                }
            }


        ?>
            <!-- Begin Page Content -->
            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="d-sm-flex align-items-center justify-content-between mb-4">
                    <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
                    <style>
                        .result {
                            position: absolute;
                            z-index: 999;
                            top: 100%;
                            left: 0;
                        }

                        .search-box input[type="text"],
                        .result {
                            width: 100%;
                            box-sizing: border-box;
                        }

                        /* Formatting result items */
                        .result p {
                            margin: 0;
                            padding: 7px 10px;
                            border: 1px solid #CCCCCC;
                            border-top: none;
                            cursor: pointer;
                            background: #fff;
                        }

                        .result p:hover {
                            background: #f2f2f2;
                        }
                    </style>
                    <script type="text/javascript">
                        $(document).ready(function() {
                            $('.search-box input[type="text"]').on("keyup input", function() {
                                /* Get input value on change */
                                var inputVal = $(this).val();
                                var resultDropdown = $(this).siblings(".result");
                                if (inputVal.length) {
                                    $.get("search_name.php", {
                                        term: inputVal
                                    }).done(function(data) {
                                        // Display the returned data in browser
                                        resultDropdown.html(data);
                                    });
                                } else {
                                    resultDropdown.empty();
                                }
                            });

                            // Set search input value on click of result item
                            $(document).on("click", ".result p", function() {
                                $(this).parents(".search-box").find('input[type="text"]').val($(this).text());
                                $(this).parent(".result").empty();
                            });
                        });
                    </script>


                    <form method="GET" action="search_student.php">
                        <div class="input-group">
                            <div class="search-box">
                                <input class="form-control" name="name" type="text" autocomplete="off" placeholder="Enter Student Name" required />
                                <div class="result"></div>
                            </div>
                            <div class="input-group-append">
                                <button class="btn btn-primary">
                                    <i class="fas fa-search fa-sm"></i>
                                </button>
                            </div>
                        </div>

                    </form>



                </div>
                <div class="row">

                    <!-- Earnings (Monthly) Card Example -->
                    <div class="col-xl-4 col-md-6 mb-4">
                        <div class="card border-left-primary shadow  py-2">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Countries</div>
                                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $c_0 ?></div>
                                    </div>
                                    <div class="col-auto">

                                        <i class="fas fa-globe-americas fa-2x text-gray-300"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Earnings (Monthly) Card Example -->
                    <div class="col-xl-4 col-md-6 mb-4">
                        <div class="card border-left-warning shadow h-100 py-2">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Universities</div>
                                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $c_1  ?></div>
                                    </div>
                                    <div class="col-auto">

                                        <i class="fas fa-university fa-2x text-gray-300"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Earnings (Monthly) Card Example -->
                    <div class="col-xl-4 col-md-6 mb-4">
                        <div class="card border-left-success shadow h-100 py-2">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Agency</div>
                                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $c_2 ?></div>
                                    </div>
                                    <div class="col-auto">

                                        <i class="fas fa-user-tie fa-2x text-gray-300"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">


                    <!-- Earnings (Monthly) Card Example -->
                    <div class="col-xl-4 col-md-6 mb-4">
                        <div class="card border-left-primary shadow  py-2">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Entries</div>
                                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $c_6 ?></div>
                                    </div>
                                    <div class="col-auto">

                                        <i class="fas  fa-database fa-2x text-gray-300"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Earnings (Monthly) Card Example -->
                    <div class="col-xl-4 col-md-6 mb-4">
                        <div class="card border-left-warning shadow h-100 py-2">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Entries Due</div>
                                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $c_7 ?></div>
                                    </div>
                                    <div class="col-auto">

                                        <i class="fas fa-database fa-2x text-gray-300"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Earnings (Monthly) Card Example -->
                    <div class="col-xl-4 col-md-6 mb-4">
                        <div class="card border-left-success shadow h-100 py-2">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Entries Completed</div>
                                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $c_8 ?></div>
                                    </div>
                                    <div class="col-auto">

                                        <i class="fas fa-database fa-2x text-gray-300"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>



                    <!-- Earnings (Monthly) Card Example -->
                    <div class="col-xl-4 col-md-6 mb-4">
                        <div class="card border-left-primary shadow  py-2">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Entries (Year: <?php echo $current_year ?>)</div>
                                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $c_3 ?></div>
                                    </div>
                                    <div class="col-auto">

                                        <i class="fas  fa-database fa-2x text-gray-300"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Earnings (Monthly) Card Example -->
                    <div class="col-xl-4 col-md-6 mb-4">
                        <div class="card border-left-warning shadow h-100 py-2">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Entries Due (Year: <?php echo $current_year ?>)</div>
                                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $c_4 ?></div>
                                    </div>
                                    <div class="col-auto">

                                        <i class="fas fa-database fa-2x text-gray-300"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Earnings (Monthly) Card Example -->
                    <div class="col-xl-4 col-md-6 mb-4">
                        <div class="card border-left-success shadow h-100 py-2">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Entries Completed (Year: <?php echo $current_year ?>)</div>
                                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $c_5 ?></div>
                                    </div>
                                    <div class="col-auto">

                                        <i class="fas fa-database fa-2x text-gray-300"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <div class="row">
                <div class="col-xl-12 col-lg-12">
                    <div class="card shadow mb-4 ml-4 mr-4">
                        <!-- Card Header - Dropdown -->
                        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                            <h6 class="m-0 font-weight-bold text-primary">Entries Overview (<?php echo $current_year ?>)</h6>

                        </div>
                        <!-- Card Body -->
                        <div class="card-body">
                            <div class="chart-area">
                                <canvas id="myAreaChart"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6 col-md-6">
                    <div class="col-xl-12 col-lg-12">
                        <div class="card shadow mb-4">
                            <!-- Card Header - Dropdown -->
                            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                <h6 class="m-0 font-weight-bold text-primary">Entries Overview</h6>

                            </div>
                            <!-- Card Body -->
                            <div class="card-body">
                                <div class="chart-pie pt-4 pb-2">
                                    <canvas id="myPieChart"></canvas>
                                </div>
                                <div class="mt-4 text-center small">
                                    <?php
                                    /* $colors_array = ['#4e73df', '#1cc88a', '#36b9cc', '#FFF7DF', '#F9CDBF', '#F08FAC'];
                                                foreach ($committee_name_array as $index => $u) { */
                                    ?>
                                    <!--  <span class="mr-2">
                                                        <i class="fas fa-circle" style='color: <?php echo $colors_array[$index] ?>;'></i> <?php echo $u ?>
                                                    </span> -->


                                    <span class="mr-2">
                                        <i class="fas fa-circle" style='color: #ffdb6e;'></i> Entries Due
                                    </span>
                                    <span class="mr-2">
                                        <i class="fas fa-circle" style='color: #1cc88a ;'></i> Entries Completed
                                    </span>
                                    <?php
                                    //}
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6 col-md-6">
                    <div class="col-xl-12 col-lg-12">
                        <div class="card shadow mb-4">
                            <!-- Card Header - Dropdown -->
                            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                <h6 class="m-0 font-weight-bold text-primary">Entries Overview (<?php echo $current_year ?>)</h6>

                            </div>
                            <!-- Card Body -->
                            <div class="card-body">
                                <div class="chart-pie pt-4 pb-2">
                                    <canvas id="myPieChart1"></canvas>
                                </div>
                                <div class="mt-4 text-center small">
                                    <?php
                                    /* $colors_array = ['#4e73df', '#1cc88a', '#36b9cc', '#FFF7DF', '#F9CDBF', '#F08FAC'];
                                                foreach ($committee_name_array as $index => $u) { */
                                    ?>
                                    <!--  <span class="mr-2">
                                                        <i class="fas fa-circle" style='color: <?php echo $colors_array[$index] ?>;'></i> <?php echo $u ?>
                                                    </span> -->

                                    <span class="mr-2">
                                        <i class="fas fa-circle" style='color: #ffdb6e;'></i> Entries Due
                                    </span>
                                    <span class="mr-2">
                                        <i class="fas fa-circle" style='color: #1cc88a ;'></i> Entries Completed
                                    </span>
                                    <?php
                                    //  }
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-12 col-lg-12">
                    <div class="card shadow mb-4 ml-4 mr-4">
                        <!-- Card Header - Dropdown -->
                        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                            <h6 class="m-0 font-weight-bold text-primary">Angencies Overview (<?php echo $current_year ?>)</h6>

                        </div>
                        <!-- Card Body -->
                        <div class="card-body">
                            <div class="chart-bar">
                                <canvas id="myBarChart"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


        <?php
        }
        ?>

    </div>


    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>
    <!-- Page level plugins -->
    <script src="vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <script src="js/demo/datatables-demo.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
    <script src="vendor/chart.js/Chart.min.js"></script>

    <script>
        // Set new default font family and font color to mimic Bootstrap's default styling
        Chart.defaults.global.defaultFontFamily = 'Nunito', '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
        Chart.defaults.global.defaultFontColor = '#858796';

        function number_format(number, decimals, dec_point, thousands_sep) {
            // *     example: number_format(1234.56, 2, ',', ' ');
            // *     return: '1 234,56'
            number = (number + '').replace(',', '').replace(' ', '');
            var n = !isFinite(+number) ? 0 : +number,
                prec = !isFinite(+decimals) ? 0 : Math.abs(decimals),
                sep = (typeof thousands_sep === 'undefined') ? ',' : thousands_sep,
                dec = (typeof dec_point === 'undefined') ? '.' : dec_point,
                s = '',
                toFixedFix = function(n, prec) {
                    var k = Math.pow(10, prec);
                    return '' + Math.round(n * k) / k;
                };
            // Fix for IE parseFloat(0.55).toFixed(0) = 0;
            s = (prec ? toFixedFix(n, prec) : '' + Math.round(n)).split('.');
            if (s[0].length > 3) {
                s[0] = s[0].replace(/\B(?=(?:\d{3})+(?!\d))/g, sep);
            }
            if ((s[1] || '').length < prec) {
                s[1] = s[1] || '';
                s[1] += new Array(prec - s[1].length + 1).join('0');
            }
            return s.join(dec);
        }

        // Bar Chart Example
        var ctx = document.getElementById("myBarChart");
        var myBarChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: [<?php
                            $s1 = "SELECT name from agency_info";
                            $run1 = $conn->query($s1);
                            if ($run1->num_rows > 0) {
                                while ($row1 = $run1->fetch_assoc()) {
                                    $name = $row1['name'];
                                    echo '"' . ($name) . '",';
                                }
                            }

                            ?>],
                datasets: [{
                    label: "Entries",
                    backgroundColor: "#4e73df",
                    hoverBackgroundColor: "#2e59d9",
                    borderColor: "#4e73df",
                    data: [<?php
                            foreach ($entries_agencies as $e) {
                                echo '"' . $e . '",';
                            }
                            ?>],
                }, ],
            },
            options: {
                maintainAspectRatio: false,
                layout: {
                    padding: {
                        left: 10,
                        right: 25,
                        top: 25,
                        bottom: 0
                    }
                },
                scales: {
                    xAxes: [{
                        time: {
                            unit: 'month'
                        },
                        gridLines: {
                            display: false,
                            drawBorder: false
                        },
                        ticks: {
                            maxTicksLimit: 6
                        },
                        maxBarThickness: 25,
                    }],
                    yAxes: [{
                        ticks: {
                            min: 0,
                            max: <?php echo max($entries_agencies) ?>,
                            maxTicksLimit: 5,
                            padding: 10,
                            // Include a dollar sign in the ticks
                            callback: function(value, index, values) {
                                return number_format(value);
                            }
                        },
                        gridLines: {
                            color: "rgb(234, 236, 244)",
                            zeroLineColor: "rgb(234, 236, 244)",
                            drawBorder: false,
                            borderDash: [2],
                            zeroLineBorderDash: [2]
                        }
                    }],
                },
                legend: {
                    display: false
                },
                tooltips: {
                    titleMarginBottom: 10,
                    titleFontColor: '#6e707e',
                    titleFontSize: 14,
                    backgroundColor: "rgb(255,255,255)",
                    bodyFontColor: "#858796",
                    borderColor: '#dddfeb',
                    borderWidth: 1,
                    xPadding: 15,
                    yPadding: 15,
                    displayColors: false,
                    caretPadding: 10,
                    callbacks: {
                        label: function(tooltipItem, chart) {
                            var datasetLabel = chart.datasets[tooltipItem.datasetIndex].label || '';
                            return datasetLabel + ':' + number_format(tooltipItem.yLabel);
                        }
                    }
                },
            }
        });




        // Pie Chart Example
        var ctx = document.getElementById("myPieChart");
        var myPieChart = new Chart(ctx, {
            type: 'doughnut',
            data: {
                labels: ["Entries Due", "Entries Completed"],
                datasets: [{
                    data: [<?php echo $c_7 . "," . $c_8 ?>],
                    backgroundColor: ['#ffdb6e', '#36b9cc'],
                    hoverBackgroundColor: ['#ffdb6e', '#2c9faf'],
                    hoverBorderColor: "rgba(234, 236, 244, 1)",
                }],
            },
            options: {
                maintainAspectRatio: false,
                tooltips: {
                    backgroundColor: "rgb(255,255,255)",
                    bodyFontColor: "#858796",
                    borderColor: '#dddfeb',
                    borderWidth: 1,
                    xPadding: 15,
                    yPadding: 15,
                    displayColors: false,
                    caretPadding: 10,
                },
                legend: {
                    display: false
                },
                cutoutPercentage: 80,
            },
        });
        // Pie Chart Example
        var ctx = document.getElementById("myPieChart1");
        var myPieChart = new Chart(ctx, {
            type: 'doughnut',
            data: {
                labels: ["Entries Due", "Entries Completed"],
                datasets: [{
                    data: [<?php echo $c_4 . "," . $c_5 ?>],
                    backgroundColor: ['#ffdb6e', '#36b9cc'],
                    hoverBackgroundColor: ['#ffdb6e', '#2c9faf'],
                    hoverBorderColor: "rgba(234, 236, 244, 1)",
                }],
            },
            options: {
                maintainAspectRatio: false,
                tooltips: {
                    backgroundColor: "rgb(255,255,255)",
                    bodyFontColor: "#858796",
                    borderColor: '#dddfeb',
                    borderWidth: 1,
                    xPadding: 15,
                    yPadding: 15,
                    displayColors: false,
                    caretPadding: 10,
                },
                legend: {
                    display: false
                },
                cutoutPercentage: 80,
            },
        });



        function number_format(number, decimals, dec_point, thousands_sep) {
            // *     example: number_format(1234.56, 2, ',', ' ');
            // *     return: '1 234,56'
            number = (number + '').replace(',', '').replace(' ', '');
            var n = !isFinite(+number) ? 0 : +number,
                prec = !isFinite(+decimals) ? 0 : Math.abs(decimals),
                sep = (typeof thousands_sep === 'undefined') ? ',' : thousands_sep,
                dec = (typeof dec_point === 'undefined') ? '.' : dec_point,
                s = '',
                toFixedFix = function(n, prec) {
                    var k = Math.pow(10, prec);
                    return '' + Math.round(n * k) / k;
                };
            // Fix for IE parseFloat(0.55).toFixed(0) = 0;
            s = (prec ? toFixedFix(n, prec) : '' + Math.round(n)).split('.');
            if (s[0].length > 3) {
                s[0] = s[0].replace(/\B(?=(?:\d{3})+(?!\d))/g, sep);
            }
            if ((s[1] || '').length < prec) {
                s[1] = s[1] || '';
                s[1] += new Array(prec - s[1].length + 1).join('0');
            }
            return s.join(dec);
        }

        // Area Chart Example
        var ctx = document.getElementById("myAreaChart");
        var myLineChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
                datasets: [{
                    label: "Entries",
                    lineTension: 0.3,
                    backgroundColor: "rgba(78, 115, 223, 0.05)",
                    borderColor: "rgba(78, 115, 223, 1)",
                    pointRadius: 3,
                    pointBackgroundColor: "rgba(78, 115, 223, 1)",
                    pointBorderColor: "rgba(78, 115, 223, 1)",
                    pointHoverRadius: 3,
                    pointHoverBackgroundColor: "rgba(78, 115, 223, 1)",
                    pointHoverBorderColor: "rgba(78, 115, 223, 1)",
                    pointHitRadius: 10,
                    pointBorderWidth: 2,
                    data: [<?php
                            foreach ($entry_count_month as $u) {
                                echo '"' . $u . '",';
                            }
                            ?>],
                }, {
                    label: "Entries Due",
                    lineTension: 0.3,
                    backgroundColor: "rgba(255, 219, 110, 0.05)",
                    borderColor: "rgba(255, 219, 110, 1)",
                    pointRadius: 3,
                    pointBackgroundColor: "rgba(255, 219, 110, 1)",
                    pointBorderColor: "rgba(255, 219, 110, 1)",
                    pointHoverRadius: 3,
                    pointHoverBackgroundColor: "rgba(255, 219, 110, 1)",
                    pointHoverBorderColor: "rgba(255, 219, 110, 1)",
                    pointHitRadius: 10,
                    pointBorderWidth: 2,
                    data: [<?php
                            foreach ($entry_count_month_due as $u1) {
                                echo '"' . ($u1) . '",';
                            }
                            ?>],
                }, {
                    label: "Entries Completed",
                    lineTension: 0.3,
                    backgroundColor: "rgba(21, 87, 36, 0.05)",
                    borderColor: "rgba(21, 87, 36, 1)",
                    pointRadius: 3,
                    pointBackgroundColor: "rgba(21, 87, 36, 1)",
                    pointBorderColor: "rgba(21, 87, 36, 1)",
                    pointHoverRadius: 3,
                    pointHoverBackgroundColor: "rgba(21, 87, 36, 1)",
                    pointHoverBorderColor: "rgba(21, 87, 36, 1)",
                    pointHitRadius: 10,
                    pointBorderWidth: 2,
                    data: [<?php
                            foreach ($entry_count_month_complete as $u2) {
                                echo '"' . ($u2) . '",';
                            }
                            ?>],
                }],
            },
            options: {
                maintainAspectRatio: false,
                layout: {
                    padding: {
                        left: 10,
                        right: 25,
                        top: 25,
                        bottom: 0
                    }
                },
                scales: {
                    xAxes: [{
                        time: {
                            unit: 'date'
                        },
                        gridLines: {
                            display: false,
                            drawBorder: false
                        },
                        ticks: {
                            maxTicksLimit: 7
                        }
                    }],
                    yAxes: [{
                        ticks: {
                            maxTicksLimit: 5,
                            padding: 10,
                            // Include a dollar sign in the ticks
                            callback: function(value, index, values) {
                                return '' + number_format(value);
                            }
                        },
                        gridLines: {
                            color: "rgb(234, 236, 244)",
                            zeroLineColor: "rgb(234, 236, 244)",
                            drawBorder: false,
                            borderDash: [2],
                            zeroLineBorderDash: [2]
                        }
                    }],
                },
                legend: {
                    display: false
                },
                tooltips: {
                    backgroundColor: "rgb(255,255,255)",
                    bodyFontColor: "#858796",
                    titleMarginBottom: 10,
                    titleFontColor: '#6e707e',
                    titleFontSize: 14,
                    borderColor: '#dddfeb',
                    borderWidth: 1,
                    xPadding: 15,
                    yPadding: 15,
                    displayColors: false,
                    intersect: false,
                    mode: 'index',
                    caretPadding: 10,
                    callbacks: {
                        label: function(tooltipItem, chart) {
                            var datasetLabel = chart.datasets[tooltipItem.datasetIndex].label || '';
                            return datasetLabel + ': ' + number_format(tooltipItem.yLabel);
                        }
                    }
                }
            }
        });
    </script>

</body>

</html>