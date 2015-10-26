<?php
include_once 'config.php';
include_once 'session.php';


if ((isset($_POST['username'])) && (isset($_POST['password']))) {
    $username = $mysqli->real_escape_string($_POST['username']);   // ?????????? ???????
    $password = $mysqli->real_escape_string($_POST['password']);
    $sql = "SELECT * FROM users where username = '$username' AND password = '$password' LIMIT 1;";
    //if (file_exists('log_POST.log')) unlink('log_POST.log');
    //file_put_contents('log_POST.log', '======== ' . $sql, FILE_APPEND);
    $res = $mysqli->query($sql); //run the query
    $row_cnt = $res->num_rows;
    if ($row_cnt == 1) {
        if (startSession()) {
            $_SESSION['login_user'] = $username;
            $row = $res->fetch_assoc();
            var_dump($row);
            $_SESSION['role'] = $row['role'];
            header('Location: ' . 'index.php');
        }
    } else {

    };
    $res->close();
    if ($mysqli) $mysqli->close();
};
?>

<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap -->
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.4.6/angular.min.js"></script>
    <script src="/script.js"></script>
    <link rel="stylesheet" href="style.css" type="text/css">

</head>

<body>

<div class="container">

    <div class="row">
        <div class=" col-md-4 col-md-offset-4">
            <?php
            if ((isset($_POST['username'])) && (isset($_POST['password']))) {
                echo '<div class="alert alert-danger" role="alert">Username or password is incorrect!</div>';
            }
            ?>
            <div class="panel panel-default">
                <div class="panel-heading"><strong class="">Login</strong>
                </div>
                <div class="panel-body">
                    <form class="form-horizontal" method="post" action="login.php">
                        <div class="panel-body">
                            <div class="form-group input-group">
                                <span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>
                                <input type="username" class="form-control" name="username" placeholder="username"
                                       required autofocus>
                            </div>
                            <div class="form-group input-group">
                                <span class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></span>
                                <input type="password" class="form-control" name="password" placeholder="password"
                                       required>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-default active btn-block">Login</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

</body>
</html>