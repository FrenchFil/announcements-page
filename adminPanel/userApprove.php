<?php
    include 'conn.php';

    if(!isset($_GET['user'])&&$_GET['user']!='1'){
        header('Location: http://localhost/index.php?action=home');
    }
if (count($_GET) > 0) {

    $id = array_key_exists('id', $_GET) ? $_GET['id'] : '';

    if(isset($id) && $id!='' && $id!=' '){
        $stmt0 =$db->prepare('UPDATE users SET isApproved=1 WHERE Id=?;');
        $stmt0->bindValue(1,$id);
        $stmt0->execute();
        
    }
    header('Location: http://localhost/index.php?action=users_show');
}
?>