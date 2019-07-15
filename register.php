<?php 
require("base_config.php");
require(BASE_DOC."/header.php"); 
session_destroy();
?>

<div class="container" style="padding-top: 1%;">
    <div class="row card">
        <div class="col-md-10 offset-1 card-body">
            <center>
                
                <h3>Registration</h3>
                
                <form action="register_process.php" method="POST">
                    <table class="table table-borderless">
                        <tr>
                            <td>Full Name</td>
                            <td>:</td>
                            <td>
                                <input type="text" name="fullname" class="form-control" placeholder="Type your full name here" />
                            </td>
                        </tr>
                        <tr>
                            <td>Username</td>
                            <td>:</td>
                            <td>
                                <input type="text" name="username" class="form-control" placeholder="Type your username here" />
                            </td>
                        </tr>
                        <tr>
                            <td>New Password</td>
                            <td>:</td>
                            <td>
                                <input type="password" name="password" class="form-control" placeholder="Type your new password here" />
                            </td>
                        </tr>
                        <tr>
                            <td>Type</td>
                            <td>:</td>
                            <td>
                                <select name="type" class="form-control">
                                    <option value="patient">Patient</option>
                                    <option value="clinic admin">Clinic Admin</option>
                                    <option value="doctor">Doctor</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2"></td>
                            <td>
                                <button type="submit" class="btn btn-success">Submit</button>
                                <button type="reset" class="btn btn-primary">Reset</button>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2">
                            </td>
                            <td>
                                <?php if (isset($_GET['error'])) { ?>
                                <span style="color: red;"><?=$_GET['error'] ?></span>
                                <?php } ?>
                            </td>
                        </tr>
                    </table>
                </form>
                
            </center>
        </div>
    </div>
</div>