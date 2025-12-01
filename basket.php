<?php
    session_start();
    include_once("connection.php");

    $stmt1 = $conn->prepare("
    SELECT * FROM orders WHERE UserID=:UserID
    ");
    $stmt1->bindParam(":UserID", $_SESSION["loggedinid"]);
    $stmt1->execute();
    $row1 = $stmt1->fetch(PDO::FETCH_ASSOC);

    if (!$row1) {
        $stmt1 = $conn->prepare("
        INSERT INTO orders
        (OrderID, OrderStatus, UserID, OrderDate)
        VALUES
        (NULL, 0, :UserID, CURRENT_TIMESTAMP())
        ");
        $stmt1->bindParam(":UserID", $_SESSION["loggedinid"]);
        $stmt1->execute();

        $stmt1 = $conn->prepare("
        INSERT INTO basket
        (OrderID, FoodID, Quantity)
        VALUES
        ((SELECT OrderID FROM orders WHERE UserID=:UserID), :FoodID, :Quantity)
        ");
        $stmt1->bindParam(":UserID", $_SESSION["loggedinid"]);
        $stmt1->bindParam(":FoodID", $_POST["foodid"]);
        $stmt1->bindParam(":Quantity", $_POST["qty"]);
        $stmt1->execute();
    }
    else {
        $stmt1 = $conn->prepare("
        SELECT * FROM basket WHERE FoodID=:FoodID
        ");
        $stmt1->bindParam(":FoodID", $_POST["foodid"]);
        $stmt1->execute();

        $row2 = $stmt1->fetch(PDO::FETCH_ASSOC);

        if (!$row2) {
            $stmt1 = $conn->prepare("
            INSERT INTO basket
            (OrderID, FoodID, Quantity)
            VALUES
            ((SELECT OrderID FROM orders WHERE UserID=:UserID), :FoodID, :Quantity)
            ");
            $stmt1->bindParam(":UserID", $_SESSION["loggedinid"]);
            $stmt1->bindParam(":FoodID", $_POST["foodid"]);
            $stmt1->bindParam(":Quantity", $_POST["qty"]);
            $stmt1->execute();
        }
        else {
            $stmt1 = $conn->prepare("
            UPDATE basket SET Quantity = Quantity + :Quantity WHERE FoodID=:FoodID
            ");
            $stmt1->bindParam(":Quantity", $_POST["qty"]);
            $stmt1->bindParam(":FoodID", $_POST["foodid"]);
            $stmt1->execute();
        }
    }
    header("Location: buyfood.php");
?>