<?php

	$errors = array();

	if (count($_POST) > 0) {
		if (is_uploaded_file($_FILES['plik']['tmp_name'])) {
			$size = $_FILES['plik']['size'];
			$type = $_FILES['plik']['type'];
			$name = $_FILES['plik']['name'];
			$temp_name = $_FILES['plik']['tmp_name'];
			$destination = "picture.jpeg";
			$description = $_POST['description'];

			if ($size <= 0) {
			$errors['size'] ='Plik jest pusty.';
			}
			else {
				if (!@move_uploaded_file($temp_name, $destination))
				$errors['all'] = 'Blad: Nie mozna zapisac pliku gdyz podana lokalizacja nie istnieje lub nie mozna w nim zapisywac';
				else{
					$plik = @fopen('description.txt', 'w');
					fwrite($plik, $description);
					fclose($plik);

					header('Location: index.php?action=getForm');
				} 
			}
		}else{
		$errors['all'] = "Pole opsiu i pliku jest wymagane";
	

		
		}
	}
?>