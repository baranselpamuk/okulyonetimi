<?php
error_reporting(0);
$link = mysql_connect("localhost", "root", "") or die(mysql_error());
$db = mysql_select_db("okul", $link) or die (mysql_error());
mysql_set_charset('latin5',$link);
?>