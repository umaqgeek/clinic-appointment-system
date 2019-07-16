<?php 
require("../base_config.php");
require(BASE_DOC."/header.php");
require("user_validator.php");

if (isset($_GET['id']) && !empty($_GET['id'])) {
    $id = $_GET['id'];
    
    $sql = "DELETE FROM clinics WHERE c_id = '$id'";
    if (mysqli_query($conn, $sql)) {
        header("Location: list_clinics.php?success=Success remove the clinic");
    } else {
        header("Location: list_clinics.php?error=Failed remove the clinic. Error: ".mysqli_error($conn));
    }
    
} else {
    header("Location: list_clinics.php?error=Error remove the clinic");
}
die();
?>