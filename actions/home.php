<?php
    include 'conn.php';

    $stmt = $db->query("SELECT Id, Name, Category, Price FROM Ads WHERE isApproved = 1 LIMIT 10");
    $ads = $stmt->fetchAll(PDO::FETCH_ASSOC);

    $stmt0 = $db->prepare("SELECT Id,Name FROM category");
    $stmt0->execute();
    $result = $stmt0->fetchAll(PDO::FETCH_ASSOC);

    $stmt2 = $db->query("SELECT Name FROM category");
    $category = $stmt2->fetchAll(PDO::FETCH_ASSOC);
?>
