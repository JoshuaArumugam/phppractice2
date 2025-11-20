<?php
    header("Location: index.php");
    include_once("connection.php");

    $sql = "USE Lunches";
    $conn->exec($sql);

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