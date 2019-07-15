<?php 
require("../base_config.php");
require(BASE_DOC."/header.php");
require("user_validator.php");

$sql = "SELECT * FROM users u WHERE u.u_type != 'administrator' ORDER BY u.u_approved ASC, u.u_type ASC, u.u_fullname ASC";
$result = mysqli_query($conn, $sql);

$num_rows = mysqli_num_rows($result);
?>

<div class="container" style="padding-top: 1%;">
    <div class="row card">
        <div class="col-md-12 offset-0 card-body">
            <center>
                
                <?php require("nav_items.php"); ?>
                
                <h3>List of Users</h3>
                
                <button type="button" class="btn btn-primary" onclick="window.location='add_user.php'">Add User</button>
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
                            <td><strong>TYPE</strong></td>
                            <td><strong>FULL NAME</strong></td>
                            <td><strong>USERNAME</strong></td>
                            <td><strong>STATUS</strong></td>
                            <td><strong>ACTION</strong></td>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (mysqli_num_rows($result) > 0) { for ($i = 1; $row = mysqli_fetch_assoc($result); $i++) { ?>
                        <tr>
                            <td><?=$i ?>.</td>
                            <td><?=strtoupper($row['u_type']) ?></td>
                            <td><?=strtoupper($row['u_fullname']) ?></td>
                            <td><?=strtoupper($row['u_username']) ?></td>
                            <td><?=($row['u_approved']=="1")?("<span style='color: green;'>APPROVED</span>"):("<span style='color: red;'>PENDING</span>") ?></td>
                            <td>
                                <?php if ($row['u_approved'] == "0") { ?>
                                <a href="approve_user_process.php?id=<?=$row['u_id'] ?>">
                                    <button type="button" class="btn btn-success">Approve</button>
                                </a>
                                <?php } ?>
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
                
                Number of users: <?=$num_rows ?> user<?=($num_rows > 1)?('s'):('') ?>
                
            </center>
        </div>
    </div>
</div>