<!DOCTYPE html>
<html>
    <head>
        <title>Home</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="indexstyle.css">
    </head>
    <body>
        <div class="container-fluid">
            <div class="row flexrow">
                <div class="col-sm-12">
                    <div class="well well-lg">
                        <h4><strong>Reset food table</strong></h4>
                        <form class="form-inline" action="resetfood.php">
                            <button type="submit" class="btn btn-danger">Reset</button>
                        </form>
                        <h4><strong>Reset users table</strong></h4>
                        <form class="form-inline" action="resetusers.php">
                            <button type="submit" class="btn btn-danger">Reset</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="row" style="margin: 0px;">
                <div class="well well-lg" style="margin: 0px;">
                    <h3><strong>Add user</strong></h3>
                    <form action="adduser.php" method="post">
                        <div class="form-group">
                            <label for="forename">Forename: </label>
                            <input type="text" class="form-control" id="forename" name="forename">
                        </div>
                        <div class="form-group">
                            <label for="surname">Surname: </label>
                            <input type="text" class="form-control" id="surname" name="surname">
                        </div>
                        <div class="form-group">
                            <label for="password">Password: </label>
                            <input type="password" class="form-control" id="password" name="password">
                        </div>
                        <div class="form-group">
                            <label for="year">Year: </label>
                            <input type="number" class="form-control" id="year" name="year">
                        </div>
                        <div class="form-group">
                            <label for="balance">Balance: </label>
                            <input type="number" class="form-control" id="balance" name="balance">
                        </div>
                        <div class="form-group">
                            <div class="radio">
                                <label><input type="radio" name="role" value="pupil" checked>Pupil</label>
                            </div>
                            <div class="radio">
                                <label><input type="radio" name="role" value="teacher">Teacher</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-default">Add user</button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="row">
                <div class="well well-lg">
                    <h3><strong>Add food</strong></h3>
                    <form action="addfood.php" method="post">
                        <div class="form-group">
                            <label for="name">Food name: </label>
                            <input type="text" class="form-control" id="name" name="name">
                        </div>
                        <div class="form-group">
                            <label for="description">Description: </label>
                            <input type="text" class="form-control" id="description" name="description">
                        </div>
                        <div class="form-group">
                            <label for="category">Select category:</label>
                            <select class="form-control" name="category" id="category">
                                <option value="drink">Drink</option>
                                <option value="snack">Snack</option>
                                <option value="sandwich">Sandwich</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="price">Price: </label>
                            <input type="number" class="form-control" id="price" name="price">
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-default">Add food</button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="row">
                <div class="well well-lg flexrow" style="padding: 0;">
                    <div style="display: flex; flex-direction: column; width: 50%;">
                        <h3>Current users</h3>
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>UserID</th>
                                    <th>Username</th>
                                    <th>Forename</th>
                                    <th>Surname</th>
                                    <th>Password</th>
                                    <th>Year</th>
                                    <th>Balance</th>
                                    <th>Role</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    include_once("connection.php");
                                    $stmt1 = $conn->prepare("
                                    SELECT * FROM users
                                    ");
                                    $stmt1->execute();

                                    while ($row = $stmt1->fetch(PDO::FETCH_ASSOC)) {
                                        echo("<tr><td>".$row["UserID"]."</td><td>".$row["Username"]."</td><td>".$row["Forename"]."</td><td>".$row["Surname"]."</td><td>".$row["Password"]."</td><td>".$row["Year"]."</td><td>".$row["Balance"]."</td><td>".$row["Role"]."</td><td></tr>");
                                    }
                                ?>
                            </tbody>
                        </table>
                    </div>
                    <div style="display: flex; flex-direction: column; width: 50%;">
                        <h3>Current foods</h3>
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>FoodID</th>
                                    <th>Name</th>
                                    <th>Description</th>
                                    <th>Category</th>
                                    <th>Price</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    include_once("connection.php");
                                    $stmt1 = $conn->prepare("
                                    SELECT * FROM food
                                    ");
                                    $stmt1->execute();

                                    while ($row = $stmt1->fetch(PDO::FETCH_ASSOC)) {
                                        echo("<tr><td>".$row["FoodID"]."</td><td>".$row["Name"]."</td><td>".$row["Description"]."</td><td>".$row["Category"]."</td><td>".$row["Price"]."</td><td></tr>");
                                    }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>