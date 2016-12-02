<?php
session_start();
$colorFont = "text-danger";
$errorMessage = '';

if (!isset($_SESSION['authenticated'])) {
    header("Location: login.php"); die();
}
if (isset($_SESSION['guesses'])) {
    $_SESSION['guesses'] = $_SESSION['guesses'] + 1;
} else {
    $_SESSION['guesses'] = 0;
}

if (isset($_POST['answer'])) {
    if($_POST['answer'] == $_SESSION['answer']) {
        $_SESSION['correct'] = $_SESSION['correct'] + 1;
        $errorMessage = "Correct!";
        $colorFont = "text-success";
    }elseif (empty($_POST['answer'])) {
            $errorMessage = "You did not enter a value";
            $colorFont = "text-danger";
        }
    elseif ($_POST['answer'] != $_SESSION['answer']) {
        $errorMessage = "Incorrect, " . $_SESSION['lastLeft'] . " " . $_SESSION['lastOperator'] . " " . $_SESSION['lastRight'] . " = " . $_SESSION['answer'] ;
        $colorFont = "text-danger";
    }
        
    }
    
 else {
     $_SESSION['correct'] = 0;
}

/*if(isset($_POST['answer']) && $_POST['answer'] == $_SESSION['answer']) {
    
} else {
    $_SESSION['correct'] = 0;
}*/
   


$leftNumber = rand(0, 20);
$rightNumber = rand(0, 20);
$plusMinus = rand(0, 1);

$_SESSION['lastLeft'] = $leftNumber; 
$_SESSION['lastRight'] = $rightNumber; 


if ($plusMinus == 1) {
    $lastOperator = "+";
} elseif ($plusMinus == 0) {
    $lastOperator = "-";
}
$_SESSION['lastOperator'] = $lastOperator;

if ($plusMinus == 1) {
    $_SESSION['answer'] = $leftNumber + $rightNumber;
} else {
    $_SESSION['answer'] = $leftNumber - $rightNumber;
}


?>





<meta name="viewport" content="width=device-width, initial-scale=1">
<script src="bootstrap-3.3.7-dist/js/jquery-2.1.3.min.js" type="text/javascript"></script>
<script src="bootstrap-3.3.7-dist/js/bootstrap.min.js" type="text/javascript"></script>
<link rel='stylesheet' href='bootstrap-3.3.7-dist/css/bootstrap.css' />
<link rel='stylesheet' href='style\coincoint.css' />

<body>
    <div class="container">
<form action="index.php" method="post" role="form" class="form-horizontal">
    <div class="row">
        <div class="col-sm-4 col-sm-offset-4"><h1>Math Game</h1></div>
        <div class="col-sm-4"><a href="logout.php" class="btn btn-default btn-sm">Logout</a></div>
    </div>
    <div class="row">
        <label class="col-sm-2 col-sm-offset-3"><?php echo($leftNumber);?></label>
        <label class="col-sm-2"><?php if ($plusMinus == 1) {
                echo "+";
            } else {
                echo "-";
            }?></label>
        <label class="col-sm-2"><?php echo($rightNumber);?></label>
        <div class="col-sm-3"></div>
    </div>

    <input type="hidden" name="first_number" value="8">
    <input type="hidden" name="operation" value="-">
    <input type="hidden" name="second_number" value="5">
    <input type="hidden" name="total" value="0">
    <input type="hidden" name="score" value="0">

    <div class="form-group">
        <div class="col-sm-3 col-sm-offset-4">
            <input type="text" class="form-control" id="answer" name="answer" placeholder="Enter answer" size="6">
        </div>
        <div class="col-sm-5"></div>
    </div>
    <div class="row">
        <div class="col-sm-3 col-sm-offset-4">
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <button type="submit" class="btn btn-primary btn-sm">
            Submit</button>
        </div>
        <div class="col-sm-3"></div>
    </div>
</form>
<hr>
<div class="row">
    <div class="col-sm-4 col-sm-offset-4"><p class=<?php echo($colorFont);?>><?php echo($errorMessage);?></p></div>
    <div class="col-sm-4"></div>
</div>
<div class="row">
    <div class="col-sm-4 col-sm-offset-4"><?php echo $_SESSION['correct']?> / <?php echo $_SESSION['guesses']?></div>
    <div class="col-sm-4"></div>
</div>
    </div>

</body>