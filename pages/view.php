<?php

function SQLSelect($pdo, $table)
{
    $output = '';

    echo '
        <div class="row">
        <div class="col-xs-12">
            </br></br></br>
            <table id="' . $table . '"
                   data-toggle="table"
                   data-height="580"
                   data-show-columns="true"
                   data-show-toggle="true"
                   data-show-pagination-switch="true"
                   data-show-refresh="true"
                   data-search="true"
                   data-pagination="true"
                   data-resizable="true">
                   <thead><tr>';
    // Creating head of table
    $stmt = $pdo->prepare("SHOW COLUMNS FROM $table");
    $stmt->execute();
    $finfos = $stmt->fetch(PDO::FETCH_BOTH);
    echo '</br></br></br></br></br>';
    var_dump($finfos);
    foreach ($finfos as $val) {
        var_dump($val);
        echo "<th data-field='$val->name' data-sortable='true'> $val->name </th>";
    };
    echo '</tr></thead><tbody>';

    $stmt = $pdo->prepare('SELECT * FROM ?;');
    $stmt->execute([$table]);

    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        echo '<tr>';
        while (list($var, $val) = each($row)) {
            echo "<td> $val </td>";
        };
        echo '</tr>';
    };
    echo '</tbody></table></div></div>';


}


$required = ['users', 'clients', 'repair_invoice'];
if ((in_array($_GET['view'], $required)) && ($_SESSION['role'] == 'ROLE_ADMIN')) {
    $_SESSION['view'] = $_GET['view'];
    SQLSelect($pdo, $_SESSION['view']);
}




