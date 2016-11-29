<?php

require 'ventas.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	$body = json_decode(file_get_contents("php://input"), true);

	
}
