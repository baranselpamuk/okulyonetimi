<?php
ob_start();
session_start();
unset($_SESSION["hoca_id"]);
unset($_SESSION["hocagiris"]);
echo "Exiting...";
header("Refresh: 1; url=hocalogin.php");
?>