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
        if ($formid == "33" || $formid == "31") {
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

    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>

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
    <title>Ledger Report</title>
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
                    <h6 class="m-0 font-weight-bold text-primary">Ledger Report</h6>
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

                    <form method="GET">
                        <div class="row">
                            <div class="col-lg-3">
                                <select id="type_id" class="form-control" name="type_id" required>
                                    <option value="">Select Type</option>


                                    <option value='0'>Both</option>
                                    <option value='1'>Debit</option>
                                    <option value='2'>Credit</option>

                                </select>
                            </div>
                            <div class="col-lg-3">
                                <select class="form-control" name="agency_id" required>
                                    <option value="">Select Agency</option>

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
                                <input name="daterange" id="daterange" class="form-control" />
                                <script>
                                    $(function() {
                                        $('input[name="daterange"]').daterangepicker({
                                            opens: 'left'
                                        }, function(start, end, label) {
                                            console.log("A new date selection was made: " + start.format('YYYY-MM-DD') + ' to ' + end.format('YYYY-MM-DD'));
                                        });
                                    });
                                </script>
                            </div>

                            <button class="btn btn-primary ml-2" value="sub" name="sub">Submit</button>


                        </div>

                    </form>
                </div>
            </div>
            <?php
            if (isset($_GET['sub'])) {
                $type_id = $_GET['type_id'];
                $agency_id = $_GET['agency_id'];
                $s2 = "SELECT name from agency_info WHERE id=$agency_id";
                $run2 = $conn->query($s2);
                $row2 = $run2->fetch_assoc();
                $agency_name = $row2['name'];
                $range = $_GET['daterange'];
                list($first, $second) = explode('-', $range);

                list($f_m, $f_d, $f_y) = explode('/', $first);
                $f_first0 = $f_y . "-" . $f_m . "-" . $f_d;
                $f_first = str_replace(' ', '', $f_first0);

                list($s_m, $s_d, $s_y) = explode('/', $second);
                $f_second0 = $s_y . "-" . $s_m . "-" . $s_d;
                $f_second = str_replace(' ', '', $f_second0);

                if ($type_id == 0) {
                    $sql = "SELECT student_id,id,amount,status,type,finish_date,date,time from ledger2 WHERE agency_id=$agency_id AND (finish_date>='$f_first' AND finish_date<='$f_second') ORDER BY finish_date ASC";
                } else {
                    $sql = "SELECT student_id,id,amount,status,type,finish_date,date,time from ledger2 WHERE type=$type_id AND  agency_id=$agency_id AND (finish_date>='$f_first' AND finish_date<='$f_second') ORDER BY finish_date ASC";
                }
                $run = $conn->query($sql);
                if ($run->num_rows > 0) {
            ?>
                    <div class="card shadow mb-4 ">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary"><?php echo $agency_name ?></h6>
                        </div>

                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-4">
                                    <div class="alert alert-info mt-2">
                                        Type : <?php if ($type_id == 0) {
                                               echo "BOTH";
                                            } else if ($type_id == 1) {
                                                echo "DEBIT";
                                            } else {
                                                echo "CREDIT";
                                            } ?>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="alert alert-info mt-2">
                                        Daterange : <?php echo $range ?>
                                    </div>
                                </div>
                            </div>
                            <div class="table-responsive">
                                <table border=1 id="dataTable" class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Student</th>
                                            <th>Amount</th>
                                            <th>Type</th>
                                            <th>Date</th>
                                            <th>Timestamp</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        while ($row = $run->fetch_assoc()) {
                                            $ledger_id = $row['id'];
                                            $student_id = $row['student_id'];
                                            $s1 = "SELECT name from student_info WHERE id=$student_id";
                                            $run1 = $conn->query($s1);
                                            $row1 = $run1->fetch_assoc();
                                            $name = $row1['name'];
                                            $amount = $row['amount'];
                                            if ($type_id == 0) {
                                                $t = $row['type'];
                                                if ($t == 1) {
                                                    $type = "DEBIT";
                                                } else {
                                                    $type = "CREDIT";
                                                }
                                            } else if ($type_id == 1) {
                                                $type = "DEBIT";
                                            } else {
                                                $type = "CREDIT";
                                            }
                                            $finish_date = $row['finish_date'];
                                            $date = $row['date'];
                                            $time = $row['time'];
                                            $timestamp = $date . ";" . $time;
                                            $status_id = $row['status'];
                                            if ($status_id == 1) {
                                                $status = "Partial Payment";
                                            } else {
                                                $status = "Completed";
                                            }
                                            $s0 = "SELECT photo_path from photo_db WHERE s_id=$student_id";
                                            $run0 = $conn->query($s0);
                                            $row0 = $run0->fetch_assoc();
                                            $profile_path = $row0['photo_path'];
                                            $href = $name . " (" . $student_id . ")";
                                        ?>
                                            <tr>
                                                <td><?php echo $ledger_id ?></td>
                                                <td><?php echo '<div><a name="' . $name . '" class="Profile_Image"  target="_blank" data-image="' . $profile_path . '" href="search_student.php?name=' . $href . '">' . $name . "</a></div>"; ?></td>
                                                <td><?php echo $amount ?></td>
                                                <td><?php echo $type ?></td>
                                                <td><?php echo $finish_date ?></td>
                                                <td><?php echo $timestamp ?></td>
                                                <td><?php echo $status ?></td>

                                            </tr>
                                        <?php

                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
            <?php
                }
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