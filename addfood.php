<?php
    header("Location: index.php");
    print_r($_POST);
    include_once("connection.php");

    $stmt1 = $conn->prepare("
    INSERT INTO food
    (FoodID, Name, Description, Category, Price)
    VALUES
    (NULL, :Name, :Description, :Category, :Price)
    ");
    $stmt1->bindParam(":Name", $_POST["name"]);
    $stmt1->bindParam(":Description", $_POST["description"]);
    $stmt1->bindParam(":Category", $_POST["category"]);
    $stmt1->bindParam(":Price", $_POST["price"]);
    $stmt1->execute();
?>