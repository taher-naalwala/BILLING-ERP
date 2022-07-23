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
            if ($formid == "4" || $formid == "1") {
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
            if ($formid == "8" || $formid == "5") {
                $flag = 1;
            }
        }
        if ($flag == 0) {
            header('Location:main.php');
            exit();
        }
    }
    if ($_GET['name'] == "Photo") {
        $forms_access = $_SESSION['forms_access'];
        $flag = 0;
        foreach ($forms_access as $formid) {
            if ($formid == "27" || $formid == "30") {
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
            if ($formid == "12" || $formid == "9") {
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
            if ($formid == "16" || $formid == "13") {
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
            if ($formid == "21" || $formid == "17") {
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
            if ($formid == "25" || $formid == "22") {
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
    <title>Delete <?php echo $get_name;  ?></title>
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
                    <h6 class="m-0 font-weight-bold text-primary">Delete <?php echo $get_name  ?></h6>
                </div>
                <div class="card-body">

                    <?php
                    if ($get_name == "Entry") {
                        if (isset($_POST['sub'])) {
                           
                            $name_e = $_POST['name'];

                            $first_index = stripos($name_e, "(") + 1;
                            $s_id_e = substr($name_e, $first_index);
                            $s_id = rtrim($s_id_e, ") ");
                            $sql = "DELETE FROM student_info WHERE id=$s_id";
                            if (mysqli_query($conn, $sql)) {
                                $s1 = "DELETE FROM ledger WHERE student_id=$s_id";
                                if (mysqli_query($conn, $s1)) {


                                    echo '<div class="alert alert-success mt-2">
                    Entry Deleted
                   </div>';
                                } else {
                                    echo '<div class="alert alert-danger mt-2">
                    Fail
                   </div>';
                                }
                            }
                        }

                    ?>
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
                        <form method="POST">
                            <div class="search-box">

                                <input class="form-control" name="name" type="text" autocomplete="off" placeholder="Search Student..." />

                                <div class="result"></div>
                            </div>

                            <button class="btn btn-primary ml-2" value="sub" name="sub">Delete</button>




                        </form>
                    <?php
                    }
                    if ($get_name == "Country") { ?>
                        <?php
                        if (isset($_POST['removecountry'])) {
                            $countryid = $_POST['countryid'];


                            $sql = "DELETE FROM country_info WHERE id=$countryid";
                            if (mysqli_query($conn, $sql)) {


                                echo '<div class="alert alert-success mt-2">
                    Country Deleted
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
                                    <button name="removecountry" value="edit" class=" btn  btn-primary ">Delete</button>
                                </div>
                            </div>
                        </form>
                    <?php
                    }
                    if ($get_name == "Agency") { ?>
                        <?php
                        if (isset($_POST['deleteagency'])) {
                            $agencyid = $_POST['agencyid'];



                            $sql = "DELETE FROM agency_info  WHERE id=$agencyid";
                            if (mysqli_query($conn, $sql)) {


                                echo '<div class="alert alert-success mt-2">
                Agency Deleted
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
                                    <button name="deleteagency" value="edit" class=" btn  btn-primary ">Delete</button>
                                </div>
                            </div>
                        </form>
                    <?php
                    }




                    if ($get_name == "University") { ?>
                        <?php

                        if (isset($_POST['deleteuni'])) {
                            $university_id = $_POST['university_id'];


                            $sql = "DELETE FROM university_info WHERE id=$university_id";
                            if (mysqli_query($conn, $sql)) {


                                echo '<div class="alert alert-success mt-2">
University Deleted
</div>';
                            } else {
                                echo '<div class="alert alert-danger mt-2">
Fail
</div>';
                            }
                        }
                        ?>
                        <form method="POST">

                            <div class="form-group">

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

                            <div class="form-group">

                                <div id="university_id_div">
                                    <select class="form-control" required>
                                        <option value="">Choose University</option>

                                    </select>
                                </div>
                            </div>

                            <button name="deleteuni" value="edit" class=" btn btn-primary btn-block">Delete</button>

                </div>
                </form>

            <?php   }
                    if ($get_name == "Campus") {
            ?>
                <?php
                        if (isset($_POST['deletecampus'])) {
                            $campusid = $_POST['campus_id'];


                            $sql = "DELETE FROM campus_info  WHERE id=$campusid";
                            if (mysqli_query($conn, $sql)) {


                                echo '<div class="alert alert-success mt-2">
Campus Deleted
</div>';
                            } else {
                                echo '<div class="alert alert-danger mt-2">
Fail
</div>';
                            }
                        }
                ?>
                <form method="POST">

                    <div class="form-group">

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
                    <div class="form-group">

                        <div id="university_id_div">
                            <select class="form-control" required>
                                <option value="">Choose University</option>

                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <div id="campus_id_div">
                            <select class="form-control" required>
                                <option value="">Select Campus</option>
                            </select>
                        </div>
                    </div>

                    <button name="deletecampus" value="edit" class="btn btn-primary btn-block">Delete</button>

                </form>
            <?php }
                    if ($get_name == "Access") { ?>

                <?php
                        if (isset($_POST['deleteaccess'])) {
                            $admin_id = $_POST['adminid'];


                            $sql = "DELETE FROM web_login  WHERE id=$admin_id";
                            if (mysqli_query($conn, $sql)) {
                                $s1 = "DELETE FROM access_web_login WHERE adminid=$admin_id";
                                if (mysqli_query($conn, $s1)) {


                                    echo '<div class="alert alert-success mt-2">
Admin Deleted
</div>';
                                } else {
                                    echo '<div class="alert alert-danger mt-2">
Fail
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
                            <button name="deleteaccess" value="Add" class=" btn  btn-primary ">Delete</button>
                        </div>
                    </div>
                </form>
            <?php
                    }
                    if ($get_name == "Photo") {

                        if(isset($_POST['sub']))
                        {
                           
                            $name_e = $_POST['name'];

                            $first_index = stripos($name_e, "(") + 1;
                            $s_id_e = substr($name_e, $first_index);
                            $s_id = rtrim($s_id_e, ") ");
                            $type_id=$_POST['type_id'];
                            if($type_id=="1")
                            {
                                $sql="UPDATE photo_db SET photo_path='' WHERE s_id=$s_id";
                                if(mysqli_query($conn,$sql))
                                {
                                    echo '<div class="alert alert-success mt-2">
                                    Photo Deleted
                                    </div>';
                                }
                            }
                            else
                            {
                                $sql="UPDATE photo_db SET visa_path='' WHERE s_id=$s_id";
                                if(mysqli_query($conn,$sql))
                                {
                                    echo '<div class="alert alert-success mt-2">
                                    Photo Deleted
                                    </div>';

                                }
                            }
                        }
            ?>
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
                <form method="POST">

                    <div class="row">
                        <div class="col-lg-4">
                            <div class="search-box">

                                <input class="form-control" name="name" type="text" autocomplete="off" placeholder="Search Student..." required />

                                <div class="result"></div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <select name="type_id" class="form-control" required>
                                <option value="">Select Type</option>
                                <option value="1">Student Image</option>
                                <option value="2">Visa Image</option>
                                
                            </select>

                        </div>
                        <div class="col-lg-4">

                            <button class="btn btn-primary ml-2" value="sub" name="sub">Delete</button>
                        </div>
                    </div>
                </form>

            </div>
        </div>


        </form>
    <?php
                    }


    ?>

    </div>
    </div>



    </div>
    </div>
    </div>
    </div>

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