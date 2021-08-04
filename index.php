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

    $stringF = "btn-secondary"; $stringR = "btn-secondary"; $stringB = "btn-secondary"; $stringL = "btn-secondary"; $stringS = "btn-secondary";
    $sql = "SELECT * FROM base;";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($result);
    if($row[0] == 1)
        $stringF = "btn-primary";
    else if($row[1] == 1)
        $stringR = "btn-primary";
    else if($row[2] == 1)
        $stringB = "btn-primary";
    else if($row[3] == 1)
        $stringL = "btn-primary";
    else if($row[4] == 1)
        $stringS = "btn-primary";
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

<div>
    <form action="includes/direction.php" method="POST">
        <div class="text-center">
            <button type="submit" class="btn <?= $stringF ?> m-3" name="forward">forward</button>
        </div>

        <div class="text-center">
            <button type="submit" class="btn <?= $stringL ?> m-3" name="left">left</button>
            <button type="submit" class="btn <?= $stringS ?> m-3" name="stop">stop</button>
            <button type="submit" class="btn <?= $stringR ?> m-3" name="right">right</button>
        </div>

        <div class="text-center">
            <button type="submit" class="btn <?= $stringB ?> m-3" name="backward">backward</button>
        </div>
    </form>
</div>

<div class="mt-4 jumbotron">
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
              <button type="submit" class="btn btn-primary float-sm-right">Save</button>
            </div>
          </div>
        </form>
    </div>
</div>
    
<script>
  window.watsonAssistantChatOptions = {
      integrationID: "0071232a-86db-410e-836f-41f5a7de2fa4", // The ID of this integration.
      region: "us-east", // The region your integration is hosted in.
      serviceInstanceID: "345031a8-4aa0-4db3-8b8b-a5cac6f6214a", // The ID of your service instance.
      onLoad: function(instance) { instance.render(); }
    };
  setTimeout(function(){
    const t=document.createElement('script');
    t.src="https://web-chat.global.assistant.watson.appdomain.cloud/loadWatsonAssistantChat.js";
    document.head.appendChild(t);
  });
</script>

</body>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <script src="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/js/bootstrap4-toggle.min.js"></script>
  <script src="app.js"></script>
</html>
