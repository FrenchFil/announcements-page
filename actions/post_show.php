<?php
    include 'conn.php';

    if(!isset($_SESSION['Id'])||$_SESSION['Id']!=1){
        header('Location: index.php?action=login');
    }


    $stmt = $db->query("SELECT Id, Name, Category, Price, isApproved FROM Ads");
    $ads = $stmt->fetchAll(PDO::FETCH_ASSOC);

    $stmt0 = $db->prepare("SELECT Id,Name FROM category");
    $stmt0->execute();
    $result = $stmt0->fetchAll(PDO::FETCH_ASSOC);

    $stmt2 = $db->query("SELECT Name FROM category");
    $category = $stmt2->fetchAll(PDO::FETCH_ASSOC);
?>
