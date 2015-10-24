<?php
include_once 'config.php';
include_once 'session.php';

startSession();
if (!isset($_SESSION['login_user']))  {
        header('Location: ' . 'login.php');
};
if (isset($_POST['logout'])){
    destroySession();
    header('Location: ' . 'login.php');
};
if (isset($_POST['cancel'])){
    header('Location: ' . 'index.php');
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
        <div class="col-md-4 col-md-offset-4">
            <div class="panel panel-default">
                <div class="panel-heading"><strong class="">Logout <?php echo $_SESSION['login_user']; ?></strong>
                </div>
                <div class="panel-body">
                    <p>Are you sure?</p>
                    <form method="post" action="logout.php">
                        <button type="submit" name="logout" class="btn btn-default active ">Logout</button>
                        <button type="cancel" name="cancel" class="btn btn-default active ">Cancel</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

</body>
</html>