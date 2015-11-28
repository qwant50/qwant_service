<?php


function SQLSelect($mysqli, $table)
{

    $sql = "SELECT * FROM $table;";
    $res = $mysqli->query($sql);

    $output = '';

    if ($res) {
        echo '
        <div class="row">
        <div class="col-xs-12">
            </br></br></br>
            <table id="'.$table.'"
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
        $finfos = mysqli_fetch_fields($res);

        foreach ($finfos as $val) {
            echo "<th data-field='$val->name' data-sortable='true'> $val->name </th>";
        };
        echo '</tr></thead><tbody>';

        while ($row = mysqli_fetch_assoc($res)) {
            echo '<tr>';
            while (list($var, $val) = each($row)) {
                echo "<td> $val </td>";
            };
            echo '</tr>';
        };
        echo '</tbody></table></div></div>';

    } else {
        echo "<b>Error:</b> " . mysql_error() . "<br/>";
    }
    $res->close();
}

if (isset($_GET['view'])) {
    $required = array('users', 'clients', 'repair_invoice');
    if ((in_array($_GET['view'], $required)) && ($_SESSION['role'] == 'ROLE_ADMIN')) {
        $_SESSION['view'] = $_GET['view'];
        SQLSelect($mysqli, $_SESSION['view']);
    }
}

if ($mysqli) $mysqli->close();


