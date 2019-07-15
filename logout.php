<?php 
require("base_config.php");
require(BASE_DOC."/header.php");
session_destroy();
header("Location: index.php?success=You have log out")
?>