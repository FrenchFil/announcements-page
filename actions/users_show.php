<?php
    include 'conn.php';

    if(!isset($_SESSION['Id'])||$_SESSION['Id']!=1){
        header('Location: index.php?action=login');
    }


    $stmt = $db->query("SELECT * FROM Users");
    $users = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
