<?php
if($_GET["del"]){
mysql_query("delete from dersler where id=$_GET[del]")or die(mysql_error());	
echo "deleted.";
}
?>

<table width="305" border="1">
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
    <td><a href="hocagiris.php?s=lecturedelete&del=<?=$listele["id"];?>">Delete</a></td>
</tr>
<?
}
?>
</table>