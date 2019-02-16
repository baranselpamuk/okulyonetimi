<?php
error_reporting(0);
include("ayar.php");
ob_start();
session_start();
if(!isset($_SESSION["hocagiris"])){
$kadi=$_POST["kullaniciadi"];
$sifre=$_POST["sifre"];
$okuhoca = mysql_fetch_assoc(mysql_query("SELECT * FROM hoca where kadi='$kadi' and sifre='$sifre'"));
	if ($okuhoca){
		$hoca_id=$okuhoca["id"];
	}
}else{
	$okuhoca="true";	
}
	if($okuhoca){
		$_SESSION["hocagiris"] = "true";
		if (!isset($_SESSION["hoca_id"])){
			$_SESSION["hoca_id"] = $hoca_id;
		}
$hocabilgi = mysql_fetch_assoc(mysql_query("SELECT * FROM hoca where id='$_SESSION[hoca_id]'"));		
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
 "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
	<title>managment system</title>
	<link rel="stylesheet" href="css/stil.css" type="text/css" media="screen" />
</head>
<body>

<!-- anaKapsayici -->
<div id="anaKapsayici">

	<!-- ust -->
	<div id="ust">
		<div class="ortala">
		<div id="logo">
			<h1><a href="#">Managment system </a></h1>
		</div>
		
		<!-- kulMenusu -->
		<div id="kulMenusu">
			<ul>
				<li>Hi <? echo $hocabilgi["adi"]." ".$hocabilgi["soyadi"];?></li>
				<li><a href="cikish.php">Exit</a></li>
			</ul>
		</div>
		<!-- kulMenusu son -->
		
		<div class="temizle"></div> <!-- logo, kulMenusu icin temizleme -->
		</div>
	</div>
	<div class="golge"></div> <!-- ust icin temizleme -->
	<!-- ust son -->
	
	
	<!-- orta -->
	<div id="orta" class="ortala">
		<!--anaMenu-->
		<div id="anaMenu">
<div class="menu">
				<div class="menuBasligi">New Semester</div>
				<div class="altMenuler">
					<ul>
						<li><a href="hocagiris.php?s=newlecture">Add Lecture</a></li>
						<li><a href="hocagiris.php?s=dersedit">Edit Lecture</a></li>
                        <li><a href="hocagiris.php?s=lecturedelete">Delete Lecture</a></li>
					</ul>
				</div>
			</div>
			
			<div class="menu">
				<div class="menuBasligi"><a href="#">Lectures</a></div>
				<div class="altMenuler">
					<ul>
						<li><a href="hocagiris.php?s=entergrade">Enter the notes</a></li>
					</ul>
				</div>
			</div>
		</div>
		<!--anaMenu son -->
	
		
		
		<!--sayfaIcerigi-->
		<div id="sayfaIcerigi">
		<div class="temizle"></div> 
            
            <?php
			if($_GET["s"]=="newlecture"){
				include("yeniders.php");
			}else if($_GET["s"]=="lecturedelete"){
				include("derssil.php");
			}else if($_GET["s"]=="dersedit"){
				include("dersedit.php");
			}else if($_GET["s"]=="entergrade"){
				include("entergrade.php");
			}else if($_GET["s"]=="studentlist"){
				include("studentlist.php");
			}else if($_GET["s"]=="grade"){
				include("grade.php");
			}else{
					?>
      <div class="sayfaAciklamasi">
				<h3 class="genelBaslik">welcome</h3>
				<p>Congratulations on the new semester..</p>
			</div>
            <?
			?>

		</div>
		<!--sayfaIcerigi son -->
		
		<div class="temizle"></div> <!-- sayfaIcerigi, anaMenu icin temizleme -->
		
	</div>
	<!-- orta son -->
	
	<!-- alt -->
	<div id="alt">
		<p class="ortala">Emre Çeltikçi &copy; 2013 | Student Registration System </p>
  </div>
	<!-- alt son -->
	
</div>
<!-- anaKapsayici son -->

</body>
</html>
<?php 

else {
	echo "username or password is wrong!";
		header("Refresh: 2; url=hocalogin.php");
}
?>