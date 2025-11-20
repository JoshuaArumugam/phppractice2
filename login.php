<?php
    session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Login</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
        <style>
            html, body {
                background-color:rgb(188, 188, 188);
            }
        </style>
        <link rel="stylesheet" href="indexstyle.css">
    </head>
    <body>
        <div class="centerdiv">
            <div class="row" style="margin: 0px;">
                <div class="col-sm-2"></div>
                <div class="col-sm-8">
                    <div class="panel panel-primary" style="margin: 0px;">
                        <div class="panel-heading">
                            <h3><strong>Login</strong></h3>
                        </div>
                        <div class="panel-body">
                            <form id="form" action="processlogin.php" method="post">
                                <div class="form-group">
                                    <label for="username">Username: </label>
                                    <input type="text" class="form-control" id="username" name="username">
                                </div>
                                <div class="form-group">
                                    <label for="password">Password: </label>
                                    <input type="password" class="form-control" id="password" name="password">
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-default">Login</button>
                                </div>
                            </form>
                            <div class="alert alert-danger collapse" style="height: 100%;" id="incorrect"><strong>Incorrect username or password</strong></div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-2"></div>
            </div>
        </div>
        <?php
            if (isset($_SESSION["msg"])) {
                if ($_SESSION["msg"] == 1) {
                    unset($_SESSION["msg"]);
                }
                else {
                    echo("<script>$('#incorrect').removeClass('collapse');</script>");
                    unset($_SESSION["msg"]);
                }
            }
        ?>
    </body>
</html>