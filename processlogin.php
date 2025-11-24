<?php
    array_map("htmlspecialchars", $_POST);
    include_once("connection.php");
    session_start();

    $stmt1 = $conn->prepare("
    SELECT * FROM users WHERE Username=:Username;
    ");
    $stmt1->bindParam(":Username", $_POST["username"]);
    $stmt1->execute();
    while ($row = $stmt1->fetch(PDO::FETCH_ASSOC)) {
        if ($row["Password"] === $_POST["password"]) {
            $_SESSION["loginStatus"] = 1;
            header("Location: index.php");
        }
        else {
            $_SESSION["loginStatus"] = 0;
            header("Location: login.php");
        }
    }
?>