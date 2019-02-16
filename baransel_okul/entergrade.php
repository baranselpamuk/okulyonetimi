<table width="305" border="1">
  <tr>
    <td><b>Code</b></td>
    <td><b>Name</b></td>
    <td><b>Credit</b></td>
  </tr>
<?php
$sor = mysql_query("select * from dersler where hoca_id=$_SESSION[hoca_id]");
while ($listele = mysql_fetch_array($sor)) {
?>
<tr>
<td><a href="hocagiris.php?s=studentlist&id=<?=$listele["id"];?>"><?=$listele["kodu"];?></a></td>
    <td><a href="hocagiris.php?s=studentlist&id=<?=$listele["id"];?>"><?=$listele["isim"];?></a></td>
    <td><a href="hocagiris.php?s=studentlist&id=<?=$listele["id"];?>"><?=$listele["kredi"];?></a></td>
</tr>
<?
}
?>
</table>