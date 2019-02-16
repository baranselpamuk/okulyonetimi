<table width="362" border="1">
  <tr>
    <td width="40"><b>Name</b></td>
    <td width="63"><b>SurName</b></td>
    <td width="55"><b>Student ID</b></td>
    <td width="80"><b>Department</b></td>
    <td width="90"><b>Choice</b></td>
  </tr>
<?php
$slist = mysql_query("select * from ogrenci_dersler where kod_id='$_GET[id]'");
while ($studentlist = mysql_fetch_array($slist)) {
	$askstd = mysql_fetch_assoc(mysql_query("SELECT * FROM ogrenci where id='$studentlist[ogrenci_id]'"));
	$askdepartment = mysql_fetch_assoc(mysql_query("SELECT * FROM bolum where id='$askstd[bolum]'"));
?>
<tr>
<td><?=$askstd["isim"];?></td>
    <td><?=$askstd["soyad"];?></td>
    <td><?=$askstd["ogrenci_no"];?></td>
    <td><?=$askdepartment["adi"];?></td>
    <td><a href="hocagiris.php?s=grade&id=<?=$studentlist["id"];?>">Enter A Grade</a></td>
</tr>
<?
}
?>
</table>