<?php
    try {
        $db = new PDO('mysql:host=localhost;dbname=si_projekt;port=3306', 'root',
            '', array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
        }
        catch (PDOException $e) {
        echo 'Błąd: '.$e->getMessage();
        }
?>