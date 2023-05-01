<?php
    include 'conn.php';

    $stmt = $db->prepare("SELECT * FROM Ads WHERE Id =?");
    $stmt->bindValue(1,$_SESSION['Id']);
    $stmt->execute();
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

if (count($_POST) > 0) {

    if(array_key_exists('login', $_POST) && $_POST['login'] != ''){
        $login = $_POST['login'];
    }else{
        $login = $user['Login'];
    }

    if (array_key_exists('password', $_POST) && $_POST['password'] != '') {
        $password = $_POST['password'];
    }else{
        $password = $user['Password'];
    }

    if(array_key_exists('name', $_POST)and $_POST['name'] != ''){
        $name = $_POST['name'];
    }else{
        $name = $user['Name'];
    }

    if(array_key_exists('lastName', $_POST)and $_POST['lastName'] != ''){
        $lastName = $_POST['lastName'];
    }else{
        $lastName = $user['LastName'];
    }

    if(array_key_exists('email', $_POST)and $_POST['email'] != ''){
        $mail = $_POST['email'];
    }else{
        $mail = $user['Mail'];
    }

    if(array_key_exists('phone', $_POST)and $_POST['phone'] != ''){
        $phone = $_POST['phone'];
    }else{
        $phone = $user['Phone'];
    }

    if(isset($id) && $id!='' && $id!=' '){
        $stmt0 =$db->prepare('UPDATE users SET Login=?, Password=?, Name=?, LastName=?, Mail=?, Phone=? WHERE Id=?;');
        $stmt0->bindValue(1,$login);
        $stmt0->bindValue(2,$password);
        $stmt0->bindValue(3,$name);
        $stmt0->bindValue(4,$lastName);
        $stmt0->bindValue(5,$mail);
        $stmt0->bindValue(6,$phone);
        $stmt0->bindValue(7,$_SESSION['Id']);
        $stmt0->execute();
        
    }
}
header('Location: http://localhost/index.php?action=userEdit');
?>