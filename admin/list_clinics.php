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
        <div class="col-md-12 offset-0 card-body">
            <center>
                
                <?php require("nav_items.php"); ?>
                
                <h3>List of Clinics</h3>
                
                <button type="button" class="btn btn-primary" onclick="window.location='add_clinic.php'">Add Clinic</button>
                <br />
                <br />
                <?php if (isset($_GET['error'])) { ?>
                <span class="alert alert-danger"><?= $_GET['error'] ?></span>
                <?php } ?>
                <?php if (isset($_GET['success'])) { ?>
                <span class="alert alert-success"><?= $_GET['success'] ?></span>
                <?php } ?>
                
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <td><strong>NO.</strong></td>
                            <td><strong>NAME</strong></td>
                            <td width="40%"><strong>LOCATION ADDRESS</strong></td>
                            <td><strong>NOTES</strong></td>
                            <td><strong>ACTION</strong></td>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (mysqli_num_rows($result) > 0) { for ($i = 1; $row = mysqli_fetch_assoc($result); $i++) { ?>
                        <tr>
                            <td><?=$i ?>.</td>
                            <td><?=strtoupper($row['c_name']) ?>
                                <br />
                                <a href="<?=$row['c_logo'] ?>" target="_blank">
                                    <img src="<?=$row['c_logo'] ?>" class="img-thumbnail" style="max-height: 100px; max-width: 100px; margin-top: 10px;" />
                                </a>
                            </td>
                            <td>
                                <a href="https://www.google.com/maps/place/<?=$row['c_lat'] ?>,<?=$row['c_lon'] ?>" target="_blank">Open google maps</a>
                                <?=($row['c_address']!=""&&$row['c_address']!=null?'<br />'.strtoupper($row['c_address']):'') ?>
                            </td>
                            <td><?=($row['c_notes']!=""&&$row['c_notes']!=null?strtoupper($row['c_notes']):'N/A') ?></td>
                            <td>
                                <a onclick="return confirm('Are you sure want to delete this?')" href="remove_clinic_process.php?id=<?=$row['c_id'] ?>">
                                    <button type="button" class="btn btn-danger">X</button>
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
                
                Number of clinic: <?=$num_rows ?> clinic<?=($num_rows > 1)?('s'):('') ?>
                
            </center>
        </div>
    </div>
</div>