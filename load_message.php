<?php
$bdd = new PDO('mysql:host=127.0.0.1;dbname=msg;charset=utf8','root',"");

        $allMsg = $bdd->query("SELECT * FROM chat ORDER BY id DESC ");
        while ($msg = $allMsg -> fetch()) { ?>
        <b onload="notif()"><?= $msg['pseudo']  ?> : </b><?= $msg['message']  ?><br>
        <?php    
        }
        ?>

<script >
function notif() {
    /*var audio = new Audio('notif.mp3');
    audio.play();*/
    alert("Salut")
  
}
</script>