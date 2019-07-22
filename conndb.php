<?php
//$servername = "localhost";
//$username = "root";
//$password = "P@ssw0rd";
//$dbname = "cass_db";
$servername = "us-cdbr-iron-east-02.cleardb.net";
$username = "b84e6047168f42";
$password = "b08b6b42";
$dbname = "heroku_e6e43bd8f6bdf21";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

session_start();