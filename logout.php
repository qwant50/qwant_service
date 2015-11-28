<div class="row">
    <div class="col-md-4 col-md-offset-4">
        <div class="panel panel-default">
            <div class="panel-heading"><strong class="">Logout <?php echo $_SESSION['login_user']; ?></strong>
            </div>
            <div class="panel-body">
                <p>Are you sure?</p>

                <form method="post" action="index.php?logout">
                    <button type="submit" name="logout" class="btn btn-default active ">Logout</button>
                    <button type="cancel" name="cancel" class="btn btn-default active ">Cancel</button>
                </form>
            </div>
        </div>
    </div>
</div>