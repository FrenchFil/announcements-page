<?php

	$errors = array();

	$name = 'description.txt';
	$plik = fopen($name, 'r');
	$content = fread($plik, filesize($name));
	fclose($plik);

	if(file_exists("picture.jpeg")){
		$errors['null'] = "NotFound";
	}else{
		$errors['find'] = "Found";
	}
	

?>