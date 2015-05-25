<?php
	$forecast = array(
			"user" => $_GET['user'],
			"product" => $_GET['product'],
			"forecast" => $_GET['forecast']
		);
	echo json_encode($forecast);
?>