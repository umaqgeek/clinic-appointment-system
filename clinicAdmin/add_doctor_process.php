<?php 
require("../base_config.php");
require(BASE_DOC."/header.php");
require("user_validator.php");

$u_fullname = $_POST['fullname'];
$u_username = $_POST['username'];
$u_password = $_POST['password'];
$u_type = 'doctor'; //$_POST['type'];
$c_id = $_SESSION['user']['clinic_id']; //$_POST['cid'];
$u_notes = $_POST['notes'];

foreach ($_POST as $key => $val) {
    if (($val == "" || $val == null) && $key != 'notes') {
        header("Location: add_user.php?error=Ops! Do not leave blank");
        die();
    }
}

$u_approved = '1'; //$u_type == 'patient' ? '1' : '0';
$sql = "INSERT INTO users(u_fullname, u_username, u_password, u_type, u_approved, u_notes) "
        . "VALUES('$u_fullname', '$u_username', '$u_password', '$u_type', '$u_approved', '$u_notes')";

if (mysqli_query($conn, $sql)) {
    $u_id = mysqli_insert_id($conn);
    $sql = "INSERT INTO clinics_users(user_id, clinic_id) VALUES('$u_id', '$c_id')";
    if (mysqli_query($conn, $sql)) {
        header("Location: list_doctors.php?success=Success register the user");
    } else {
        header("Location: add_doctor.php?error=Ops. Error: ".mysqli_error($conn));
    }
} else {
    header("Location: add_doctor.php?error=Ops. Error: ".mysqli_error($conn));
}
die();
?>