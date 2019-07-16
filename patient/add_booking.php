<?php 
require("../base_config.php");
require(BASE_DOC."/header.php");
require("user_validator.php");

$sql = "SELECT * FROM clinics c ORDER BY c.c_name ASC ";
$result = mysqli_query($conn, $sql);

$num_rows = mysqli_num_rows($result);
?>

<div class="container" style="padding-top: 1%;">
    <div class="row card">
        <div class="col-md-10 offset-1 card-body">
            <center>
                
                <?php require("nav_items.php"); ?>
                
                <h3>Book Appointment</h3>
                
                <?php if (isset($_GET['error'])) { ?>
                    <span style="color: red;"><?= $_GET['error'] ?></span>
                <?php } ?>
                
                <p class="alert alert-info">
                    Choose which clinic from below list
                </p>
                
                <table class="table">
                    <thead>
                        <tr>
                            <td><strong>NO.</strong></td>
                            <td><strong>CLINIC</strong></td>
                            <td><strong>ACTION</strong></td>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (mysqli_num_rows($result) > 0) { for ($i = 1; $row = mysqli_fetch_assoc($result); $i++) { ?>
                        <tr>
                            <td><?=$i ?>.</td>
                            <td>
                                <a href="https://www.google.com/maps/place/<?=$row['c_lat'] ?>,<?=$row['c_lon'] ?>" target="_blank">
                                    <?=strtoupper($row['c_name']) ?>
                                </a>
                                <br />(<?=($row['c_notes'] | 'n/a') ?>)
                            </td>
                            <td>
                                <a href="add_booking_process.php?id=<?=$row['c_id'] ?>">
                                    <button type="button" class="btn btn-success">Choose</button>
                                </a>
                            </td>
                        </tr>
                        <?php }} else { ?>
                        <tr>
                            <td colspan="6">
                                <center><i>.. No Data ..</i></center>
                            </td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
                
            </center>
        </div>
    </div>
</div>