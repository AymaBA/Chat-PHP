<?php
$bdd = new PDO('mysql:host=127.0.0.1;dbname=msg;charset=utf8','root',"");

if (isset($_POST['pseudo']) AND isset($_POST['message']) AND !empty($_POST['pseudo']) AND !empty($_POST['message'])) {
    
    $pseudo = htmlspecialchars($_POST['pseudo']);
    $message =nl2br(htmlspecialchars($_POST['message']));

    $insertmsg = $bdd->prepare("INSERT INTO chat(pseudo,message) VALUES (?,?)");
    $insertmsg -> execute(array($pseudo,$message));

}




?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>  
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>Chat 🔥</title>
</head>
<body>

<audio src="notif.mp3"></audio>

<center>
<div class="title">
<h3>Message <span>💬</span></h3>
</div>
<form action="" method="post">
    <label for="">Pseudo : </label>
    <input  class="form-control" type="text" name="pseudo" placeholder="PSEUDO" value="<?php if (isset($_POST['pseudo'])) { echo $_POST['pseudo']; }?>" required><br>
    <label for="">Message : </label><br>
    <textarea class="form-control"   name="message" id="" cols="10%" rows="10" placeholder="MESSAGE" required ></textarea><br>
    
    <input class="btn btn-success" text-align="center" type="submit" name="submit" value="Envoyer 🔥"><br>

</form>

<button class="btn btn-success"></button>
</center>
<div id="message">
    <?php

        $allMsg = $bdd->query("SELECT * FROM chat ORDER BY id DESC ");
        while ($msg = $allMsg -> fetch()) { ?>
        <b onload="notif()" id="msgLoad"><?= $msg['pseudo']  ?> : </b><?= $msg['message']  ?><br>
        <?php    
        }
        ?>
</div>






<script>
    setInterval('load_message()',1000);
    function load_message(){
        $('#message').load("load_message.php");
    }

   
</script>
<script>
 var loadBold = document.querySelector("b");
 var audio = document.querySelector("audio");


 loadBold.addEventListener("load", notif());
 function notif() {
    audio.play();
  }



</script>

</body>
</html>