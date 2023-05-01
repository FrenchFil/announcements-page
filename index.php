<?php

	session_start();
	
	require_once('index.php');

	$actions = array('home',"login","register","search", "addAd", "selectedAd","userEdit", "reg", "users_show", "post_show");
	$action = 'home';

	if(array_key_exists('action',$_GET)){
		if(in_array($_GET['action'],$actions)){
			$action = $_GET['action'];
		}else{
			header('Location: https://http.cat/404');
		}
	}

	include('actions\\'.$action.'.php');
	include('views\\'.$action.'.php');
?>