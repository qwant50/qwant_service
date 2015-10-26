<?php
include_once 'session.php';
    startSession();
    // If is user dont login - go to logoin page
    if (!isset($_SESSION['login_user'])) header('location: login.php');

?>
<!DOCTYPE html>
<html ng-app="myApp">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap -->
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <script src="lib/bootstrap-table/bootstrap-table.js"></script>
    <script src="lib/bootstrap-table/extensions/resizable/bootstrap-table-resizable.js"></script>
    <script src="lib/bootstrap-table/extensions/resizable/colResizable-1.5.source.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.4.6/angular.min.js"></script>
    <script src="/script.js"></script>
    <link rel="stylesheet" href="lib/bootstrap-table/bootstrap-table.css">
    <link rel="stylesheet" href="style.css" type="text/css">

</head>

<body>

<nav class="navbar navbar-default navbar-fixed-top">
    <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#"><img class="img-responsive " style="height: 39px; margin-top: -10px;" src="img/logo.png"  border="0" alt="logo"></a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li class="active"><a href="#">Create a new RI<span class="sr-only"></span></a></li>
                <li><a href="#">Link</a></li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">View<span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="index.php?view=repair_invoice">Repair invoice</a></li>
                        <li><a href="#">...</a></li>
                        <li><a href="#">...</a></li>
                        <li role="separator" class="divider"></li>
                        <li><a href="#">...</a></li>
                        <li role="separator" class="divider"></li>
                        <li><a href="#">...</a></li>
                    </ul>
                </li>
            </ul>
            <form class="navbar-form navbar-left" role="search">
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="Search">
                </div>
                <button type="submit" class="btn btn-default">Submit</button>
            </form>
            <ul class="nav navbar-nav navbar-right">
                <li><a href="#">Link</a></li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                        <span class="glyphicon glyphicon-wrench"></span><span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="index.php?view=users">Users</a></li>
                        <li><a href="#">...</a></li>
                        <li><a href="#">...</a></li>
                        <li role="separator" class="divider"></li>
                        <li><a href="#">...</a></li>
                    </ul>
                </li>
                <p class="navbar-text navbar-right">Signed in as <b><a href="logout.php" class="navbar-link"><?php echo $_SESSION['login_user']; ?></a></b></p>
            </ul>
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>

<div class="container" ng-controller="MyCtrl">

    <div class="row">
        <div class="col-xs-12">
            </br></br></br>
            <table id="table"
                   data-toggle="table"
                   data-height="580"
                   data-show-columns="true"
                   data-search="true"
                   data-advanced-search="true"
                   data-id-table="advancedTable"
                   data-show-toggle="true"
                   data-pagination="true"

                   data-resizable="true">

                <?php  include 'view.php';  ?>
            </table>

        </div>
    </div>
</div>

</body>
</html>

