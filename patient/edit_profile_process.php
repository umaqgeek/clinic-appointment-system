<?php 
require("../base_config.php");
require(BASE_DOC."/header.php");
require("user_validator.php");

foreach ($_POST as $key => $val) {
    if (($val == "" || $val == null) && $key != 'notes') {
        header("Location: edit_profile.php?error=Ops! Do not leave blank");
        die();
    }
}

$u_id = $_POST['uid'];
$u_fullname = $_POST['fullname'];
$u_username = $_POST['username'];
$u_notes = $_POST['notes'];

$sql = "UPDATE users u SET u.u_fullname = '$u_fullname', u.u_username = '$u_username', u.u_notes = '$u_notes' WHERE u.u_id = '$u_id'";

if (mysqli_query($conn, $sql)) {
    header("Location: ../logout.php?msg=Success change your profile. Please login again");
} else {
    header("Location: edit_profile.php?error=Ops. Error: ".mysqli_error($conn));
}
die();
?>