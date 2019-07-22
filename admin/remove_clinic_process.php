<?php 
require("../base_config.php");
require(BASE_DOC."/header.php");
require("user_validator.php");

// Composer uploader.
require(__DIR__.'/../vendor/autoload.php');
include '../config/settings.php';

if (isset($_GET['id']) && !empty($_GET['id'])) {
    $id = $_GET['id'];
    
    $sql = "SELECT * FROM clinics c WHERE c.c_id = '$id'";
    $result = mysqli_query($conn, $sql);
    $num_rows = mysqli_num_rows($result);
    if ($num_rows > 0) {
        
        $c_logo = "";
        for ($i = 1; $row = mysqli_fetch_assoc($result); $i++) {
            $c_logo = $row['c_logo'];
        };
        $path1 = explode("/", $c_logo);
        $path2 = explode(".", $path1[sizeof($path1)-1]);
        $public_id = $path2[0];

        $sql1 = "DELETE FROM clinics WHERE c_id = '$id'";
        $sql2 = "DELETE FROM clinics_users WHERE clinic_id = '$id'";
        if (mysqli_query($conn, $sql1) && mysqli_query($conn, $sql2)) {

            \Cloudinary\Uploader::destroy("clinic_appointment_system_syera/clinic_logo/".$public_id);

            header("Location: list_clinics.php?success=Success remove the clinic");
        } else {
            header("Location: list_clinics.php?error=Failed remove the clinic. Error: ".mysqli_error($conn));
        }
    } else {
        header("Location: list_clinics.php?error=No clinic with this ID - $id");
    }
} else {
    header("Location: list_clinics.php?error=Error remove the clinic");
}
die();
?>