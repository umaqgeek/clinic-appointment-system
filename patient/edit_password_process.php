<?php 
require("../base_config.php");
require(BASE_DOC."/header.php");
require("user_validator.php");

foreach ($_POST as $key => $val) {
    if (($val == "" || $val == null)) {
        header("Location: edit_password.php?error=Ops! Do not leave blank");
        die();
    }
}

$u_id = $_POST['uid'];
$old = $_POST['oldpassword'];
$new = $_POST['newpassword'];
$new2 = $_POST['newpassword2'];

$sql = "SELECT * FROM users u WHERE u.u_id = '$u_id'";
$r = mysqli_query($conn, $sql);
$t = mysqli_num_rows($r);
if ($t > 0) {
    $d = mysqli_fetch_assoc($r);
    if ($d['u_password'] == $old) {
        if ($new == $new2) {
            $sql = "UPDATE users u SET u.u_password = '$new2' WHERE u.u_id = '$u_id'";
            if (mysqli_query($conn, $sql)) {
                header("Location: ../logout.php?msg=Success change your password. Please login again");
            } else {
                header("Location: edit_password.php?error=Ops. Error: " . mysqli_error($conn));
            }
        } else {
            header("Location: edit_password.php?error=The new password does not match with the confirmation password");
        }
    } else {
        header("Location: edit_password.php?error=Invalid current password");
    }
} else {
    header("Location: edit_password.php?error=Ops. There is no user with this ID ".$u_id);
}
die();
?>