<?php
    include_once 'connector.php';

    $motor1 = $_POST['motor1'];
    $motor2 = $_POST['motor2'];
    $motor3 = $_POST['motor3'];
    $motor4 = $_POST['motor4'];
    $motor5 = $_POST['motor5'];
    $motor6 = $_POST['motor6'];
    $status = $_POST['status'];

    $boolean = 0;

    $motors = array($motor1, $motor2, $motor3, $motor4, $motor5, $motor6);
    for ($i = 0; $i <= 5; $i++) {
        $str= 'motor ' . ($i + 1);
        $sql = "UPDATE motors
                SET angle = $motors[$i]
                WHERE motor = '$str';";
        mysqli_query($conn, $sql);
    }

    if(isset($status) && $status == 'on') {
        $boolean = 1;
    }

    $sql = "UPDATE motors
            SET status = $boolean;";

    mysqli_query($conn, $sql);

    header("location: ../index.php");
