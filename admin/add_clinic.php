<?php 
require("../base_config.php");
require(BASE_DOC."/header.php");
require("user_validator.php");

$sql = "SELECT * FROM users u WHERE u.u_type = 'clinic admin'";
$result = mysqli_query($conn, $sql);

$num_rows = mysqli_num_rows($result);
?>

<div class="container" style="padding-top: 1%;">
    <div class="row card">
        <div class="col-md-10 offset-1 card-body">
            <center>
                
                <?php require("nav_items.php"); ?>
                
                <h3>Add Clinic</h3>
                
                <form action="add_clinic_process.php" method="POST">
                    <table class="table table-borderless">
                        <tr>
                            <td>Clinic Name</td>
                            <td>:</td>
                            <td>
                                <input type="text" name="cname" class="form-control" placeholder="Type the clinic name here" />
                            </td>
                        </tr>
                        <tr>
                            <td>Notes / Specialities</td>
                            <td>:</td>
                            <td>
                                <textarea name="cnotes" class="form-control" placeholder="Type the clinic notes or its specialities here"></textarea>
                            </td>
                        </tr>
                        <tr>
                            <td>Latitude</td>
                            <td>:</td>
                            <td>
                                <input type="text" name="clat" class="form-control" placeholder="Type the clinic latitude here" />
                            </td>
                        </tr>
                        <tr>
                            <td>Longitude</td>
                            <td>:</td>
                            <td>
                                <input type="text" name="clon" class="form-control" placeholder="Type the clinic longitude here" />
                            </td>
                        </tr>
                        <tr>
                            <td>Clinic Admin</td>
                            <td>:</td>
                            <td>
                                <select name="uid" class="form-control">
                                    <?php if (mysqli_num_rows($result) > 0) { for ($i = 1; $row = mysqli_fetch_assoc($result); $i++) { ?>
                                    <option value="<?=$row['u_id'] ?>"><?=strtoupper($row['u_fullname']) ?></option>
                                    <?php }} ?>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2"></td>
                            <td>
                                <button type="button" class="btn btn-dark" onclick="window.location='list_clinics.php'">Back</button>
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