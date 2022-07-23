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
        if ($formid == "19" || $formid == "17") {
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
    <title>Complete Entry</title>
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
        require('connectDB.php');
        ?>

        <div class="container-fluid">
            <!-- DataTales Example -->
            <div class="card shadow mb-4 ">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Complete Entry</h6>
                </div>
                <div class="card-body">


                    <form method="GET">

                        <div class="row">

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
                                    $sql = "SELECT COUNT(*) as c_2 from university_info ";
                                    $run=$conn->query($sql);
                                    $row_2 = $run->fetch_assoc();
                                    $c_2 = $row_2['c_2'];
                                    if ($c_2 > 0) {
                                        $sql_1 = "SELECT id,name from university_info";
                                        $run_1 = $conn->query($sql_1);


                                        while ($row = $run_1->fetch_assoc()) {
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
                                    $sql = "SELECT COUNT(*) as c_2 from agency_info ";
                                    $run=$conn->query($sql);
                                    $row_2 = $run->fetch_assoc();
                                    $c_2 = $row_2['c_2'];
                                    if ($c_2 > 0) {
                                        $sql_1 = "SELECT * from agency_info";
                                        $run_1 = $conn->query($sql_1);


                                        while ($row = $run_1->fetch_assoc()) {
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
                        $report_id = "1";
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
                      <?php
                        if (isset($_POST['submit'])) {
                            $ledger_id = $_POST['ledger_ids'];
                            $remark = $_POST['remark'];
                            $amount=$_POST['amount'];
                            date_default_timezone_set('Asia/Kolkata');
                            $finish_date = date('Y-m-d');
                            foreach ($ledger_id as $index => $l_id) {
                                $remark_1=$remark[$index];
                                $amount_1=$amount[$index];
                                $sql = "UPDATE ledger SET status=2,finish_date='$finish_date',remark='$remark_1',amount='$amount_1' WHERE id=$l_id";
                                if (mysqli_query($conn, $sql)) {
                                    $s1 = "SELECT student_id from ledger WHERE id=$l_id";
                                    $run1 = $conn->query($s1);
                                    $row1 = $run1->fetch_assoc();
                                    $student_id = $row1['student_id'];
                                    $s1 = "SELECT COUNT(*) as c_2 from ledger WHERE status=1 AND student_id=$student_id";
                                    $run1 = $conn->query($s1);
                                    $row_2=$run1->fetch_assoc();
                                    $c_2=$row_2['c_2'];
                                    if ($c_2 > 0) {
                                       
                                    } else {
                                        $s2 = "UPDATE student_info SET status=2 WHERE id=$student_id";
                                        if (mysqli_query($conn, $s2)) {
                                           
                                        }
                                    }
                                } else {
                                    echo '<div class="alert alert-danger mt-2" role="alert">
                                                        Fail
                                                       </div>';
                                }
                            }
                        }


                        ?>
                        <form method="POST">
                            <div class="table-responsive">
                                <table border=1 id="dataTable" class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th></th>
                                            <th>Name</th>
                                            <th>Agency</th>
                                            <th>Type</th>
                                            <th>Amount</th>
                                            <th>Due Date</th>
                                            <th>Remark</th>

                                        </tr>
                                    </thead>
                                    <tbody>

                                        <?php if ($report_id != "0") {
                                            if (!isset($country_id) && !isset($university_id) && !isset($campus_name) && !isset($agency_id)) {
                                                if ($type_id == "0" && $date_id == "0") {
                                                    $s1 = "SELECT student_id,id,agency_id,type,amount,due_date,install_num from ledger WHERE status=$report_id ORDER BY due_date ASC";
                                                } else if ($type_id != "0" && $date_id == "0") {
                                                    $s1 = "SELECT student_id,id,agency_id,type,amount,due_date,install_num from ledger WHERE  type=$type_id  AND status=$report_id ORDER BY due_date ASC";
                                                } else if ($type_id == "0" && $date_id != 0) {
                                                    $range = $_GET['daterange'];
                                                    list($first, $second) = explode('-', $range);

                                                    list($f_m, $f_d, $f_y) = explode('/', $first);
                                                    $f_first0 = $f_y . "-" . $f_m . "-" . $f_d;
                                                    $f_first = str_replace(' ', '', $f_first0);

                                                    list($s_m, $s_d, $s_y) = explode('/', $second);
                                                    $f_second0 = $s_y . "-" . $s_m . "-" . $s_d;
                                                    $f_second = str_replace(' ', '', $f_second0);

                                                    $s1 = "SELECT student_id,id,agency_id,type,amount,due_date,install_num from ledger WHERE  (due_date BETWEEN '$f_first' AND '$f_second') AND status=$report_id ORDER BY due_date ASC";
                                                } else if ($type_id != "0" && $date_id != 0) {
                                                    $range = $_GET['daterange'];
                                                    list($first, $second) = explode('-', $range);

                                                    list($f_m, $f_d, $f_y) = explode('/', $first);
                                                    $f_first0 = $f_y . "-" . $f_m . "-" . $f_d;
                                                    $f_first = str_replace(' ', '', $f_first0);

                                                    list($s_m, $s_d, $s_y) = explode('/', $second);
                                                    $f_second0 = $s_y . "-" . $s_m . "-" . $s_d;
                                                    $f_second = str_replace(' ', '', $f_second0);

                                                    $s1 = "SELECT student_id,id,agency_id,type,amount,due_date,install_num from ledger WHERE  (due_date BETWEEN '$f_first' AND '$f_second') AND status=$report_id AND type=$type_id ORDER BY due_date ASC";
                                                }
                                                $run = $conn->query($s1);


                                                while ($row = $run->fetch_assoc()) {
                                                    $id = $row['student_id'];
                                                    $ledger_id = $row['id'];

                                                    $s2 = "SELECT name from student_info WHERE id=$id";
                                                    $run2 = $conn->query($s2);
                                                    $row2 = $run2->fetch_assoc();
                                                    $name = $row2['name'];
                                                    $agency_id = $row['agency_id'];
                                                    $s4 = "SELECT name from agency_info WHERE id=$agency_id";
                                                    $run4 = $conn->query($s4);
                                                    $row4 = $run4->fetch_assoc();
                                                    $agency_name = $row4['name'];


                                                    $type_id = $row['type'];
                                                    if ($type_id == "1") {
                                                        $type = "DEBIT";
                                                    } else {
                                                        $type = "CREDIT";
                                                    }
                                                    $amount = $row['amount'];
                                                    $due_date = $row['due_date'];
                                                    $install_num = $row['install_num'];


                                        ?>
                                                    <tr>
                                                        <td><?php echo $ledger_id ?></td>
                                                        <td><input type="checkbox" name="ledger_ids[]" value="<?php echo $ledger_id ?>" checked></td>
                                                        <?php
                                                        $href = $name . " (" . $id . ")";
                                                        $s0 = "SELECT photo_path from photo_db WHERE s_id=$id";
                                                        $run0 = $conn->query($s0);
                                                        $row0 = $run0->fetch_assoc();
                                                        $profile_path = $row0['photo_path'];

                                                        echo '<td><div><a name="' . $name . '" class="Profile_Image"  target="_blank" data-image="' . $profile_path . '" href="search_student.php?name=' . $href . '">' . $name . "</a></div></td>";
                                                        ?>
                                                        <td><?php echo $agency_name ?></td>
                                                        <td><?php echo $type ?></td>
                                                        <td><input class="form-control" type="text" name="amount[]" value="<?php echo $amount ?>" required></td>
                                                        <td><?php echo $due_date ?></td>
                                                        <td><textarea name="remark[]" class="form-control" maxlength="100" placeholder="Enter Remark"></textarea></td>
                                                        <?php
                                                    }
                                                }
                                                if (isset($country_id)) {
                                                    foreach ($country_id as $country) {
                                                        $s0 = "SELECT id from student_info WHERE country_id=$country AND status=$report_id ";
                                                        $run1 = $conn->query($s0);
                                                        while ($row1 = $run1->fetch_assoc()) {
                                                            $student_id = $row1['id'];
                                                            $id = $row1['id'];

                                                            if ($type_id == "0" && $date_id == "0") {
                                                                $s1 = "SELECT student_id,id,agency_id,type,amount,due_date,install_num from ledger WHERE student_id=$student_id AND status=$report_id ORDER BY due_date ASC";
                                                            } else if ($type_id != "0" && $date_id == "0") {
                                                                $s1 = "SELECT student_id,id,agency_id,type,amount,due_date,install_num from ledger WHERE student_id=$student_id AND type=$type_id  AND status=$report_id ORDER BY due_date ASC";
                                                            } else if ($type_id == "0" && $date_id != 0) {
                                                                $range = $_GET['daterange'];
                                                                list($first, $second) = explode('-', $range);

                                                                list($f_m, $f_d, $f_y) = explode('/', $first);
                                                                $f_first0 = $f_y . "-" . $f_m . "-" . $f_d;
                                                                $f_first = str_replace(' ', '', $f_first0);

                                                                list($s_m, $s_d, $s_y) = explode('/', $second);
                                                                $f_second0 = $s_y . "-" . $s_m . "-" . $s_d;
                                                                $f_second = str_replace(' ', '', $f_second0);

                                                                $s1 = "SELECT student_id,id,agency_id,type,amount,due_date,install_num from ledger WHERE student_id=$student_id AND (due_date BETWEEN '$f_first' AND '$f_second') AND status=$report_id ORDER BY due_date ASC";
                                                            } else if ($type_id != "0" && $date_id != 0) {
                                                                $range = $_GET['daterange'];
                                                                list($first, $second) = explode('-', $range);

                                                                list($f_m, $f_d, $f_y) = explode('/', $first);
                                                                $f_first0 = $f_y . "-" . $f_m . "-" . $f_d;
                                                                $f_first = str_replace(' ', '', $f_first0);

                                                                list($s_m, $s_d, $s_y) = explode('/', $second);
                                                                $f_second0 = $s_y . "-" . $s_m . "-" . $s_d;
                                                                $f_second = str_replace(' ', '', $f_second0);

                                                                $s1 = "SELECT student_id,id,agency_id,type,amount,due_date,install_num from ledger WHERE student_id=$student_id AND (due_date BETWEEN '$f_first' AND '$f_second') AND status=$report_id AND type=$type_id ORDER BY due_date ASC";
                                                            }


                                                            $run = $conn->query($s1);

                                                            while ($row = $run->fetch_assoc()) {
                                                                $id = $row['student_id'];
                                                                $ledger_id = $row['id'];

                                                                $s2 = "SELECT name from student_info WHERE id=$id";
                                                                $run2 = $conn->query($s2);
                                                                $row2 = $run2->fetch_assoc();
                                                                $name = $row2['name'];
                                                                $agency_id = $row['agency_id'];
                                                                $s4 = "SELECT name from agency_info WHERE id=$agency_id";
                                                                $run4 = $conn->query($s4);
                                                                $row4 = $run4->fetch_assoc();
                                                                $agency_name = $row4['name'];


                                                                $type_id = $row['type'];
                                                                if ($type_id == "1") {
                                                                    $type = "DEBIT";
                                                                } else {
                                                                    $type = "CREDIT";
                                                                }
                                                                $amount = $row['amount'];
                                                                $due_date = $row['due_date'];
                                                                $install_num = $row['install_num'];


                                                        ?>
                                                    <tr>
                                                        <td><?php echo $ledger_id ?></td>
                                                        <td><input type="checkbox" name="ledger_ids[]" value="<?php echo $ledger_id ?>" checked></td>
                                                        <?php
                                                                $href = $name . " (" . $id . ")";
                                                                $s0 = "SELECT photo_path from photo_db WHERE s_id=$id";
                                                                $run0 = $conn->query($s0);
                                                                $row0 = $run0->fetch_assoc();
                                                                $profile_path = $row0['photo_path'];

                                                                echo '<td><div><a name="' . $name . '" class="Profile_Image"  target="_blank" data-image="' . $profile_path . '" href="search_student.php?name=' . $href . '">' . $name . "</a></div></td>";
                                                        ?>
                                                        <td><?php echo $agency_name ?></td>
                                                        <td><?php echo $type ?></td>
                                                        <td><input class="form-control" type="text" name="amount[]" value="<?php echo $amount ?>" required></td>
                                                        <td><?php echo $due_date ?></td>
                                                        <td><textarea name="remark[]" class="form-control" maxlength="100" placeholder="Enter Remark"></textarea></td>

                                                    <?php      }
                                                        }
                                                    }
                                                }
                                                if (isset($semester)) {
                                                    foreach ($semester as $sem) {
                                                        $s0 = "SELECT id from student_info WHERE semester='$sem' AND status=$report_id ";
                                                        $run1 = $conn->query($s0);
                                                        while ($row1 = $run1->fetch_assoc()) {
                                                            $student_id = $row1['id'];
                                                            $id = $row1['id'];

                                                            if ($type_id == "0" && $date_id == "0") {
                                                                $s1 = "SELECT student_id,id,agency_id,type,amount,due_date,install_num from ledger WHERE student_id=$student_id AND status=$report_id ORDER BY due_date ASC";
                                                            } else if ($type_id != "0" && $date_id == "0") {
                                                                $s1 = "SELECT student_id,id,agency_id,type,amount,due_date,install_num from ledger WHERE student_id=$student_id AND type=$type_id  AND status=$report_id ORDER BY due_date ASC";
                                                            } else if ($type_id == "0" && $date_id != 0) {
                                                                $range = $_GET['daterange'];
                                                                list($first, $second) = explode('-', $range);

                                                                list($f_m, $f_d, $f_y) = explode('/', $first);
                                                                $f_first0 = $f_y . "-" . $f_m . "-" . $f_d;
                                                                $f_first = str_replace(' ', '', $f_first0);

                                                                list($s_m, $s_d, $s_y) = explode('/', $second);
                                                                $f_second0 = $s_y . "-" . $s_m . "-" . $s_d;
                                                                $f_second = str_replace(' ', '', $f_second0);

                                                                $s1 = "SELECT student_id,id,agency_id,type,amount,due_date,install_num from ledger WHERE student_id=$student_id AND (due_date BETWEEN '$f_first' AND '$f_second') AND status=$report_id ORDER BY due_date ASC";
                                                            } else if ($type_id != "0" && $date_id != 0) {
                                                                $range = $_GET['daterange'];
                                                                list($first, $second) = explode('-', $range);

                                                                list($f_m, $f_d, $f_y) = explode('/', $first);
                                                                $f_first0 = $f_y . "-" . $f_m . "-" . $f_d;
                                                                $f_first = str_replace(' ', '', $f_first0);

                                                                list($s_m, $s_d, $s_y) = explode('/', $second);
                                                                $f_second0 = $s_y . "-" . $s_m . "-" . $s_d;
                                                                $f_second = str_replace(' ', '', $f_second0);

                                                                $s1 = "SELECT student_id,id,agency_id,type,amount,due_date,install_num from ledger WHERE student_id=$student_id AND (due_date BETWEEN '$f_first' AND '$f_second') AND status=$report_id AND type=$type_id ORDER BY due_date ASC";
                                                            }


                                                            $run = $conn->query($s1);

                                                            while ($row = $run->fetch_assoc()) {

                                                                $id = $row['student_id'];
                                                                $ledger_id = $row['id'];

                                                                $s2 = "SELECT name from student_info WHERE id=$id";
                                                                $run2 = $conn->query($s2);
                                                                $row2 = $run2->fetch_assoc();
                                                                $name = $row2['name'];
                                                                $agency_id = $row['agency_id'];
                                                                $s4 = "SELECT name from agency_info WHERE id=$agency_id";
                                                                $run4 = $conn->query($s4);
                                                                $row4 = $run4->fetch_assoc();
                                                                $agency_name = $row4['name'];


                                                                $type_id = $row['type'];
                                                                if ($type_id == "1") {
                                                                    $type = "DEBIT";
                                                                } else {
                                                                    $type = "CREDIT";
                                                                }
                                                                $amount = $row['amount'];
                                                                $due_date = $row['due_date'];
                                                                $install_num = $row['install_num'];


                                                    ?>
                                                    <tr>
                                                        <td><?php echo $ledger_id ?></td>
                                                        <td><input type="checkbox" name="ledger_ids[]" value="<?php echo $ledger_id ?>" checked></td>
                                                        <?php
                                                                $href = $name . " (" . $id . ")";
                                                                $s0 = "SELECT photo_path from photo_db WHERE s_id=$id";
                                                                $run0 = $conn->query($s0);
                                                                $row0 = $run0->fetch_assoc();
                                                                $profile_path = $row0['photo_path'];

                                                                echo '<td><div><a name="' . $name . '" class="Profile_Image"  target="_blank" data-image="' . $profile_path . '" href="search_student.php?name=' . $href . '">' . $name . "</a></div></td>";
                                                        ?>
                                                        <td><?php echo $agency_name ?></td>
                                                        <td><?php echo $type ?></td>
                                                        <td><input class="form-control" type="text" name="amount[]" value="<?php echo $amount ?>" required></td>
                                                        <td><?php echo $due_date ?></td>
                                                        <td><textarea name="remark[]" class="form-control" maxlength="100" placeholder="Enter Remark"></textarea></td>

                                                    <?php
                                                            }
                                                        }
                                                    }
                                                }
                                                if (isset($university_id)) {
                                                    foreach ($university_id as $university) {

                                                        $s0 = "SELECT id from student_info WHERE university_id=$university AND status=$report_id ";
                                                        $run1 = $conn->query($s0);
                                                        while ($row1 = $run1->fetch_assoc()) {
                                                            $student_id = $row1['id'];
                                                            $id = $row1['id'];

                                                            if ($type_id == "0" && $date_id == "0") {
                                                                $s1 = "SELECT student_id,id,agency_id,type,amount,due_date,install_num from ledger WHERE student_id=$student_id AND status=$report_id ORDER BY due_date ASC";
                                                            } else if ($type_id != "0" && $date_id == "0") {
                                                                $s1 = "SELECT student_id,id,agency_id,type,amount,due_date,install_num from ledger WHERE student_id=$student_id AND type=$type_id  AND status=$report_id ORDER BY due_date ASC";
                                                            } else if ($type_id == "0" && $date_id != 0) {
                                                                $range = $_GET['daterange'];
                                                                list($first, $second) = explode('-', $range);

                                                                list($f_m, $f_d, $f_y) = explode('/', $first);
                                                                $f_first0 = $f_y . "-" . $f_m . "-" . $f_d;
                                                                $f_first = str_replace(' ', '', $f_first0);

                                                                list($s_m, $s_d, $s_y) = explode('/', $second);
                                                                $f_second0 = $s_y . "-" . $s_m . "-" . $s_d;
                                                                $f_second = str_replace(' ', '', $f_second0);

                                                                $s1 = "SELECT student_id,id,agency_id,type,amount,due_date,install_num from ledger WHERE student_id=$student_id AND (due_date BETWEEN '$f_first' AND '$f_second') AND status=$report_id  ORDER BY due_date ASC ";
                                                            } else if ($type_id != "0" && $date_id != 0) {
                                                                $range = $_GET['daterange'];
                                                                list($first, $second) = explode('-', $range);

                                                                list($f_m, $f_d, $f_y) = explode('/', $first);
                                                                $f_first0 = $f_y . "-" . $f_m . "-" . $f_d;
                                                                $f_first = str_replace(' ', '', $f_first0);

                                                                list($s_m, $s_d, $s_y) = explode('/', $second);
                                                                $f_second0 = $s_y . "-" . $s_m . "-" . $s_d;
                                                                $f_second = str_replace(' ', '', $f_second0);

                                                                $s1 = "SELECT student_id,id,agency_id,type,amount,due_date,install_num from ledger WHERE student_id=$student_id AND (due_date BETWEEN '$f_first' AND '$f_second') AND status=$report_id AND type=$type_id ORDER BY due_date ASC";
                                                            }

                                                            $run = $conn->query($s1);

                                                            while ($row = $run->fetch_assoc()) {

                                                                $id = $row['student_id'];
                                                                $ledger_id = $row['id'];

                                                                $s2 = "SELECT name from student_info WHERE id=$id";
                                                                $run2 = $conn->query($s2);
                                                                $row2 = $run2->fetch_assoc();
                                                                $name = $row2['name'];
                                                                $agency_id = $row['agency_id'];
                                                                $s4 = "SELECT name from agency_info WHERE id=$agency_id";
                                                                $run4 = $conn->query($s4);
                                                                $row4 = $run4->fetch_assoc();
                                                                $agency_name = $row4['name'];


                                                                $type_id = $row['type'];
                                                                if ($type_id == "1") {
                                                                    $type = "DEBIT";
                                                                } else {
                                                                    $type = "CREDIT";
                                                                }
                                                                $amount = $row['amount'];
                                                                $due_date = $row['due_date'];
                                                                $install_num = $row['install_num'];


                                                    ?>
                                                    <tr>
                                                        <td><?php echo $ledger_id ?></td>
                                                        <td><input type="checkbox" name="ledger_ids[]" value="<?php echo $ledger_id ?>" checked></td>
                                                        <?php
                                                                $href = $name . " (" . $id . ")";
                                                                $s0 = "SELECT photo_path from photo_db WHERE s_id=$id";
                                                                $run0 = $conn->query($s0);
                                                                $row0 = $run0->fetch_assoc();
                                                                $profile_path = $row0['photo_path'];

                                                                echo '<td><div><a name="' . $name . '" class="Profile_Image"  target="_blank" data-image="' . $profile_path . '" href="search_student.php?name=' . $href . '">' . $name . "</a></div></td>";
                                                        ?>
                                                        <td><?php echo $agency_name ?></td>
                                                        <td><?php echo $type ?></td>
                                                        <td><input class="form-control" type="text" name="amount[]" value="<?php echo $amount ?>" required></td>
                                                        <td><?php echo $due_date ?></td>
                                                        <td><textarea name="remark[]" class="form-control" maxlength="100" placeholder="Enter Remark"></textarea></td>

                                                    <?php
                                                            }
                                                        }
                                                    }
                                                }
                                                if (isset($agency_id)) {

                                                    foreach ($agency_id as $agency) {

                                                        if ($type_id == "0" && $date_id == "0") {
                                                            $s1 = "SELECT student_id,id,agency_id,type,amount,due_date,install_num from ledger WHERE agency_id=$agency AND status=$report_id  ORDER BY due_date ASC";
                                                        } else if ($type_id != "0" && $date_id == "0") {
                                                            $s1 = "SELECT student_id,id,agency_id,type,amount,due_date,install_num from ledger WHERE agency_id=$agency_id AND type=$type_id  AND status=$report_id  ORDER BY due_date ASC";
                                                        } else if ($type_id == "0" && $date_id != 0) {
                                                            $range = $_GET['daterange'];
                                                            list($first, $second) = explode('-', $range);

                                                            list($f_m, $f_d, $f_y) = explode('/', $first);
                                                            $f_first0 = $f_y . "-" . $f_m . "-" . $f_d;
                                                            $f_first = str_replace(' ', '', $f_first0);

                                                            list($s_m, $s_d, $s_y) = explode('/', $second);
                                                            $f_second0 = $s_y . "-" . $s_m . "-" . $s_d;
                                                            $f_second = str_replace(' ', '', $f_second0);

                                                            $s1 = "SELECT student_id,id,agency_id,type,amount,due_date,install_num from ledger WHERE agency_id=$agency_id AND (due_date BETWEEN '$f_first' AND '$f_second') AND status=$report_id  ORDER BY due_date ASC";
                                                        } else if ($type_id != "0" && $date_id != 0) {
                                                            $range = $_GET['daterange'];
                                                            list($first, $second) = explode('-', $range);

                                                            list($f_m, $f_d, $f_y) = explode('/', $first);
                                                            $f_first0 = $f_y . "-" . $f_m . "-" . $f_d;
                                                            $f_first = str_replace(' ', '', $f_first0);

                                                            list($s_m, $s_d, $s_y) = explode('/', $second);
                                                            $f_second0 = $s_y . "-" . $s_m . "-" . $s_d;
                                                            $f_second = str_replace(' ', '', $f_second0);

                                                            $s1 = "SELECT student_id,id,agency_id,type,amount,due_date,install_num from ledger WHERE student_id=$student_id AND (due_date BETWEEN '$f_first' AND '$f_second') AND status=$report_id AND type=$type_id ORDER BY due_date ASC";
                                                        }
                                                        $run = $conn->query($s1);


                                                        while ($row = $run->fetch_assoc()) {
                                                            $id = $row['student_id'];
                                                            $ledger_id = $row['id'];

                                                            $s2 = "SELECT name from student_info WHERE id=$id";
                                                            $run2 = $conn->query($s2);
                                                            $row2 = $run2->fetch_assoc();
                                                            $name = $row2['name'];
                                                            $agency_id = $row['agency_id'];
                                                            $s4 = "SELECT name from agency_info WHERE id=$agency_id";
                                                            $run4 = $conn->query($s4);
                                                            $row4 = $run4->fetch_assoc();
                                                            $agency_name = $row4['name'];


                                                            $type_id = $row['type'];
                                                            if ($type_id == "1") {
                                                                $type = "DEBIT";
                                                            } else {
                                                                $type = "CREDIT";
                                                            }
                                                            $amount = $row['amount'];
                                                            $due_date = $row['due_date'];
                                                            $install_num = $row['install_num'];


                                                    ?>
                                                    <tr>
                                                        <td><?php echo $ledger_id ?></td>
                                                        <td><input type="checkbox" name="ledger_ids[]" value="<?php echo $ledger_id ?>" checked></td>
                                                        <?php
                                                            $href = $name . " (" . $id . ")";
                                                            $s0 = "SELECT photo_path from photo_db WHERE s_id=$id";
                                                            $run0 = $conn->query($s0);
                                                            $row0 = $run0->fetch_assoc();
                                                            $profile_path = $row0['photo_path'];

                                                            echo '<td><div><a name="' . $name . '" class="Profile_Image"  target="_blank" data-image="' . $profile_path . '" href="search_student.php?name=' . $href . '">' . $name . "</a></div></td>";
                                                        ?>
                                                        <td><?php echo $agency_name ?></td>
                                                        <td><?php echo $type ?></td>
                                                        <td><input class="form-control" type="text" name="amount[]" value="<?php echo $amount ?>" required></td>
                                                        <td><?php echo $due_date ?></td>
                                                        <td><textarea name="remark[]" class="form-control" maxlength="100" placeholder="Enter Remark"></textarea></td>

                                                        <?php
                                                        }
                                                    }
                                                }
                                                if (isset($campus_name)) {
                                                    foreach ($campus_name as $campus) {
                                                        $sql = "SELECT id from campus_info WHERE name='$campus'";
                                                        $run1 = $conn->query($sql);
                                                        while ($row1 = $run1->fetch_assoc()) {
                                                            $campus_id = $row1['id'];

                                                            $s0 = "SELECT id from student_info WHERE campus_id=$campus_id AND status=$report_id ";
                                                            $run10 = $conn->query($s0);
                                                            while ($row10 = $run10->fetch_assoc()) {
                                                                $id = $row10['id'];


                                                                if ($type_id == "0" && $date_id == "0") {
                                                                    $s1 = "SELECT student_id,id,agency_id,type,amount,due_date,install_num from ledger WHERE student_id=$id AND status=$report_id  ORDER BY due_date ASC";
                                                                } else if ($type_id != "0" && $date_id == "0") {
                                                                    $s1 = "SELECT student_id,id,agency_id,type,amount,due_date,install_num from ledger WHERE student_id=$id AND type=$type_id  AND status=$report_id  ORDER BY due_date ASC";
                                                                } else if ($type_id == "0" && $date_id != 0) {
                                                                    $range = $_GET['daterange'];
                                                                    list($first, $second) = explode('-', $range);

                                                                    list($f_m, $f_d, $f_y) = explode('/', $first);
                                                                    $f_first0 = $f_y . "-" . $f_m . "-" . $f_d;
                                                                    $f_first = str_replace(' ', '', $f_first0);

                                                                    list($s_m, $s_d, $s_y) = explode('/', $second);
                                                                    $f_second0 = $s_y . "-" . $s_m . "-" . $s_d;
                                                                    $f_second = str_replace(' ', '', $f_second0);

                                                                    $s1 = "SELECT student_id,id,agency_id,type,amount,due_date,install_num from ledger WHERE student_id=$id AND (due_date BETWEEN '$f_first' AND '$f_second') AND status=$report_id  ORDER BY due_date ASC";
                                                                } else if ($type_id != "0" && $date_id != 0) {
                                                                    $range = $_GET['daterange'];
                                                                    list($first, $second) = explode('-', $range);

                                                                    list($f_m, $f_d, $f_y) = explode('/', $first);
                                                                    $f_first0 = $f_y . "-" . $f_m . "-" . $f_d;
                                                                    $f_first = str_replace(' ', '', $f_first0);

                                                                    list($s_m, $s_d, $s_y) = explode('/', $second);
                                                                    $f_second0 = $s_y . "-" . $s_m . "-" . $s_d;
                                                                    $f_second = str_replace(' ', '', $f_second0);

                                                                    $s1 = "SELECT student_id,id,agency_id,type,amount,due_date,install_num from ledger WHERE student_id=$id AND (due_date BETWEEN '$f_first' AND '$f_second') AND status=$report_id AND type=$type_id ORDER BY due_date ASC";
                                                                }

                                                                $run = $conn->query($s1);

                                                                while ($row = $run->fetch_assoc()) {

                                                                    $id = $row['student_id'];
                                                                    $ledger_id = $row['id'];

                                                                    $s2 = "SELECT name from student_info WHERE id=$id";
                                                                    $run2 = $conn->query($s2);
                                                                    $row2 = $run2->fetch_assoc();
                                                                    $name = $row2['name'];
                                                                    $agency_id = $row['agency_id'];
                                                                    $s4 = "SELECT name from agency_info WHERE id=$agency_id";
                                                                    $run4 = $conn->query($s4);
                                                                    $row4 = $run4->fetch_assoc();
                                                                    $agency_name = $row4['name'];


                                                                    $type_id = $row['type'];
                                                                    if ($type_id == "1") {
                                                                        $type = "DEBIT";
                                                                    } else {
                                                                        $type = "CREDIT";
                                                                    }
                                                                    $amount = $row['amount'];
                                                                    $due_date = $row['due_date'];
                                                                    $install_num = $row['install_num'];


                                                        ?>
                                                    <tr>
                                                        <td><?php echo $ledger_id ?></td>
                                                        <td><input type="checkbox" name="ledger_ids[]" value="<?php echo $ledger_id ?>" checked></td>
                                                        <?php
                                                                    $href = $name . " (" . $id . ")";
                                                                    $s0 = "SELECT photo_path from photo_db WHERE s_id=$id";
                                                                    $run0 = $conn->query($s0);
                                                                    $row0 = $run0->fetch_assoc();
                                                                    $profile_path = $row0['photo_path'];

                                                                    echo '<td><div><a name="' . $name . '" class="Profile_Image"  target="_blank" data-image="' . $profile_path . '" href="search_student.php?name=' . $href . '">' . $name . "</a></div></td>";
                                                        ?>
                                                        <td><?php echo $agency_name ?></td>
                                                        <td><?php echo $type ?></td>
                                                        <td><input class="form-control" type="text" name="amount[]" value="<?php echo $amount ?>" required></td>
                                                        <td><?php echo $due_date ?></td>
                                                        <td><textarea name="remark[]" class="form-control" maxlength="100" placeholder="Enter Remark"></textarea></td>

                            <?php
                                                                }
                                                            }
                                                        }
                                                    }
                                                }
                                            }



                                            echo '</tbody></table></div>';
                                        }

                            ?>
                            <button class="btn btn-success float-right" name="submit" value="sub">Complete</button>
                        </form>
                      
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