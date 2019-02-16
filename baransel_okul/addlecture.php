<?php
	include("ayar.php");
	$lecture=$_POST['lecture'];
	/* Hoca Tarafından Verilen Derslerin Girişi */
		if($_POST["add"]){
			$samelecture = mysql_fetch_assoc(mysql_query("SELECT count(*) as s FROM ogrenci_dersler where kod_id='".$_POST['lecture']."' and ogrenci_id='".$_SESSION["ogrenci_idd"]."'"));
				if($samelecture["s"]==0){
			$sstudent = mysql_fetch_assoc(mysql_query("SELECT Count(*) as nowlecture FROM ogrenci_dersler where ogrenci_id='$_SESSION[ogrenci_idd]'"));
			$snowlecture=$sstudent["nowlecture"];
			$slecture=$obilgi["secme_ders_Adeti"];
			if($slecture>$snowlecture){
				
				mysql_query("insert into ogrenci_dersler values (NULL,'".$lecture."','".$_SESSION["ogrenci_idd"]."',0,0)")or die(mysql_error());
				echo "Lecture Added...";
				
			}else{
				echo "Credit is Full";
			}	
				}else{
				echo "You Can Not Take Same Lecture Again";	
				}		
		}
	/* -------------------------------------------  */
?>
<form method="post" enctype="multipart/form-data" name="example" action="ogrencigiris.php?s=addlecture">
<table width="453" align="center"  cellpadding="3" 
      cellspacing="0" class="liste" id="tablo" 
      style="BORDER-RIGHT: #d1d9e1 1px solid; BORDER-TOP: medium none; BORDER-LEFT: #d1d9e1 1px solid; BORDER-BOTTOM: #d1d9e1 1px solid">

  <tr>
    <td height="16" colspan="2"><div align="center" class="baslik">
      <div align="center" class="tablobaslik">Add Lecture</div>
    </div></td>
  </tr>
  <tr>
    <td width="125" height="30">Add Lecture : </td>
    <td width="289">
      <select name="lecture">
<?php
$sor = mysql_query("select * from dersler");
while ($listele = mysql_fetch_array($sor)) {
?>
      <option value="<?=$listele["id"];?>"><?=$listele["kodu"]." - ".$listele["isim"];?></option>
      
<?
}
?>
</select></td>
  </tr>
   
  <tr>
    <td colspan="2"><div align="center">
      <input type="submit" class="buton" name="add" id="add" value="Add"/>
      </div></td>
  </tr>
</table></form>