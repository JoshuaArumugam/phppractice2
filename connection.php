<?php
    $servername = "localhost";
    $username = "root";
    $password = "password";
    $dbname = "lunches";
    try{
        $conn = new PDO("mysql:host=$servernamel; dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
    catch (PDOException $e) {
        echo("connection failed " . $e->getMessage() ."<br>");
    }
?>