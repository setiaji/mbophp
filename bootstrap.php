<?php
spl_autoload_register(function ($class) {
	include 'lib/' . $class . '.php';
});

//set config
$username = 'manager';
$password = 'ba1.5g';
$ws_folder_url = 'http://192.168.1.24/MetiscWebServiceBeta';
