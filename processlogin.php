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
        $hashed = $row["Password"];
        $attempt = $_POST["password"];
        if (password_verify($attempt, $hashed)) {
            $_SESSION["forename"] = $row["Forename"];
            $_SESSION["surname"] = $row["Surname"];
            $_SESSION["loggedinid"] = $row["UserID"];
            $_SESSION["role"] = $row["Role"];
            $_SESSION["loginStatus"] = true;
            echo($_SESSION["loginStatus"]);
            header("Location: index.php");
        }
        else {
            $_SESSION["loginStatus"] = false;
            echo($_SESSION["loginStatus"]);
            header("Location: login.php");
        }
    }
?>