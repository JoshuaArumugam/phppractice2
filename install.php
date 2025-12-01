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

    $stmt1 = $conn->prepare("
    INSERT INTO food
    (FoodID, Name, Description, Category, Price)
    VALUES
    (NULL, 'Coffee', 'Eefoc backwords', 'drink', 5),
    (NULL, 'Nut milk', 'From bubba', 'drink', 6.7),
    (NULL, 'Crisps', 'Fried potatoes', 'snack', 1),
    (NULL, 'Apple', 'Healthy snack', 'snack', 4),
    (NULL, 'Ham and cheese', 'Classic sandwich', 'sandwich', 2.3),
    (NULL, 'Dih cheese', 'Yummy', 'sandwich', 100)
    ");
    $stmt1->execute();

    $stmt1 = $conn->prepare("DROP TABLE IF EXISTS orders;
    CREATE TABLE orders
    (OrderID INT(4) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    OrderStatus INT(4) NOT NULL,
    UserID INT(4) NOT NULL,
    OrderDate DATETIME NOT NULL)
    ");
    $stmt1->execute();

    $stmt1 = $conn->prepare("DROP TABLE IF EXISTS basket;
    CREATE TABLE basket
    (OrderID INT(4) NOT NULL,
    FoodID INT(4) NOT NULL,
    Quantity INT(4) NOT NULL,
    PRIMARY KEY (OrderID, FoodID))
    ");
    $stmt1->execute();
?>