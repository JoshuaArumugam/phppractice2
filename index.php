<!DOCTYPE html>
<html>
    <head></head>
    <body>
        <?php
            session_start();
            if (isset($_SESSION["loginStatus"])) {
                if ($_SESSION["loginStatus"]) {
                    echo("<h1>Hello " . $_SESSION["forename"] . "</h1>");
                }
            }
        ?>
        <h1>Main page</h1>
        <a href="users.php">Add users/food</a><br>
        <a href="login.php">Login</a><br>
        <a href="logout.php">Logout</a><br>
    </body>
</html>