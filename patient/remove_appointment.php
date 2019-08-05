<?php 
require("../base_config.php");
require(BASE_DOC."/header.php");
require("user_validator.php");

if (isset($_GET['id']) && !empty($_GET['id'])) {
    $id = $_GET['id'];
    
    $sql = "DELETE FROM bookings WHERE b_id = '$id'";
    if (mysqli_query($conn, $sql)) {
        header("Location: appointment.php?success=Success cancel the booking");
    } else {
        header("Location: appointment.php?error=Failed cancel the booking. Error: ".mysqli_error($conn));
    }
    
} else {
    header("Location: appointment.php?error=Error cancel the booking");
}
die();
?>