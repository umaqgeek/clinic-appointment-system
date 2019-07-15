<?php 
require("../base_config.php");
require(BASE_DOC."/header.php");
require("user_validator.php");

$u_fullname = $_POST['fullname'];
$u_username = $_POST['username'];
$u_password = $_POST['password'];
$u_type = $_POST['type'];

foreach ($_POST as $val) {
    if ($val == "" || $val == null) {
        header("Location: add_user.php?error=Ops! Do not leave blank");
        die();
    }
}

$u_approved = $u_type == 'patient' ? '1' : '0';
$sql = "INSERT INTO users(u_fullname, u_username, u_password, u_type, u_approved) VALUES('$u_fullname', '$u_username', '$u_password', '$u_type', '$u_approved')";

if (mysqli_query($conn, $sql)) {
    header("Location: list_users.php?success=Success register the user");
} else {
    header("Location: add_user.php?error=Ops. Error: ".mysqli_error($conn));
}
?>