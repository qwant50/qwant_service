<div class="row">
    <div class=" col-md-4 col-md-offset-4">
        <?php
        if ((isset($_POST['username'])) && (isset($_POST['password']))) {
            echo '<div class="alert alert-danger" role="alert">Username or password is incorrect!</div>';
        }
        ?>
        <div class="panel panel-default">
            <div class="panel-heading"><strong>Login</strong>
            </div>
            <div class="panel-body">
                <form class="form-horizontal" method="post" action="index.php?login">
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
