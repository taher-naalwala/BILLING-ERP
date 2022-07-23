<?php
ini_set('display_errors', 0);
error_reporting(E_ERROR | E_WARNING | E_PARSE);
date_default_timezone_set('Asia/Kolkata');

session_start();
if (isset($_SESSION['varname'])) {
    require('connectDB.php');
    $get_name = $_GET['name'];
} else {
    header("Location: login.php");
    die();
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <style>

    </style>


    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="/resources/demos/style.css">

    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <script src="https://use.fontawesome.com/3582a84b00.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php $name_e = $get_name;

            $first_index = stripos($name_e, "(") + 1;
            echo $name = substr($name_e, 0, $first_index - 2);
            ?></title>
    <style>
        .btn-block {
            background-color: #4e73df;
        }

        .btn {
            color: #fff;
        }
    </style>
</head>

<body id="page-top">
    <div id="wrapper">
        <?php
        require('style.php');
        require('connectDB.php');
        ?>

        <div class="container-fluid">
            <!-- DataTales Example -->
            <div class="row">
                <div class="col-lg-8">


                    <div class="card shadow mb-4 ">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary"> <?php echo "Info" ?></h6>
                        </div>
                        <div class="card-body">


                            <?php
                            $s_id_e = substr($name_e, $first_index);
                            $s_id = rtrim($s_id_e, ") ");
                            $sql = "SELECT dob,fees,commission,country_id,university_id,campus_id,student_id,visa_number,course,semester,status from student_info WHERE id=$s_id";
                            $run = $conn->query($sql);
                            $row = $run->fetch_assoc();
                            $dob = $row['dob'];
                            $fess = $row['fees'];
                            $commission = $row['commission'];
                            $country_id = $row['country_id'];
                            $university_id = $row['university_id'];
                            $campus_id = $row['campus_id'];
                            $student_id = $row['student_id'];
                            $visa_number = $row['visa_number'];
                            $course = $row['course'];
                            $semester = $row['semester'];
                            $status_id = $row['status'];
                            $s4 = "SELECT name from country_info WHERE id=$country_id";
                            $run4 = $conn->query($s4);
                            $row4 = $run4->fetch_assoc();
                            $country_name = $row4['name'];
                            $s41 = "SELECT name from university_info WHERE id=$university_id";
                            $run41 = $conn->query($s41);
                            $row41 = $run41->fetch_assoc();
                            $university_name = $row41['name'];
                            $s4 = "SELECT name from campus_info WHERE id=$campus_id";
                            $run4 = $conn->query($s4);
                            $row4 = $run4->fetch_assoc();
                            $campus_name = $row4['name'];

                            $s1 = "SELECT photo_path,visa_path from photo_db WHERE s_id=$s_id";
                            $run1 = $conn->query($s1);
                            $row1 = $run1->fetch_assoc();
                            $profile_path = $row1['photo_path'];
                            $visa_path = $row1['visa_path'];

                            ?>


                            <label><b>Country: </b><?php echo $country_name ?></label>
                            <br>
                            <label><b>University: </b><?php echo $university_name ?></label>
                            <br>
                            <label><b>Campus: </b><?php echo $campus_name ?></label>
                            <hr>
                            <label><b>Date of Birth: </b><?php echo $dob ?></label>
                            <br>
                            <label><b>Student ID: </b><?php echo $student_id ?></label>
                            <br>
                            <label><b>Visa Number: </b><?php echo $visa_number ?></label>
                            <br>
                            <label><b>Course: </b><?php echo $course ?></label>
                            <br>
                            <label><b>Semester: </b><?php echo $semester ?></label>
                            <br>
                            <label><b>Fees: </b><?php echo $fess ?></label>
                            <br>
                            <label><b>Commission: </b><?php echo $commission ?></label>
                            <br>

                            <hr>


                        </div>
                    </div>

                    <div class="card shadow mb-4 ">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary"> <?php echo "Ledger" ?></h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table border=1 id="dataTable" class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Agency</th>
                                            <th>Type</th>
                                            <th>Installment</th>
                                            <th>Amount</th>
                                            <th>Amount Received</th>
                                            <th>Due Date</th>
                                            <th>Finish Date</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $s2 = "SELECT id,agency_id,type,install_num,amount,due_date,finish_date,status from ledger WHERE student_id=$s_id";
                                        $run = $conn->query($s2);
                                        while ($row = $run->fetch_assoc()) {
                                            $agency_id = $row['agency_id'];
                                            $ledger_id = $row['id'];
                                            $s4 = "SELECT name from agency_info WHERE id=$agency_id";
                                            $run4 = $conn->query($s4);
                                            $row4 = $run4->fetch_assoc();
                                            $agency_name = $row4['name'];
                                            $type = $row['type'];
                                            if ($type == "1") {
                                                $type_name = "DEBIT";
                                            } else {
                                                $type_name = "CREDIT";
                                            }
                                            $install_num = $row['install_num'];
                                            $amount = $row['amount'];
                                            $due_date = $row['due_date'];
                                            $finish_date = $row['finish_date'];
                                            $status = $row['status'];
                                            $s2 = "SELECT amount from ledger2 WHERE ledger_id=$ledger_id";
                                            $run2 = $conn->query($s2);
                                            $final_amount = 0;
                                            while ($row2 = $run2->fetch_assoc()) {
                                                $amount = $row2['amount'];
                                                $final_amount = $final_amount + $amount;
                                            }
                                        ?>
                                        <tr>

                                            <td> <a href="#" data-toggle="modal" data-target="#exampleModal<?php echo $ledger_id ?>">
                                                    <?php echo $agency_name ?>
                                                    </a< /td>
                                            <td><?php echo $type_name ?></td>
                                            <td><?php echo $install_num ?></td>
                                            <td><?php echo $amount ?></td>
                                            <td><?php echo $final_amount ?></td>
                                            <td><?php echo $due_date ?></td>
                                            <td><?php echo $finish_date ?></td>
                                            <td class="text-center" style="<?php
                                                                            if ($status == "1") {
                                                                                echo "background-color: red";
                                                                            } else {
                                                                                echo "background-color: green";
                                                                            }
                                                                            ?>;color:white"><?php if ($status == "1") {
                                                                                                echo "Due";
                                                                                            } else {
                                                                                                echo "Completed";
                                                                                            } ?></td>
                                                                                            </tr>

                                        <?php

                                        }
                                        ?>


                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
                <?php
                $s2 = "SELECT id,agency_id from ledger WHERE student_id=$s_id";
                $run = $conn->query($s2);
                while ($row = $run->fetch_assoc()) {
                    $agency_id = $row['agency_id'];
                    $ledger_id = $row['id'];
                    $s4 = "SELECT name from agency_info WHERE id=$agency_id";
                    $run4 = $conn->query($s4);
                    $row4 = $run4->fetch_assoc();
                    $agency_name = $row4['name'];
                    $s1 = "SELECT amount, finish_date from ledger2 WHERE ledger_id=$ledger_id";

                ?>
                    <div class="modal fade" id="exampleModal<?php echo $ledger_id ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel"><?php echo $agency_name ?></h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div class="table-responsive">
                                        <table border=1 class="table table-bordered">
                                            <thead>
                                                <tr>
                                                    <th>Amount</th>
                                                    <th>Date</th>

                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $run1 = $conn->query($s1);
                                                while ($row1 = $run1->fetch_assoc()) {
                                                    $amount = $row1['amount'];
                                                    $finish_date = $row1['finish_date'];
                                                ?>
                                                    <tr>
                                                        <td><?php echo $amount ?></td>
                                                        <td><?php echo $finish_date ?></td>
                                                    </tr>

                                                <?php
                                                }

                                                ?>
                                            </tbody>
                                        </table>
                                    </div>

                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

                                </div>
                            </div>
                        </div>
                    </div>
                <?php

                }
                ?>
                <div class="col-lg-4">
                    <?php
                    if ($profile_path != "") {
                    ?>
                        <div class="card" style="width: 20rem;">
                            <div class="card-header py-3">
                                <h6 class="m-0 font-weight-bold text-primary"> <?php echo $name ?></h6>
                            </div>
                            <img loading="lazy" src="<?php echo $profile_path ?>" class="card-img-top" alt="profile_photo">
                            <a target="_blank" class="text-center" href="<?php echo $profile_path ?>">View</a>
                            <div class="card-footer text-center" style="<?php
                                                                        if ($status == "1") {
                                                                            echo "background-color: red";
                                                                        } else {
                                                                            echo "background-color: green";
                                                                        }
                                                                        ?>;color:white"><?php if ($status == "1") {
                                                                                            echo "Payment Due";
                                                                                        } else {
                                                                                            echo "Payment Completed";
                                                                                        } ?>
                            </div>

                        </div>

                    <?php
                    }
                    if ($visa_path != "") {
                    ?>
                        <div class="card mt-4" style="width: 20rem;">
                            <div class="card-header py-3">
                                <h6 class="m-0 font-weight-bold text-primary"> <?php echo "Visa" ?></h6>
                            </div>
                            <img loading="lazy" src="<?php echo $visa_path ?>" class="card-img-top" alt="visa_photo">
                            <a target="_blank" class="text-center" href="<?php echo $visa_path ?>">View</a>

                        </div>
                    <?php
                    }
                    ?>

                </div>
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

</body>

</html>