<?php
require_once '../classes/config.php';

$connection = new Connection();
$pdo = $connection->Connect();
$registry->set('pdo', $pdo);


startSession();
if (isset($_GET['login'])) {
    if ((isset($_POST['username'])) && (isset($_POST['password']))) {
        $username = trim($_POST['username']);
        $password = trim($_POST['password']);
        $stmt = $pdo->prepare("SELECT * FROM users where username = ? AND password = ? LIMIT 1;");
        $stmt->execute([$username, $password]);
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
if (isset($_POST['logout'])) {
    destroySession();
    exit(header('Location: index.php'));
};
if (isset($_POST['cancel'])) {
    exit(header('Location: index.php'));
};


if (!isset($_SESSION['login_user'])) require_once ROOT_PAGES . 'login.php';
else {
    ob_start();
    if (isset($_GET['logout'])) require_once ROOT_PAGES . 'logout.php';
    if (isset($_GET['update'])) require_once ROOT_PAGES . 'update.php';
    if (isset($_GET['view'])) require_once ROOT_PAGES . 'view.php';

    $content = ob_get_clean();

    ob_start();
    require_once ROOT_PAGES . 'layouts' . DIRSEP . 'layout.phtml';
    $layout = ob_get_clean();
    echo str_replace('{{content}}', $content, $layout);
}
