<?php


    include 'conn.php';
    $errors = array();

    $fields['login'] = array_key_exists('login', $_POST) ? $_POST['login'] : '';

	$fields['password'] = array_key_exists('password', $_POST) ? $_POST['password'] : '';

    if (count($_POST) > 0) {

		$stmt1 = $db->prepare("SELECT Id, Password, isApproved FROM users WHERE Login = :login");
		$stmt1->bindParam(':login',$fields['login']);
		$stmt1->execute();
		$result = $stmt1->fetch(PDO::FETCH_ASSOC);

		if($result !=null && password_verify($fields['password'], $result['Password'])){
			if($result['isApproved']=='1'){
				$_SESSION['Id'] = $result['Id'];
				header('Location: index.php?action=home');
			}else{
				$errors['all'] = 'To konto nie zostało jeszcze zaakcpetowane';
			}
			
		}else{
			$errors['all'] = 'Niepoprawny login lub haslo.';
		}

	}

?>