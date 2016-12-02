<?php
session_start();

$urlBack = "Location:login.php?";
$email = $_POST["email"];
$password = $_POST["password"];

if ($email != "A00@840062" && $password != 'hellothere') {
    $urlBack = $urlBack . "email=1&password=1&";
    header($urlBack); die();
} else {
    $_SESSION['authenticated'] = true;
    header("Location: index.php"); die();
}
    





            

?>
<meta name="viewport" content="width=device-width, initial-scale=1">
<script src="bootstrap-3.3.7-dist/js/jquery-2.1.3.min.js" type="text/javascript"></script>
<script src="bootstrap-3.3.7-dist/js/bootstrap.min.js" type="text/javascript"></script>
<link rel='stylesheet' href='bootstrap-3.3.7-dist/css/bootstrap.css' />
<link rel='stylesheet' href='style\coincoint.css' />

<div class='container'>
    <div class='row'>
        <div class='col-sm-10 col-sm-offset-1'>
            <h1>Please login to enjoy our math game</h1>
    </div>
    </div>
</div>

