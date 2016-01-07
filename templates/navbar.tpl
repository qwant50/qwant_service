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
            <a class="navbar-brand" href="index.php"><img class="img-responsive " style="height: 39px; margin-top: -10px;" src="img/logo.png"  border="0" alt="logo"></a>
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
                <p class="navbar-text navbar-right">Signed in as <b><a href="index.php?logout" class="navbar-link"><?php echo $_SESSION['login_user']; ?></a></b></p>
            </ul>
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>
