<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="indexstyle.css">
        <style>
            html, body {
                background-color: rgb(188, 188, 188);;
            }
        </style>
    </head>
    <body>
        <div class="centerdiv">
            <div class="row">
                <div class="col-sm-2"></div>
                <div class="col-sm-8">
                    <div class="panel panel-info">
                        <div class="panel-heading">
                            <h1>Main page</h1>
                        </div>
                        <div class="panel-body p-3">
                            <?php
                                session_start();
                                if (isset($_SESSION["loginStatus"])) {
                                    if ($_SESSION["loginStatus"]) {
                                        echo("<h4><strong>Hello " . $_SESSION["forename"] . "</strong></h4>");
                                    }
                                }
                            ?>
                            <div class="well well-sm">
                                <a href="users.php">Add users/food</a><br>
                                <a href="buyfood.php">Buy Food</a><br>
                                <?php
                                if (isset($_SESSION["loginStatus"])) {
                                    echo('<a href="logout.php">Logout</a><br>');      
                                }
                                else {
                                    echo('<a href="login.php">Login</a><br>');
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-2"></div>
            </div>
        </div>
    </body>
</html>