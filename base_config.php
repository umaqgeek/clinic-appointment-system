<?php
// base directory
$base_dir = __DIR__;

// server protocol
$protocol = 'https';

// domain name
$domain = $_SERVER['SERVER_NAME'];

// base url
$base_url = ''; 
$base_doc = $base_dir;

// server port
$port = '443';
$disp_port = ($protocol == 'http' && $port == 80 || $protocol == 'https' && $port == 443) ? '' : ":$port";

// put em all together to get the complete base URL
$url = "${protocol}://${domain}${disp_port}/${base_url}";

define("BASE_URL", $url);
define("BASE_DOC", $base_doc);
?>
