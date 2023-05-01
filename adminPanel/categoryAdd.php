<?php
    include 'conn.php';

    if(!isset($_SESSION['Id'])){
        header('Location: index.php?action=home');
    }

if (count($_GET) > 0) {

    $name = array_key_exists('name', $_GET) ? $_GET['name'] : '';

    if(isset($name) && $name!='' && $name!=' '){
        $stmt0 =$db->prepare('INSERT INTO category (name) VALUES (?);');
        $stmt0->bindValue(1,$name);
        $stmt0->execute();
        
    }
    header('Location: http://localhost/index.php?action=adminPage');
}
?>