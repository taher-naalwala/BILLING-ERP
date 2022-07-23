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
        if ($formid == "19" || $formid == "31") {
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
        $(function() {
            $(".datepicker").datepicker();
        });
    </script>
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
                    <form method="GET">
                        <div class="search-box">

                            <input class="form-control" name="name" type="text" autocomplete="off" placeholder="Search Student..." />

                            <div class="result"></div>
                        </div>

                        <button class="btn btn-primary ml-2" value="sub" name="sub">Submit</button>




                    </form>
                </div>
            </div>
            <?php
            if (isset($_GET['sub'])) {
            ?>
                <div class="card shadow mb-4 ">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary"> <?php
                                                                        $name_e = $_GET['name'];

                                                                        $first_index = stripos($name_e, "(") + 1;
                                                                        echo $name = substr($name_e, 0, $first_index - 2);

                                                                        ?></h6>
                    </div>
                    <div class="card-body">

                        <br>
                        <?php
                        $s_id_e = substr($name_e, $first_index);
                        $s_id = rtrim($s_id_e, ") ");
                        $sql = "SELECT id,agency_id,type,amount,due_date,install_num from ledger WHERE status=1 AND student_id=$s_id ORDER BY due_date ASC";
                        ?>

                        <div class="table-responsive">
                            <table border=1 id="dataTable" class="table table-bordered">
                                <thead>
                                    <tr>

                                        <th>Agency</th>
                                        <th>Type</th>
                                        <th>Installment</th>
                                        <th>Amount</th>
                                        <th>Due Date</th>
                                        <th>Remark</th>
                                        <th>Date</th>
                                        <th>Partial Payment</th>

                                        <th>Complete</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $run = $conn->query($sql);


                                    while ($row = $run->fetch_assoc()) {

                                        $ledger_id = $row['id'];


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
                                        $s1 = "SELECT amount from ledger2 WHERE ledger_id=$ledger_id";
                                        $run1 = $conn->query($s1);
                                        $total_paid_amount = 0;
                                        while ($row1 = $run1->fetch_assoc()) {
                                            $paid_amount = $row1['amount'];
                                            $total_paid_amount = $total_paid_amount + $paid_amount;
                                        }
                                        $final_amount = $amount - $total_paid_amount;
                                        $due_date = $row['due_date'];
                                        $install_num = $row['install_num'];
                                    ?>

                                        <tr>

                                            <form method="POST">
                                                <td><?php echo $agency_name ?></td>
                                                <td><?php echo $type ?></td>
                                                <td><?php echo $install_num ?></td>
                                                <input class="form-control" type="hidden" name="type" value="<?php echo $type_id ?>" required>
                                                <input class="form-control" type="hidden" name="agency_id" value="<?php echo $agency_id ?>" required>
                                                <td><input class="form-control" type="number" name="amount" value="<?php echo $final_amount ?>" required></td>
                                                <td><?php echo $due_date ?></td>
                                                <td><textarea name="remark" class="form-control" maxlength="100" placeholder="Enter Remark (100 Characters Only)"></textarea></td>
                                                <td><input placeholder="Date" name="date" type="text" class="form-control datepicker" required></td>
                                                <td><button name="partial" class="btn btn-primary" value="<?php echo $ledger_id ?>">Submit</button></td>
                                                <td><button name="complete" class="btn btn-success" value="<?php echo $ledger_id ?>">Complete</button></td>

                                            </form>
                                        </tr>

                                    <?php
                                    }


                                    ?>
                                    <?php
                                    if (isset($_POST['partial'])) {
                                        $ledger_id = $_POST['partial'];
                                        $name_e = $_GET['name'];
                                        $date = $_POST['date'];
                                        list($f_m_, $f_d_, $f_y_) = explode('/', $date);
                                        $f_first0_ = $f_y_ . "-" . $f_m_ . "-" . $f_d_;
                                        $final_date = str_replace(' ', '', $f_first0_);

                                        $first_index = stripos($name_e, "(") + 1;

                                        $s_id_e = substr($name_e, $first_index);
                                        $s_id = rtrim($s_id_e, ") ");

                                        $remark = $_POST['remark'];
                                        $amount = $_POST['amount'];
                                        $agency_id = $_POST['agency_id'];
                                        $type = $_POST['type'];

                                        date_default_timezone_set('Asia/Kolkata');

                                        $ledger_date = date('Y-m-d');
                                        $ledger_time = date(" h:i:s A");
                                        $sql = "INSERT INTO ledger2 VALUES('',$ledger_id,$s_id,$agency_id,$type,'$amount','$ledger_date','$ledger_time','$remark','$final_date',1)";
                                        if (mysqli_query($conn, $sql)) {
                                            echo '<div class="alert alert-success mt-2" role="alert">
                                           Success
                                           </div>';
                                        } else {
                                            echo '<div class="alert alert-danger mt-2" role="alert">
                                            Fail
                                           </div>';
                                        }
                                    }
                                    ?>
                                    <?php
                                    if (isset($_POST['complete'])) {
                                        $ledger_id = $_POST['complete'];
                                        $name_e = $_GET['name'];

                                        $first_index = stripos($name_e, "(") + 1;

                                        $s_id_e = substr($name_e, $first_index);
                                        $s_id = rtrim($s_id_e, ") ");

                                        $remark = $_POST['remark'];
                                        $amount = $_POST['amount'];
                                        $agency_id = $_POST['agency_id'];
                                        $type = $_POST['type'];
                                        $date0 = $_POST['date'];
                                        list($f_m_, $f_d_, $f_y_) = explode('/', $date0);
                                        $f_first0_ = $f_y_ . "-" . $f_m_ . "-" . $f_d_;
                                       $final_date = str_replace(' ', '', $f_first0_);


                                        date_default_timezone_set('Asia/Kolkata');

                                        $ledger_date = date('Y-m-d');
                                        $ledger_time = date(" h:i:s A");
                                        $sql = "INSERT INTO ledger2 VALUES('',$ledger_id,$s_id,$agency_id,$type,'$amount','$ledger_date','$ledger_time','$remark','$final_date',2)";
                                        if (mysqli_query($conn, $sql)) {
                                            $s1 = "UPDATE ledger SET status=2,remark='$remark' WHERE id=$ledger_id";
                                            if (mysqli_query($conn, $s1)) {
                                                echo '<div class="alert alert-success mt-2" role="alert">
                                           Success
                                           </div>';
                                            } else {
                                                echo '<div class="alert alert-danger mt-2" role="alert">
                                                Fail
                                               </div>';
                                            }
                                        }
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>



                    </div>
                </div>
            <?php
            }
            ?>
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