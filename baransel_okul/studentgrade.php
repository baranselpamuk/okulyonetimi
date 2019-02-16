<table width="305" border="1">
  <tr>
    <td><b>Code</b></td>
    <td><b>Name</b></td>
    <td><b>Credit</b></td>
    <td><b>Midterm</b></td>
    <td><b>Final</b></td>
    <td><b>NOTE</b></td>
  </tr>
<?php
$asklecture = mysql_query("select * from ogrenci_dersler where ogrenci_id=$_SESSION[ogrenci_idd]");
while($alecture = mysql_fetch_array($asklecture)) {
	$listele = mysql_fetch_assoc(mysql_query("SELECT * FROM dersler where id='$alecture[kod_id]'"));
	
	$answer=(($alecture["vize"])*("0.".$listele["vize_yuz"]))+(($alecture["final"])*("0.".$listele["final_yuz"]));
	
	
	
?>
<tr>
<td><?=$listele["kodu"];?></td>
    <td><?=$listele["isim"];?></td>
    <td><?=$listele["kredi"];?></td>
    <td><?=$alecture["vize"];?></td>
    <td><?=$alecture["final"];?></td>
    <td><?
    if($answer>=95 && $answer<=100) {
    echo $answer." => A";
    } elseif($answer>=90 && $answer<=94) {
    echo $answer." => A-";
    } elseif($answer>=85 && $answer<=89) {
    echo $answer." => B+";
    } elseif($answer>=80 && $answer<=84) {
    echo $answer." => B";
    } elseif($answer>=75 && $answer<=79) {
    echo $answer." => B-";
    } elseif($answer>=70 && $answer<=74) {
    echo $answer." => C+";
    } elseif($answer>=65 && $answer<=69) {
    echo $answer." => C";
    } elseif($answer>=60 && $answer<=64) {
    echo $answer." => C-";
    } elseif($answer>=55 && $answer<=59) {
    echo $answer." => D+";
    }elseif($answer>=50 && $answer<=54) {
    echo $answer." => D";
    }else{
    echo $answer." => F";
    }
	?></td>
</tr>
<?
}
?>
</table>