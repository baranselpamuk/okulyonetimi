<?php
	include("ayar.php");
	$midterm=$_POST['midterm'];
	$final=$_POST['final'];	
	if($_POST['update']){	
	mysql_query("update ogrenci_dersler set vize='$midterm',final='$final' where id='".$_GET["id"]."'")or die(mysql_error());
	echo "Update was made";
}
/* ------------------------------------------------- */
if($_GET["id"]){
	$k=mysql_fetch_assoc(mysql_query("select * from ogrenci_dersler where id='".$_GET["id"]."'"));
}
?>
<form method="post" enctype="multipart/form-data" name="example" action="hocagiris.php?s=grade&id=<?=$_GET["id"];?>">
<table width="453" align="center"  cellpadding="3" 
      cellspacing="0" class="liste" id="tablo" 
      style="BORDER-RIGHT: #d1d9e1 1px solid; BORDER-TOP: medium none; BORDER-LEFT: #d1d9e1 1px solid; BORDER-BOTTOM: #d1d9e1 1px solid">
  <tr>
    <td height="16" colspan="2"><div align="center" class="baslik">
      <div align="center" class="tablobaslik">Enter the Grade</div>
    </div></td>
  </tr>
  <tr>
    <td width="125" height="30">Midterm : </td>
    <td width="289">
      <input name="midterm" type="text" class="input2" value="<?=$k['vize']?>" />
      </td>
  </tr>
    <tr>
    <td width="125" height="30">Final :</td>
    <td width="289">
      <input name="final" type="text" class="input2" value="<?=$k["final"]?>" />
      </td>
  </tr>
  <tr>
    <td colspan="2"><div align="center">
      <input type="submit" class="buton" name="update" id="update" value="update"/>
      </div></td>
  </tr>
</table></form>ss