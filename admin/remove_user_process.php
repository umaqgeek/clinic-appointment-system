<?php 
require("../base_config.php");
require(BASE_DOC."/header.php");
require("user_validator.php");

if (isset($_GET['id']) && !empty($_GET['id'])) {
    $id = $_GET['id'];
    
    $sql = "DELETE FROM users WHERE u_id = '$id'";
    if (mysqli_query($conn, $sql)) {
        header("Location: list_users.php?success=Success remove the clinic admin");
    } else {
        header("Location: list_users.php?error=Failed remove the clinic admin. Error: ".mysqli_error($conn));
    }
    
} else {
    header("Location: list_users.php?error=Error remove the clinic admin");
}
die();
?>