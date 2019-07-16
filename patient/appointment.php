<?php 
require("../base_config.php");
require(BASE_DOC."/header.php");
require("user_validator.php");

$u_id = $_SESSION['user']['u_id'];
$sql = "SELECT * FROM bookings b "
        . "LEFT JOIN clinics c ON c.c_id = b.clinic_id "
        . "LEFT JOIN payments p ON p.booking_id = b.b_id "
        . "WHERE b.patient_id = '$u_id'";
$result = mysqli_query($conn, $sql);

$num_rows = mysqli_num_rows($result);
?>

<div class="container" style="padding-top: 1%;">
    <div class="row card">
        <div class="col-md-10 offset-1 card-body">
            <center>
                
                <?php require("nav_items.php"); ?>
                
                <h3>List of Appointments</h3>
                
                <button type="button" class="btn btn-primary" onclick="window.location='add_booking.php'">Book Appointment</button>
                <br />
                <br />
                <?php if (isset($_GET['error'])) { ?>
                <span style="color: red;"><?= $_GET['error'] ?></span>
                <?php } ?>
                <?php if (isset($_GET['success'])) { ?>
                <span style="color: green;"><?= $_GET['success'] ?></span>
                <?php } ?>
                
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <td><strong>NO.</strong></td>
                            <td><strong>CLINIC</strong></td>
                            <td><strong>APPOINTMENT DATE</strong></td>
                            <td><strong>PAYMENT STATUS</strong></td>
                            <td><strong>QUEUE STATUS</strong></td>
                            <td><strong>ACTION</strong></td>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (mysqli_num_rows($result) > 0) { for ($i = 1; $row = mysqli_fetch_assoc($result); $i++) { ?>
                        <tr>
                            <td><?=$i ?>.</td>
                            <td><?=strtoupper($row['c_name']) ?></td>
                            <td><?=strtoupper($row['b_datetime']) ?></td>
                            <td><?=strtoupper($row['b_status']) ?></td>
                            <td><?=strtoupper($row['b_status']) ?></td>
                            <td>
                                
                            </td>
                        </tr>
                        <?php }} ?>
                    </tbody>
                </table>
                
                Number of appointments: <?=$num_rows ?> booking<?=($num_rows > 1)?('s'):('') ?>
                
            </center>
        </div>
    </div>
</div>