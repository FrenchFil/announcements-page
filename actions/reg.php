<?php
    include 'conn.php';

    if(!isset($_SESSION['Id'])){
        header('Location: index.php?action=login');
    }

    $stmt = $db->query("SELECT Reg FROM regulamin");
    $reg = $stmt->fetch(PDO::FETCH_ASSOC);

    if (count($_POST) > 0 && isset($_POST['reg'])){
        $stmt1 = $db->prepare("UPDATE regulamin SET Reg=? WHERE Id = 1");
        $stmt1->bindValue(1, $_POST['reg']);
        $stmt1->execute();
        header('Location: http://localhost/index.php?action=reg');
    }

?>


