<?php
    include 'conn.php';

    $stmt0 = $db->prepare("SELECT Id,Name FROM category");
    $stmt0->execute();
    $result = $stmt0->fetchAll(PDO::FETCH_ASSOC);

$cat_name;


$stmt123 = $db->query("SELECT Id, Name, Category, Price FROM Ads WHERE isApproved = 1 LIMIT 10");
$ads = $stmt123->fetchAll(PDO::FETCH_ASSOC);

if (count($_GET) > 1) {

    foreach($result as $cat ){
        if($cat['Id']==$_GET['category']){
            $_SESSION['category'] = $cat['Name'];
        }
    }

    $stmt = $db->prepare("SELECT Id, Name, Category, Price FROM Ads WHERE Category = ?");
    $stmt->bindValue(1,$_GET['category']);
    $stmt->execute();
    $ads = $stmt->fetchAll(PDO::FETCH_ASSOC);
}

$query = "SELECT Id, Name, Category, Price FROM Ads";
$conditions = array();

if (count($_POST) > 0) {

    if(array_key_exists('name', $_POST)and $_POST['name'] != ''){
        $conditions[] ='Name LIKE "%'.$_POST['name'].'%"';
    }

    if(array_key_exists('category', $_POST)and $_POST['category'] != ''){

        $_SESSION['category'] = $_POST['category'];

        foreach($result as $cat ){
            if($cat['Name']==$_POST['category']){
                $my_category = $cat['Id'];
            }
        }
        if(isset($my_category))
            $conditions[] ="Category=".'"'.$my_category.'"';
    }

    if(array_key_exists('price', $_POST)and $_POST['price'] != ''){
        $conditions[] ="Price<".$_POST['price'];
    }

    if(array_key_exists('city', $_POST)and $_POST['city'] != ''){
        $conditions[] ="City=".'"'.$_POST['city'].'"';
    }

    $sql = $query;
    if (count($conditions) > 0) {
      $sql .= " WHERE " . implode(' AND ', $conditions);
    }
    $stmt1 = $db->query($sql);
    $ads = $stmt1->fetchAll(PDO::FETCH_ASSOC);
}
?>