<?php
/**
 * Created by PhpStorm.
 * User: vmadmin
 * Date: 22.08.2018
 * Time: 10:44
 */
?>
<?php

    include_once 'login.php';
    include_once 'functions.php';
    if(empty(session_id() || empty($_COOKIE['usn']))){
        $url = 'Location: login.php';
        echo '<script>alert(" \'You shall not pass\' The Black Knight ")</script>';
        header($url);
    }





    ?>
<!DOCTYPE HTML>
<html>
<head>
    <link rel="stylesheet" href="../css/main.css">
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Data</title>
</head>
<body>
    <!-- Hidden until a customMessage() is called -->
    <div id="alertContainer" class="customMessageContainer" style="visibility: hidden">
        <div class="customMessageBackground" id="alertBackground"></div>
        <div class="customMessageBox" id="alertBox">
            <div id="alertBoxTitle" class="customMessageTitle"></div><a class="customMessageClose" id="alertBoxClose" onclick="closeMessage()"><img src="https://png.icons8.com/metro/32/000000/close-window.png"></a>
            <div id="alertBoxContent" class="customMessageContent"></div>
        </div>
    </div>

 <!-- Data Stuff here !-->
    <h1 class="Title">Your Data</h1>
    <form action="data.php" method="post" class="Data">
        <div class="hobby">
            <label for="hobby">Enter ONE of your Hobbys</label>
            <input id="hobby" type="text" class="hobby" my-min-lengtH = "10" my-max-length="64" onkeyup="required(true,'hobby',formlength(10,64))<?php minLength($_POST['hobby'],10); maxLength($_POST['hobby'],64);?>">
        </div>
        <div>
            <label for="vehicle">How do you go to work?</label>
            <select name="Vehicles" id="vehicle" onclick="required(true,'vehicle')">
                <!-- Add a loop here if the Elem is selected!-->
                <?php $vehicle = Array('Car','Train','Bus','Motorcycle');
                foreach( $vehicle as $var => $Vehicles ): ?>
                <option value="<?php echo $var ?>"<?php if( $var == $result['vehicle'] ): ?> selected="selected"<?php endif; ?>><?php echo $vehicle ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <div onclick="required(true,'gender')">
            <label for="gender">Choose your Gender</label>
            <!-- Same for this-->
            <?php
            if(isset($_POST['rdgender']) || $_GET['fileuploader']){ ?>
            <input name="rdgender" id="gender" type="radio" class="gender" value="Male" <?php echo $_POST['rdgender'] == 'Male'?'checked;':'' ?>
            <input name="rdgender" id="gender" type="radio" class="gender" value="Female" <?php echo $_POST['rdgender'] == 'Female'?'checked;':'' ?>>
            <input name="rdgender" id="gender" type="radio" class="gender" value="Anything else" <?php echo $_POST['rdgender'] == 'Anything else'?'checked;':'' ?>>
            <?php } ?>
        </div>
        <div>
            <label for="favDrink">Enter your favorite Drink</label>
            <input id="favDrink" type="text" class="favDrink">
        </div>
        <button type="submit" onclick="<?php saveFile("",'M133','w','json')?>">Save File</button>
    </form>

    <form action="data.php <?php loadFile($_GET['fileuploader'])?>" class="fileuploader" method="get" ><
        <label for="fileuploader" class="uplLabel">Choose your file</label>
        <input id="fileuploader" type="file" class="fileuploader" >
        <button>Load File</button>
    </form>
</body>
</html>
