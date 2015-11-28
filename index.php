<?php
define('__ROOT__', realpath(__DIR__));
require_once __ROOT__ . '/config.php';
require_once __ROOT__ . '/session.php';
startSession();
if (isset($_GET['login'])) {
    if ((isset($_POST['username'])) && (isset($_POST['password']))) {
        $username = $mysqli->real_escape_string(trim($_POST['username']));   // ?????????? ???????
        $password = $mysqli->real_escape_string(trim($_POST['password']));
        $sql = "SELECT * FROM users where username = '$username' AND password = '$password' LIMIT 1;";
        $res = $mysqli->query($sql); //run the query
        $row_cnt = $res->num_rows;
        if ($row_cnt == 1) {
            if (startSession()) {
                $_SESSION['login_user'] = $username;
                $row = $res->fetch_assoc();
                $_SESSION['role'] = $row['role'];
            }
        };
        $res->close();
        if ($mysqli) $mysqli->close();
    };
}
if (isset($_POST['logout'])){
    destroySession();
    exit(header('Location: index.php'));
};
if (isset($_POST['cancel'])){
    exit(header('Location: index.php'));
};
?>

<!DOCTYPE html>
<html>
<?php
include __ROOT__ . '/templates/html_head.tpl';
?>

<body>

<?php
if (isset($_SESSION['login_user'])) include __ROOT__ . '/templates/navbar.tpl';
?>


<div class="container" id="container">
    <!--  router -->
    </br></br></br>
    <?php
    if (isset($_GET['logout'])) {
        require_once __ROOT__ . '/logout.php';
    } else if (!isset($_SESSION['login_user'])) {
        require_once __ROOT__ . '/login.php';
    } else {
        if (isset($_GET['update'])) {
            require_once __ROOT__ . '/update.php';
        };
        if (isset($_GET['view'])) {  // starting view
            require_once __ROOT__ . '/view.php';
        }
    }
    ?>

</div>

</body>


<div id="modals">  <!-- modals  -->
</div>


</html>

