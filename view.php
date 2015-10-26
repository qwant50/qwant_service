<?php

include_once 'config.php';
include_once 'session.php';

function SQLSelect($mysqli,$table)
{

    $sql = "SELECT * FROM $table;";
    $res = $mysqli->query($sql);

    $output ='';

    //Returning JSON result;
   if ($res) {

       // Creating head of table
       $finfos = mysqli_fetch_fields($res);
       echo '<thead><tr>';
       foreach ($finfos as $val) {
           echo "<th data-field='$val->name' data-sortable='true'> $val->name </th>";
       };
       echo '</tr></thead><tbody>';

       while ($row = mysqli_fetch_assoc($res)) {
           while (list($var, $val) = each($row)) {
               echo "<td> $val </td>";
           };
           echo '</tr>';
       };
       echo '</tbody>';

   } else {
       echo "<b>??????:</b> " . mysql_error() . "<br/>";
   }
    $res->close();
}

    startSession();

    if (isset($_GET['view'])) {
        $required = array('users','clients','repair_invoice');
        if ((in_array($_GET['view'],$required)) && ($_SESSION['role'] == 'ROLE_ADMIN')) {
            SQLSelect($mysqli, $_GET['view']);
        }
    }

    //file_put_contents('log_POST.log', print_r('answer:'.SQLSelect($mysqli,'countries').SQLSelect($mysqli,'cities'), 1), FILE_APPEND);

if ($mysqli) $mysqli->close();


?>