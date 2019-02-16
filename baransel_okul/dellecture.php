<?php
if($_GET["del"]){
mysql_query("delete from ogrenci_dersler where id=$_GET[del]")or die(mysql_error());	
echo "deleted.";
}
?>
<table width="305" border="1">
  <tr>
    <td><b>Code</b></td>
    <td><b>Name</b></td>
    <td><b>Credit</b></td>
    <td><b>Choice</b></td>
  </tr>
<?php
$asklecture = mysql_query("select * from ogrenci_dersler where ogrenci_id=$_SESSION[ogrenci_idd]");
while($alecture = mysql_fetch_array($asklecture)) {
	$listele = mysql_fetch_assoc(mysql_query("SELECT * FROM dersler where id='$alecture[kod_id]'"));	
?>
<tr>
<td><?=$listele["kodu"];?></td>
    <td><?=$listele["isim"];?></td>
    <td><?=$listele["kredi"];?></td>
    <td><a href="ogrencigiris.php?s=dellecture&del=<?=$alecture["id"];?>">Delete</a></td>
</tr>
<?
}
?>
</table>