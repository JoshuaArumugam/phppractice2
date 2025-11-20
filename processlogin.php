<?php
    //header("Location: login.php");
    print_r($_POST);
    array_map("htmlspecialchars", $_POST);
    include_once("connection.php");

    $stmt1 = $conn->prepare("
    SELECT * FROM users WHERE Username=:Username;
    ");
    $stmt1->bindParam(":Username", $_POST["username"]);
    $stmt1->execute();
    while ($row = $stmt1->fetch(PDO::FETCH_ASSOC)) {
        echo($row["Username"]." ".$row["Password"]."<br>");
    }

    
?>