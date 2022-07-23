<?php
require('connectDB.php');
if (!empty($_FILES)) {
    if ($_GET['type'] == "profile") {
        if (is_uploaded_file($_FILES['userImage']['tmp_name'])) {
            $sourcePath = $_FILES['userImage']['tmp_name'];
            $targetPath = "profile/" . (mt_rand(100, 999) * mt_rand(100, 999)) . $_FILES['userImage']['name'];
            if (move_uploaded_file($sourcePath, $targetPath)) {
                $s_id = $_GET['s_id'];
                $s1 = "SELECT COUNT(*) as c from photo_db WHERE s_id=$s_id";
                $run = $conn->query($s1);
                $row = $run->fetch_assoc();
                $c = $row['c'];
                if ($c > 0) {
                    $sql = "UPDATE photo_db SET photo_path='$targetPath' WHERE s_id=$s_id";
                    if (mysqli_query($conn, $sql)) {
                    }
                } else {
                    $sql = "INSERT INTO photo_db VALUES('',$s_id,'$targetPath','')";
                    if (mysqli_query($conn, $sql)) {
                    }
                }
?>
                <img src="<?php echo $targetPath; ?>" width="100px" height="100px" />
            <?php
            }
        }
    }
    if ($_GET['type'] == "visa") {
        if (is_uploaded_file($_FILES['userImage1']['tmp_name'])) {
            $sourcePath = $_FILES['userImage1']['tmp_name'];
            $targetPath = "visa/" . (mt_rand(100, 999) * mt_rand(100, 999)) . $_FILES['userImage1']['name'];
            if (move_uploaded_file($sourcePath, $targetPath)) {
                $s_id = $_GET['s_id'];
                $s1 = "SELECT COUNT(*) as c from photo_db WHERE s_id=$s_id";
                $run = $conn->query($s1);
                $row = $run->fetch_assoc();
                $c = $row['c'];
                if ($c > 0) {
                    $sql = "UPDATE photo_db SET visa_path='$targetPath' WHERE s_id=$s_id";
                    if (mysqli_query($conn, $sql)) {
                    }
                } else {
                    $sql = "INSERT INTO photo_db VALUES('',$s_id,'','$targetPath')";
                    if (mysqli_query($conn, $sql)) {
                    }
                }
            ?>
                <img src="<?php echo $targetPath; ?>" width="100px" height="100px" />
<?php
            }
        }
    }
}
?>