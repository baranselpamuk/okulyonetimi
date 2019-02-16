<?php
	include("ayar.php");
	$code=$_POST['code'];
	$name=$_POST['name'];	
	$credit=$_POST['credit'];
	$midtermper=$_POST['midtermper'];
	$finalper=$_POST['finalper'];
	/* Hoca Tarafından Verilen Derslerin Girişi */
		if($_POST["add"]){
				mysql_query("insert into dersler values (NULL,'".$code."','".$name."','".$_SESSION["hoca_id"]."','".$credit."','".$midtermper."','".$finalper."')")or die(mysql_error());
				echo "record was made...";
		}
	/* -------------------------------------------  */
	/* Hoca Tarafından Verilen Derslerin Girişi */
if($_POST['update']){	
	mysql_query("update dersler set kodu='$code',isim='$name',kredi='$credit',vize_yuz='$midtermper',final_yuz='$finalper' where id='".$_GET["id"]."'")or die(mysql_error());
	echo "Update was made";
}
/* ------------------------------------------------- */
if($_GET["id"]){
	$k=mysql_fetch_assoc(mysql_query("select * from dersler where id='".$_GET["id"]."'"));
}
?>
<form method="post" enctype="multipart/form-data" name="example" action="hocagiris.php?s=newlecture">
<table width="453" align="center"  cellpadding="3" 
      cellspacing="0" class="liste" id="tablo" 
      style="BORDER-RIGHT: #d1d9e1 1px solid; BORDER-TOP: medium none; BORDER-LEFT: #d1d9e1 1px solid; BORDER-BOTTOM: #d1d9e1 1px solid">
 <?
	  if($_GET['id']){
	  ?>
        <tr>
    <td height="16" colspan="2">&nbsp;</td>
  </tr>
  <?
	  }
  ?>
  <tr>
    <td height="16" colspan="2"><div align="center" class="baslik">
      <div align="center" class="tablobaslik">New Lecture</div>
    </div></td>
  </tr>
  <tr>
    <td width="125" height="30">code : </td>
    <td width="289">
      <input name="code" type="text" class="input2" value="<?=$k['kodu']?>" />
      </td>
  </tr>
    <tr>
    <td width="125" height="30">name :</td>
    <td width="289">
      <input name="name" type="text" class="input2" value="<?=$k["isim"]?>" />
      </td>
  </tr>
    <tr>
    <td width="125" height="30">Credit : </td>
    <td width="289">
      <input name="credit" type="text" class="input2" value="<?=$k['kredi']?>" />
      </td>
  </tr>
    <tr>
    <td width="125" height="30">Midterm (%)</td>
    <td width="289">
      <input name="midtermper" type="text" class="input2" value="<?=$k['vize_yuz']?>" />
      </td>
  </tr>
   <tr>
    <td width="125" height="30">Final (%)</td>
    <td width="289">
      <input name="finalper" type="text" class="input2" value="<?=$k['final_yuz']?>" />
      </td>
  </tr>
  <tr>
    <td colspan="2"><div align="center">
      <input type="submit" class="buton" <?= $_GET["id"] ? 'name="update" id="update" value="update"' : 'name="add" id="add" value="Add"'?> />
      </div></td>
  </tr>
</table></form>