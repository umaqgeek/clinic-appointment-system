<?php 
require("../base_config.php");
require(BASE_DOC."/header.php");
require("user_validator.php");
?>

<div class="container" style="padding-top: 1%;">
    <div class="row card">
        <div class="col-md-10 offset-1 card-body">
            <center>
                
                <?php require("nav_items.php"); ?>
                
                <h3>Add Payments</h3>
                
                <?php if (isset($_GET['error'])) { ?>
                    <span style="color: red;"><?= $_GET['error'] ?></span>
                <?php } ?>

            </center>
        </div>
    </div>
</div>