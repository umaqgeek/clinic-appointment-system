<?php require(BASE_DOC . "/conndb.php"); ?>
<?php 
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