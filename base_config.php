<?php
// base directory
$base_dir = __DIR__;

// server protocol
$protocol = empty($_SERVER['HTTPS']) ? 'http' : 'https';

// domain name
$domain = $_SERVER['SERVER_NAME'];

// base url
//$base_url = 'clinicAppointmentSystemSyera'; 
$base_url = ''; 
$base_doc = preg_replace("!^${doc_root}!", '', $base_dir);

// server port
$port = $_SERVER['SERVER_PORT'];
$disp_port = ($protocol == 'http' && $port == 80 || $protocol == 'https' && $port == 443) ? '' : ":$port";

// put em all together to get the complete base URL
$url = "${protocol}://${domain}${disp_port}/${base_url}";

define("BASE_URL", $url);
define("BASE_DOC", $base_doc);
?>