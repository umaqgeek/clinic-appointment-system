<?php 
require("../base_config.php");
require(BASE_DOC."/header.php");
require("user_validator.php");

foreach ($_POST as $key => $val) {
    if (($val == "" || $val == null) && $key != 'cnotes') {
        header("Location: add_clinic.php?error=Ops! Do not leave blank");
        die();
    }
}

$c_name = $_POST['cname'];
$c_lat = $_POST['clat'];
$c_lon = $_POST['clon'];
$c_notes = $_POST['cnotes'];
$user_id = $_POST['uid'];
$c_address = $_POST['caddress'];
$c_logo = $_FILES['clogo'];

$sql = "INSERT INTO clinics(c_name, c_lat, c_lon, c_notes) VALUES('$c_name', '$c_lat', '$c_lon', '$c_notes')";

if (mysqli_query($conn, $sql)) {
//    $c_id = mysqli_insert_id($conn);
//    $sql = "INSERT INTO clinics_users(clinic_id, user_id) VALUES('$c_id', '$user_id')";
//    if (mysqli_query($conn, $sql)) {
        header("Location: list_clinics.php?success=Success register the clinic");
//    } else {
//        header("Location: add_clinic.php?error=Ops. Error: ".mysqli_error($conn));
//    }
} else {
    header("Location: add_clinic.php?error=Ops. Error: ".mysqli_error($conn));
}
die();
?>