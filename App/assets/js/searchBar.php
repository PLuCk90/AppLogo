<?php
	$users = json_decode($_GET['users']);
	$find = array();
	foreach ($users as $user) {
		foreach ($user as $key => $value) {
			if(strstr(strtolower($value), strtolower($_GET['search'])) != FALSE){
				array_push($find,hash("sha256",$user->id_user,FALSE));
			}
		}
	}
	echo json_encode($find);
?>