<?php 
require("../base_config.php");
require(BASE_DOC."/header.php");
require("user_validator.php");

if (!isset($_GET['id']) || empty($_GET['id'])) {
    header("Location: list_appointments.php?error=Access denied");
    die();
}

$booking_id = $_GET['id'];
$sql = "SELECT * FROM bookings b, clinics c "
        . "WHERE b.clinic_id = c.c_id "
        . "AND b.b_id = '$booking_id'";
$result = mysqli_query($conn, $sql);
$num_rows = mysqli_num_rows($result);
if ($num_rows <= 0) {
    header("Location: list_appointments.php?error=Invalid ID " . $booking_id);
    die();
}
$row = mysqli_fetch_assoc($result);

$sqlPayments = "SELECT * FROM payments p "
        . "WHERE p.booking_id = '$booking_id' "
        . "ORDER BY p.p_datetime ASC";
$resultPayments = mysqli_query($conn, $sqlPayments);
$numRowsPayments = mysqli_num_rows($resultPayments);
$totalPayments = 0.00;
?>

<div class="container" style="padding-top: 1%;">
    <div class="row card">
        <div class="col-md-10 offset-1 card-body">
            <center>
                
                <?php require("nav_items.php"); ?>
                
                <div class="row">
                    <div class="col-md-2">
                        <a href="list_appointments.php" class="left">
                            <button type="button" class="btn btn-dark left">Back</button>
                        </a>
                    </div>
                </div>
                
                <h3>Appointment Detail</h3>
                <div class="row">
                    <div class="col-md-3 offset-3"><span class="float-right">Booking ID : </span></div>
                    <div class="col-md-5"><strong class="float-left" style="text-align: left;">BOOK-<?=$row['b_id']; ?></strong></div>
                </div>
                <div class="row">
                    <div class="col-md-3 offset-3"><span class="float-right">Booking Time : </span></div>
                    <div class="col-md-5"><strong class="float-left" style="text-align: left;"><?=$row['b_datetime']; ?></strong></div>
                </div>
                <div class="row">
                    <div class="col-md-3 offset-3"><span class="float-right">Booking Status : </span></div>
                    <div class="col-md-5"><strong class="float-left" style="text-align: left;"><?=strtoupper($row['b_status']); ?></strong></div>
                </div>
                <div class="row">
                    <div class="col-md-3 offset-3"><span class="float-right">Payment Status : </span></div>
                    <div class="col-md-5"><strong class="float-left" style="text-align: left;"><?=strtoupper($row['b_payment_status']); ?></strong></div>
                </div>
                <div class="row">
                    <div class="col-md-3 offset-3"><span class="float-right">Last Update : </span></div>
                    <div class="col-md-5"><strong class="float-left" style="text-align: left;"><?=$row['b_status_datetime']; ?></strong></div>
                </div>
                <div class="row">
                    <div class="col-md-3 offset-3"><span class="float-right">Clinic Name : </span></div>
                    <div class="col-md-5">
                        <strong class="float-left" style="text-align: left;">
                            <?=strtoupper($row['c_name']); ?>
                            <br />
                            <a href="<?= $row['c_logo'] ?>" target="_blank">
                                <img src="<?= $row['c_logo'] ?>" class="img-thumbnail" style="max-height: 100px; max-width: 100px; margin-top: 10px;" />
                            </a>
                        </strong>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3 offset-3"><span class="float-right">Clinic Address : </span></div>
                    <div class="col-md-5">
                        <strong class="float-left" style="text-align: left;">
                            <a href="https://www.google.com/maps/place/<?=$row['c_lat'] ?>,<?=$row['c_lon'] ?>" target="_blank">
                                <?=strtoupper($row['c_address']); ?>
                            </a>
                        </strong>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3 offset-3"><span class="float-right">Specialities / Notes : </span></div>
                    <div class="col-md-5"><strong class="float-left" style="text-align: left;"><?=strtoupper($row['c_notes']); ?></strong></div>
                </div>
                
                <hr />
                
                <h3>List of Payments</h3>                    
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <td><strong>NO.</strong></td>
                            <td><strong>RECEIPTS / INVOICES</strong></td>
                            <td><strong>PRICE (RM)</strong></td>
                            <td><strong>PAYMENT DATE</strong></td>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if ($numRowsPayments > 0) { for ($i = 1; $rowPayments = mysqli_fetch_assoc($resultPayments); $i++) { ?>
                        <tr>
                            <td><?=$i ?>.</td>
                            <td>
                                <a href="<?=$rowPayments['p_url'] ?>" target="_blank">
                                    VIEW RECEIPT / INVOICE
                                </a>
                            </td>
                            <td>
                                <?php
                                $p_price = floatval($rowPayments['p_price']);
                                echo number_format($p_price, 2);
                                $totalPayments += $p_price;
                                ?>
                            </td>
                            <td><?=$rowPayments['p_datetime'] ?></td>
                        </tr>
                        <?php }} else { ?>
                        <tr><td colspan="4"><center><i>.. No Data ..</i></center></td></tr>
                        <?php } ?>
                        <tr>
                            <td colspan="2" align="center"><strong>TOTAL PAID</strong></td>
                            <td><strong><?=number_format($totalPayments, 2) ?></strong></td>
                            <td colspan="2"></td>
                        </tr>
                    </tbody>
                </table>

            </center>
        </div>
    </div>
    
    <div style="margin-top: 100px;"></div>
</div>