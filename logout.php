<?php

	unset($_SESSION['user']);
	session_unset();
	setcookie("PHPSESSID", '', 1, '/');
	header('Location: index.php?action=home');

?>
