<?php
    include_once("connection.php");

    $sql = "CREATE DATABASE IF NOT EXISTS Lunches";
    $conn->exec($sql);

    $sql = "USE Lunches";
    $conn->exec($sql);

    $stmt1 = $conn->prepare("DROP TABLE IF EXISTS users;
    CREATE TABLE users
    (UserID INT(4) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    Username VARCHAR(20) NOT NULL,
    Surname VARCHAR(20) NOT NULL,
    Forename VARCHAR(20) NOT NULL,
    Password VARCHAR(200) NOT NULL,
    Year INT(2) NOT NULL,
    Balance DECIMAL(15, 2) NOT NULL,
    Role TINYINT(1));
    ");
    $stmt1->execute();

    $hashedpassword = password_hash("password", PASSWORD_DEFAULT);
    echo($hashedpassword);
    $stmt1 = $conn->prepare("
    INSERT INTO users
    (UserID, Username, Surname, Forename, Password, Year, Balance, Role)
    VALUES
    (NULL, 'KirkC', 'Kirk', 'Charlie', :Password, 12, 67, 1),
    (NULL, 'ClintonB', 'Clinton', 'Bill', :Password, 12, 100, 0)
    ");
    $stmt1->bindParam(":Password", $hashedpassword);
    $stmt1->execute();
    
    $stmt1 = $conn->prepare("DROP TABLE IF EXISTS food;
    CREATE TABLE food
    (FoodID INT(4) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    Name VARCHAR(20) NOT NULL,
    Description VARCHAR(100) NOT NULL,
    Category VARCHAR(20) NOT NULL,
    Price DECIMAL(5, 2) NOT NULL)
    ");
    $stmt1->execute();
?>