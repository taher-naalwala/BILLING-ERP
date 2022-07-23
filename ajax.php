<?php require('connectDB.php');
ini_set('display_errors', 0);
error_reporting(E_ERROR | E_WARNING | E_PARSE);
session_start();


if (isset($_GET["country_id"])) {
    $country_id = $_GET['country_id'];

    $sql = "SELECT id,name from university_info WHERE country_id=$country_id";
    $run = $conn->query($sql);

    echo "<select class='form-control' name='university_id' id='university_id' onchange='change_university()' required><option value=''>Select University</option>";

    while ($row = mysqli_fetch_array($run)) {

        echo "<option value='$row[id]'>";
        echo $row['name'];
        echo "</option>";
    }
    echo "</select><br>";
}


if (isset($_GET["university_id"])) {
    $university_id = $_GET['university_id'];

    $sql = "SELECT id,name from campus_info WHERE university_id=$university_id";
    $run = $conn->query($sql);

    echo "<select class='form-control' name='campus_id' required><option value='' >Select Campus</option>";

    while ($row = mysqli_fetch_array($run)) {

        echo "<option value='$row[id]'>";
        echo $row['name'];
        echo "</option>";
    }
    echo "</select><br>";
}

if (isset($_GET["student_id_f"])) {
    $student_id = $_GET['student_id_f'];

    $sql = "SELECT id,install_num,amount,due_date from ledger WHERE student_id=$student_id AND status=1";
    $run = $conn->query($sql);

    echo "<select class='form-control' name='entry_id' required><option value='' >Select Event</option>";

    while ($row = mysqli_fetch_array($run)) {

        echo "<option value='$row[id]'>";
        echo "Installment: " . $row['install_num'] . "Amount: " . $row['amount'] . " ; Due Date: " . $row['due_date'];
        echo "</option>";
    }
    echo "</select>";
}

if (isset($_GET["type_id_f"])) {
    $type_id = $_GET['type_id_f'];
    $agency_id = $_GET['agency_id_f'];

    $sql = "SELECT DISTINCT student_id from ledger WHERE agency_id=$agency_id AND type=$type_id AND status=1";
    $run = $conn->query($sql);


    echo "<select class='form-control' id='student_id' onchange='change_student_f()' name='student_id' required><option value='' >Select Student</option>";

    while ($row = $run->fetch_assoc()) {
        $id = $row['student_id'];
        $s1 = "SELECT country_id,university_id,campus_id from student_info WHERE id=$id";
        $run1 = $conn->query($s1);
        $row1 = $run1->fetch_assoc();
        $country_id = $row1['country_id'];
        $university_id = $row1['university_id'];
        $campus_id = $row1['campus_id'];
        $s4 = "SELECT name from country_info WHERE id=$country_id";
        $run4 = $conn->query($s4);
        $row4 = $run4->fetch_assoc();
        $country_name = $row4['name'];

        $s4 = "SELECT name from university_info WHERE id=$university_id";
        $run4 = $conn->query($s4);
        $row4 = $run4->fetch_assoc();
        echo $university_name = $row4['name'];

        $s4 = "SELECT name from campus_info WHERE id=$campus_id";
        $run4 = $conn->query($s4);
        $row4 = $run4->fetch_assoc();
        $campus_name = $row4['name'];
        echo "<option value='$row1[id]'>";
        echo $row1['name'] . " ( " . $country_name . " => " . $university_name . " => " . $campus_name . " )";
        echo "</option>";
    }
    echo "</select>";
}
