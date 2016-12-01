<?php
session_start();
?>

<meta name="viewport" content="width=device-width, initial-scale=1">
<script src="bootstrap-3.3.7-dist/js/jquery-2.1.3.min.js" type="text/javascript"></script>
<script src="bootstrap-3.3.7-dist/js/bootstrap.min.js" type="text/javascript"></script>
<link rel='stylesheet' href='bootstrap-3.3.7-dist/css/bootstrap.css' />
<link rel='stylesheet' href='style\coincoint.css' />
   <?php 

    $loginErr = "Invalid login credentials";
    ?>
<div class='container'>
    <div class='row'>
        <div class='col-sm-10 col-sm-offset-1'>
            <h1>Please login to enjoy our math game</h1>
    </div>
    <form action='verify.php' method='post' role='form' class='form-horizontal'>
        <div class='form-group'>
            <div class='col-sm-4 text-right'>Email: </div>
            <div class='col-sm-3'>
                <input type='email' placeholder='Email' name='email' class='form-control' size='6'>
            </div>
        </div>
        <div class='form-group'>
            <div class='col-sm-4 text-right'>Password: </div>
            <div class='col-sm-3'>
                <input type='password' placeholder='Password' name='password' class='form-control' size='6'>
            </div>
        </div>
        <div class="col-sm-3 col-sm-offset-4">
            <button type="submit" class="btn btn-primary">Login</button>
        </div>
        <p class="col-sm-3 col-sm-offset-4 text-danger"><?php if(isset($_GET['email'])){
        echo($loginErr);
    }?></p>
    </form>