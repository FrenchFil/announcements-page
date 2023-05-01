<?php
    include 'conn.php';

    if(!isset($_SESSION['Id'])){
        header('Location: index.php?action=login');
    }

    $stmt0 = $db->prepare("SELECT Id,Name FROM category");
    $stmt0->execute();
    $result = $stmt0->fetchAll(PDO::FETCH_ASSOC);

    $stmt = $db->prepare("SELECT * FROM Ads WHERE IdOfUser =?");
    $stmt->bindValue(1,$_SESSION['Id']);
    $stmt->execute();
    $ads = $stmt->fetchAll(PDO::FETCH_ASSOC);

    $stmt34 = $db->prepare("SELECT * FROM users WHERE Id =?");
    $stmt34->bindValue(1,$_SESSION['Id']);
    $stmt34->execute();
    $user = $stmt34->fetch(PDO::FETCH_ASSOC);


    $stmt23 = $db->query('SELECT Login FROM users');
    $users = $stmt23->fetchAll(PDO::FETCH_ASSOC);

    $phone=" ";

if (count($_POST) > 0) {

    if (array_key_exists('login', $_POST) && $_POST['login'] != '') {
        $login = $_POST['login'];
    } else {
        $login = $user['Login'];
    }

    if (array_key_exists('name', $_POST) and $_POST['name'] != '') {
        $name = $_POST['name'];
    } else {
        $name = $user['Name'];
    }

    if (array_key_exists('lastName', $_POST) and $_POST['lastName'] != '') {
        $lastName = $_POST['lastName'];
    } else {
        $lastName = $user['LastName'];
    }

    if (array_key_exists('email', $_POST) and $_POST['email'] != '') {
        $mail = $_POST['email'];
    } else {
        $mail = $user['Mail'];
    }

    if (array_key_exists('phone', $_POST) and $_POST['phone'] != '') {
        $phone = $_POST['phone'];
    } else {
        $name = $user['Phone'];
    }
    $stmt1 = $db->prepare("UPDATE users SET
                Login=?,
                Name=?,
                LastName=?,
                Mail=?,
                Phone=?
                WHERE Id = ?");
    $stmt1->bindValue(1, $login);
    $stmt1->bindValue(2, $name);
    $stmt1->bindValue(3, $lastName);
    $stmt1->bindValue(4, $mail);
    $stmt1->bindValue(5, $phone);
    $stmt1->bindValue(6, $_SESSION['Id']);
    $stmt1->execute();

    header('Location: http://localhost/index.php?action=userEdit');

}
?>