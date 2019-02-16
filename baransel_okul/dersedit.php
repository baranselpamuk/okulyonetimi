s<table width="305" border="1">
  <tr>
    <td><b>Code</b></td>
    <td><b>Name</b></td>
    <td><b>Credit</b></td>
    <td><b>Midterm Per</b></td>
    <td><b>Final Per</b></td>
    <td><b>Choice</b></td>
  </tr>
<?php
$sor = mysql_query("select * from dersler where hoca_id=$_SESSION[hoca_id]");
while ($listele = mysql_fetch_array($sor)) {
?>
<tr>
<td><?=$listele["kodu"];?></td>
    <td><?=$listele["isim"];?></td>
    <td><?=$listele["kredi"];?></td>
    <td><?=$listele["vize_yuz"];?></td>
    <td><?=$listele["final_yuz"];?></td>
    <td><a href="hocagiris.php?s=newlecture&id=<?=$listele["id"];?>">Edit</a></td>
</tr>
<?
}
?>
</table>