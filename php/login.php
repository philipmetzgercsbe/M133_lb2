<?php
/**
 * Created by PhpStorm.
 * User: vmadmin
 * Date: 21.08.2018
 * Time: 11:21
 */
?>
<?php

       include_once 'functions.php';

        if(isset($_SESSION['id'])){
            $redirect = 'Location: data.php';
            header($redirect);
        }
        if(isset($_POST['username'])){
        if($_POST['username'] == 'm133' && $_POST['password'] == 'm133sec') {
            session_start();
            $url = 'Location: login.php';
            header($url);
        }else{ ?>
<script> customMessage(<?php echo $_POST['username'] || $_POST['password'] . 'was wrong' ?>,'Wrong Username or Password',false ) </script>
<?php }}
        if(isset($_COOKIE['usn'])){
            header($url);
        }
    if(isset($_POST['rememberme'])){
        header($redirect);
        $username = $_POST['username'];
        $password = $_POST['password'];
        $cookietime = time() + 3600 * 24;
        setcookie('Usn',$username,$cookietime,'/');
        setcookie('pw',$password,$cookietime,'/');
    }
   /* */

?>

<!DOCTYPE HTML>
<html>

<head>
    <link rel="stylesheet" href="../css/main.css">
    <title>Login</title>
</head>
<body>
<div id="alertContainer" class="customMessageContainer" style="visibility: hidden">
    <div class="customMessageBackground" id="alertBackground"></div>
    <div class="customMessageBox" id="alertBox">
        <div id="alertBoxTitle" class="customMessageTitle"></div><a class="customMessageClose" id="alertBoxClose" onclick="closeMessage()"><img src="https://png.icons8.com/metro/32/000000/close-window.png"></a>
        <div id="alertBoxContent" class="customMessageContent"></div>
    </div>
</div>
    <h1 class="Title">Login</h1>
    <form action="login.php" class="login" onsubmit="">
        <div class="form-group">
            <fieldset>
            <label for="">Username</label>
            <input type="text" onkeyup="checkInput()" my-min-length = "10" my-max-length ="64" <?php if(isset($_POST['username'])){minLength($_POST['username'],10); maxLength($_POST['username'],64);} ?> >
            <label for="">Password</label>
            <input type="password" onkeyup="checkPWregex(),formlength(8,20)" autocomplete="on" my-min-length = "5", my-max-length="20" <?php if(isset($_POST['password'])){minLength($_POST['password'],8); maxLength($_POST['password'],20);} ?>>
            <input type="checkbox" class ="rememberme" value="<?php if(isset($_POST['rememberme'])){ echo 'true';}else{ echo 'false';} ?>" >Save Login?<br>
            </fieldset>
            <a class="Link" href="register.php">Register</a>
        </div>
        <div class="form-group">
            <button id="btnsubmit">Login</button>
        </div>
    </form>
<script src="../js/main.js"></script>
</body>
</html>
