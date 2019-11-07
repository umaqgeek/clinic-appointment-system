<?php
require(BASE_DOC . "/conndb.php");

if (isset($_SESSION['user'])) {
    // always fetch latest user data from db.
    if (!isset($_SESSION['user']['u_id']) || empty($_SESSION['user']['u_id'])) {
        header("Location: logout.php?msg=Access denied");
        die();
    }
    $user_u_id = $_SESSION['user']['u_id'];
    $sql_user = "SELECT * FROM users u
                LEFT JOIN clinics_users cu ON cu.user_id = u.u_id
                LEFT JOIN clinics c ON c.c_id = cu.clinic_id
                WHERE u.u_id = '$user_u_id'";
    $result_user = mysqli_query($conn, $sql_user);
    $t_user = mysqli_num_rows($result_user);
    if ($t_user <= 0) {
        header("Location: logout.php?msg=Access denied. Invalid user");
        die();
    }
    $_SESSION['user'] = mysqli_fetch_assoc($result_user);
}

// use user's clinic logo if any.
$logo = isset($_SESSION['user']['c_logo']) && !empty($_SESSION['user']['c_logo']) ? $_SESSION['user']['c_logo'] : BASE_URL.'/assets/images/icon01.png';
?>
<link href="<?= BASE_URL ?>/assets/css/bootstrap.css" rel="stylesheet" type="text/css">
<script src="<?= BASE_URL ?>/assets/js/jquery-3.4.1.min.js"></script>
<script src="<?= BASE_URL ?>/assets/js/bootstrap.js"></script>

<link rel="icon" href="<?= BASE_URL ?>/assets/images/icon01.png">
<title>CAS</title>

<div class="container" style="padding-top: 2%;">
    <div class="row">
        <div class="col-md-12">
            <center>
                <h2 onclick="window.location = '<?= BASE_URL ?>/index.php'" style="cursor: pointer;">Clinic Appointment System
                    <img src="<?= $logo ?>" style="max-width: 80px;" />
                </h2>
            </center>
        </div>
    </div>
</div>
