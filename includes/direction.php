<?php
include_once 'connector.php';

$forward = 0; $right = 0; $backward = 0; $left = 0; $stop = 0;

if (isset($_POST['forward']))
    $forward = 1;
else if (isset($_POST['right']))
    $right = 1;
else if (isset($_POST['backward']))
    $backward = 1;
else if (isset($_POST['left']))
    $left = 1;
else if (isset($_POST['stop']))
    $stop = 1;

$sql = "UPDATE base
        SET f = $forward, r = $right, b = $backward, l = $left, s = $stop;";

mysqli_query($conn, $sql);

header("location: ../index.php");
