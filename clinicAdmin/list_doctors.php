<?php 
require("../base_config.php");
require(BASE_DOC."/header.php");
require("user_validator.php");

$cli_id = $_SESSION['user']['u_id'];

$sql = "SELECT * FROM users u, clinics c, clinics_users cu "
        . "WHERE u.u_id = cu.cu";
$result = mysqli_query($conn, $sql);

$num_rows = mysqli_num_rows($result);
?>

<div class="container" style="padding-top: 1%;">
    <div class="row card">
        <div class="col-md-10 offset-1 card-body">
            <center>
                
                <?php require("nav_items.php"); ?>
                
                <h3>List of Doctors</h3>
                
            </center>
        </div>
    </div>
</div>