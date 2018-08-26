<?php
/**
 * Created by PhpStorm.
 * User: vmadmin
 * Date: 22.08.2018
 * Time: 08:50
 */
?>
<?php
 // include functions from login
   include_once 'functions.php';
?>
<!doctype HTML>
<html>
<head>
    <link rel="stylesheet" href="../css/main.css">
    <title>Register</title>
</head>
<body>
<noscript class="js error"><span>Please activate Javascript</span></noscript>
<h1>Register</h1>
<form method="post" class="register" action="data.php" >
    <div class="register-form">
        <fieldset class="register">
            <label for="" class="username">Username</label>
            <input type="text" class="UsnInput" placeholder="Your Username" onkeyup="formlength(10,64) <?php minLength($_POST['UsnInput'],10); maxLength($_POST['UsnInput'],64);?>">
            <br>
            <label for="" class="password">Password</label>
            <input type="password" class="PWInput" onkeyup="formlength(9,20),checkPWregex() <?php minLength($_POST['PWInput'],9); maxLength($_POST['PWInput'],20); ?>"  >
            <br>
            <label for="" class="password">Repeat Password</label>
            <input type="password" class="PWInputrepeat" onkeyup="samepassword(),formlength(4,20)"<?php minLength($_POST['PWInputrepeat'],4); maxLength($_POST['PWInputrepeat'],20); ?> >
            <br>
            <button class="save">Submit</button>
        </fieldset>
    </div>
</form>

<script src="../js/main.js" ></script>
</body>
</html>
