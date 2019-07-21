<?php

$cloud_name = '';
$api_key = '';
$api_secret = '';

\Cloudinary::config(array(
    'cloud_name' => $cloud_name == '' ? $_ENV['CLOUDINARY_CLOUD_NAME'] : $cloud_name,
    'api_key' => $api_key == '' ? $_ENV['CLOUDINARY_API_KEY'] : $api_key,
    'api_secret' => $api_secret == '' ? $_ENV['CLOUDINARY_API_SECRET'] : $api_secret
));