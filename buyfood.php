<!DOCTYPE html>
<html>
    <head>
        <title>Buy Food</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="indexstyle.css">
    </head>
    <body>
        <div class="jumbotron" style="padding: 5px; background-color: #337ab7; color: white; margin-bottom: 10px;">
            <div class="row">
                <div class="col-sm-12">
                    <?php
                        session_start();
                        if (isset($_SESSION["loginStatus"])) {
                            if ($_SESSION["loginStatus"]) {
                                echo("<h2><strong>Hello " . $_SESSION["forename"] . "</strong></h2>");
                                echo("<p style='font-size: 14px;'>Your balance: £" . $_SESSION["balance"] . "</p>");
                            }
                        }
                        else {
                            header(("Location: login.php"));
                        }
                    ?>
                </div>
            </div>
        </div>
        <div class="row" style="background-color: rgb(188, 188, 188);">
            <div class="col-sm-8" style="height: 100%;">
            <h1>Choose food</h1>
                <?php
                    include_once("connection.php");
                    $stmt1 = $conn->prepare("
                    SELECT * FROM food
                    ");
                    $stmt1->execute();

                    while ($row = $stmt1->fetch(PDO::FETCH_ASSOC)) {
                        echo("<form action='basket.php' method='POST'>");
                        echo($row["Name"] . " " . $row["Description"] . " £". $row["Price"] . "<input type='number' name='qty' min='1' value='1'><input name='foodid' type='hidden' value='" . $row["FoodID"] . "'><input type='submit' value='Add food'><br>");
                        echo("</form>");
                    }
                ?>
            </div>
            <div class="col-sm-4" style="height: 100%;">
            <h1>Basket</h1>
                <?php
                    $total = 0;
                    $stmt1 = $conn->prepare("
                    SELECT * FROM basket WHERE OrderID=(SELECT OrderID FROM orders WHERE UserID=:UserID)
                    ");
                    $stmt1->bindParam(":UserID", $_SESSION["loggedinid"]);
                    $stmt1->execute();

                    while ($row1 = $stmt1->fetch(PDO::FETCH_ASSOC)) {
                        $stmt2 = $conn->prepare("
                        SELECT * FROM food WHERE FoodID=:FoodID
                        ");
                        $stmt2->bindParam(":FoodID", $row1["FoodID"]);
                        $stmt2->execute();

                        while ($row2 = $stmt2->fetch(PDO::FETCH_ASSOC)) {
                            echo($row1["Quantity"] . "x " . $row2["Name"] . " £" . number_format($row1["Quantity"] * $row2["Price"], 2, ".", ",") . "<br>");
                            $total = $total + ($row2["Price"] * $row1["Quantity"]);
                        }
                    }
                    echo("Total: £" . number_format($total, 2, ".", ",") . "<br>");
                ?>
            </div>
        </div>
    </body>
</html>