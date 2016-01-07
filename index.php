<?php
define ('DIRSEP', DIRECTORY_SEPARATOR);
define ('__ROOT__', realpath(__DIR__). DIRSEP);

// ???????? ??????? «?? ????»
function __autoload($class_name) {
    $filename = strtolower($class_name) . '.php';
    $file = __ROOT__ . 'classes' . DIRSEP . $filename;
    if (file_exists($file) == false) {
        return false;
    }
    include ($file);
}

$registry = new Registry;

require_once __ROOT__ . 'session.php';

$connection = new Connection();
$pdo = $connection->Connect();
$registry->set ('pdo', $pdo);


startSession();
if (isset($_GET['login'])) {
    if ((isset($_POST['username'])) && (isset($_POST['password']))) {
        $username = trim($_POST['username']);
        $password = trim($_POST['password']);
        $stmt = $pdo->prepare("SELECT * FROM users where username = ? AND password = ? LIMIT 1;");
        $stmt->execute([$username,$password]);
        $row_cnt = $stmt->rowCount();
        if ($row_cnt == 1) {
            if (startSession()) {
                $_SESSION['login_user'] = $username;
                $row = $stmt->fetch(PDO::FETCH_LAZY);
                $_SESSION['role'] = $row['role'];
            }
        };
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
include __ROOT__ . 'templates/html_head.tpl';
?>

<body>

<?php
if (isset($_SESSION['login_user'])) include __ROOT__ . 'templates/navbar.tpl';
?>


<div class="container" id="container">
    <!--  router -->
    </br></br></br>
    <?php
    if (isset($_GET['url'])) {
        require_once  __ROOT__ . 'libs/bootstrap.php';
        $app = new Bootstrap();
    }
    else {
        if (isset($_GET['logout'])) require_once __ROOT__ . 'logout.php';
        if (!isset($_SESSION['login_user'])) require_once __ROOT__ . 'login.php';
        if (isset($_GET['update'])) require_once __ROOT__ . 'update.php';
        if (isset($_GET['view'])) require_once __ROOT__ . 'view.php';
    }
    ?>

</div>

</body>


<div id="modals">  <!-- modals  -->
</div>


</html>

