<?php
ini_set('display_errors', 0);
error_reporting(E_ERROR | E_WARNING | E_PARSE);
date_default_timezone_set('Asia/Kolkata');

$c_d = date('Y-m-d');
session_start();
if (isset($_SESSION['varname'])) {
    $access = $_SESSION['access'];
    if ($_GET['name'] == "Country") {
        $forms_access = $_SESSION['forms_access'];
        $flag = 0;
        foreach ($forms_access as $formid) {
            if ($formid == "3" || $formid == "1") {
                $flag = 1;
            }
        }
        if ($flag == 0) {
            header('Location:main.php');
            exit();
        }
    }
    if ($_GET['name'] == "University") {
        $forms_access = $_SESSION['forms_access'];
        $flag = 0;
        foreach ($forms_access as $formid) {
            if ($formid == "7" || $formid == "5") {
                $flag = 1;
            }
        }
        if ($flag == 0) {
            header('Location:main.php');
            exit();
        }
    }

    if ($_GET['name'] == "Campus") {
        $forms_access = $_SESSION['forms_access'];
        $flag = 0;
        foreach ($forms_access as $formid) {
            if ($formid == "11" || $formid == "9") {
                $flag = 1;
            }
        }
        if ($flag == 0) {
            header('Location:main.php');
            exit();
        }
    }
    if ($_GET['name'] == "Agency") {
        $forms_access = $_SESSION['forms_access'];
        $flag = 0;
        foreach ($forms_access as $formid) {
            if ($formid == "14" || $formid == "13") {
                $flag = 1;
            }
        }
        if ($flag == 0) {
            header('Location:main.php');
            exit();
        }
    }
    if ($_GET['name'] == "Entry") {
        $forms_access = $_SESSION['forms_access'];
        $flag = 0;
        foreach ($forms_access as $formid) {
            if ($formid == "20" || $formid == "17") {
                $flag = 1;
            }
        }
        if ($flag == 0) {
            header('Location:main.php');
            exit();
        }
    }
    if ($_GET['name'] == "Access") {
        $forms_access = $_SESSION['forms_access'];
        $flag = 0;
        foreach ($forms_access as $formid) {
            if ($formid == "24" || $formid == "22") {
                $flag = 1;
            }
        }
        if ($flag == 0) {
            header('Location:main.php');
            exit();
        }
    }
    require('connectDB.php');
} else {
    header("Location: login.php");
    die();
}
$get_name = $_GET['name'];
?>
<!DOCTYPE html>
<html lang="en">

<head>


