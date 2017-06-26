<?php
session_start();
unset($_SESSION["signin"]);
unset($_SESSION["username"]);
session_destroy();
session_unset();
echo("<meta http-equiv=\"refresh\" content=\"0;URL='Home.php'\">");
?>