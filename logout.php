<?php
     session_start();
     session_destroy();

     header("Location: buildapc.php");
?>