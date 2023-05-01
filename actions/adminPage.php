<?php
    include 'conn.php';

    if(!isset($_SESSION['Id'])){
        header('Location: index.php?action=home');
    }

    $stmt = $db->query("SELECT Id, Name, Category, Price FROM Ads WHERE isApproved = 0");
    $ads = $stmt->fetchAll(PDO::FETCH_ASSOC);

    $stmt0 = $db->prepare("SELECT Id,Name FROM category");
    $stmt0->execute();
    $category = $stmt0->fetchAll(PDO::FETCH_ASSOC);

?>
