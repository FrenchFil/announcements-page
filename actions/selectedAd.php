<?php
    include 'conn.php';

    $stmt0 = $db->prepare("SELECT Id,Name FROM category");
    $stmt0->execute();
    $result = $stmt0->fetchAll(PDO::FETCH_ASSOC);

if (count($_GET) > 1) {
    $stmt = $db->prepare("SELECT Id, Name, Category ,Descr ,City ,Price, IdOfUser, isApproved FROM ads WHERE Id = :id");
    $stmt->bindParam(':id',$_GET['Id']);
    $stmt->execute();
    $ad = $stmt->fetch(PDO::FETCH_ASSOC);

    foreach ($result as $r)
        if ($r['Id'] == $ad['Category']){
            $ad['Category'] = $r['Name'];
        }

    $stmt1 = $db->prepare("SELECT Login,Name,LastName ,Mail ,Phone FROM users WHERE Id=?");
    $stmt1->bindValue(1, $ad['IdOfUser']);
    $stmt1->execute();
    $user = $stmt1->fetch(PDO::FETCH_ASSOC);
}
 
?>