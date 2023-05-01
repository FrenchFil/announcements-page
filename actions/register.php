<?php
    include 'conn.php';

    $errors = array();

    $stmt = $db->query('SELECT Login FROM users');
    $users = $stmt->fetchAll(PDO::FETCH_ASSOC);

    if (count($_POST) > 0){

        if(array_key_exists('login', $_POST) && $_POST['login'] != ''){
            $login = $_POST['login'];
        }else{
            $errors['login'] = "Login jest wymagany";
        }

        if(array_key_exists('password', $_POST) && $_POST['password'] != ''){
            if(array_key_exists('secPassword', $_POST) and $_POST['password'] == $_POST['secPassword']){
                $password = $_POST['password'];
            }else{
                $errors['secPassword'] = "Hasło musi być takie same";
            }
        }else if(strlen($_POST['password'])<8 || strlen($_POST['password'])>20 || str_contains($_POST['password'], ' ')){
            $errors['password'] = "Hasło nie spełnia wymagań";
        }else{
            $errors['password'] = "Hasło jest wymagane";
        }

        if(array_key_exists('name', $_POST)and $_POST['name'] != ''){
            $name = $_POST['name'];
        }else{
            $errors['name'] = "Imie jest wymagane";
        }

        if(array_key_exists('lastName', $_POST)and $_POST['lastName'] != ''){
            $lastName = $_POST['lastName'];
        }else{
            $errors['lastName'] = "Nazwisko jest wymagane";
        }

        if(array_key_exists('email', $_POST)and $_POST['email'] != ''){
            $mail = $_POST['email'];
        }else{
            $errors['email'] = "Mail jest wymagany";
        }

        if (count($errors) == 0) {

        $temp = true;
            foreach($users as $us){
                if($us['Login']!=$login){
                $temp = true;
                }else{
                    $temp = false;
                    break;
                }
            }
            if($temp==true){

                $password = password_hash($password, PASSWORD_DEFAULT);

                $stmt1 = $db->prepare("INSERT INTO users (Login, Password, Name, LastName, Mail) VALUES (?,?,?,?,?)");
                $stmt1->bindValue(1,$login);
                $stmt1->bindValue(2,$password);
                $stmt1->bindValue(3,$name);
                $stmt1->bindValue(4,$lastName);
                $stmt1->bindValue(5,$mail);
                $stmt1->execute();

                header('Location: index.php?action=home');
            }else{
                $errors['login'] = "Taki login już istnieje";
            }
        }
    }

?>