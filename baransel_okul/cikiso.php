<?php
ob_start();
session_start();
unset($_SESSION["ogrenci_idd"]);
unset($_SESSION["ogrencigiris"]);
echo "Exiting...";
header("Refresh: 1; url=ogrencilogin.php");
?>