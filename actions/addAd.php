<?php
    include 'conn.php';

    if(!isset($_SESSION['Id'])){
        header('Location: http://localhost/index.php?action=login');
    }

    $stmt2 = $db->query("SELECT Id, Name FROM category");
    $category = $stmt2->fetchAll(PDO::FETCH_ASSOC);
	$errors = array();

	if (count($_POST) > 0) { 

        $title = array_key_exists('title', $_POST) ? $_POST['title'] : '';

        $category = array_key_exists('category', $_POST) ? $_POST['category'] : 'Inne';
    
        $description = array_key_exists('description', $_POST) ? $_POST['description'] : '';
    
        $city = array_key_exists('city', $_POST) ? $_POST['city'] : '';
    
        $price = array_key_exists('price', $_POST) ? $_POST['price'] : '';

        if(!isset($title) or $title==''){
            $errors['name'] = "Nazwa jest wymagana";
        }

        if(!isset($category) or $category==''){
            $errors['category'] = "Kategoria jest wymagana";
        }

        if(!isset($description) or $description==''){
            $errors['description'] = "Opis jest wymagany";
        }

        if(!isset($city) or $city==''){
            $errors['city'] = "Miasto jest wymagane";
        }

        if(!isset($price) or $price==''){
            $errors['price'] = "Cena jest wymagana";
        }

        

		if (is_uploaded_file($_FILES['plik']['tmp_name'])) {
			$size = $_FILES['plik']['size'];
			$type = $_FILES['plik']['type'];
			$name = $_FILES['plik']['name'];
			$temp_name = $_FILES['plik']['tmp_name'];

			if ($size <= 0) {
			$errors['plik'] ='Plik jest pusty.';
			}
			
            if(count($errors) == 0){

                $stmt0 = $db->prepare("SELECT Id FROM category WHERE Name = ? ");
                $stmt0->bindValue(1,$category);
                $stmt0->execute();
                $result['Id'] = $stmt0->fetch(PDO::FETCH_ASSOC);
                foreach ($result as $r)
                    $category = $r['Id'];

                $stmt1 = $db->prepare("INSERT INTO ads (Name, Category, Descr, City, Price, IdOfUser) VALUES (?,?,?,?,?,?)");
                $stmt1->bindValue(1,$title);
                $stmt1->bindValue(2,$category);
                $stmt1->bindValue(3,$description);
                $stmt1->bindValue(4,$city);
                $stmt1->bindValue(5,$price);
                $stmt1->bindValue(6,$_SESSION['Id']);
                $stmt1->execute();

                $stmt2 = $db->prepare("SELECT Id FROM ads 
                    WHERE Name = ? 
                    AND Category = ?
                    AND Descr = ?
                    AND City = ?
                    AND Price = ?");

                $stmt2->bindValue(1,$title);
                $stmt2->bindValue(2,$category);
                $stmt2->bindValue(3,$description);
                $stmt2->bindValue(4,$city);
                $stmt2->bindValue(5,$price);
                $stmt2->execute();
                $result['Id'] = $stmt2->fetch(PDO::FETCH_ASSOC);
                foreach( $result as $r)
                $destination = "picture\\".$r['Id'] . ".jpg";

                @move_uploaded_file($temp_name, $destination);
            }        
			
		}
    } 
?>