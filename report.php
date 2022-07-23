<?php
ini_set('display_errors', 0);
error_reporting(E_ERROR | E_WARNING | E_PARSE);
date_default_timezone_set('Asia/Kolkata');

$c_d = date('Y-m-d');
session_start();
if (isset($_SESSION['varname'])) {
    require('connectDB.php');

    $forms_access = $_SESSION['forms_access'];
    $flag = 0;
    foreach ($forms_access as $formid) {
        if ($formid == "26") {
            $flag = 1;
        }
    }
    if ($flag == 0) {
        header('Location:main.php');
        exit();
    }
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

    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Report</title>
    <style>
        .btn-block {
            background-color: #4e73df;
        }

        .btn {
            color: #fff;
        }
    </style>
    <script>
        $(document).ready(function() {

            var multipleCancelButton = new Choices('.choices-multiple-remove-button', {
                removeItemButton: true,
                searchResultLimit: 5,
                renderChoiceLimit: 5
            });


        });
    </script>



</head>

<body id="page-top">
    <div id="wrapper">
        <?php
        require('style.php');
        ?>

        <div class="container-fluid">
            <!-- DataTales Example -->
            <div class="card shadow mb-4 ">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Report</h6>
                </div>
                <div class="card-body">


                    <form method="GET">

                        <div class="row">
                            <div class="col-lg-3">
                                <label>Report</label>
                                <select class="form-control" name="report_id">
                                    <option value="0">All Report</option>
                                    <option value="1">Payment Due</option>
                                    <option value="2">Payment Completed</option>

                                </select>
                            </div>
                            <div class="col-lg-3">
                                <label>Countries</label>
                                <select class="choices-multiple-remove-button" name="country_id[]" placeholder="Select Countries" multiple>
                                    <?php
                                    $sql = "SELECT * from country_info";
                                    $run = $conn->query($sql);
                                    if ($run->num_rows > 0) {
                                        while ($row = $run->fetch_assoc()) {
                                            $id = $row['id'];
                                            $name = $row['name'];
                                    ?>
                                            <option value='<?php echo $id ?>'><?php echo $name ?></option>
                                    <?php }
                                    }

                                    ?>
                                </select>
                            </div>
                            <div class="col-lg-3">
                                <label>Universities</label>
                                <select class="choices-multiple-remove-button" name="university_id[]" placeholder="Select Universities" multiple>
                                    <?php
                                    $sql = "SELECT id,name from university_info";
                                    $run = $conn->query($sql);
                                    if ($run->num_rows > 0) {
                                        while ($row = $run->fetch_assoc()) {
                                            $id = $row['id'];
                                            $name = $row['name'];
                                    ?>
                                            <option value='<?php echo $id ?>'><?php echo $name ?></option>
                                    <?php }
                                    }

                                    ?>
                                </select>
                            </div>
                            <div class="col-lg-3">
                                <label>Campuses</label>
                                <select class="choices-multiple-remove-button" name="campus_name[]" placeholder="Select Campuses" multiple>
                                    <?php
                                    $sql = "SELECT DISTINCT name from campus_info";
                                    $run = $conn->query($sql);
                                    if ($run->num_rows > 0) {
                                        while ($row = $run->fetch_assoc()) {

                                            $name = $row['name'];
                                    ?>
                                            <option value='<?php echo $name ?>'><?php echo $name ?></option>
                                    <?php }
                                    }

                                    ?>
                                </select>
                            </div>
                            <div class="col-lg-3">
                                <label>Agencies</label>
                                <select class="choices-multiple-remove-button" name="agency_id[]" placeholder="Select Agencies" multiple>
                                    <?php
                                    $sql = "SELECT * from agency_info";
                                    $run = $conn->query($sql);
                                    if ($run->num_rows > 0) {
                                        while ($row = $run->fetch_assoc()) {
                                            $id = $row['id'];
                                            $name = $row['name'];
                                    ?>
                                            <option value='<?php echo $id ?>'><?php echo $name ?></option>
                                    <?php }
                                    }

                                    ?>
                                </select>
                            </div>
                            <div class="col-lg-3">
                                <label>Semester</label>
                                <select class="choices-multiple-remove-button" name="semester[]" placeholder="Select Semester" multiple>
                                    <?php
                                    $sql = "SELECT DISTINCT semester from student_info";
                                    $run = $conn->query($sql);
                                    if ($run->num_rows > 0) {
                                        while ($row = $run->fetch_assoc()) {
                                            $semester = $row['semester'];

                                    ?>
                                            <option value='<?php echo $semester ?>'><?php echo $semester ?></option>
                                    <?php }
                                    }

                                    ?>
                                </select>
                            </div>
                            <div class="col-lg-3">
                                <label>Type</label>
                                <select class="form-control" name="type_id">
                                    <option value="0">BOTH</option>
                                    <option value="1">DEBIT</option>
                                    <option value="2">CREDIT</option>

                                </select>
                            </div>

                            <div class="col-lg-3">
                                <label>Date Range</label>
                                <select class="form-control" id="date_id" onchange="change_date()" name="date_id">

                                    <option value="0">ALL DATES</option>
                                    <option value="1">DATERANGE</option>

                                </select>
                            </div>
                            <div class="col-lg-3">
                                <br>
                                <div id="date_range">

                                </div>
                            </div>

                        </div>

                        <div class="row ">

                            <div class="form-check ml-2">
                                <input type="checkbox" class="form-check-input" id="name" name="checkbox[]" value="name" checked>
                                <label class="form-check-label" for="name">Name</label>
                            </div>
                            <div class="form-check ml-2">
                                <input type="checkbox" class="form-check-input" id="dob" name="checkbox[]" value="dob">
                                <label class="form-check-label" for="dob">Date of Birth</label>
                            </div>
                            <div class="form-check ml-2">
                                <input type="checkbox" class="form-check-input" id="fees" name="checkbox[]" value="fees">
                                <label class="form-check-label" for="fees">Fees</label>
                            </div>
                            <div class="form-check ml-2">
                                <input type="checkbox" class="form-check-input" id="commission" name="checkbox[]" value="commission" checked>
                                <label class="form-check-label" for="commission">Commission</label>
                            </div>
                            <div class="form-check ml-2">
                                <input type="checkbox" class="form-check-input" id="country" name="checkbox[]" value="country" checked>
                                <label class="form-check-label" for="country">Country</label>
                            </div>
                            <div class="form-check ml-2">
                                <input type="checkbox" class="form-check-input" id="university" name="checkbox[]" value="university" checked>
                                <label class="form-check-label" for="university">University</label>
                            </div>
                            <div class="form-check ml-2">
                                <input type="checkbox" class="form-check-input" id="campus" name="checkbox[]" value="campus">
                                <label class="form-check-label" for="campus">Campus</label>
                            </div>
                            <div class="form-check ml-2">
                                <input type="checkbox" class="form-check-input" id="student_id" name="checkbox[]" value="student_id" checked>
                                <label class="form-check-label" for="student_id">Student ID</label>
                            </div>
                            <div class="form-check ml-2">
                                <input type="checkbox" class="form-check-input" id="visa_number" name="checkbox[]" value="visa_number">
                                <label class="form-check-label" for="visa_number">Visa Number</label>
                            </div>
                            <div class="form-check ml-2">
                                <input type="checkbox" class="form-check-input" id="course" name="checkbox[]" value="course" checked>
                                <label class="form-check-label" for="course">Course</label>
                            </div>
                            <div class="form-check ml-2">
                                <input type="checkbox" class="form-check-input" id="semester" name="checkbox[]" value="semester" checked>
                                <label class="form-check-label" for="semester">Semester</label>
                            </div>

                            <div class="form-check ml-2">
                                <input type="checkbox" class="form-check-input" id="agency" name="checkbox[]" value="agency" checked>
                                <label class="form-check-label" for="agency">Agency</label>
                            </div>
                            <div class="form-check ml-2">
                                <input type="checkbox" class="form-check-input" id="type" name="checkbox[]" value="type">
                                <label class="form-check-label" for="type">TYPE</label>
                            </div>
                            <div class="form-check ml-2">
                                <input type="checkbox" class="form-check-input" id="amount" name="checkbox[]" value="amount">
                                <label class="form-check-label" for="amount">Amount</label>
                            </div>

                            <div class="form-check ml-2">
                                <input type="checkbox" class="form-check-input" id="due_date" name="checkbox[]" value="due_date">
                                <label class="form-check-label" for="due_date">Due Date</label>
                            </div>
                            <div class="form-check ml-2">
                                <input type="checkbox" class="form-check-input" id="status" name="checkbox[]" value="status">
                                <label class="form-check-label" for="status">Status</label>
                            </div>
                            <div class="form-check ml-2">
                                <input type="checkbox" class="form-check-input" id="finish_date" name="checkbox[]" value="finish_date">
                                <label class="form-check-label" for="finish_date">Finish Date</label>
                            </div>
                            <div class="form-check ml-2">
                                <input type="checkbox" class="form-check-input" id="timestamp" name="checkbox[]" value="timestamp">
                                <label class="form-check-label" for="timestamp">Timestamp</label>
                            </div>
                            <div class="form-check ml-2">
                                <input type="checkbox" class="form-check-input" id="ar" name="checkbox[]" value="ar" checked>
                                <label class="form-check-label" for="ar">Amount Received</label>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <button class="btn btn-primary" name="report" value="0">Submit</button>
                        </div>




                    </form>
                </div>
            </div>
            <div class="card shadow mb-4 ">

                <div class="card-body">

                    <br>
                    <?php

                    if (isset($_GET['report'])) {
                        $report_id = $_GET['report_id'];
                        $country_id = $_GET['country_id'];
                        $university_id = $_GET['university_id'];
                        $campus_name = $_GET['campus_name'];
                        $agency_id = $_GET['agency_id'];
                        $type_id = $_GET['type_id'];
                        $mode_id = $_GET['mode_id'];
                        $date_id = $_GET['date_id'];
                        $checkbox = $_GET['checkbox'];
                        $semester = $_GET['semester'];
                    ?>
                        <div class="table-responsive">
                            <table border=1 id="dataTable" class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <?php
                                        foreach ($checkbox as $col) {
                                            echo "<th>";

                                            if ($col == "name") {
                                                echo "Name";
                                            }
                                            if ($col == "dob") {
                                                echo "Date of Birth";
                                            }
                                            if ($col == "fees") {
                                                echo "Fees";
                                            }
                                            if ($col == "commission") {
                                                echo "Commission";
                                            }
                                            if ($col == "country") {
                                                echo "Country";
                                            }
                                            if ($col == "university") {
                                                echo "University";
                                            }
                                            if ($col == "campus") {
                                                echo "Campus";
                                            }
                                            if ($col == "student_id") {
                                                echo "Student ID";
                                            }
                                            if ($col == "visa_number") {
                                                echo "Visa Number";
                                            }
                                            if ($col == "course") {
                                                echo "Course";
                                            }
                                            if ($col == "semester") {
                                                echo "Semester";
                                            }
                                            if ($col == "agency") {
                                                echo "Agency";
                                            }
                                            if ($col == "type") {
                                                echo "Type";
                                            }
                                            if ($col == "amount") {
                                                echo "Amount";
                                            }

                                            if ($col == "due_date") {
                                                echo "Due Date";
                                            }
                                            if ($col == "status") {
                                                echo "Status";
                                            }
                                            if ($col == "finish_date") {
                                                echo "Finish Date";
                                            }
                                            if ($col == "timestamp") {
                                                echo "Timestamp";
                                            }
                                            if ($col == "ar") {
                                                echo "Amount Received";
                                            }
                                        }
                                        ?>
                                    </tr>
                                </thead>
                                <tbody>

                                    <?php if ($report_id != "0") {
                                        if (!isset($country_id) && !isset($university_id) && !isset($campus_name) && !isset($agency_id)) {
                                            if ($type_id == "0" && $date_id == "0") {
                                                $s1 = "SELECT id,student_id,agency_id,type,amount,due_date,status,finish_date from ledger WHERE status=$report_id ORDER BY due_date ASC";
                                            } else if ($type_id != "0" && $date_id == "0") {
                                                $s1 = "SELECT id,student_id,agency_id,type,amount,due_date,status,finish_date from ledger WHERE  type=$type_id  AND status=$report_id ORDER BY due_date ASC";
                                            } else if ($type_id == "0" && $date_id != 0) {
                                                $range = $_GET['daterange'];
                                                list($first, $second) = explode('-', $range);

                                                list($f_m, $f_d, $f_y) = explode('/', $first);
                                                $f_first0 = $f_y . "-" . $f_m . "-" . $f_d;
                                                $f_first = str_replace(' ', '', $f_first0);

                                                list($s_m, $s_d, $s_y) = explode('/', $second);
                                                $f_second0 = $s_y . "-" . $s_m . "-" . $s_d;
                                                $f_second = str_replace(' ', '', $f_second0);

                                                $s1 = "SELECT id,student_id,agency_id,type,amount,due_date,status,finish_date from ledger WHERE  (due_date BETWEEN '$f_first' AND '$f_second') AND status=$report_id ORDER BY due_date ASC";
                                            } else if ($type_id != "0" && $date_id != 0) {
                                                $range = $_GET['daterange'];
                                                list($first, $second) = explode('-', $range);

                                                list($f_m, $f_d, $f_y) = explode('/', $first);
                                                $f_first0 = $f_y . "-" . $f_m . "-" . $f_d;
                                                $f_first = str_replace(' ', '', $f_first0);

                                                list($s_m, $s_d, $s_y) = explode('/', $second);
                                                $f_second0 = $s_y . "-" . $s_m . "-" . $s_d;
                                                $f_second = str_replace(' ', '', $f_second0);

                                                $s1 = "SELECT id,student_id,agency_id,type,amount,due_date,status,finish_date from ledger WHERE  (due_date BETWEEN '$f_first' AND '$f_second') AND status=$report_id AND type=$type_id ORDER BY due_date ASC";
                                            }
                                            $run = $conn->query($s1);


                                            while ($row = $run->fetch_assoc()) {
                                                $id = $row['student_id'];
                                                $ledger_id = $row['id'];



                                                foreach ($checkbox as $col) {

                                                    if ($col == "name") {
                                                        $s2 = "SELECT name from student_info WHERE id=$id";
                                                        $run2 = $conn->query($s2);
                                                        $row2 = $run2->fetch_assoc();
                                                        $name = $row2['name'];
                                                    }
                                                    if ($col == "dob") {
                                                        $s2 = "SELECT dob from student_info WHERE id=$id";
                                                        $run2 = $conn->query($s2);
                                                        $row2 = $run2->fetch_assoc();
                                                        $dob = $row2['dob'];
                                                    }
                                                    if ($col == "fees") {
                                                        $s2 = "SELECT fees from student_info WHERE id=$id";
                                                        $run2 = $conn->query($s2);
                                                        $row2 = $run2->fetch_assoc();
                                                        $fees = $row2['fees'];
                                                    }
                                                    if ($col == "commission") {
                                                        $s2 = "SELECT commission from student_info WHERE id=$id";
                                                        $run2 = $conn->query($s2);
                                                        $row2 = $run2->fetch_assoc();
                                                        $commission = $row2['commission'];
                                                    }
                                                    if ($col == "country") {
                                                        $s2 = "SELECT country_id from student_info WHERE id=$id";
                                                        $run2 = $conn->query($s2);
                                                        $row2 = $run2->fetch_assoc();
                                                        $country_id = $row2['country_id'];
                                                        $s4 = "SELECT name from country_info WHERE id=$country_id";
                                                        $run4 = $conn->query($s4);
                                                        $row4 = $run4->fetch_assoc();
                                                        $country_name = $row4['name'];
                                                    }
                                                    if ($col == "university") {
                                                        $s2 = "SELECT university_id from student_info WHERE id=$id";
                                                        $run2 = $conn->query($s2);
                                                        $row2 = $run2->fetch_assoc();
                                                        $university_id = $row2['university_id'];
                                                        $s4 = "SELECT name from university_info WHERE id=$university_id";
                                                        $run4 = $conn->query($s4);
                                                        $row4 = $run4->fetch_assoc();
                                                        $university_name = $row4['name'];
                                                    }
                                                    if ($col == "campus") {
                                                        $s2 = "SELECT campus_id from student_info WHERE id=$id";
                                                        $run2 = $conn->query($s2);
                                                        $row2 = $run2->fetch_assoc();
                                                        $campus_id = $row2['campus_id'];
                                                        $s4 = "SELECT name from campus_info WHERE id=$campus_id";
                                                        $run4 = $conn->query($s4);
                                                        $row4 = $run4->fetch_assoc();
                                                        $campus_name = $row4['name'];
                                                    }
                                                    if ($col == "student_id") {
                                                        $s2 = "SELECT student_id from student_info WHERE id=$id";
                                                        $run2 = $conn->query($s2);
                                                        $row2 = $run2->fetch_assoc();
                                                        $student_id = $row2['student_id'];
                                                    }
                                                    if ($col == "visa_number") {
                                                        $s2 = "SELECT visa_number from student_info WHERE id=$id";
                                                        $run2 = $conn->query($s2);
                                                        $row2 = $run2->fetch_assoc();
                                                        $visa_number = $row2['visa_number'];
                                                    }
                                                    if ($col == "course") {
                                                        $s2 = "SELECT course from student_info WHERE id=$id";
                                                        $run2 = $conn->query($s2);
                                                        $row2 = $run2->fetch_assoc();
                                                        $course = $row2['course'];
                                                    }
                                                    if ($col == "semester") {
                                                        $s2 = "SELECT semester from student_info WHERE id=$id";
                                                        $run2 = $conn->query($s2);
                                                        $row2 = $run2->fetch_assoc();
                                                        $semester = $row2['semester'];
                                                    }
                                                    if ($col == "agency") {

                                                        $agency_id = $row['agency_id'];
                                                        $s4 = "SELECT name from agency_info WHERE id=$agency_id";
                                                        $run4 = $conn->query($s4);
                                                        $row4 = $run4->fetch_assoc();
                                                        $agency_name = $row4['name'];
                                                    }
                                                    if ($col == "type") {
                                                        $type_id = $row['type'];
                                                        if ($type_id == "1") {
                                                            $type = "DEBIT";
                                                        } else {
                                                            $type = "CREDIT";
                                                        }
                                                    }
                                                    if ($col == "amount") {
                                                        $amount = $row['amount'];
                                                    }

                                                    if ($col == "due_date") {
                                                        $due_date = $row['due_date'];
                                                    }
                                                    if ($col == "status") {
                                                        $status_id = $row['status'];
                                                        if ($status_id == "1") {
                                                            $status = "Due";
                                                        } else {
                                                            $status = "Completed";
                                                        }
                                                    }
                                                    if ($col == "finish_date") {
                                                        $finish_date = $row['finish_date'];
                                                    }
                                                    if ($col == "timestamp") {
                                                        $s2 = "SELECT timestamp from student_info WHERE id=$id";
                                                        $run2 = $conn->query($s2);
                                                        $row2 = $run2->fetch_assoc();
                                                        $timestamp = $row2['timestamp'];
                                                    }
                                                    if ($col == "ar") {
                                                        $s2 = "SELECT amount from ledger2 WHERE ledger_id=$ledger_id";
                                                        $run2 = $conn->query($s2);
                                                        $final_amount = 0;
                                                        while ($row2 = $run2->fetch_assoc()) {
                                                            $amount = $row2['amount'];
                                                            $final_amount = $final_amount + $amount;
                                                        }
                                                    }
                                                }

                                    ?>
                                                <tr>
                                                    <td><?php echo $id ?></td>
                                                    <?php
                                                    foreach ($checkbox as $col) {
                                                        echo "<td>";

                                                        if ($col == "name") {
                                                            $href = $name . " (" . $id . ")";
                                                            $s0 = "SELECT photo_path from photo_db WHERE s_id=$id";
                                                            $run0 = $conn->query($s0);
                                                            $row0 = $run0->fetch_assoc();
                                                            $profile_path = $row0['photo_path'];

                                                            echo '<div><a name="' . $name . '" class="Profile_Image"  target="_blank" data-image="' . $profile_path . '" href="search_student.php?name=' . $href . '">' . $name . "</a></div>";
                                                        }
                                                        if ($col == "dob") {
                                                            echo $dob;
                                                        }
                                                        if ($col == "fees") {
                                                            echo $fees;
                                                        }
                                                        if ($col == "commission") {
                                                            echo $commission;
                                                        }
                                                        if ($col == "country") {
                                                            echo $country_name;
                                                        }
                                                        if ($col == "university") {
                                                            echo $university_name;
                                                        }
                                                        if ($col == "campus") {
                                                            echo $campus_name;
                                                        }
                                                        if ($col == "student_id") {
                                                            echo $student_id;
                                                        }
                                                        if ($col == "visa_number") {
                                                            echo $visa_number;
                                                        }
                                                        if ($col == "course") {
                                                            echo $course;
                                                        }
                                                        if ($col == "semester") {
                                                            echo $semester;
                                                        }
                                                        if ($col == "agency") {
                                                            echo $agency_name;
                                                        }
                                                        if ($col == "type") {
                                                            echo $type;
                                                        }
                                                        if ($col == "amount") {
                                                            echo $amount;
                                                        }

                                                        if ($col == "due_date") {
                                                            echo $due_date;
                                                        }
                                                        if ($col == "status") {
                                                            echo $status;
                                                        }
                                                        if ($col == "finish_date") {
                                                            echo $finish_date;
                                                        }
                                                        if ($col == "timestamp") {
                                                            echo $timestamp;
                                                        }
                                                        if ($col == "ar") {
                                                            echo $final_amount;
                                                        }

                                                        echo "</td>";
                                                    }
                                                }
                                            }
                                            if (isset($country_id)) {
                                                foreach ($country_id as $country) {
                                                    $s0 = "SELECT id,name,dob,fees,commission,country_id,university_id,campus_id,student_id,visa_number,course,semester,timestamp from student_info WHERE country_id=$country AND status=$report_id ";
                                                    $run1 = $conn->query($s0);
                                                    while ($row1 = $run1->fetch_assoc()) {
                                                        $student_id = $row1['id'];
                                                        $id = $row1['id'];

                                                        if ($type_id == "0" && $date_id == "0") {
                                                            $s1 = "SELECT id,agency_id,type,amount,due_date,status,finish_date from ledger WHERE student_id=$student_id AND status=$report_id ORDER BY due_date ASC";
                                                        } else if ($type_id != "0" && $date_id == "0") {
                                                            $s1 = "SELECT id,agency_id,type,amount,due_date,status,finish_date from ledger WHERE student_id=$student_id AND type=$type_id  AND status=$report_id ORDER BY due_date ASC";
                                                        } else if ($type_id == "0" && $date_id != 0) {
                                                            $range = $_GET['daterange'];
                                                            list($first, $second) = explode('-', $range);

                                                            list($f_m, $f_d, $f_y) = explode('/', $first);
                                                            $f_first0 = $f_y . "-" . $f_m . "-" . $f_d;
                                                            $f_first = str_replace(' ', '', $f_first0);

                                                            list($s_m, $s_d, $s_y) = explode('/', $second);
                                                            $f_second0 = $s_y . "-" . $s_m . "-" . $s_d;
                                                            $f_second = str_replace(' ', '', $f_second0);

                                                            $s1 = "SELECT id,agency_id,type,amount,due_date,status,finish_date from ledger WHERE student_id=$student_id AND (due_date BETWEEN '$f_first' AND '$f_second') AND status=$report_id ORDER BY due_date ASC";
                                                        } else if ($type_id != "0" && $date_id != 0) {
                                                            $range = $_GET['daterange'];
                                                            list($first, $second) = explode('-', $range);

                                                            list($f_m, $f_d, $f_y) = explode('/', $first);
                                                            $f_first0 = $f_y . "-" . $f_m . "-" . $f_d;
                                                            $f_first = str_replace(' ', '', $f_first0);

                                                            list($s_m, $s_d, $s_y) = explode('/', $second);
                                                            $f_second0 = $s_y . "-" . $s_m . "-" . $s_d;
                                                            $f_second = str_replace(' ', '', $f_second0);

                                                            $s1 = "SELECT id,agency_id,type,amount,due_date,status,finish_date from ledger WHERE student_id=$student_id AND (due_date BETWEEN '$f_first' AND '$f_second') AND status=$report_id AND type=$type_id ORDER BY due_date ASC";
                                                        }


                                                        $run = $conn->query($s1);

                                                        while ($row = $run->fetch_assoc()) {

                                                            foreach ($checkbox as $col) {

                                                                if ($col == "name") {
                                                                    $name = $row1['name'];
                                                                }
                                                                if ($col == "dob") {
                                                                    $dob = $row1['dob'];
                                                                }
                                                                if ($col == "fees") {
                                                                    $fees = $row1['fees'];
                                                                }
                                                                if ($col == "commission") {
                                                                    $commission = $row1['commission'];
                                                                }
                                                                if ($col == "country") {
                                                                    $country_id = $row1['country_id'];
                                                                    $s4 = "SELECT name from country_info WHERE id=$country_id";
                                                                    $run4 = $conn->query($s4);
                                                                    $row4 = $run4->fetch_assoc();
                                                                    $country_name = $row4['name'];
                                                                }
                                                                if ($col == "university") {
                                                                    $university_id = $row1['university_id'];
                                                                    $s4 = "SELECT name from university_info WHERE id=$university_id";
                                                                    $run4 = $conn->query($s4);
                                                                    $row4 = $run4->fetch_assoc();
                                                                    $university_name = $row4['name'];
                                                                }
                                                                if ($col == "campus") {
                                                                    $campus_id = $row1['campus_id'];
                                                                    $s4 = "SELECT name from campus_info WHERE id=$campus_id";
                                                                    $run4 = $conn->query($s4);
                                                                    $row4 = $run4->fetch_assoc();
                                                                    $campus_name = $row4['name'];
                                                                }
                                                                if ($col == "student_id") {
                                                                    $student_id = $row1['student_id'];
                                                                }
                                                                if ($col == "visa_number") {
                                                                    $visa_number = $row1['visa_number'];
                                                                }
                                                                if ($col == "course") {
                                                                    $course = $row1['course'];
                                                                }
                                                                if ($col == "semester") {
                                                                    $semester = $row1['semester'];
                                                                }
                                                                if ($col == "agency") {
                                                                    $agency_id = $row['agency_id'];
                                                                    $s4 = "SELECT name from agency_info WHERE id=$agency_id";
                                                                    $run4 = $conn->query($s4);
                                                                    $row4 = $run4->fetch_assoc();
                                                                    $agency_name = $row4['name'];
                                                                }
                                                                if ($col == "type") {
                                                                    $type_id = $row['type'];
                                                                    if ($type_id == "1") {
                                                                        $type = "DEBIT";
                                                                    } else {
                                                                        $type = "CREDIT";
                                                                    }
                                                                }
                                                                if ($col == "amount") {
                                                                    $amount = $row['amount'];
                                                                }

                                                                if ($col == "due_date") {
                                                                    $due_date = $row['due_date'];
                                                                }
                                                                if ($col == "status") {
                                                                    $status_id = $row['status'];
                                                                    if ($status_id == "1") {
                                                                        $status = "Due";
                                                                    } else {
                                                                        $status = "Completed";
                                                                    }
                                                                }
                                                                if ($col == "finish_date") {
                                                                    $finish_date = $row['finish_date'];
                                                                }
                                                                if ($col == "timestamp") {
                                                                    $timestamp = $row1['timestamp'];
                                                                }
                                                                if ($col == "ar") {
                                                                    $ledger_id = $row['id'];
                                                                    $s2 = "SELECT amount from ledger2 WHERE ledger_id=$ledger_id";
                                                                    $run2 = $conn->query($s2);
                                                                    $final_amount = 0;
                                                                    while ($row2 = $run2->fetch_assoc()) {
                                                                        $amount = $row2['amount'];
                                                                        $final_amount = $final_amount + $amount;
                                                                    }
                                                                }
                                                            }

                                                    ?>
                                                <tr>
                                                    <td><?php echo $id ?></td>
                                                    <?php
                                                            foreach ($checkbox as $col) {
                                                                echo "<td>";

                                                                if ($col == "name") {
                                                                    $href = $name . " (" . $id . ")";
                                                                    $s0 = "SELECT photo_path from photo_db WHERE s_id=$id";
                                                                    $run0 = $conn->query($s0);
                                                                    $row0 = $run0->fetch_assoc();
                                                                    $profile_path = $row0['photo_path'];

                                                                    echo '<div><a name="' . $name . '" class="Profile_Image"  target="_blank" data-image="' . $profile_path . '" href="search_student.php?name=' . $href . '">' . $name . "</a></div>";
                                                                }
                                                                if ($col == "dob") {
                                                                    echo $dob;
                                                                }
                                                                if ($col == "fees") {
                                                                    echo $fees;
                                                                }
                                                                if ($col == "commission") {
                                                                    echo $commission;
                                                                }
                                                                if ($col == "country") {
                                                                    echo $country_name;
                                                                }
                                                                if ($col == "university") {
                                                                    echo $university_name;
                                                                }
                                                                if ($col == "campus") {
                                                                    echo $campus_name;
                                                                }
                                                                if ($col == "student_id") {
                                                                    echo $student_id;
                                                                }
                                                                if ($col == "visa_number") {
                                                                    echo $visa_number;
                                                                }
                                                                if ($col == "course") {
                                                                    echo $course;
                                                                }
                                                                if ($col == "semester") {
                                                                    echo $semester;
                                                                }
                                                                if ($col == "agency") {
                                                                    echo $agency_name;
                                                                }
                                                                if ($col == "type") {
                                                                    echo $type;
                                                                }
                                                                if ($col == "amount") {
                                                                    echo $amount;
                                                                }

                                                                if ($col == "due_date") {
                                                                    echo $due_date;
                                                                }
                                                                if ($col == "status") {
                                                                    echo $status;
                                                                }
                                                                if ($col == "finish_date") {
                                                                    echo $finish_date;
                                                                }
                                                                if ($col == "timestamp") {
                                                                    echo $timestamp;
                                                                }
                                                                if ($col == "ar") {
                                                                    echo $final_amount;
                                                                }

                                                                echo "</td>";
                                                            }
                                                        }
                                                    }
                                                }
                                            }
                                            if (isset($semester)) {
                                                foreach ($semester as $sem) {
                                                    $s0 = "SELECT id,name,dob,fees,commission,country_id,university_id,campus_id,student_id,visa_number,course,semester,timestamp from student_info WHERE semester='$sem' AND status=$report_id ";
                                                    $run1 = $conn->query($s0);
                                                    while ($row1 = $run1->fetch_assoc()) {
                                                        $student_id = $row1['id'];
                                                        $id = $row1['id'];

                                                        if ($type_id == "0" && $date_id == "0") {
                                                            $s1 = "SELECT id,agency_id,type,amount,due_date,status,finish_date from ledger WHERE student_id=$student_id AND status=$report_id ORDER BY due_date ASC";
                                                        } else if ($type_id != "0" && $date_id == "0") {
                                                            $s1 = "SELECT id,agency_id,type,amount,due_date,status,finish_date from ledger WHERE student_id=$student_id AND type=$type_id  AND status=$report_id ORDER BY due_date ASC";
                                                        } else if ($type_id == "0" && $date_id != 0) {
                                                            $range = $_GET['daterange'];
                                                            list($first, $second) = explode('-', $range);

                                                            list($f_m, $f_d, $f_y) = explode('/', $first);
                                                            $f_first0 = $f_y . "-" . $f_m . "-" . $f_d;
                                                            $f_first = str_replace(' ', '', $f_first0);

                                                            list($s_m, $s_d, $s_y) = explode('/', $second);
                                                            $f_second0 = $s_y . "-" . $s_m . "-" . $s_d;
                                                            $f_second = str_replace(' ', '', $f_second0);

                                                            $s1 = "SELECT id,agency_id,type,amount,due_date,status,finish_date from ledger WHERE student_id=$student_id AND (due_date BETWEEN '$f_first' AND '$f_second') AND status=$report_id ORDER BY due_date ASC";
                                                        } else if ($type_id != "0" && $date_id != 0) {
                                                            $range = $_GET['daterange'];
                                                            list($first, $second) = explode('-', $range);

                                                            list($f_m, $f_d, $f_y) = explode('/', $first);
                                                            $f_first0 = $f_y . "-" . $f_m . "-" . $f_d;
                                                            $f_first = str_replace(' ', '', $f_first0);

                                                            list($s_m, $s_d, $s_y) = explode('/', $second);
                                                            $f_second0 = $s_y . "-" . $s_m . "-" . $s_d;
                                                            $f_second = str_replace(' ', '', $f_second0);

                                                            $s1 = "SELECT id,agency_id,type,amount,due_date,status,finish_date from ledger WHERE student_id=$student_id AND (due_date BETWEEN '$f_first' AND '$f_second') AND status=$report_id AND type=$type_id ORDER BY due_date ASC";
                                                        }


                                                        $run = $conn->query($s1);

                                                        while ($row = $run->fetch_assoc()) {

                                                            foreach ($checkbox as $col) {

                                                                if ($col == "name") {
                                                                    $name = $row1['name'];
                                                                }
                                                                if ($col == "dob") {
                                                                    $dob = $row1['dob'];
                                                                }
                                                                if ($col == "fees") {
                                                                    $fees = $row1['fees'];
                                                                }
                                                                if ($col == "commission") {
                                                                    $commission = $row1['commission'];
                                                                }
                                                                if ($col == "country") {
                                                                    $country_id = $row1['country_id'];
                                                                    $s4 = "SELECT name from country_info WHERE id=$country_id";
                                                                    $run4 = $conn->query($s4);
                                                                    $row4 = $run4->fetch_assoc();
                                                                    $country_name = $row4['name'];
                                                                }
                                                                if ($col == "university") {
                                                                    $university_id = $row1['university_id'];
                                                                    $s4 = "SELECT name from university_info WHERE id=$university_id";
                                                                    $run4 = $conn->query($s4);
                                                                    $row4 = $run4->fetch_assoc();
                                                                    $university_name = $row4['name'];
                                                                }
                                                                if ($col == "campus") {
                                                                    $campus_id = $row1['campus_id'];
                                                                    $s4 = "SELECT name from campus_info WHERE id=$campus_id";
                                                                    $run4 = $conn->query($s4);
                                                                    $row4 = $run4->fetch_assoc();
                                                                    $campus_name = $row4['name'];
                                                                }
                                                                if ($col == "student_id") {
                                                                    $student_id = $row1['student_id'];
                                                                }
                                                                if ($col == "visa_number") {
                                                                    $visa_number = $row1['visa_number'];
                                                                }
                                                                if ($col == "course") {
                                                                    $course = $row1['course'];
                                                                }
                                                                if ($col == "semester") {
                                                                    $semester = $row1['semester'];
                                                                }
                                                                if ($col == "agency") {
                                                                    $agency_id = $row['agency_id'];
                                                                    $s4 = "SELECT name from agency_info WHERE id=$agency_id";
                                                                    $run4 = $conn->query($s4);
                                                                    $row4 = $run4->fetch_assoc();
                                                                    $agency_name = $row4['name'];
                                                                }
                                                                if ($col == "type") {
                                                                    $type_id = $row['type'];
                                                                    if ($type_id == "1") {
                                                                        $type = "DEBIT";
                                                                    } else {
                                                                        $type = "CREDIT";
                                                                    }
                                                                }
                                                                if ($col == "amount") {
                                                                    $amount = $row['amount'];
                                                                }

                                                                if ($col == "due_date") {
                                                                    $due_date = $row['due_date'];
                                                                }
                                                                if ($col == "status") {
                                                                    $status_id = $row['status'];
                                                                    if ($status_id == "1") {
                                                                        $status = "Due";
                                                                    } else {
                                                                        $status = "Completed";
                                                                    }
                                                                }
                                                                if ($col == "finish_date") {
                                                                    $finish_date = $row['finish_date'];
                                                                }
                                                                if ($col == "timestamp") {
                                                                    $timestamp = $row1['timestamp'];
                                                                }
                                                                if ($col == "ar") {
                                                                    $ledger_id = $row['id'];
                                                                    $s2 = "SELECT amount from ledger2 WHERE ledger_id=$ledger_id";
                                                                    $run2 = $conn->query($s2);
                                                                    $final_amount = 0;
                                                                    while ($row2 = $run2->fetch_assoc()) {
                                                                        $amount = $row2['amount'];
                                                                        $final_amount = $final_amount + $amount;
                                                                    }
                                                                }
                                                            }

                                                    ?>
                                                <tr>
                                                    <td><?php echo $id ?></td>
                                                    <?php
                                                            foreach ($checkbox as $col) {
                                                                echo "<td>";

                                                                if ($col == "name") {
                                                                    $href = $name . " (" . $id . ")";
                                                                    $s0 = "SELECT photo_path from photo_db WHERE s_id=$id";
                                                                    $run0 = $conn->query($s0);
                                                                    $row0 = $run0->fetch_assoc();
                                                                    $profile_path = $row0['photo_path'];

                                                                    echo '<div><a name="' . $name . '" class="Profile_Image"  target="_blank" data-image="' . $profile_path . '" href="search_student.php?name=' . $href . '">' . $name . "</a></div>";
                                                                }
                                                                if ($col == "dob") {
                                                                    echo $dob;
                                                                }
                                                                if ($col == "fees") {
                                                                    echo $fees;
                                                                }
                                                                if ($col == "commission") {
                                                                    echo $commission;
                                                                }
                                                                if ($col == "country") {
                                                                    echo $country_name;
                                                                }
                                                                if ($col == "university") {
                                                                    echo $university_name;
                                                                }
                                                                if ($col == "campus") {
                                                                    echo $campus_name;
                                                                }
                                                                if ($col == "student_id") {
                                                                    echo $student_id;
                                                                }
                                                                if ($col == "visa_number") {
                                                                    echo $visa_number;
                                                                }
                                                                if ($col == "course") {
                                                                    echo $course;
                                                                }
                                                                if ($col == "semester") {
                                                                    echo $semester;
                                                                }
                                                                if ($col == "agency") {
                                                                    echo $agency_name;
                                                                }
                                                                if ($col == "type") {
                                                                    echo $type;
                                                                }
                                                                if ($col == "amount") {
                                                                    echo $amount;
                                                                }

                                                                if ($col == "due_date") {
                                                                    echo $due_date;
                                                                }
                                                                if ($col == "status") {
                                                                    echo $status;
                                                                }
                                                                if ($col == "finish_date") {
                                                                    echo $finish_date;
                                                                }
                                                                if ($col == "timestamp") {
                                                                    echo $timestamp;
                                                                }

                                                                if ($col == "ar") {
                                                                    echo $final_amount;
                                                                }

                                                                echo "</td>";
                                                            }
                                                        }
                                                    }
                                                }
                                            }
                                            if (isset($university_id)) {
                                                foreach ($university_id as $university) {

                                                    $s0 = "SELECT id,name,dob,fees,commission,country_id,university_id,campus_id,student_id,visa_number,course,semester,timestamp from student_info WHERE university_id=$university AND status=$report_id ";
                                                    $run1 = $conn->query($s0);
                                                    while ($row1 = $run1->fetch_assoc()) {
                                                        $student_id = $row1['id'];
                                                        $id = $row1['id'];

                                                        if ($type_id == "0" && $date_id == "0") {
                                                            $s1 = "SELECT id,agency_id,type,amount,due_date,status,finish_date from ledger WHERE student_id=$student_id AND status=$report_id ORDER BY due_date ASC";
                                                        } else if ($type_id != "0" && $date_id == "0") {
                                                            $s1 = "SELECT id,agency_id,type,amount,due_date,status,finish_date from ledger WHERE student_id=$student_id AND type=$type_id  AND status=$report_id ORDER BY due_date ASC";
                                                        } else if ($type_id == "0" && $date_id != 0) {
                                                            $range = $_GET['daterange'];
                                                            list($first, $second) = explode('-', $range);

                                                            list($f_m, $f_d, $f_y) = explode('/', $first);
                                                            $f_first0 = $f_y . "-" . $f_m . "-" . $f_d;
                                                            $f_first = str_replace(' ', '', $f_first0);

                                                            list($s_m, $s_d, $s_y) = explode('/', $second);
                                                            $f_second0 = $s_y . "-" . $s_m . "-" . $s_d;
                                                            $f_second = str_replace(' ', '', $f_second0);

                                                            $s1 = "SELECT id,agency_id,type,amount,due_date,status,finish_date from ledger WHERE student_id=$student_id AND (due_date BETWEEN '$f_first' AND '$f_second') AND status=$report_id  ORDER BY due_date ASC ";
                                                        } else if ($type_id != "0" && $date_id != 0) {
                                                            $range = $_GET['daterange'];
                                                            list($first, $second) = explode('-', $range);

                                                            list($f_m, $f_d, $f_y) = explode('/', $first);
                                                            $f_first0 = $f_y . "-" . $f_m . "-" . $f_d;
                                                            $f_first = str_replace(' ', '', $f_first0);

                                                            list($s_m, $s_d, $s_y) = explode('/', $second);
                                                            $f_second0 = $s_y . "-" . $s_m . "-" . $s_d;
                                                            $f_second = str_replace(' ', '', $f_second0);

                                                            $s1 = "SELECT id,agency_id,type,amount,due_date,status,finish_date from ledger WHERE student_id=$student_id AND (due_date BETWEEN '$f_first' AND '$f_second') AND status=$report_id AND type=$type_id ORDER BY due_date ASC";
                                                        }

                                                        $run = $conn->query($s1);

                                                        while ($row = $run->fetch_assoc()) {

                                                            foreach ($checkbox as $col) {
                                                                if ($col == "name") {
                                                                    $name = $row1['name'];
                                                                }
                                                                if ($col == "dob") {
                                                                    $dob = $row1['dob'];
                                                                }
                                                                if ($col == "fees") {
                                                                    $fees = $row1['fees'];
                                                                }
                                                                if ($col == "commission") {
                                                                    $commission = $row1['commission'];
                                                                }
                                                                if ($col == "country") {
                                                                    $country_id = $row1['country_id'];
                                                                    $s4 = "SELECT name from country_info WHERE id=$country_id";
                                                                    $run4 = $conn->query($s4);
                                                                    $row4 = $run4->fetch_assoc();
                                                                    $country_name = $row4['name'];
                                                                }
                                                                if ($col == "university") {
                                                                    $university_id = $row1['university_id'];
                                                                    $s4 = "SELECT name from university_info WHERE id=$university_id";
                                                                    $run4 = $conn->query($s4);
                                                                    $row4 = $run4->fetch_assoc();
                                                                    $university_name = $row4['name'];
                                                                }
                                                                if ($col == "campus") {
                                                                    $campus_id = $row1['campus_id'];
                                                                    $s4 = "SELECT name from campus_info WHERE id=$campus_id";
                                                                    $run4 = $conn->query($s4);
                                                                    $row4 = $run4->fetch_assoc();
                                                                    $campus_name = $row4['name'];
                                                                }
                                                                if ($col == "student_id") {
                                                                    $student_id = $row1['student_id'];
                                                                }
                                                                if ($col == "visa_number") {
                                                                    $visa_number = $row1['visa_number'];
                                                                }
                                                                if ($col == "course") {
                                                                    $course = $row1['course'];
                                                                }
                                                                if ($col == "semester") {
                                                                    $semester = $row1['semester'];
                                                                }
                                                                if ($col == "agency") {
                                                                    $agency_id = $row['agency_id'];
                                                                    $s4 = "SELECT name from agency_info WHERE id=$agency_id";
                                                                    $run4 = $conn->query($s4);
                                                                    $row4 = $run4->fetch_assoc();
                                                                    $agency_name = $row4['name'];
                                                                }
                                                                if ($col == "type") {
                                                                    $type_id = $row['type'];
                                                                    if ($type_id == "1") {
                                                                        $type = "DEBIT";
                                                                    } else {
                                                                        $type = "CREDIT";
                                                                    }
                                                                }
                                                                if ($col == "amount") {
                                                                    $amount = $row['amount'];
                                                                }

                                                                if ($col == "due_date") {
                                                                    $due_date = $row['due_date'];
                                                                }
                                                                if ($col == "status") {
                                                                    $status_id = $row['status'];
                                                                    if ($status_id == "1") {
                                                                        $status = "Due";
                                                                    } else {
                                                                        $status = "Completed";
                                                                    }
                                                                }
                                                                if ($col == "finish_date") {
                                                                    $finish_date = $row['finish_date'];
                                                                }
                                                                if ($col == "timestamp") {
                                                                    $timestamp = $row1['timestamp'];
                                                                }
                                                                if ($col == "ar") {
                                                                    $ledger_id = $row['id'];
                                                                    $s2 = "SELECT amount from ledger2 WHERE ledger_id=$ledger_id";
                                                                    $run2 = $conn->query($s2);
                                                                    $final_amount = 0;
                                                                    while ($row2 = $run2->fetch_assoc()) {
                                                                        $amount = $row2['amount'];
                                                                        $final_amount = $final_amount + $amount;
                                                                    }
                                                                }
                                                            }

                                                    ?>
                                                <tr>
                                                    <td><?php echo $id ?></td>
                                                <?php
                                                            foreach ($checkbox as $col) {
                                                                echo "<td>";

                                                                if ($col == "name") {
                                                                    $href = $name . " (" . $id . ")";
                                                                    $s0 = "SELECT photo_path from photo_db WHERE s_id=$id";
                                                                    $run0 = $conn->query($s0);
                                                                    $row0 = $run0->fetch_assoc();
                                                                    $profile_path = $row0['photo_path'];

                                                                    echo '<div><a name="' . $name . '" class="Profile_Image"  target="_blank" data-image="' . $profile_path . '" href="search_student.php?name=' . $href . '">' . $name . "</a></div>";
                                                                }
                                                                if ($col == "dob") {
                                                                    echo $dob;
                                                                }
                                                                if ($col == "fees") {
                                                                    echo $fees;
                                                                }
                                                                if ($col == "commission") {
                                                                    echo $commission;
                                                                }
                                                                if ($col == "country") {
                                                                    echo $country_name;
                                                                }
                                                                if ($col == "university") {
                                                                    echo $university_name;
                                                                }
                                                                if ($col == "campus") {
                                                                    echo $campus_name;
                                                                }
                                                                if ($col == "student_id") {
                                                                    echo $student_id;
                                                                }
                                                                if ($col == "visa_number") {
                                                                    echo $visa_number;
                                                                }
                                                                if ($col == "course") {
                                                                    echo $course;
                                                                }
                                                                if ($col == "semester") {
                                                                    echo $semester;
                                                                }
                                                                if ($col == "agency") {
                                                                    echo $agency_name;
                                                                }
                                                                if ($col == "type") {
                                                                    echo $type;
                                                                }
                                                                if ($col == "amount") {
                                                                    echo $amount;
                                                                }

                                                                if ($col == "due_date") {
                                                                    echo $due_date;
                                                                }
                                                                if ($col == "status") {
                                                                    echo $status;
                                                                }
                                                                if ($col == "finish_date") {
                                                                    echo $finish_date;
                                                                }
                                                                if ($col == "timestamp") {
                                                                    echo $timestamp;
                                                                }

                                                                if ($col == "ar") {
                                                                    echo $final_amount;
                                                                }



                                                                echo "</td>";
                                                            }
                                                        }
                                                    }
                                                }
                                            }
                                            if (isset($agency_id)) {

                                                foreach ($agency_id as $agency) {

                                                    if ($type_id == "0" && $date_id == "0") {
                                                        $s1 = "SELECT id,student_id,agency_id,type,amount,due_date,status,finish_date from ledger WHERE agency_id=$agency AND status=$report_id  ORDER BY due_date ASC";
                                                    } else if ($type_id != "0" && $date_id == "0") {
                                                        $s1 = "SELECT id,student_id,agency_id,type,amount,due_date,status,finish_date from ledger WHERE agency_id=$agency_id AND type=$type_id  AND status=$report_id  ORDER BY due_date ASC";
                                                    } else if ($type_id == "0" && $date_id != 0) {
                                                        $range = $_GET['daterange'];
                                                        list($first, $second) = explode('-', $range);

                                                        list($f_m, $f_d, $f_y) = explode('/', $first);
                                                        $f_first0 = $f_y . "-" . $f_m . "-" . $f_d;
                                                        $f_first = str_replace(' ', '', $f_first0);

                                                        list($s_m, $s_d, $s_y) = explode('/', $second);
                                                        $f_second0 = $s_y . "-" . $s_m . "-" . $s_d;
                                                        $f_second = str_replace(' ', '', $f_second0);

                                                        $s1 = "SELECT id,student_id,agency_id,type,amount,due_date,status,finish_date from ledger WHERE agency_id=$agency_id AND (due_date BETWEEN '$f_first' AND '$f_second') AND status=$report_id  ORDER BY due_date ASC";
                                                    } else if ($type_id != "0" && $date_id != 0) {
                                                        $range = $_GET['daterange'];
                                                        list($first, $second) = explode('-', $range);

                                                        list($f_m, $f_d, $f_y) = explode('/', $first);
                                                        $f_first0 = $f_y . "-" . $f_m . "-" . $f_d;
                                                        $f_first = str_replace(' ', '', $f_first0);

                                                        list($s_m, $s_d, $s_y) = explode('/', $second);
                                                        $f_second0 = $s_y . "-" . $s_m . "-" . $s_d;
                                                        $f_second = str_replace(' ', '', $f_second0);

                                                        $s1 = "SELECT id,student_id,agency_id,type,amount,due_date,status,finish_date from ledger WHERE student_id=$student_id AND (due_date BETWEEN '$f_first' AND '$f_second') AND status=$report_id AND type=$type_id ORDER BY due_date ASC";
                                                    }
                                                    $run = $conn->query($s1);


                                                    while ($row = $run->fetch_assoc()) {
                                                        $id = $row['student_id'];


                                                        foreach ($checkbox as $col) {

                                                            if ($col == "name") {
                                                                $s2 = "SELECT name from student_info WHERE id=$id";
                                                                $run2 = $conn->query($s2);
                                                                $row2 = $run2->fetch_assoc();
                                                                $name = $row2['name'];
                                                            }
                                                            if ($col == "dob") {
                                                                $s2 = "SELECT dob from student_info WHERE id=$id";
                                                                $run2 = $conn->query($s2);
                                                                $row2 = $run2->fetch_assoc();
                                                                $dob = $row2['dob'];
                                                            }
                                                            if ($col == "fees") {
                                                                $s2 = "SELECT fees from student_info WHERE id=$id";
                                                                $run2 = $conn->query($s2);
                                                                $row2 = $run2->fetch_assoc();
                                                                $fees = $row2['fees'];
                                                            }
                                                            if ($col == "commission") {
                                                                $s2 = "SELECT commission from student_info WHERE id=$id";
                                                                $run2 = $conn->query($s2);
                                                                $row2 = $run2->fetch_assoc();
                                                                $commission = $row2['commission'];
                                                            }
                                                            if ($col == "country") {
                                                                $s2 = "SELECT country_id from student_info WHERE id=$id";
                                                                $run2 = $conn->query($s2);
                                                                $row2 = $run2->fetch_assoc();
                                                                $country_id = $row2['country_id'];
                                                                $s4 = "SELECT name from country_info WHERE id=$country_id";
                                                                $run4 = $conn->query($s4);
                                                                $row4 = $run4->fetch_assoc();
                                                                $country_name = $row4['name'];
                                                            }
                                                            if ($col == "university") {
                                                                $s2 = "SELECT university_id from student_info WHERE id=$id";
                                                                $run2 = $conn->query($s2);
                                                                $row2 = $run2->fetch_assoc();
                                                                $university_id = $row2['university_id'];
                                                                $s4 = "SELECT name from university_info WHERE id=$university_id";
                                                                $run4 = $conn->query($s4);
                                                                $row4 = $run4->fetch_assoc();
                                                                $university_name = $row4['name'];
                                                            }
                                                            if ($col == "campus") {
                                                                $s2 = "SELECT campus_id from student_info WHERE id=$id";
                                                                $run2 = $conn->query($s2);
                                                                $row2 = $run2->fetch_assoc();
                                                                $campus_id = $row2['campus_id'];
                                                                $s4 = "SELECT name from campus_info WHERE id=$campus_id";
                                                                $run4 = $conn->query($s4);
                                                                $row4 = $run4->fetch_assoc();
                                                                $campus_name = $row4['name'];
                                                            }
                                                            if ($col == "student_id") {
                                                                $s2 = "SELECT student_id from student_info WHERE id=$id";
                                                                $run2 = $conn->query($s2);
                                                                $row2 = $run2->fetch_assoc();
                                                                $student_id = $row2['student_id'];
                                                            }
                                                            if ($col == "visa_number") {
                                                                $s2 = "SELECT visa_number from student_info WHERE id=$id";
                                                                $run2 = $conn->query($s2);
                                                                $row2 = $run2->fetch_assoc();
                                                                $visa_number = $row2['visa_number'];
                                                            }
                                                            if ($col == "course") {
                                                                $s2 = "SELECT course from student_info WHERE id=$id";
                                                                $run2 = $conn->query($s2);
                                                                $row2 = $run2->fetch_assoc();
                                                                $course = $row2['course'];
                                                            }
                                                            if ($col == "semester") {
                                                                $s2 = "SELECT semester from student_info WHERE id=$id";
                                                                $run2 = $conn->query($s2);
                                                                $row2 = $run2->fetch_assoc();
                                                                $semester = $row2['semester'];
                                                            }
                                                            if ($col == "agency") {

                                                                $agency_id = $row['agency_id'];
                                                                $s4 = "SELECT name from agency_info WHERE id=$agency_id";
                                                                $run4 = $conn->query($s4);
                                                                $row4 = $run4->fetch_assoc();
                                                                $agency_name = $row4['name'];
                                                            }
                                                            if ($col == "type") {
                                                                $type_id = $row['type'];
                                                                if ($type_id == "1") {
                                                                    $type = "DEBIT";
                                                                } else {
                                                                    $type = "CREDIT";
                                                                }
                                                            }
                                                            if ($col == "amount") {
                                                                $amount = $row['amount'];
                                                            }

                                                            if ($col == "due_date") {
                                                                $due_date = $row['due_date'];
                                                            }
                                                            if ($col == "status") {
                                                                $status_id = $row['status'];
                                                                if ($status_id == "1") {
                                                                    $status = "Due";
                                                                } else {
                                                                    $status = "Completed";
                                                                }
                                                            }
                                                            if ($col == "finish_date") {
                                                                $finish_date = $row['finish_date'];
                                                            }
                                                            if ($col == "timestamp") {
                                                                $s2 = "SELECT timestamp from student_info WHERE id=$id";
                                                                $run2 = $conn->query($s2);
                                                                $row2 = $run2->fetch_assoc();
                                                                $timestamp = $row2['timestamp'];
                                                            }
                                                            if ($col == "ar") {
                                                                $ledger_id = $row['id'];
                                                                $s2 = "SELECT amount from ledger2 WHERE ledger_id=$ledger_id";
                                                                $run2 = $conn->query($s2);
                                                                $final_amount = 0;
                                                                while ($row2 = $run2->fetch_assoc()) {
                                                                    $amount = $row2['amount'];
                                                                    $final_amount = $final_amount + $amount;
                                                                }
                                                            }
                                                        }

                                                ?>
                                                <tr>
                                                    <td><?php echo $id ?></td>
                                                    <?php
                                                        foreach ($checkbox as $col) {
                                                            echo "<td>";

                                                            if ($col == "name") {
                                                                $href = $name . " (" . $id . ")";
                                                                $s0 = "SELECT photo_path from photo_db WHERE s_id=$id";
                                                                $run0 = $conn->query($s0);
                                                                $row0 = $run0->fetch_assoc();
                                                                $profile_path = $row0['photo_path'];

                                                                echo '<div><a name="' . $name . '" class="Profile_Image"  target="_blank" data-image="' . $profile_path . '" href="search_student.php?name=' . $href . '">' . $name . "</a></div>";
                                                            }
                                                            if ($col == "dob") {
                                                                echo $dob;
                                                            }
                                                            if ($col == "fees") {
                                                                echo $fees;
                                                            }
                                                            if ($col == "commission") {
                                                                echo $commission;
                                                            }
                                                            if ($col == "country") {
                                                                echo $country_name;
                                                            }
                                                            if ($col == "university") {
                                                                echo $university_name;
                                                            }
                                                            if ($col == "campus") {
                                                                echo $campus_name;
                                                            }
                                                            if ($col == "student_id") {
                                                                echo $student_id;
                                                            }
                                                            if ($col == "visa_number") {
                                                                echo $visa_number;
                                                            }
                                                            if ($col == "course") {
                                                                echo $course;
                                                            }
                                                            if ($col == "semester") {
                                                                echo $semester;
                                                            }
                                                            if ($col == "agency") {
                                                                echo $agency_name;
                                                            }
                                                            if ($col == "type") {
                                                                echo $type;
                                                            }
                                                            if ($col == "amount") {
                                                                echo $amount;
                                                            }

                                                            if ($col == "due_date") {
                                                                echo $due_date;
                                                            }
                                                            if ($col == "status") {
                                                                echo $status;
                                                            }
                                                            if ($col == "finish_date") {
                                                                echo $finish_date;
                                                            }
                                                            if ($col == "timestamp") {
                                                                echo $timestamp;
                                                            }

                                                            if ($col == "ar") {
                                                                echo $final_amount;
                                                            }


                                                            echo "</td>";
                                                        }
                                                    }
                                                }
                                            }
                                            if (isset($campus_name)) {
                                                foreach ($campus_name as $campus) {
                                                    $sql = "SELECT id from campus_info WHERE name='$campus'";
                                                    $run1 = $conn->query($sql);
                                                    while ($row1 = $run1->fetch_assoc()) {
                                                        $campus_id = $row1['id'];

                                                        $s0 = "SELECT id,name,dob,fees,commission,country_id,university_id,campus_id,student_id,visa_number,course,semester,timestamp from student_info WHERE campus_id=$campus_id AND status=$report_id ";
                                                        $run10 = $conn->query($s0);
                                                        while ($row10 = $run10->fetch_assoc()) {
                                                            $id = $row10['id'];


                                                            if ($type_id == "0" && $date_id == "0") {
                                                                $s1 = "SELECT id,agency_id,type,amount,due_date,status,finish_date from ledger WHERE student_id=$id AND status=$report_id  ORDER BY due_date ASC";
                                                            } else if ($type_id != "0" && $date_id == "0") {
                                                                $s1 = "SELECT id,agency_id,type,amount,due_date,status,finish_date from ledger WHERE student_id=$id AND type=$type_id  AND status=$report_id  ORDER BY due_date ASC";
                                                            } else if ($type_id == "0" && $date_id != 0) {
                                                                $range = $_GET['daterange'];
                                                                list($first, $second) = explode('-', $range);

                                                                list($f_m, $f_d, $f_y) = explode('/', $first);
                                                                $f_first0 = $f_y . "-" . $f_m . "-" . $f_d;
                                                                $f_first = str_replace(' ', '', $f_first0);

                                                                list($s_m, $s_d, $s_y) = explode('/', $second);
                                                                $f_second0 = $s_y . "-" . $s_m . "-" . $s_d;
                                                                $f_second = str_replace(' ', '', $f_second0);

                                                                $s1 = "SELECT id,agency_id,type,amount,due_date,status,finish_date from ledger WHERE student_id=$id AND (due_date BETWEEN '$f_first' AND '$f_second') AND status=$report_id  ORDER BY due_date ASC";
                                                            } else if ($type_id != "0" && $date_id != 0) {
                                                                $range = $_GET['daterange'];
                                                                list($first, $second) = explode('-', $range);

                                                                list($f_m, $f_d, $f_y) = explode('/', $first);
                                                                $f_first0 = $f_y . "-" . $f_m . "-" . $f_d;
                                                                $f_first = str_replace(' ', '', $f_first0);

                                                                list($s_m, $s_d, $s_y) = explode('/', $second);
                                                                $f_second0 = $s_y . "-" . $s_m . "-" . $s_d;
                                                                $f_second = str_replace(' ', '', $f_second0);

                                                                $s1 = "SELECT id,agency_id,type,amount,due_date,status,finish_date from ledger WHERE student_id=$id AND (due_date BETWEEN '$f_first' AND '$f_second') AND status=$report_id AND type=$type_id ORDER BY due_date ASC";
                                                            }

                                                            $run = $conn->query($s1);

                                                            while ($row = $run->fetch_assoc()) {

                                                                foreach ($checkbox as $col) {

                                                                    if ($col == "name") {
                                                                        $name = $row10['name'];
                                                                    }
                                                                    if ($col == "dob") {
                                                                        $dob = $row10['dob'];
                                                                    }
                                                                    if ($col == "fees") {
                                                                        $fees = $row10['fees'];
                                                                    }
                                                                    if ($col == "commission") {
                                                                        $commission = $row10['commission'];
                                                                    }
                                                                    if ($col == "country") {
                                                                        $country_id = $row10['country_id'];
                                                                        $s4 = "SELECT name from country_info WHERE id=$country_id";
                                                                        $run4 = $conn->query($s4);
                                                                        $row4 = $run4->fetch_assoc();
                                                                        $country_name = $row4['name'];
                                                                    }
                                                                    if ($col == "university") {
                                                                        $university_id = $row10['university_id'];
                                                                        $s4 = "SELECT name from university_info WHERE id=$university_id";
                                                                        $run4 = $conn->query($s4);
                                                                        $row4 = $run4->fetch_assoc();
                                                                        $university_name = $row4['name'];
                                                                    }
                                                                    if ($col == "campus") {
                                                                        $campus_id = $row10['campus_id'];
                                                                        $s4 = "SELECT name from campus_info WHERE id=$campus_id";
                                                                        $run4 = $conn->query($s4);
                                                                        $row4 = $run4->fetch_assoc();
                                                                        $campus_name = $row4['name'];
                                                                    }
                                                                    if ($col == "student_id") {
                                                                        $student_id = $row10['student_id'];
                                                                    }
                                                                    if ($col == "visa_number") {
                                                                        $visa_number = $row10['visa_number'];
                                                                    }
                                                                    if ($col == "course") {
                                                                        $course = $row10['course'];
                                                                    }
                                                                    if ($col == "semester") {
                                                                        $semester = $row10['semester'];
                                                                    }
                                                                    if ($col == "agency") {
                                                                        $agency_id = $row['agency_id'];
                                                                        $s4 = "SELECT name from agency_info WHERE id=$agency_id";
                                                                        $run4 = $conn->query($s4);
                                                                        $row4 = $run4->fetch_assoc();
                                                                        $agency_name = $row4['name'];
                                                                    }
                                                                    if ($col == "type") {
                                                                        $type_id = $row['type'];
                                                                        if ($type_id == "1") {
                                                                            $type = "DEBIT";
                                                                        } else {
                                                                            $type = "CREDIT";
                                                                        }
                                                                    }
                                                                    if ($col == "amount") {
                                                                        $amount = $row['amount'];
                                                                    }

                                                                    if ($col == "due_date") {
                                                                        $due_date = $row['due_date'];
                                                                    }
                                                                    if ($col == "status") {
                                                                        $status_id = $row['status'];
                                                                        if ($status_id == "1") {
                                                                            $status = "Due";
                                                                        } else {
                                                                            $status = "Completed";
                                                                        }
                                                                    }
                                                                    if ($col == "finish_date") {
                                                                        $finish_date = $row['finish_date'];
                                                                    }
                                                                    if ($col == "timestamp") {
                                                                        $timestamp = $row10['timestamp'];
                                                                    }
                                                                    if ($col == "ar") {
                                                                        $ledger_id = $row['id'];
                                                                        $s2 = "SELECT amount from ledger2 WHERE ledger_id=$ledger_id";
                                                                        $run2 = $conn->query($s2);
                                                                        $final_amount = 0;
                                                                        while ($row2 = $run2->fetch_assoc()) {
                                                                            $amount = $row2['amount'];
                                                                            $final_amount = $final_amount + $amount;
                                                                        }
                                                                    }
                                                                }

                                                    ?>
                                                <tr>
                                                    <td><?php echo $id ?></td>
                                        <?php
                                                                foreach ($checkbox as $col) {
                                                                    echo "<td>";

                                                                    if ($col == "name") {
                                                                        $href = $name . " (" . $id . ")";
                                                                        $s0 = "SELECT photo_path from photo_db WHERE s_id=$id";
                                                                        $run0 = $conn->query($s0);
                                                                        $row0 = $run0->fetch_assoc();
                                                                        $profile_path = $row0['photo_path'];

                                                                        echo '<div><a name="' . $name . '" class="Profile_Image"  target="_blank" data-image="' . $profile_path . '" href="search_student.php?name=' . $href . '">' . $name . "</a></div>";
                                                                    }
                                                                    if ($col == "dob") {
                                                                        echo $dob;
                                                                    }
                                                                    if ($col == "fees") {
                                                                        echo $fees;
                                                                    }
                                                                    if ($col == "commission") {
                                                                        echo $commission;
                                                                    }
                                                                    if ($col == "country") {
                                                                        echo $country_name;
                                                                    }
                                                                    if ($col == "university") {
                                                                        echo $university_name;
                                                                    }
                                                                    if ($col == "campus") {
                                                                        echo $campus_name;
                                                                    }
                                                                    if ($col == "student_id") {
                                                                        echo $student_id;
                                                                    }
                                                                    if ($col == "visa_number") {
                                                                        echo $visa_number;
                                                                    }
                                                                    if ($col == "course") {
                                                                        echo $course;
                                                                    }
                                                                    if ($col == "semester") {
                                                                        echo $semester;
                                                                    }
                                                                    if ($col == "agency") {
                                                                        echo $agency_name;
                                                                    }
                                                                    if ($col == "type") {
                                                                        echo $type;
                                                                    }
                                                                    if ($col == "amount") {
                                                                        echo $amount;
                                                                    }

                                                                    if ($col == "due_date") {
                                                                        echo $due_date;
                                                                    }
                                                                    if ($col == "status") {
                                                                        echo $status;
                                                                    }
                                                                    if ($col == "finish_date") {
                                                                        echo $finish_date;
                                                                    }
                                                                    if ($col == "timestamp") {
                                                                        echo $timestamp;
                                                                    }

                                                                    if ($col == "ar") {
                                                                        echo $final_amount;
                                                                    }
                                                                    echo "</td>";
                                                                }
                                                            }
                                                        }
                                                    }
                                                }
                                            }
                                        } else {
                                            if (!isset($country_id) && !isset($university_id) && !isset($campus_name) && !isset($agency_id)) {
                                                if ($type_id == "0" && $date_id == "0") {
                                                    $s1 = "SELECT id,student_id,agency_id,type,amount,due_date,status,finish_date from ledger ORDER BY due_date ASC";
                                                } else if ($type_id != "0" && $date_id == "0") {
                                                    $s1 = "SELECT id,student_id,agency_id,type,amount,due_date,status,finish_date from ledger WHERE  type=$type_id  ORDER BY due_date ASC";
                                                } else if ($type_id == "0" && $date_id != 0) {
                                                    $range = $_GET['daterange'];
                                                    list($first, $second) = explode('-', $range);

                                                    list($f_m, $f_d, $f_y) = explode('/', $first);
                                                    $f_first0 = $f_y . "-" . $f_m . "-" . $f_d;
                                                    $f_first = str_replace(' ', '', $f_first0);

                                                    list($s_m, $s_d, $s_y) = explode('/', $second);
                                                    $f_second0 = $s_y . "-" . $s_m . "-" . $s_d;
                                                    $f_second = str_replace(' ', '', $f_second0);

                                                    $s1 = "SELECT id,student_id,agency_id,type,amount,due_date,status,finish_date from ledger WHERE  (due_date BETWEEN '$f_first' AND '$f_second')  ORDER BY due_date ASC";
                                                } else if ($type_id != "0" && $date_id != 0) {
                                                    $range = $_GET['daterange'];
                                                    list($first, $second) = explode('-', $range);

                                                    list($f_m, $f_d, $f_y) = explode('/', $first);
                                                    $f_first0 = $f_y . "-" . $f_m . "-" . $f_d;
                                                    $f_first = str_replace(' ', '', $f_first0);

                                                    list($s_m, $s_d, $s_y) = explode('/', $second);
                                                    $f_second0 = $s_y . "-" . $s_m . "-" . $s_d;
                                                    $f_second = str_replace(' ', '', $f_second0);

                                                    $s1 = "SELECT id,student_id,agency_id,type,amount,due_date,status,finish_date from ledger WHERE  (due_date BETWEEN '$f_first' AND '$f_second')  AND type=$type_id ORDER BY due_date ASC";
                                                }
                                                $run = $conn->query($s1);


                                                while ($row = $run->fetch_assoc()) {

                                                    $id = $row['student_id'];


                                                    foreach ($checkbox as $col) {

                                                        if ($col == "name") {
                                                            $s2 = "SELECT name from student_info WHERE id=$id";
                                                            $run2 = $conn->query($s2);
                                                            $row2 = $run2->fetch_assoc();
                                                            $name = $row2['name'];
                                                        }
                                                        if ($col == "dob") {
                                                            $s2 = "SELECT dob from student_info WHERE id=$id";
                                                            $run2 = $conn->query($s2);
                                                            $row2 = $run2->fetch_assoc();
                                                            $dob = $row2['dob'];
                                                        }
                                                        if ($col == "fees") {
                                                            $s2 = "SELECT fees from student_info WHERE id=$id";
                                                            $run2 = $conn->query($s2);
                                                            $row2 = $run2->fetch_assoc();
                                                            $fees = $row2['fees'];
                                                        }
                                                        if ($col == "commission") {
                                                            $s2 = "SELECT commission from student_info WHERE id=$id";
                                                            $run2 = $conn->query($s2);
                                                            $row2 = $run2->fetch_assoc();
                                                            $commission = $row2['commission'];
                                                        }
                                                        if ($col == "country") {
                                                            $s2 = "SELECT country_id from student_info WHERE id=$id";
                                                            $run2 = $conn->query($s2);
                                                            $row2 = $run2->fetch_assoc();
                                                            $country_id = $row2['country_id'];
                                                            $s4 = "SELECT name from country_info WHERE id=$country_id";
                                                            $run4 = $conn->query($s4);
                                                            $row4 = $run4->fetch_assoc();
                                                            $country_name = $row4['name'];
                                                        }
                                                        if ($col == "university") {
                                                            $s2 = "SELECT university_id from student_info WHERE id=$id";
                                                            $run2 = $conn->query($s2);
                                                            $row2 = $run2->fetch_assoc();
                                                            $university_id = $row2['university_id'];
                                                            $s4 = "SELECT name from university_info WHERE id=$university_id";
                                                            $run4 = $conn->query($s4);
                                                            $row4 = $run4->fetch_assoc();
                                                            $university_name = $row4['name'];
                                                        }
                                                        if ($col == "campus") {
                                                            $s2 = "SELECT campus_id from student_info WHERE id=$id";
                                                            $run2 = $conn->query($s2);
                                                            $row2 = $run2->fetch_assoc();
                                                            $campus_id = $row2['campus_id'];
                                                            $s4 = "SELECT name from campus_info WHERE id=$campus_id";
                                                            $run4 = $conn->query($s4);
                                                            $row4 = $run4->fetch_assoc();
                                                            $campus_name = $row4['name'];
                                                        }
                                                        if ($col == "student_id") {
                                                            $s2 = "SELECT student_id from student_info WHERE id=$id";
                                                            $run2 = $conn->query($s2);
                                                            $row2 = $run2->fetch_assoc();
                                                            $student_id = $row2['student_id'];
                                                        }
                                                        if ($col == "visa_number") {
                                                            $s2 = "SELECT visa_number from student_info WHERE id=$id";
                                                            $run2 = $conn->query($s2);
                                                            $row2 = $run2->fetch_assoc();
                                                            $visa_number = $row2['visa_number'];
                                                        }
                                                        if ($col == "course") {
                                                            $s2 = "SELECT course from student_info WHERE id=$id";
                                                            $run2 = $conn->query($s2);
                                                            $row2 = $run2->fetch_assoc();
                                                            $course = $row2['course'];
                                                        }
                                                        if ($col == "semester") {
                                                            $s2 = "SELECT semester from student_info WHERE id=$id";
                                                            $run2 = $conn->query($s2);
                                                            $row2 = $run2->fetch_assoc();
                                                            $semester = $row2['semester'];
                                                        }
                                                        if ($col == "agency") {

                                                            $agency_id = $row['agency_id'];
                                                            $s4 = "SELECT name from agency_info WHERE id=$agency_id";
                                                            $run4 = $conn->query($s4);
                                                            $row4 = $run4->fetch_assoc();
                                                            $agency_name = $row4['name'];
                                                        }
                                                        if ($col == "type") {
                                                            $type_id = $row['type'];
                                                            if ($type_id == "1") {
                                                                $type = "DEBIT";
                                                            } else {
                                                                $type = "CREDIT";
                                                            }
                                                        }
                                                        if ($col == "amount") {
                                                            $amount = $row['amount'];
                                                        }

                                                        if ($col == "due_date") {
                                                            $due_date = $row['due_date'];
                                                        }
                                                        if ($col == "status") {
                                                            $status_id = $row['status'];
                                                            if ($status_id == "1") {
                                                                $status = "Due";
                                                            } else {
                                                                $status = "Completed";
                                                            }
                                                        }
                                                        if ($col == "finish_date") {
                                                            $finish_date = $row['finish_date'];
                                                        }
                                                        if ($col == "timestamp") {
                                                            $s2 = "SELECT timestamp from student_info WHERE id=$id";
                                                            $run2 = $conn->query($s2);
                                                            $row2 = $run2->fetch_assoc();
                                                            $timestamp = $row2['timestamp'];
                                                        }
                                                        if ($col == "ar") {
                                                            $ledger_id = $row['id'];
                                                            $s2 = "SELECT amount from ledger2 WHERE ledger_id=$ledger_id";
                                                            $run2 = $conn->query($s2);
                                                            $final_amount = 0;
                                                            while ($row2 = $run2->fetch_assoc()) {
                                                                $amount = $row2['amount'];
                                                                $final_amount = $final_amount + $amount;
                                                            }
                                                        }
                                                    }

                                        ?>
                                                <tr>
                                                    <td><?php echo $id ?></td>
                                                    <?php
                                                    foreach ($checkbox as $col) {
                                                        echo "<td>";

                                                        if ($col == "name") {
                                                            $href = $name . " (" . $id . ")";
                                                            $s0 = "SELECT photo_path from photo_db WHERE s_id=$id";
                                                            $run0 = $conn->query($s0);
                                                            $row0 = $run0->fetch_assoc();
                                                            $profile_path = $row0['photo_path'];

                                                            echo '<div><a name="' . $name . '" class="Profile_Image"  target="_blank" data-image="' . $profile_path . '" href="search_student.php?name=' . $href . '">' . $name . "</a></div>";
                                                        }
                                                        if ($col == "dob") {
                                                            echo $dob;
                                                        }
                                                        if ($col == "fees") {
                                                            echo $fees;
                                                        }
                                                        if ($col == "commission") {
                                                            echo $commission;
                                                        }
                                                        if ($col == "country") {
                                                            echo $country_name;
                                                        }
                                                        if ($col == "university") {
                                                            echo $university_name;
                                                        }
                                                        if ($col == "campus") {
                                                            echo $campus_name;
                                                        }
                                                        if ($col == "student_id") {
                                                            echo $student_id;
                                                        }
                                                        if ($col == "visa_number") {
                                                            echo $visa_number;
                                                        }
                                                        if ($col == "course") {
                                                            echo $course;
                                                        }
                                                        if ($col == "semester") {
                                                            echo $semester;
                                                        }
                                                        if ($col == "agency") {
                                                            echo $agency_name;
                                                        }
                                                        if ($col == "type") {
                                                            echo $type;
                                                        }
                                                        if ($col == "amount") {
                                                            echo $amount;
                                                        }

                                                        if ($col == "due_date") {
                                                            echo $due_date;
                                                        }
                                                        if ($col == "status") {
                                                            echo $status;
                                                        }
                                                        if ($col == "finish_date") {
                                                            echo $finish_date;
                                                        }
                                                        if ($col == "timestamp") {
                                                            echo $timestamp;
                                                        }
                                                        if ($col == "ar") {
                                                            echo $final_amount;
                                                        }

                                                        echo "</td>";
                                                    }
                                                }
                                            }
                                            if (isset($country_id)) {
                                                foreach ($country_id as $country) {
                                                    $s0 = "SELECT id,name,dob,fees,commission,country_id,university_id,campus_id,student_id,visa_number,course,semester,timestamp from student_info WHERE country_id=$country  ";
                                                    $run1 = $conn->query($s0);
                                                    while ($row1 = $run1->fetch_assoc()) {
                                                        $student_id = $row1['id'];
                                                        $id = $row1['id'];

                                                        if ($type_id == "0" && $date_id == "0") {
                                                            $s1 = "SELECT id,agency_id,type,amount,due_date,status,finish_date from ledger WHERE student_id=$student_id  ORDER BY due_date ASC";
                                                        } else if ($type_id != "0" && $date_id == "0") {
                                                            $s1 = "SELECT id,agency_id,type,amount,due_date,status,finish_date from ledger WHERE student_id=$student_id AND type=$type_id   ORDER BY due_date ASC";
                                                        } else if ($type_id == "0" && $date_id != 0) {
                                                            $range = $_GET['daterange'];
                                                            list($first, $second) = explode('-', $range);

                                                            list($f_m, $f_d, $f_y) = explode('/', $first);
                                                            $f_first0 = $f_y . "-" . $f_m . "-" . $f_d;
                                                            $f_first = str_replace(' ', '', $f_first0);

                                                            list($s_m, $s_d, $s_y) = explode('/', $second);
                                                            $f_second0 = $s_y . "-" . $s_m . "-" . $s_d;
                                                            $f_second = str_replace(' ', '', $f_second0);

                                                            $s1 = "SELECT id,agency_id,type,amount,due_date,status,finish_date from ledger WHERE student_id=$student_id AND (due_date BETWEEN '$f_first' AND '$f_second')  ORDER BY due_date ASC";
                                                        } else if ($type_id != "0" && $date_id != 0) {
                                                            $range = $_GET['daterange'];
                                                            list($first, $second) = explode('-', $range);

                                                            list($f_m, $f_d, $f_y) = explode('/', $first);
                                                            $f_first0 = $f_y . "-" . $f_m . "-" . $f_d;
                                                            $f_first = str_replace(' ', '', $f_first0);

                                                            list($s_m, $s_d, $s_y) = explode('/', $second);
                                                            $f_second0 = $s_y . "-" . $s_m . "-" . $s_d;
                                                            $f_second = str_replace(' ', '', $f_second0);

                                                            $s1 = "SELECT id,agency_id,type,amount,due_date,status,finish_date from ledger WHERE student_id=$student_id AND (due_date BETWEEN '$f_first' AND '$f_second')  AND type=$type_id ORDER BY due_date ASC";
                                                        }


                                                        $run = $conn->query($s1);

                                                        while ($row = $run->fetch_assoc()) {

                                                            foreach ($checkbox as $col) {

                                                                if ($col == "name") {
                                                                    $name = $row1['name'];
                                                                }
                                                                if ($col == "dob") {
                                                                    $dob = $row1['dob'];
                                                                }
                                                                if ($col == "fees") {
                                                                    $fees = $row1['fees'];
                                                                }
                                                                if ($col == "commission") {
                                                                    $commission = $row1['commission'];
                                                                }
                                                                if ($col == "country") {
                                                                    $country_id = $row1['country_id'];
                                                                    $s4 = "SELECT name from country_info WHERE id=$country_id";
                                                                    $run4 = $conn->query($s4);
                                                                    $row4 = $run4->fetch_assoc();
                                                                    $country_name = $row4['name'];
                                                                }
                                                                if ($col == "university") {
                                                                    $university_id = $row1['university_id'];
                                                                    $s4 = "SELECT name from university_info WHERE id=$university_id";
                                                                    $run4 = $conn->query($s4);
                                                                    $row4 = $run4->fetch_assoc();
                                                                    $university_name = $row4['name'];
                                                                }
                                                                if ($col == "campus") {
                                                                    $campus_id = $row1['campus_id'];
                                                                    $s4 = "SELECT name from campus_info WHERE id=$campus_id";
                                                                    $run4 = $conn->query($s4);
                                                                    $row4 = $run4->fetch_assoc();
                                                                    $campus_name = $row4['name'];
                                                                }
                                                                if ($col == "student_id") {
                                                                    $student_id = $row1['student_id'];
                                                                }
                                                                if ($col == "visa_number") {
                                                                    $visa_number = $row1['visa_number'];
                                                                }
                                                                if ($col == "course") {
                                                                    $course = $row1['course'];
                                                                }
                                                                if ($col == "semester") {
                                                                    $semester = $row1['semester'];
                                                                }
                                                                if ($col == "agency") {
                                                                    $agency_id = $row['agency_id'];
                                                                    $s4 = "SELECT name from agency_info WHERE id=$agency_id";
                                                                    $run4 = $conn->query($s4);
                                                                    $row4 = $run4->fetch_assoc();
                                                                    $agency_name = $row4['name'];
                                                                }
                                                                if ($col == "type") {
                                                                    $type_id = $row['type'];
                                                                    if ($type_id == "1") {
                                                                        $type = "DEBIT";
                                                                    } else {
                                                                        $type = "CREDIT";
                                                                    }
                                                                }
                                                                if ($col == "amount") {
                                                                    $amount = $row['amount'];
                                                                }

                                                                if ($col == "due_date") {
                                                                    $due_date = $row['due_date'];
                                                                }
                                                                if ($col == "status") {
                                                                    $status_id = $row['status'];
                                                                    if ($status_id == "1") {
                                                                        $status = "Due";
                                                                    } else {
                                                                        $status = "Completed";
                                                                    }
                                                                }
                                                                if ($col == "finish_date") {
                                                                    $finish_date = $row['finish_date'];
                                                                }
                                                                if ($col == "timestamp") {
                                                                    $timestamp = $row1['timestamp'];
                                                                }
                                                                if ($col == "ar") {
                                                                    $ledger_id = $row['id'];
                                                                    $s2 = "SELECT amount from ledger2 WHERE ledger_id=$ledger_id";
                                                                    $run2 = $conn->query($s2);
                                                                    $final_amount = 0;
                                                                    while ($row2 = $run2->fetch_assoc()) {
                                                                        $amount = $row2['amount'];
                                                                        $final_amount = $final_amount + $amount;
                                                                    }
                                                                }
                                                            }

                                                    ?>
                                                <tr>
                                                    <td><?php echo $id ?></td>
                                                    <?php
                                                            foreach ($checkbox as $col) {
                                                                echo "<td>";

                                                                if ($col == "name") {
                                                                    $href = $name . " (" . $id . ")";
                                                                    $s0 = "SELECT photo_path from photo_db WHERE s_id=$id";
                                                                    $run0 = $conn->query($s0);
                                                                    $row0 = $run0->fetch_assoc();
                                                                    $profile_path = $row0['photo_path'];

                                                                    echo '<div><a name="' . $name . '" class="Profile_Image"  target="_blank" data-image="' . $profile_path . '" href="search_student.php?name=' . $href . '">' . $name . "</a></div>";
                                                                }
                                                                if ($col == "dob") {
                                                                    echo $dob;
                                                                }
                                                                if ($col == "fees") {
                                                                    echo $fees;
                                                                }
                                                                if ($col == "commission") {
                                                                    echo $commission;
                                                                }
                                                                if ($col == "country") {
                                                                    echo $country_name;
                                                                }
                                                                if ($col == "university") {
                                                                    echo $university_name;
                                                                }
                                                                if ($col == "campus") {
                                                                    echo $campus_name;
                                                                }
                                                                if ($col == "student_id") {
                                                                    echo $student_id;
                                                                }
                                                                if ($col == "visa_number") {
                                                                    echo $visa_number;
                                                                }
                                                                if ($col == "course") {
                                                                    echo $course;
                                                                }
                                                                if ($col == "semester") {
                                                                    echo $semester;
                                                                }
                                                                if ($col == "agency") {
                                                                    echo $agency_name;
                                                                }
                                                                if ($col == "type") {
                                                                    echo $type;
                                                                }
                                                                if ($col == "amount") {
                                                                    echo $amount;
                                                                }

                                                                if ($col == "due_date") {
                                                                    echo $due_date;
                                                                }
                                                                if ($col == "status") {
                                                                    echo $status;
                                                                }
                                                                if ($col == "finish_date") {
                                                                    echo $finish_date;
                                                                }
                                                                if ($col == "timestamp") {
                                                                    echo $timestamp;
                                                                }

                                                                if ($col == "ar") {
                                                                    echo $final_amount;
                                                                }

                                                                echo "</td>";
                                                            }
                                                        }
                                                    }
                                                }
                                            }
                                            if (isset($semester)) {
                                                foreach ($semester as $sem) {
                                                    $s0 = "SELECT id,name,dob,fees,commission,country_id,university_id,campus_id,student_id,visa_number,course,semester,timestamp from student_info WHERE semester='$sem' AND status=$report_id ";
                                                    $run1 = $conn->query($s0);
                                                    while ($row1 = $run1->fetch_assoc()) {
                                                        $student_id = $row1['id'];
                                                        $id = $row1['id'];

                                                        if ($type_id == "0" && $date_id == "0") {
                                                            $s1 = "SELECT id,agency_id,type,amount,due_date,status,finish_date from ledger WHERE student_id=$student_id  ORDER BY due_date ASC";
                                                        } else if ($type_id != "0" && $date_id == "0") {
                                                            $s1 = "SELECT id,agency_id,type,amount,due_date,status,finish_date from ledger WHERE student_id=$student_id AND type=$type_id  ORDER BY due_date ASC";
                                                        } else if ($type_id == "0" && $date_id != 0) {
                                                            $range = $_GET['daterange'];
                                                            list($first, $second) = explode('-', $range);

                                                            list($f_m, $f_d, $f_y) = explode('/', $first);
                                                            $f_first0 = $f_y . "-" . $f_m . "-" . $f_d;
                                                            $f_first = str_replace(' ', '', $f_first0);

                                                            list($s_m, $s_d, $s_y) = explode('/', $second);
                                                            $f_second0 = $s_y . "-" . $s_m . "-" . $s_d;
                                                            $f_second = str_replace(' ', '', $f_second0);

                                                            $s1 = "SELECT id,agency_id,type,amount,due_date,status,finish_date from ledger WHERE student_id=$student_id AND (due_date BETWEEN '$f_first' AND '$f_second')  ORDER BY due_date ASC";
                                                        } else if ($type_id != "0" && $date_id != 0) {
                                                            $range = $_GET['daterange'];
                                                            list($first, $second) = explode('-', $range);

                                                            list($f_m, $f_d, $f_y) = explode('/', $first);
                                                            $f_first0 = $f_y . "-" . $f_m . "-" . $f_d;
                                                            $f_first = str_replace(' ', '', $f_first0);

                                                            list($s_m, $s_d, $s_y) = explode('/', $second);
                                                            $f_second0 = $s_y . "-" . $s_m . "-" . $s_d;
                                                            $f_second = str_replace(' ', '', $f_second0);

                                                            $s1 = "SELECT id,agency_id,type,amount,due_date,status,finish_date from ledger WHERE student_id=$student_id AND (due_date BETWEEN '$f_first' AND '$f_second')  AND type=$type_id ORDER BY due_date ASC";
                                                        }


                                                        $run = $conn->query($s1);

                                                        while ($row = $run->fetch_assoc()) {

                                                            foreach ($checkbox as $col) {

                                                                if ($col == "name") {
                                                                    $name = $row1['name'];
                                                                }
                                                                if ($col == "dob") {
                                                                    $dob = $row1['dob'];
                                                                }
                                                                if ($col == "fees") {
                                                                    $fees = $row1['fees'];
                                                                }
                                                                if ($col == "commission") {
                                                                    $commission = $row1['commission'];
                                                                }
                                                                if ($col == "country") {
                                                                    $country_id = $row1['country_id'];
                                                                    $s4 = "SELECT name from country_info WHERE id=$country_id";
                                                                    $run4 = $conn->query($s4);
                                                                    $row4 = $run4->fetch_assoc();
                                                                    $country_name = $row4['name'];
                                                                }
                                                                if ($col == "university") {
                                                                    $university_id = $row1['university_id'];
                                                                    $s4 = "SELECT name from university_info WHERE id=$university_id";
                                                                    $run4 = $conn->query($s4);
                                                                    $row4 = $run4->fetch_assoc();
                                                                    $university_name = $row4['name'];
                                                                }
                                                                if ($col == "campus") {
                                                                    $campus_id = $row1['campus_id'];
                                                                    $s4 = "SELECT name from campus_info WHERE id=$campus_id";
                                                                    $run4 = $conn->query($s4);
                                                                    $row4 = $run4->fetch_assoc();
                                                                    $campus_name = $row4['name'];
                                                                }
                                                                if ($col == "student_id") {
                                                                    $student_id = $row1['student_id'];
                                                                }
                                                                if ($col == "visa_number") {
                                                                    $visa_number = $row1['visa_number'];
                                                                }
                                                                if ($col == "course") {
                                                                    $course = $row1['course'];
                                                                }
                                                                if ($col == "semester") {
                                                                    $semester = $row1['semester'];
                                                                }
                                                                if ($col == "agency") {
                                                                    $agency_id = $row['agency_id'];
                                                                    $s4 = "SELECT name from agency_info WHERE id=$agency_id";
                                                                    $run4 = $conn->query($s4);
                                                                    $row4 = $run4->fetch_assoc();
                                                                    $agency_name = $row4['name'];
                                                                }
                                                                if ($col == "type") {
                                                                    $type_id = $row['type'];
                                                                    if ($type_id == "1") {
                                                                        $type = "DEBIT";
                                                                    } else {
                                                                        $type = "CREDIT";
                                                                    }
                                                                }
                                                                if ($col == "amount") {
                                                                    $amount = $row['amount'];
                                                                }

                                                                if ($col == "due_date") {
                                                                    $due_date = $row['due_date'];
                                                                }
                                                                if ($col == "status") {
                                                                    $status_id = $row['status'];
                                                                    if ($status_id == "1") {
                                                                        $status = "Due";
                                                                    } else {
                                                                        $status = "Completed";
                                                                    }
                                                                }
                                                                if ($col == "finish_date") {
                                                                    $finish_date = $row['finish_date'];
                                                                }
                                                                if ($col == "timestamp") {
                                                                    $timestamp = $row1['timestamp'];
                                                                }
                                                                if ($col == "ar") {
                                                                    $ledger_id = $row['id'];
                                                                    $s2 = "SELECT amount from ledger2 WHERE ledger_id=$ledger_id";
                                                                    $run2 = $conn->query($s2);
                                                                    $final_amount = 0;
                                                                    while ($row2 = $run2->fetch_assoc()) {
                                                                        $amount = $row2['amount'];
                                                                        $final_amount = $final_amount + $amount;
                                                                    }
                                                                }
                                                            }

                                                    ?>
                                                <tr>
                                                    <td><?php echo $id ?></td>
                                                    <?php
                                                            foreach ($checkbox as $col) {
                                                                echo "<td>";

                                                                if ($col == "name") {
                                                                    $href = $name . " (" . $id . ")";
                                                                    $s0 = "SELECT photo_path from photo_db WHERE s_id=$id";
                                                                    $run0 = $conn->query($s0);
                                                                    $row0 = $run0->fetch_assoc();
                                                                    $profile_path = $row0['photo_path'];

                                                                    echo '<div><a name="' . $name . '" class="Profile_Image"  target="_blank" data-image="' . $profile_path . '" href="search_student.php?name=' . $href . '">' . $name . "</a></div>";
                                                                }
                                                                if ($col == "dob") {
                                                                    echo $dob;
                                                                }
                                                                if ($col == "fees") {
                                                                    echo $fees;
                                                                }
                                                                if ($col == "commission") {
                                                                    echo $commission;
                                                                }
                                                                if ($col == "country") {
                                                                    echo $country_name;
                                                                }
                                                                if ($col == "university") {
                                                                    echo $university_name;
                                                                }
                                                                if ($col == "campus") {
                                                                    echo $campus_name;
                                                                }
                                                                if ($col == "student_id") {
                                                                    echo $student_id;
                                                                }
                                                                if ($col == "visa_number") {
                                                                    echo $visa_number;
                                                                }
                                                                if ($col == "course") {
                                                                    echo $course;
                                                                }
                                                                if ($col == "semester") {
                                                                    echo $semester;
                                                                }
                                                                if ($col == "agency") {
                                                                    echo $agency_name;
                                                                }
                                                                if ($col == "type") {
                                                                    echo $type;
                                                                }
                                                                if ($col == "amount") {
                                                                    echo $amount;
                                                                }

                                                                if ($col == "due_date") {
                                                                    echo $due_date;
                                                                }
                                                                if ($col == "status") {
                                                                    echo $status;
                                                                }
                                                                if ($col == "finish_date") {
                                                                    echo $finish_date;
                                                                }
                                                                if ($col == "timestamp") {
                                                                    echo $timestamp;
                                                                }

                                                                if ($col == "ar") {
                                                                    echo $final_amount;
                                                                }

                                                                echo "</td>";
                                                            }
                                                        }
                                                    }
                                                }
                                            }
                                            if (isset($university_id)) {
                                                foreach ($university_id as $university) {

                                                    $s0 = "SELECT id,name,dob,fees,commission,country_id,university_id,campus_id,student_id,visa_number,course,semester,timestamp from student_info WHERE university_id=$university  ";
                                                    $run1 = $conn->query($s0);
                                                    while ($row1 = $run1->fetch_assoc()) {
                                                        $student_id = $row1['id'];
                                                        $id = $row1['id'];

                                                        if ($type_id == "0" && $date_id == "0") {
                                                            $s1 = "SELECT id,agency_id,type,amount,due_date,status,finish_date from ledger WHERE student_id=$student_id  ORDER BY due_date ASC";
                                                        } else if ($type_id != "0" && $date_id == "0") {
                                                            $s1 = "SELECT id,agency_id,type,amount,due_date,status,finish_date from ledger WHERE student_id=$student_id AND type=$type_id   ORDER BY due_date ASC";
                                                        } else if ($type_id == "0" && $date_id != 0) {
                                                            $range = $_GET['daterange'];
                                                            list($first, $second) = explode('-', $range);

                                                            list($f_m, $f_d, $f_y) = explode('/', $first);
                                                            $f_first0 = $f_y . "-" . $f_m . "-" . $f_d;
                                                            $f_first = str_replace(' ', '', $f_first0);

                                                            list($s_m, $s_d, $s_y) = explode('/', $second);
                                                            $f_second0 = $s_y . "-" . $s_m . "-" . $s_d;
                                                            $f_second = str_replace(' ', '', $f_second0);

                                                            $s1 = "SELECT id,agency_id,type,amount,due_date,status,finish_date from ledger WHERE student_id=$student_id AND (due_date BETWEEN '$f_first' AND '$f_second')   ORDER BY due_date ASC ";
                                                        } else if ($type_id != "0" && $date_id != 0) {
                                                            $range = $_GET['daterange'];
                                                            list($first, $second) = explode('-', $range);

                                                            list($f_m, $f_d, $f_y) = explode('/', $first);
                                                            $f_first0 = $f_y . "-" . $f_m . "-" . $f_d;
                                                            $f_first = str_replace(' ', '', $f_first0);

                                                            list($s_m, $s_d, $s_y) = explode('/', $second);
                                                            $f_second0 = $s_y . "-" . $s_m . "-" . $s_d;
                                                            $f_second = str_replace(' ', '', $f_second0);

                                                            $s1 = "SELECT id,agency_id,type,amount,due_date,status,finish_date from ledger WHERE student_id=$student_id AND (due_date BETWEEN '$f_first' AND '$f_second')  AND type=$type_id ORDER BY due_date ASC";
                                                        }

                                                        $run = $conn->query($s1);

                                                        while ($row = $run->fetch_assoc()) {

                                                            foreach ($checkbox as $col) {
                                                                if ($col == "name") {
                                                                    $name = $row1['name'];
                                                                }
                                                                if ($col == "dob") {
                                                                    $dob = $row1['dob'];
                                                                }
                                                                if ($col == "fees") {
                                                                    $fees = $row1['fees'];
                                                                }
                                                                if ($col == "commission") {
                                                                    $commission = $row1['commission'];
                                                                }
                                                                if ($col == "country") {
                                                                    $country_id = $row1['country_id'];
                                                                    $s4 = "SELECT name from country_info WHERE id=$country_id";
                                                                    $run4 = $conn->query($s4);
                                                                    $row4 = $run4->fetch_assoc();
                                                                    $country_name = $row4['name'];
                                                                }
                                                                if ($col == "university") {
                                                                    $university_id = $row1['university_id'];
                                                                    $s4 = "SELECT name from university_info WHERE id=$university_id";
                                                                    $run4 = $conn->query($s4);
                                                                    $row4 = $run4->fetch_assoc();
                                                                    $university_name = $row4['name'];
                                                                }
                                                                if ($col == "campus") {
                                                                    $campus_id = $row1['campus_id'];
                                                                    $s4 = "SELECT name from campus_info WHERE id=$campus_id";
                                                                    $run4 = $conn->query($s4);
                                                                    $row4 = $run4->fetch_assoc();
                                                                    $campus_name = $row4['name'];
                                                                }
                                                                if ($col == "student_id") {
                                                                    $student_id = $row1['student_id'];
                                                                }
                                                                if ($col == "visa_number") {
                                                                    $visa_number = $row1['visa_number'];
                                                                }
                                                                if ($col == "course") {
                                                                    $course = $row1['course'];
                                                                }
                                                                if ($col == "semester") {
                                                                    $semester = $row1['semester'];
                                                                }
                                                                if ($col == "agency") {
                                                                    $agency_id = $row['agency_id'];
                                                                    $s4 = "SELECT name from agency_info WHERE id=$agency_id";
                                                                    $run4 = $conn->query($s4);
                                                                    $row4 = $run4->fetch_assoc();
                                                                    $agency_name = $row4['name'];
                                                                }
                                                                if ($col == "type") {
                                                                    $type_id = $row['type'];
                                                                    if ($type_id == "1") {
                                                                        $type = "DEBIT";
                                                                    } else {
                                                                        $type = "CREDIT";
                                                                    }
                                                                }
                                                                if ($col == "amount") {
                                                                    $amount = $row['amount'];
                                                                }

                                                                if ($col == "due_date") {
                                                                    $due_date = $row['due_date'];
                                                                }
                                                                if ($col == "status") {
                                                                    $status_id = $row['status'];
                                                                    if ($status_id == "1") {
                                                                        $status = "Due";
                                                                    } else {
                                                                        $status = "Completed";
                                                                    }
                                                                }
                                                                if ($col == "finish_date") {
                                                                    $finish_date = $row['finish_date'];
                                                                }
                                                                if ($col == "timestamp") {
                                                                    $timestamp = $row['timestamp'];
                                                                }
                                                                if ($col == "ar") {
                                                                    $ledger_id = $row['id'];
                                                                    $s2 = "SELECT amount from ledger2 WHERE ledger_id=$ledger_id";
                                                                    $run2 = $conn->query($s2);
                                                                    $final_amount = 0;
                                                                    while ($row2 = $run2->fetch_assoc()) {
                                                                        $amount = $row2['amount'];
                                                                        $final_amount = $final_amount + $amount;
                                                                    }
                                                                }
                                                            }

                                                    ?>
                                                <tr>
                                                    <td><?php echo $id ?></td>
                                                <?php
                                                            foreach ($checkbox as $col) {
                                                                echo "<td>";

                                                                if ($col == "name") {
                                                                    $href = $name . " (" . $id . ")";
                                                                    $s0 = "SELECT photo_path from photo_db WHERE s_id=$id";
                                                                    $run0 = $conn->query($s0);
                                                                    $row0 = $run0->fetch_assoc();
                                                                    $profile_path = $row0['photo_path'];

                                                                    echo '<div><a name="' . $name . '" class="Profile_Image"  target="_blank" data-image="' . $profile_path . '" href="search_student.php?name=' . $href . '">' . $name . "</a></div>";
                                                                }
                                                                if ($col == "dob") {
                                                                    echo $dob;
                                                                }
                                                                if ($col == "fees") {
                                                                    echo $fees;
                                                                }
                                                                if ($col == "commission") {
                                                                    echo $commission;
                                                                }
                                                                if ($col == "country") {
                                                                    echo $country_name;
                                                                }
                                                                if ($col == "university") {
                                                                    echo $university_name;
                                                                }
                                                                if ($col == "campus") {
                                                                    echo $campus_name;
                                                                }
                                                                if ($col == "student_id") {
                                                                    echo $student_id;
                                                                }
                                                                if ($col == "visa_number") {
                                                                    echo $visa_number;
                                                                }
                                                                if ($col == "course") {
                                                                    echo $course;
                                                                }
                                                                if ($col == "semester") {
                                                                    echo $semester;
                                                                }
                                                                if ($col == "agency") {
                                                                    echo $agency_name;
                                                                }
                                                                if ($col == "type") {
                                                                    echo $type;
                                                                }
                                                                if ($col == "amount") {
                                                                    echo $amount;
                                                                }

                                                                if ($col == "due_date") {
                                                                    echo $due_date;
                                                                }
                                                                if ($col == "status") {
                                                                    echo $status;
                                                                }
                                                                if ($col == "finish_date") {
                                                                    echo $finish_date;
                                                                }
                                                                if ($col == "timestamp") {
                                                                    echo $timestamp;
                                                                }

                                                                if ($col == "ar") {
                                                                    echo $final_amount;
                                                                }


                                                                echo "</td>";
                                                            }
                                                        }
                                                    }
                                                }
                                            }
                                            if (isset($agency_id)) {

                                                foreach ($agency_id as $agency) {

                                                    if ($type_id == "0" && $date_id == "0") {
                                                        $s1 = "SELECT id,student_id,agency_id,type,amount,due_date,status,finish_date from ledger WHERE agency_id=$agency   ORDER BY due_date ASC";
                                                    } else if ($type_id != "0" && $date_id == "0") {
                                                        $s1 = "SELECT id,student_id,agency_id,type,amount,due_date,status,finish_date from ledger WHERE agency_id=$agency_id AND type=$type_id    ORDER BY due_date ASC";
                                                    } else if ($type_id == "0" && $date_id != 0) {
                                                        $range = $_GET['daterange'];
                                                        list($first, $second) = explode('-', $range);

                                                        list($f_m, $f_d, $f_y) = explode('/', $first);
                                                        $f_first0 = $f_y . "-" . $f_m . "-" . $f_d;
                                                        $f_first = str_replace(' ', '', $f_first0);

                                                        list($s_m, $s_d, $s_y) = explode('/', $second);
                                                        $f_second0 = $s_y . "-" . $s_m . "-" . $s_d;
                                                        $f_second = str_replace(' ', '', $f_second0);

                                                        $s1 = "SELECT id,student_id,agency_id,type,amount,due_date,status,finish_date from ledger WHERE agency_id=$agency_id AND (due_date BETWEEN '$f_first' AND '$f_second')   ORDER BY due_date ASC";
                                                    } else if ($type_id != "0" && $date_id != 0) {
                                                        $range = $_GET['daterange'];
                                                        list($first, $second) = explode('-', $range);

                                                        list($f_m, $f_d, $f_y) = explode('/', $first);
                                                        $f_first0 = $f_y . "-" . $f_m . "-" . $f_d;
                                                        $f_first = str_replace(' ', '', $f_first0);

                                                        list($s_m, $s_d, $s_y) = explode('/', $second);
                                                        $f_second0 = $s_y . "-" . $s_m . "-" . $s_d;
                                                        $f_second = str_replace(' ', '', $f_second0);

                                                        $s1 = "SELECT id,student_id,agency_id,type,amount,due_date,status,finish_date from ledger WHERE student_id=$student_id AND (due_date BETWEEN '$f_first' AND '$f_second')  AND type=$type_id ORDER BY due_date ASC";
                                                    }
                                                    $run = $conn->query($s1);


                                                    while ($row = $run->fetch_assoc()) {
                                                        $id = $row['student_id'];


                                                        foreach ($checkbox as $col) {

                                                            if ($col == "name") {
                                                                $s2 = "SELECT name from student_info WHERE id=$id";
                                                                $run2 = $conn->query($s2);
                                                                $row2 = $run2->fetch_assoc();
                                                                $name = $row2['name'];
                                                            }
                                                            if ($col == "dob") {
                                                                $s2 = "SELECT dob from student_info WHERE id=$id";
                                                                $run2 = $conn->query($s2);
                                                                $row2 = $run2->fetch_assoc();
                                                                $dob = $row2['dob'];
                                                            }
                                                            if ($col == "fees") {
                                                                $s2 = "SELECT fees from student_info WHERE id=$id";
                                                                $run2 = $conn->query($s2);
                                                                $row2 = $run2->fetch_assoc();
                                                                $fees = $row2['fees'];
                                                            }
                                                            if ($col == "commission") {
                                                                $s2 = "SELECT commission from student_info WHERE id=$id";
                                                                $run2 = $conn->query($s2);
                                                                $row2 = $run2->fetch_assoc();
                                                                $commission = $row2['commission'];
                                                            }
                                                            if ($col == "country") {
                                                                $s2 = "SELECT country_id from student_info WHERE id=$id";
                                                                $run2 = $conn->query($s2);
                                                                $row2 = $run2->fetch_assoc();
                                                                $country_id = $row2['country_id'];
                                                                $s4 = "SELECT name from country_info WHERE id=$country_id";
                                                                $run4 = $conn->query($s4);
                                                                $row4 = $run4->fetch_assoc();
                                                                $country_name = $row4['name'];
                                                            }
                                                            if ($col == "university") {
                                                                $s2 = "SELECT university_id from student_info WHERE id=$id";
                                                                $run2 = $conn->query($s2);
                                                                $row2 = $run2->fetch_assoc();
                                                                $university_id = $row2['university_id'];
                                                                $s4 = "SELECT name from university_info WHERE id=$university_id";
                                                                $run4 = $conn->query($s4);
                                                                $row4 = $run4->fetch_assoc();
                                                                $university_name = $row4['name'];
                                                            }
                                                            if ($col == "campus") {
                                                                $s2 = "SELECT campus_id from student_info WHERE id=$id";
                                                                $run2 = $conn->query($s2);
                                                                $row2 = $run2->fetch_assoc();
                                                                $campus_id = $row2['campus_id'];
                                                                $s4 = "SELECT name from campus_info WHERE id=$campus_id";
                                                                $run4 = $conn->query($s4);
                                                                $row4 = $run4->fetch_assoc();
                                                                $campus_name = $row4['name'];
                                                            }
                                                            if ($col == "student_id") {
                                                                $s2 = "SELECT student_id from student_info WHERE id=$id";
                                                                $run2 = $conn->query($s2);
                                                                $row2 = $run2->fetch_assoc();
                                                                $student_id = $row2['student_id'];
                                                            }
                                                            if ($col == "visa_number") {
                                                                $s2 = "SELECT visa_number from student_info WHERE id=$id";
                                                                $run2 = $conn->query($s2);
                                                                $row2 = $run2->fetch_assoc();
                                                                $visa_number = $row2['visa_number'];
                                                            }
                                                            if ($col == "course") {
                                                                $s2 = "SELECT course from student_info WHERE id=$id";
                                                                $run2 = $conn->query($s2);
                                                                $row2 = $run2->fetch_assoc();
                                                                $course = $row2['course'];
                                                            }
                                                            if ($col == "semester") {
                                                                $s2 = "SELECT semester from student_info WHERE id=$id";
                                                                $run2 = $conn->query($s2);
                                                                $row2 = $run2->fetch_assoc();
                                                                $semester = $row2['semester'];
                                                            }
                                                            if ($col == "agency") {

                                                                $agency_id = $row['agency_id'];
                                                                $s4 = "SELECT name from agency_info WHERE id=$agency_id";
                                                                $run4 = $conn->query($s4);
                                                                $row4 = $run4->fetch_assoc();
                                                                $agency_name = $row4['name'];
                                                            }
                                                            if ($col == "type") {
                                                                $type_id = $row['type'];
                                                                if ($type_id == "1") {
                                                                    $type = "DEBIT";
                                                                } else {
                                                                    $type = "CREDIT";
                                                                }
                                                            }
                                                            if ($col == "amount") {
                                                                $amount = $row['amount'];
                                                            }

                                                            if ($col == "due_date") {
                                                                $due_date = $row['due_date'];
                                                            }
                                                            if ($col == "status") {
                                                                $status_id = $row['status'];
                                                                if ($status_id == "1") {
                                                                    $status = "Due";
                                                                } else {
                                                                    $status = "Completed";
                                                                }
                                                            }
                                                            if ($col == "finish_date") {
                                                                $finish_date = $row['finish_date'];
                                                            }
                                                            if ($col == "timestamp") {
                                                                $s2 = "SELECT timestamp from student_info WHERE id=$id";
                                                                $run2 = $conn->query($s2);
                                                                $row2 = $run2->fetch_assoc();
                                                                $timestamp = $row2['timestamp'];
                                                            }
                                                            if ($col == "ar") {
                                                                $ledger_id = $row['id'];
                                                                $s2 = "SELECT amount from ledger2 WHERE ledger_id=$ledger_id";
                                                                $run2 = $conn->query($s2);
                                                                $final_amount = 0;
                                                                while ($row2 = $run2->fetch_assoc()) {
                                                                    $amount = $row2['amount'];
                                                                    $final_amount = $final_amount + $amount;
                                                                }
                                                            }
                                                        }

                                                ?>
                                                <tr>
                                                    <td><?php echo $id ?></td>
                                                    <?php
                                                        foreach ($checkbox as $col) {
                                                            echo "<td>";

                                                            if ($col == "name") {
                                                                $href = $name . " (" . $id . ")";
                                                                $s0 = "SELECT photo_path from photo_db WHERE s_id=$id";
                                                                $run0 = $conn->query($s0);
                                                                $row0 = $run0->fetch_assoc();
                                                                $profile_path = $row0['photo_path'];

                                                                echo '<div><a name="' . $name . '" class="Profile_Image"  target="_blank" data-image="' . $profile_path . '" href="search_student.php?name=' . $href . '">' . $name . "</a></div>";
                                                            }
                                                            if ($col == "dob") {
                                                                echo $dob;
                                                            }
                                                            if ($col == "fees") {
                                                                echo $fees;
                                                            }
                                                            if ($col == "commission") {
                                                                echo $commission;
                                                            }
                                                            if ($col == "country") {
                                                                echo $country_name;
                                                            }
                                                            if ($col == "university") {
                                                                echo $university_name;
                                                            }
                                                            if ($col == "campus") {
                                                                echo $campus_name;
                                                            }
                                                            if ($col == "student_id") {
                                                                echo $student_id;
                                                            }
                                                            if ($col == "visa_number") {
                                                                echo $visa_number;
                                                            }
                                                            if ($col == "course") {
                                                                echo $course;
                                                            }
                                                            if ($col == "semester") {
                                                                echo $semester;
                                                            }
                                                            if ($col == "agency") {
                                                                echo $agency_name;
                                                            }
                                                            if ($col == "type") {
                                                                echo $type;
                                                            }
                                                            if ($col == "amount") {
                                                                echo $amount;
                                                            }

                                                            if ($col == "due_date") {
                                                                echo $due_date;
                                                            }
                                                            if ($col == "status") {
                                                                echo $status;
                                                            }
                                                            if ($col == "finish_date") {
                                                                echo $finish_date;
                                                            }

                                                            if ($col == "timestamp") {
                                                                echo $timestamp;
                                                            }

                                                            if ($col == "ar") {
                                                                echo $final_amount;
                                                            }
                                                            echo "</td>";
                                                        }
                                                    }
                                                }
                                            }
                                            if (isset($campus_name)) {
                                                foreach ($campus_name as $campus) {
                                                    $sql = "SELECT id from campus_info WHERE name='$campus'";
                                                    $run1 = $conn->query($sql);
                                                    while ($row1 = $run1->fetch_assoc()) {
                                                        $campus_id = $row1['id'];

                                                        $s0 = "SELECT id,name,dob,fees,commission,country_id,university_id,campus_id,student_id,visa_number,course,semester,timestamp from student_info WHERE campus_id=$campus_id  ";
                                                        $run10 = $conn->query($s0);
                                                        while ($row10 = $run10->fetch_assoc()) {
                                                            $id = $row10['id'];


                                                            if ($type_id == "0" && $date_id == "0") {
                                                                $s1 = "SELECT id,agency_id,type,amount,due_date,status,finish_date from ledger WHERE student_id=$id   ORDER BY due_date ASC";
                                                            } else if ($type_id != "0" && $date_id == "0") {
                                                                $s1 = "SELECT id,agency_id,type,amount,due_date,status,finish_date from ledger WHERE student_id=$id AND type=$type_id    ORDER BY due_date ASC";
                                                            } else if ($type_id == "0" && $date_id != 0) {
                                                                $range = $_GET['daterange'];
                                                                list($first, $second) = explode('-', $range);

                                                                list($f_m, $f_d, $f_y) = explode('/', $first);
                                                                $f_first0 = $f_y . "-" . $f_m . "-" . $f_d;
                                                                $f_first = str_replace(' ', '', $f_first0);

                                                                list($s_m, $s_d, $s_y) = explode('/', $second);
                                                                $f_second0 = $s_y . "-" . $s_m . "-" . $s_d;
                                                                $f_second = str_replace(' ', '', $f_second0);

                                                                $s1 = "SELECT id,agency_id,type,amount,due_date,status,finish_date from ledger WHERE student_id=$id AND (due_date BETWEEN '$f_first' AND '$f_second')   ORDER BY due_date ASC";
                                                            } else if ($type_id != "0" && $date_id != 0) {
                                                                $range = $_GET['daterange'];
                                                                list($first, $second) = explode('-', $range);

                                                                list($f_m, $f_d, $f_y) = explode('/', $first);
                                                                $f_first0 = $f_y . "-" . $f_m . "-" . $f_d;
                                                                $f_first = str_replace(' ', '', $f_first0);

                                                                list($s_m, $s_d, $s_y) = explode('/', $second);
                                                                $f_second0 = $s_y . "-" . $s_m . "-" . $s_d;
                                                                $f_second = str_replace(' ', '', $f_second0);

                                                                $s1 = "SELECT id,agency_id,type,amount,due_date,status,finish_date from ledger WHERE student_id=$id AND (due_date BETWEEN '$f_first' AND '$f_second')  AND type=$type_id ORDER BY due_date ASC";
                                                            }

                                                            $run = $conn->query($s1);

                                                            while ($row = $run->fetch_assoc()) {

                                                                foreach ($checkbox as $col) {

                                                                    if ($col == "name") {
                                                                        $name = $row10['name'];
                                                                    }
                                                                    if ($col == "dob") {
                                                                        $dob = $row10['dob'];
                                                                    }
                                                                    if ($col == "fees") {
                                                                        $fees = $row10['fees'];
                                                                    }
                                                                    if ($col == "commission") {
                                                                        $commission = $row10['commission'];
                                                                    }
                                                                    if ($col == "country") {
                                                                        $country_id = $row10['country_id'];
                                                                        $s4 = "SELECT name from country_info WHERE id=$country_id";
                                                                        $run4 = $conn->query($s4);
                                                                        $row4 = $run4->fetch_assoc();
                                                                        $country_name = $row4['name'];
                                                                    }
                                                                    if ($col == "university") {
                                                                        $university_id = $row10['university_id'];
                                                                        $s4 = "SELECT name from university_info WHERE id=$university_id";
                                                                        $run4 = $conn->query($s4);
                                                                        $row4 = $run4->fetch_assoc();
                                                                        $university_name = $row4['name'];
                                                                    }
                                                                    if ($col == "campus") {
                                                                        $campus_id = $row10['campus_id'];
                                                                        $s4 = "SELECT name from campus_info WHERE id=$campus_id";
                                                                        $run4 = $conn->query($s4);
                                                                        $row4 = $run4->fetch_assoc();
                                                                        $campus_name = $row4['name'];
                                                                    }
                                                                    if ($col == "student_id") {
                                                                        $student_id = $row10['student_id'];
                                                                    }
                                                                    if ($col == "visa_number") {
                                                                        $visa_number = $row10['visa_number'];
                                                                    }
                                                                    if ($col == "course") {
                                                                        $course = $row10['course'];
                                                                    }
                                                                    if ($col == "semester") {
                                                                        $semester = $row10['semester'];
                                                                    }
                                                                    if ($col == "agency") {
                                                                        $agency_id = $row['agency_id'];
                                                                        $s4 = "SELECT name from agency_info WHERE id=$agency_id";
                                                                        $run4 = $conn->query($s4);
                                                                        $row4 = $run4->fetch_assoc();
                                                                        $agency_name = $row4['name'];
                                                                    }
                                                                    if ($col == "type") {
                                                                        $type_id = $row['type'];
                                                                        if ($type_id == "1") {
                                                                            $type = "DEBIT";
                                                                        } else {
                                                                            $type = "CREDIT";
                                                                        }
                                                                    }
                                                                    if ($col == "amount") {
                                                                        $amount = $row['amount'];
                                                                    }

                                                                    if ($col == "due_date") {
                                                                        $due_date = $row['due_date'];
                                                                    }
                                                                    if ($col == "status") {
                                                                        $status_id = $row['status'];
                                                                        if ($status_id == "1") {
                                                                            $status = "Due";
                                                                        } else {
                                                                            $status = "Completed";
                                                                        }
                                                                    }
                                                                    if ($col == "finish_date") {
                                                                        $finish_date = $row['finish_date'];
                                                                    }
                                                                    if ($col == "timestamp") {
                                                                        $timestamp = $row['timestamp'];
                                                                    }
                                                                    if ($col == "ar") {
                                                                        $ledger_id = $row['id'];
                                                                        $s2 = "SELECT amount from ledger2 WHERE ledger_id=$ledger_id";
                                                                        $run2 = $conn->query($s2);
                                                                        $final_amount = 0;
                                                                        while ($row2 = $run2->fetch_assoc()) {
                                                                            $amount = $row2['amount'];
                                                                            $final_amount = $final_amount + $amount;
                                                                        }
                                                                    }
                                                                }

                                                    ?>
                                                <tr>
                                                    <td><?php echo $id ?></td>
                        <?php
                                                                foreach ($checkbox as $col) {
                                                                    echo "<td>";

                                                                    if ($col == "name") {
                                                                        $href = $name . " (" . $id . ")";
                                                                        $s0 = "SELECT photo_path from photo_db WHERE s_id=$id";
                                                                        $run0 = $conn->query($s0);
                                                                        $row0 = $run0->fetch_assoc();
                                                                        $profile_path = $row0['photo_path'];

                                                                        echo '<div><a name="' . $name . '" class="Profile_Image"  target="_blank" data-image="' . $profile_path . '" href="search_student.php?name=' . $href . '">' . $name . "</a></div>";
                                                                    }
                                                                    if ($col == "dob") {
                                                                        echo $dob;
                                                                    }
                                                                    if ($col == "fees") {
                                                                        echo $fees;
                                                                    }
                                                                    if ($col == "commission") {
                                                                        echo $commission;
                                                                    }
                                                                    if ($col == "country") {
                                                                        echo $country_name;
                                                                    }
                                                                    if ($col == "university") {
                                                                        echo $university_name;
                                                                    }
                                                                    if ($col == "campus") {
                                                                        echo $campus_name;
                                                                    }
                                                                    if ($col == "student_id") {
                                                                        echo $student_id;
                                                                    }
                                                                    if ($col == "visa_number") {
                                                                        echo $visa_number;
                                                                    }
                                                                    if ($col == "course") {
                                                                        echo $course;
                                                                    }
                                                                    if ($col == "semester") {
                                                                        echo $semester;
                                                                    }
                                                                    if ($col == "agency") {
                                                                        echo $agency_name;
                                                                    }
                                                                    if ($col == "type") {
                                                                        echo $type;
                                                                    }
                                                                    if ($col == "amount") {
                                                                        echo $amount;
                                                                    }

                                                                    if ($col == "due_date") {
                                                                        echo $due_date;
                                                                    }
                                                                    if ($col == "status") {
                                                                        echo $status;
                                                                    }
                                                                    if ($col == "finish_date") {
                                                                        echo $finish_date;
                                                                    }
                                                                    if ($col == "finish_date") {
                                                                        echo $timestamp;
                                                                    }


                                                                    if ($col == "ar") {
                                                                        echo $final_amount;
                                                                    }

                                                                    echo "</td>";
                                                                }
                                                            }
                                                        }
                                                    }
                                                }
                                            }
                                        }



                                        echo '</tbody></table></div>';
                                    }

                        ?>
                        </div>
                </div>
            </div>
        </div>

        <!-- Page level plugins -->
        <script src="vendor/datatables/jquery.dataTables.min.js"></script>
        <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>
        <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/buttons/1.6.2/js/dataTables.buttons.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
        <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>
        <script src="https://cdn.datatables.net/buttons/1.6.2/js/buttons.html5.min.js"></script>
        <script src="https://cdn.datatables.net/buttons/1.6.2/js/buttons.print.min.js"></script>
        <script src="js/demo/datatables-demo.js"></script>

        <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

        <!-- Core plugin JavaScript-->
        <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

        <!-- Custom scripts for all pages-->
        <script src="js/sb-admin-2.min.js"></script>
        <script src="select.js"></script>
        <script>
            var arr = $("#dataTable tr");

            $.each(arr, function(i, item) {
                var currIndex = $("#dataTable tr").eq(i);
                var matchText = currIndex.children("td").first().text();
                $(this).nextAll().each(function(i, inItem) {
                    if (matchText === $(this).children("td").first().text()) {
                        $(this).remove();
                    }
                });
            });
        </script>
        <script>
            $(".Profile_Image").mouseenter(function() {
                if ($(this).parent('div').children('div.image').length) {
                    $(this).parent('div').children('div.image').show();
                } else {
                    var image_name = $(this).data('image');

                    if (image_name.length === 0) {

                    } else {
                        var profile_name = $(this).attr('name');


                        var imageTag = '<div class="image" style="position:absolute;">' + '<div class="card" style="width: 12rem;"><img class="card-img-top" src="' + image_name + '" alt="image" height="100" />' + '<div class="card-footer"><small class="text-muted">' + profile_name + '</small></div></div></div>';
                        $(this).parent('div').append(imageTag);
                    }

                }
            });

            $(".Profile_Image").mouseleave(function() {
                $(this).parent('div').children('div.image').hide();
            });
        </script>

</body>

</html>