<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="/resources/demos/style.css">
    <script src="https://code.jquery.com/jquery-3.3.1.min.js" type="text/javascript"></script>
     <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script>
        $(function() {
            $(".datepicker").datepicker();
        });
    </script>



  
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
    <title>Edit <?php echo $get_name;  ?></title>
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
    <script>
        $(function() {
            $(".datepicker").datepicker({
                changeMonth: true,
                changeYear: true,
                yearRange: '-100:+100'
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
                    <h6 class="m-0 font-weight-bold text-primary">Edit <?php echo $get_name  ?></h6>
                </div>
                <div class="card-body">

                    <style>
                        .search-box {
                            width: 300px;
                            position: relative;
                            display: inline-block;
                            font-size: 14px;
                        }

                        .search-box input[type="text"] {
                            height: 32px;
                            padding: 5px 10px;
                            border: 1px solid #CCCCCC;
                            font-size: 14px;
                        }

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
                    <?php
                    if ($get_name == "Entry") { ?>
                        <form method="POST">
                            <div class="search-box">

                                <input class="form-control" name="name" type="text" autocomplete="off" placeholder="Search Student..." />

                                <div class="result"></div>
                            </div>

                            <button class="btn btn-primary ml-2" value="sub" name="sub">Submit</button>




                        </form>
                </div>

            </div>
            <?php
                        if (isset($_POST['submit_edit'])) {

                            $country_id = $_POST['country_id'];
                            $university_id = $_POST['university_id'];
                            $campus_id = $_POST['campus_id'];
                            $student_name = $_POST['student_name'];
                            $dob_datejs = $_POST['dob'];
                            $fees = $_POST['fees'];
                            $commission = $_POST['commission'];
                            $student_id = $_POST['student_id'];
                            $visa_number = $_POST['visa_number'];
                            $course = $_POST['course'];
                            $semester = $_POST['semester'];
                            $s_id = $_POST['s_id'];
                            $student_status = $_POST['student_status'];

                            list($f_y, $f_m, $f_d) = explode('/', $dob_datejs);
                            $f_first0 = $f_y . "-" . $f_m . "-" . $f_d;
                            $dob = str_replace(' ', '', $f_first0);

                            $sql = "UPDATE student_info SET name='$student_name',dob='$dob',fees='$fees',commission='$commission',country_id=$country_id,university_id=$university_id,campus_id=$campus_id,student_id='$student_id',visa_number='$visa_number',course='$course',semester='$semester',status=$student_status WHERE id=$s_id";
                            if (mysqli_query($conn, $sql)) {
                                $s1 = "DELETE FROM ledger WHERE student_id=$s_id";
                                if (mysqli_query($conn, $s1)) {
                                    echo '<div class="alert alert-success mt-2">
                                    Entry Editted
                                   </div>';
                                    $agency_id = $_POST['agency_id'];

                                    $type = $_POST['type_id'];
                                    $install_num = $_POST['install_num'];
                                    $amount = $_POST['amount'];
                                    $due_date = $_POST['due_date'];
                                    $status_id = $_POST['status_ids'];
                                    $finish_date = $_POST['finish_date'];
                                    $remark = $_POST['remark'];

                                    foreach ($agency_id as $index => $agency) {
                                        $agency_id_1 = $agency_id[$index];
                                        $type_1 = $type[$index];
                                        $install_num_1 = $install_num[$index];
                                        $amount_1 = $amount[$index];
                                        $due_date_1 = $due_date[$index];
                                        list($f_y1, $f_m1, $f_d1) = explode('/', $due_date_1);
                                        $f_first1 = $f_y1 . "-" . $f_m1 . "-" . $f_d1;
                                        $due_date_js = str_replace(' ', '', $f_first1);
                                        $finish_date_1 = $finish_date[$index];
                                        if (!empty($finish_date_1)) {
                                            list($f_y2, $f_m2, $f_d2) = explode('/', $finish_date_1);
                                            $f_first2 = $f_y2 . "-" . $f_m2 . "-" . $f_d2;
                                            $finish_date_js = str_replace(' ', '', $f_first2);
                                        }
                                        $status_id_1 = $status_id[$index];
                                        $remark_1 = $remark[$index];

                                        $s2 = "INSERT INTO ledger VALUES('',$s_id,$agency,$type_1,$install_num_1,'$amount_1','$due_date_js',$status_id_1,'$finish_date_js','$remark_1')";
                                        if (mysqli_query($conn, $s2)) {
                                        }
                                    }
                                }
                            }
                        }
                        if (isset($_POST['sub'])) {


            ?>
                <form method="POST">
                    <div class="card shadow mb-4 ">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary"> <?php
                                                                            $name_e = $_POST['name'];

                                                                            $first_index = stripos($name_e, "(") + 1;
                                                                            echo $name = substr($name_e, 0, $first_index - 2);

                                                                            ?></h6>
                        </div>
                        <div class="card-body">
                            <?php
                            $s_id_e = substr($name_e, $first_index);
                            $s_id = rtrim($s_id_e, ") ");
                            $sql = "SELECT country_id,university_id,campus_id,name,dob,fees,commission,student_id,visa_number,course,semester,status from student_info WHERE id=$s_id";
                            $run = $conn->query($sql);
                            $row = $run->fetch_assoc();
                            $country_id = $row['country_id'];
                            $university_id = $row['university_id'];
                            $campus_id = $row['campus_id'];
                            $student_name = $row['name'];
                            $dob = $row['dob'];
                            $fees = $row['fees'];
                            $commission = $row['commission'];
                            $student_id = $row['student_id'];
                            $visa_number = $row['visa_number'];
                            $course = $row['course'];
                            $semester = $row['semester'];
                            $student_status = $row['status'];

                            list($f_y, $f_m, $f_d) = explode('-', $dob);
                            $f_first0 = $f_m . "/" . $f_d . "/" . $f_y;
                            $dob_js = str_replace(' ', '', $f_first0);
                            ?>

                            <div class="row">
                                <div class="col-lg-4">
                                    <label>Country</label>
                                    <select id="country_id" onchange="change_country()" class="form-control" name="country_id" required>

                                        <?php
                                        $sql = "SELECT COUNT(*) as c_1 from country_info WHERE id=$country_id";
                                        $run = $conn->query($sql);
                                        $row_1 = $run->fetch_assoc();
                                        $c_1 = $row_1['c_1'];
                                        if ($c_1 > 0) {
                                            $sql_1 = "SELECT name from country_info WHERE id=$country_id";
                                            $run_1 = $conn->query($sql_1);

                                            while ($row = $run_1->fetch_assoc()) {

                                                $name = $row['name'];
                                        ?>
                                                <option value='<?php echo $country_id ?>' selected><?php echo $name ?></option>
                                            <?php } ?>
                                            <option>----</option>
                                            <?php   }
                                        $sql = "SELECT COUNT(*) as c_2 from country_info ";
                                        $run=$conn->query($sql);
                                        $row_2 = $run->fetch_assoc();
                                        $c_2 = $row_2['c_2'];
                                        if ($c_2 > 0) {
                                            $sql_1 = "SELECT * from country_info";
                                            $run_1 = $conn->query($sql_1);


                                            while ($row = $run_1->fetch_assoc()) {
                                                $id = $row['id'];
                                                $name = $row['name'];
                                            ?>
                                                <option value='<?php echo $id ?>'><?php echo $name ?></option>
                                            <?php } ?>

                                        <?php   }
                                        ?>
                                    </select>

                                </div>
                                <div class="col-lg-4">
                                    <label>University</label>
                                    <div id="university_id_div">
                                        <select id="university_id" onchange="change_university()" class="form-control" name="university_id" required>


                                            <?php
                                            $sql = "SELECT COUNT(*) as c_1 from university_info WHERE id=$university_id";
                                            $run = $conn->query($sql);
                                            $row_1 = $run->fetch_assoc();
                                            $c_1 = $row_1['c_1'];
                                            if ($c_1 > 0) {
                                                $sql_1 = "SELECT name from university_info WHERE id=$university_id";
                                                $run_1 = $conn->query($sql_1);

                                                while ($row = $run_1->fetch_assoc()) {

                                                    $name = $row['name'];

                                            ?>
                                                    <option value='<?php echo $university_id ?>' selected><?php echo $name ?></option>
                                                <?php } ?>

                                            <?php   }
                                            ?>


                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <label>Campus</label>
                                    <div id="campus_id_div">
                                        <select id="campus_id" onchange="change_campus()" class="form-control" name="campus_id" required>


                                            <?php
                                            $sql = "SELECT COUNT(*) as c_1 from campus_info WHERE id=$campus_id";
                                            $run = $conn->query($sql);
                                            $row_1 = $run->fetch_assoc();
                                            $c_1 = $row_1['c_1'];
                                            if ($c_1 > 0) {
                                                $sql_1 = "SELECT name from campus_info WHERE id=$campus_id";
                                                $run_1 = $conn->query($sql_1);

                                                while ($row = $run_1->fetch_assoc()) {

                                                    $name = $row['name'];
                                            ?>
                                                    <option value='<?php echo $campus_id ?>' selected><?php echo $name ?></option>
                                                <?php } ?>

                                            <?php   }
                                            ?>


                                        </select>
                                    </div>

                                </div>
                            </div>


                        </div>
                    </div>

                    <div class="card shadow mb-4 ">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Student Info </h6>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label>Student Name</label>
                                <input name="s_id" value="<?php echo $s_id ?>" type="hidden" class="form-control" required>

                                <input name="student_name" value="<?php echo $student_name ?>" type="text" placeholder="Enter Student Name" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label>Student DOB</label>

                                <input placeholder="Enter Student Date of Birth" value="<?php echo $dob_js ?>" name="dob" type="text" class="form-control datepicker">
                            </div>
                            <div class="form-group">
                                <label>Student ID</label>
                                <input placeholder="Enter Student ID" name="student_id" value="<?php echo $student_id ?>" type="text" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Visa Number</label>
                                <input placeholder="Enter Visa Number" name="visa_number" value="<?php echo $visa_number ?>" type="text" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Course</label>
                                <input placeholder="Enter Course" name="course" type="text" value="<?php echo $course ?>" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Semester</label>
                                <input name="semester" id="semester" placeholder="Enter Semester" value="<?php echo $semester ?>" class="form-control" />
                            </div>
                            <div class="form-group">
                                <label>Fees</label>
                                <input placeholder="Enter Total Fees" name="fees" type="number" value="<?php echo $fees ?>" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Commission</label>
                                <input placeholder="Enter Total Commission" name="commission" value="<?php echo $commission ?>" type="number" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Status</label>
                                <select class="form-control" name="student_status" required>
                                    <?php
                                    if ($student_status == "1") {
                                        $s_s = "Payment Due";
                                    } else {
                                        $s_s = "Payment Completed";
                                    }

                                    ?>
                                    <option value="<?php echo $student_status ?>"><?php echo $s_s ?></option>
                                    <option value="">--</option>
                                    <option value="1">Payment Due</option>
                                    <option value="2">Payment Completed</option>

                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="card shadow mb-4 ">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Agency Info</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dynamic_field">
                                    <tr>
                                        <th>Agency</th>
                                        <th>Type</th>
                                        <th>Installment</th>
                                        <th>Amount</th>
                                        <th>Due Date</th>
                                        <th>Finish Date</th>
                                        <th>Status</th>
                                        <th>Remark</th>
                                    </tr>
                                    <?php
                                    $s1 = "SELECT agency_id,type,install_num,amount,due_date,status,finish_date,remark,id from ledger WHERE student_id=$s_id";
                                    $run1 = $conn->query($s1);
                                    while ($row1 = $run1->fetch_assoc()) {
                                        $agency_id = $row1['agency_id'];
                                        $type_id = $row1['type'];
                                        $install_num = $row1['install_num'];
                                        $amount = $row1['amount'];
                                        $due_date = $row1['due_date'];
                                        $status_id = $row1['status'];
                                        $finish_date = $row1['finish_date'];
                                        $remark = $row1['remark'];
                                        $id_ledger = $row1['id'];
                                        list($f_y1, $f_m1, $f_d1) = explode('-', $due_date);
                                        $f_first1 = $f_m1 . "/" . $f_d1 . "/" . $f_y1;
                                        $due_date_js = str_replace(' ', '', $f_first1);
                                        if(!empty($finish_date))
                                        {
                                        list($f_y2, $f_m2, $f_d2) = explode('-', $finish_date);
                                        $f_first2 = $f_m2 . "/" . $f_d2 . "/" . $f_y2;
                                        $finish_date_js = str_replace(' ', '', $f_first2);
                                        }

                                    ?>
                                        <tr id="prev<?php echo $id_ledger ?>">
                                            <td> <select class="form-control" name="agency_id[]" required>


                                                    <?php
                                                    $sql = "SELECT COUNT(*) as c_1 from agency_info WHERE id=$agency_id";
                                                    $run = $conn->query($sql);
                                                    $row_1 = $run->fetch_assoc();
                                                    $c_1 = $row_1['c_1'];
                                                    if ($c_1 > 0) {
                                                        $sql_1 = "SELECT name from agency_info WHERE id=$agency_id";
                                                        $run_1 = $conn->query($sql_1);
        
                                                        while ($row = $run_1->fetch_assoc()) {
                                                           
                                                            $name = $row['name'];
                                                    ?>
                                                            <option value='<?php echo $agency_id ?>' selected><?php echo $name ?></option>
                                                    <?php }
                                                    }

                                                    ?>
                                                    <option>----</option>
                                                    <?php
                                                    $sql = "SELECT COUNT(*) as c_1 from agency_info";
                                                    $run = $conn->query($sql);
                                                    $row_1 = $run->fetch_assoc();
                                                    $c_1 = $row_1['c_1'];
                                                    if ($c_1 > 0) {
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
                                                </select></td>
                                            <td>
                                                <select class="form-control" name="type_id[]" required>
                                                    <?php
                                                    if ($type_id == "1") {
                                                        $type = "DEBIT";
                                                    } else {
                                                        $type = "CREDIT";
                                                    }

                                                    ?>
                                                    <option value="<?php echo $type_id ?>"><?php echo $type ?></option>
                                                    <option value="">--</option>
                                                    <option value="1">DEBIT</option>
                                                    <option value="2">CREDIT</option>

                                                </select>
                                            </td>
                                            <td>
                                                <input type="number" name="install_num[]" class="form-control" value="<?php echo $install_num ?>" required>

                                            </td>
                                            <td>
                                                <input type="number" name="amount[]" class="form-control" value="<?php echo $amount ?>" placeholder="Amount" required>
                                            </td>
                                            <td>
                                                <input placeholder="Due Date" value="<?php echo $due_date_js ?>" name="due_date[]" type="text" class="form-control datepicker" required>
                                            </td>
                                            <td>
                                                <input placeholder="Finish Date" value="<?php echo $finish_date_js ?>" name="finish_date[]" type="text" class="form-control datepicker">
                                            </td>
                                            <td>
                                                <select class="form-control" name="status_ids[]" required>
                                                    <?php
                                                    if ($status_id == "1") {
                                                        $status = "Due";
                                                    } else {
                                                        $status = "Completed";
                                                    }

                                                    ?>
                                                    <option value="<?php echo $type_id ?>"><?php echo $status ?></option>
                                                    <option value="">--</option>
                                                    <option value="1">Due</option>
                                                    <option value="2">Completed</option>

                                                </select>
                                            </td>
                                            <td><textarea name="remark[]" class="form-control" value="<?php echo $remark ?>" maxlength="100" placeholder="Enter Remark"></textarea></td>
                                            <td><button type="button" id="<?php echo $id_ledger ?>" name="remove" class="btn btn-danger remove_prev">X</button></td>


                                        </tr>
                                    <?php
                                    }

                                    ?>
                                </table>
                                <button type="button" name="add" id="add" class="btn btn-success">Add More</button>
                            </div>
                        </div>
                        <input type="submit" name="submit_edit" id="submit" class="mr-2 ml-2 mb-2 btn btn-primary" value="Submit" />

                    </div>

                <?php
                        }
                    }
                    if ($get_name == "Country") { ?>
                <?php
                        if (isset($_POST['final_editcountry'])) {
                            $countryid = $_POST['country_id'];

                            $country_name = $_POST['country_name'];


                            $sql = "UPDATE country_info SET name='$country_name' WHERE id=$countryid";
                            if (mysqli_query($conn, $sql)) {


                                echo '<div class="alert alert-success mt-2">
                    Country Updated
                   </div>';
                            } else {
                                echo '<div class="alert alert-danger mt-2">
                    Fail
                   </div>';
                            }
                        }
                ?>
                <form method="POST">
                    <form method="POST">

                        <div class="row">
                            <div class="col-lg-6 col-md-6">
                                <div class="form-group"> <select class="form-control" name="countryid">
                                        <option value=''>Select Country</option>
                                        <?php

                                        $sql = "SELECT * from country_info";
                                        $run = $conn->query($sql);
                                        while ($row = $run->fetch_assoc()) {
                                            $id = $row['id'];
                                            $name = $row['name'];
                                        ?>
                                            <option value="<?php echo $id; ?>"><?php echo $name; ?></option>

                                        <?php   }


                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6">
                                <button name="editcountry" value="edit" class=" btn  btn-primary ">Open</button>
                            </div>
                        </div>
                    </form>
                    <?php
                        if (isset($_POST['editcountry'])) {
                            $countryid = $_POST['countryid'];
                            $sql = "SELECT name from country_info WHERE id=$countryid";
                            $run = $conn->query($sql);
                            $row = $run->fetch_assoc();
                            $countryname = $row['name'];


                    ?>
                        <form method="POST">
                            <div class="form-group"><label>Country Name</label> <input type="text" class="form-control" value="<?php echo $countryname ?>" name="country_name" required>
                            </div>
                            <input type="hidden" class="form-control" value="<?php echo $countryid ?>" name="country_id" required>



                            <button name="final_editcountry" value="edit" class=" btn  btn-block ">Edit</button>



                        </form>
                    <?php      }
                    }
                    if ($get_name == "Agency") { ?>

                    <?php
                        if (isset($_POST['final_editagency'])) {
                            $agencyid = $_POST['agency_id'];

                            $agency_name = $_POST['agency_name'];


                            $sql = "UPDATE agency_info SET name='$agency_name' WHERE id=$agencyid";
                            if (mysqli_query($conn, $sql)) {


                                echo '<div class="alert alert-success mt-2">
                    Agency Updated
                   </div>';
                            } else {
                                echo '<div class="alert alert-danger mt-2">
                    Fail
                   </div>';
                            }
                        }
                    ?>
                    <form method="POST">


                        <div class="row">
                            <div class="col-lg-6 col-md-6">
                                <div class="form-group"> <select class="form-control" name="agencyid">
                                        <option value=''>Select Agency</option>
                                        <?php

                                        $sql = "SELECT * from agency_info";
                                        $run = $conn->query($sql);
                                        while ($row = $run->fetch_assoc()) {
                                            $id = $row['id'];
                                            $name = $row['name'];
                                        ?>
                                            <option value="<?php echo $id; ?>"><?php echo $name; ?></option>

                                        <?php   }


                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6">
                                <button name="editagency" value="edit" class=" btn  btn-primary ">Open</button>
                            </div>
                        </div>
                    </form>
                    <?php
                        if (isset($_POST['editagency'])) {
                            $agencyid = $_POST['agencyid'];
                            $sql = "SELECT name from agency_info WHERE id=$agencyid";
                            $run = $conn->query($sql);
                            $row = $run->fetch_assoc();
                            $agencyname = $row['name'];


                    ?>
                        <form method="POST">
                            <div class="form-group"><label>Agency Name</label> <input type="text" class="form-control" value="<?php echo $agencyname ?>" name="agency_name" required>
                            </div>
                            <input type="hidden" class="form-control" value="<?php echo $agencyid ?>" name="agency_id" required>



                            <button name="final_editagency" value="edit" class=" btn  btn-block ">Edit</button>



                        </form>
                    <?php      }
                    }

                    if ($get_name == "University") { ?>
                    <?php
                        if (isset($_POST['final_edituniversity'])) {
                            $universityid = $_POST['university_id'];

                            $university_name = $_POST['university_name'];


                            $sql = "UPDATE university_info SET name='$university_name' WHERE id=$universityid";
                            if (mysqli_query($conn, $sql)) {


                                echo '<div class="alert alert-success mt-2">
University Updated
</div>';
                            } else {
                                echo '<div class="alert alert-danger mt-2">
Fail
</div>';
                            }
                        }


                    ?>
                    <form method="POST">
                        <div class="row">
                            <div class="col-lg-3">

                                <select name="country_id" id="country_id" onchange="change_country()" class="form-control" required>
                                    <option value="">Choose Country</option>
                                    <?php require('connectDB.php');
                                    $sql = "SELECT * from country_info ";
                                    $run = $conn->query($sql);
                                    while ($row = $run->fetch_assoc()) {
                                        $name = $row['name'];
                                        $id = $row['id'];
                                    ?>
                                        <option value='<?php echo $id  ?>'><?php echo $name ?></option>


                                    <?php   }

                                    ?>
                                </select>

                            </div>

                            <div class="col-lg-3">

                                <div id="university_id_div">
                                    <select class="form-control" required>
                                        <option value="">Choose University</option>

                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <button name="edituni" value="edit" class=" btn btn-primary btn-block">Open</button>
                            </div>
                        </div>
                    </form>
                    <?php
                        if (isset($_POST['edituni'])) {
                            $universityid = $_POST['university_id'];
                            $sql = "SELECT name from university_info WHERE id=$universityid";
                            $run = $conn->query($sql);
                            $row = $run->fetch_assoc();
                            $universityname = $row['name'];


                    ?>
                        <br>
                        <form method="POST">
                            <div class="form-group"><label>University Name</label> <input type="text" class="form-control" value="<?php echo $universityname ?>" name="university_name" required>
                            </div>
                            <input type="hidden" class="form-control" value="<?php echo $universityid ?>" name="university_id" required>



                            <button name="final_edituniversity" value="edit" class=" btn  btn-block ">Edit</button>



                        </form>
                    <?php      }
                    }
                    if ($get_name == "Campus") {
                    ?>
                    <?php

                        if (isset($_POST['final_editcampus'])) {
                            $campusid = $_POST['campus_id'];

                            $campus_name = $_POST['campus_name'];


                            $sql = "UPDATE campus_info SET name='$campus_name' WHERE id=$campusid";
                            if (mysqli_query($conn, $sql)) {


                                echo '<div class="alert alert-success mt-2">
Campus Updated
</div>';
                            } else {
                                echo '<div class="alert alert-danger mt-2">
Fail
</div>';
                            }
                        }

                    ?>
                    <form method="POST">
                        <div class="row">
                            <div class="col-lg-3">

                                <select name="country_id" id="country_id" onchange="change_country()" class="form-control" required>
                                    <option value="">Choose Country</option>
                                    <?php require('connectDB.php');
                                    $sql = "SELECT * from country_info ";
                                    $run = $conn->query($sql);
                                    while ($row = $run->fetch_assoc()) {
                                        $name = $row['name'];
                                        $id = $row['id'];
                                    ?>
                                        <option value='<?php echo $id  ?>'><?php echo $name ?></option>


                                    <?php   }

                                    ?>
                                </select>

                            </div>
                            <div class="col-lg-3">

                                <div id="university_id_div">
                                    <select class="form-control" required>
                                        <option value="">Choose University</option>

                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div id="campus_id_div">
                                    <select class="form-control" required>
                                        <option value="">Select Campus</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <button name="editcampus" value="edit" class="btn btn-primary btn-block">Open</button>
                            </div>

                    </form>
                    <?php
                        if (isset($_POST['editcampus'])) {
                            $campusid = $_POST['campus_id'];
                            $sql = "SELECT name from campus_info WHERE id=$campusid";
                            $run = $conn->query($sql);
                            $row = $run->fetch_assoc();
                            $campusname = $row['name'];


                    ?>

        </div>
        <br>
        <form method="POST">
            <div class="form-group"><label>Campus Name</label> <input type="text" class="form-control" value="<?php echo $campusname ?>" name="campus_name" required>
            </div>
            <input type="hidden" class="form-control" value="<?php echo $campusid ?>" name="campus_id" required>



            <button name="final_editcampus" value="edit" class=" btn  btn-block ">Edit</button>



        </form>
    <?php      }
                    }

                    if ($get_name == "Access") {
                        if (isset($_POST['finaledit'])) {
                            $powers = array_unique($_POST['powers']);
                            $name = $_POST['name'];
                            $pass = $_POST['pass'];
                            $username = $_POST['username'];

                            $adminid = $_POST['adminid'];
                            $role = $_POST['role'];
                            $sql = "UPDATE web_login SET name='$name',password='$pass',username='$username',role='$role'  WHERE id=$adminid ";
                            if (mysqli_query($conn, $sql)) {
                                $s1 = "DELETE FROM access_web_login WHERE adminid=$adminid";
                                if (mysqli_query($conn, $s1)) {
                                    $flag = 0;
                                    foreach ($powers as $formid) {
                                        $s3 = "INSERT INTO access_web_login VALUES($adminid,$formid)";
                                        if (mysqli_query($conn, $s3)) {
                                            $flag = 1;
                                        } else {
                                            $flag = 0;
                                        }
                                    }
                                    echo '<div class="alert alert-success mt-2">
        Access Editted
        </div>';
                                }
                            }
                        }
    ?>

    <form method="POST">

        <div class="row">
            <div class="col-lg-6 col-md-6">
                <div class="form-group"> <select class="form-control" name="adminid" required>
                        <option value=''>--Select--</option>
                        <?php require('connectDB.php');
                        $sql = "SELECT id,name from web_login";
                        $run = $conn->query($sql);
                        while ($row = $run->fetch_assoc()) {
                            $id = $row['id'];
                            $name = $row['name'];
                        ?>
                            <option value="<?php echo $id; ?>"><?php echo $name; ?></option>

                        <?php   }


                        ?>
                    </select>
                </div>
            </div>
            <div class="col-lg-6 col-md-6">
                <button name="editaccess" value="Add" class=" btn  btn-primary ">Open</button>
            </div>
        </div>
    </form>
    <?php
                        if (isset($_POST['editaccess'])) {
                            $adminid = $_POST['adminid'];
                            $sql = "SELECT name,password,username,role from web_login WHERE id=$adminid ";
                            $run = $conn->query($sql);
                            $row = $run->fetch_assoc();
                            $name = $row['name'];
                            $pass = $row['password'];
                            $username = $row['username'];
                           
                            $role = $row['role'];
    ?>
        <form method="POST">
            <div class="form-group">
                <label>Name</label>
                <input type="text" class="form-control" value="<?php echo $name ?>" name="name" required>
            </div>
            <input type="hidden" class="form-control" value="<?php echo $adminid ?>" name="adminid" required>
            <div class="form-group">
                <label>Username</label>
                <input type="text" class="form-control" value="<?php echo $username ?>" name="username" required>
            </div>


            <div class="form-group">
                <label>Password</label>
                <input type="text" class="form-control" value="<?php echo $pass ?>" name="pass" required>
            </div>


            <div class="form-group">
                <label>Role</label>
                <select name="role" class="form-control" required>

                    <option value='<?php echo $role  ?>' selected><?php echo $role ?></option>


                    <option value="">----</option>
                    <option value="Admin">Admin</option>

                    <option value="User">User</option>


                </select></div>



            <div class="form-group">
                <label>Powers</label>
                <select name="powers[]" class="choices-multiple-remove-button" multiple required>
                    <?php require('connectDB.php');
                            $sql = "SELECT formid from access_web_login WHERE adminid=$adminid";
                            $run = $conn->query($sql);
                            while ($row = $run->fetch_assoc()) {

                                $formid = $row['formid'];
                                $s1 = "SELECT name from form WHERE id=$formid";
                                $run1 = $conn->query($s1);
                                $row1 = $run1->fetch_assoc();
                                $formname = $row1['name'];
                    ?>
                        <option value='<?php echo $formid  ?>' selected><?php echo $formname ?></option>


                    <?php   } ?>


                    <?php $sql = "SELECT * from form";
                            $run = $conn->query($sql);
                            while ($row = $run->fetch_assoc()) {
                                $formname1 = $row['name'];
                                $formid1 = $row['id'];
                    ?>
                        <option value='<?php echo $formid1  ?>'><?php echo $formname1 ?></option>


                    <?php   }

                    ?>

                    ?>
                </select></div>
            <button name="finaledit" value="Add" class=" btn  btn-block ">Submit</button>
        </form>

<?php
                        }
                    }
?>
    </div>
    </div>
    </div>
    </div>

    <script>
        $(document).ready(function() {
            var i = 1;
            $('#add').click(function() {
                i++;
                $('#dynamic_field').append('<tr id="row' + i + '"><td> <select class="form-control" name="agency_id[]" required> <option value="">Select Agency</option> <?php $sql1 = "SELECT * from agency_info";
                                                                                                                                                                            $results = $conn->query($sql1);
                                                                                                                                                                            while ($rs = $results->fetch_assoc()) { ?> <option value="<?php echo $rs["id"]; ?>"><?php echo $rs["name"]; ?></option> <?php } ?> </select></td><td><select class="form-control" name="type_id[]" required> <option value="">Select Type</option> <option value="1">DEBIT</option> <option value="2">CREDIT</option></select></td><td>  <input type="number" name="install_num[]" class="form-control" placeholder="Installment" required></td><td><input type="number" name="amount[]" class="form-control" placeholder="Amount" required></td><td><input placeholder="Due Date" name="due_date[]" type="text" class="form-control datepicker" required></td> <td><input placeholder="Finish Date"  name="finish_date[]" type="text" class="form-control datepicker" ></td><td><select class="form-control" name="status_ids[]" required> <option value="">Select Status</option> <option value="1">Due</option> <option value="2">Completed</option></select></td> <td><textarea name="remark[]" class="form-control" maxlength="100" placeholder="Enter Remark"></textarea></td><td><button type="button" name="remove" id="' + i + '" class="btn btn-danger btn_remove">X</button></td></tr>');
                $(".datepicker").datepicker({
                    changeMonth: true,
                    changeYear: true,
                    yearRange: '-100:+100'
                });
            });

            $(document).on('click', '.btn_remove', function() {
                var button_id = $(this).attr("id");
                $('#row' + button_id + '').remove();
            });
            $(document).on('click', '.remove_prev', function() {
                var button_id = $(this).attr("id");
                $('#prev' + button_id + '').remove();
            });

        });
    </script>

    <script>
        $(document).ready(function() {

            $('input[type=number][max]:not([max=""])').on('input', function(ev) {
                var $this = $(this);
                var maxlength = $this.attr('max').length;
                var value = $this.val();
                if (value && value.length >= maxlength) {
                    $this.val(value.substr(0, maxlength));
                }
            });

        });
    </script>

    <script>
        $(function() {
            $('#semester').datepicker({
                changeMonth: true,
                changeYear: true,
                showButtonPanel: true,
                dateFormat: 'MM yy',
                onClose: function(dateText, inst) {
                    $(this).datepicker('setDate', new Date(inst.selectedYear, inst.selectedMonth, 1));
                }
            });
        });
    </script>


    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>
    <script src="select.js"></script>

</body>

</html>