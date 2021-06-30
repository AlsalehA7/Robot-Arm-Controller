<?php
    include_once 'includes/connector.php';

    $motors = array();
    for ($i = 0; $i <= 5; $i++) {
        $str= 'motor ' . ($i + 1);
        $sql = "SELECT angle FROM motors
                WHERE motor = '$str';";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_array($result);
        $motors[] = $row[0];
    }

    $sql = "SELECT status FROM motors;";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($result);
    $checked = 'unchecked';
    if($row[0] == 1){
        $checked = 'checked';
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Control</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link href="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/css/bootstrap4-toggle.min.css" rel="stylesheet">
</head>

<body>

<div class="jumbotron text-center">
  <h1>Control Panel</h1>
</div>

<div class="container">
    <form action="includes/save.php" method="POST">
      <div class="row">
        <div class="col-sm-4">
          <h3>Motor 1</h3>
          <div class="slidecontainer">
            <input type="range" value="<?= $motors[0] ?>" min="0" max="180" oninput="this.nextElementSibling.value = this.value" name = "motor1">
            <output><?= $motors[0] ?></output>
          </div>
        </div>
        <div class="col-sm-4">
          <h3>Motor 2</h3>
          <div class="slidecontainer">
            <input type="range" value="<?= $motors[1] ?>" min="0" max="180" oninput="this.nextElementSibling.value = this.value" name = "motor2">
            <output><?= $motors[1] ?></output>
          </div>
        </div>
        <div class="col-sm-4">
          <h3>Motor 3</h3>
          <div class="slidecontainer">
            <input type="range" value="<?= $motors[2] ?>" min="0" max="180" oninput="this.nextElementSibling.value = this.value" name = "motor3">
            <output><?= $motors[2] ?></output>
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col-sm-4">
          <h3>Motor 4</h3>
          <div class="slidecontainer">
            <input type="range" value="<?= $motors[3] ?>" min="0" max="180" oninput="this.nextElementSibling.value = this.value" name = "motor4">
            <output><?= $motors[3] ?></output>
          </div>
        </div>
        <div class="col-sm-4">
          <h3>Motor 5</h3>
          <div class="slidecontainer">
            <input type="range" value="<?= $motors[4] ?>" min="0" max="180" oninput="this.nextElementSibling.value = this.value" name = "motor5">
            <output><?= $motors[4] ?></output>
          </div>
        </div>
        <div class="col-sm-4">
          <h3>Motor 6</h3>
          <div class="slidecontainer">
            <input type="range" value="<?= $motors[5] ?>" min="0" max="180" oninput="this.nextElementSibling.value = this.value" name = "motor6">
            <output><?= $motors[5] ?></output>
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col-sm-6">
          <input type="checkbox" <?= $checked ?> data-toggle="toggle" data-size="sm" name="status">
        </div>
        <div class="col-sm-6 m-10">
          <button type="submit" class="btn btn-primary float-sm-right"">Save</button>
        </div>
      </div>
    </form>
</div>

</body>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <script src="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/js/bootstrap4-toggle.min.js"></script>
  <script src="app.js"></script>
</html>