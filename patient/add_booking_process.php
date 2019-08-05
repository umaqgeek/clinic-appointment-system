<?php 
require("../base_config.php");
require(BASE_DOC."/header.php");
require("user_validator.php");

if (isset($_POST['cid']) && !empty($_POST['cid'])) {
    
    $b_datetime = $_POST['bdatetime'];
    if ($b_datetime == "") {
        header("Location: add_booking.php?error=Do not leave blank on appointment date");
        die();
    }
    
    $c_id = $_POST['cid'];
    $patient_id = $_SESSION['user']['u_id'];
//    $b_datetime = date('Y-m-d H:i:s');
    $b_status = 'pending';
    $b_payment_status = 'pending';
    $b_status_datetime = $b_datetime;
    
    $sql = "INSERT INTO bookings(patient_id, b_datetime, b_status, b_status_datetime, b_payment_status, clinic_id) "
            . "VALUES('$patient_id', '$b_datetime', '$b_status', '$b_status_datetime', '$b_payment_status', '$c_id')";
    if (mysqli_query($conn, $sql)) {
        $b_id = mysqli_insert_id($conn);
        header("Location: add_payment.php?booking=".$b_id);
    } else {
        header("Location: add_booking.php?error=".mysqli_error($conn));
    }
} else {
    header("Location: add_booking.php?error=Undefined clinic id");
}
die();
?>