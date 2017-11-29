<?php
	session_start();
	include "koneksi.php";
	?>
<html>
<head>
	<title>.: Rekam Medis - Lihat Daftar Pasien :.</title>
	<link rel="stylesheet" type="text/css" href="css/style.css" />
</head>
<body>
<?php
	if(isset($_SESSION["username"]))
	{
	?>
	<div id="header">
		<div id="logo">
			<img src="images/img05.png" width="750px;">
		</div>
		<div id="user">
			<table>
				<tr>
					<td rowspan="3">
						<?php   
						$query_select = "SELECT foto FROM user where id='$_SESSION[id]'";
						$daftar=mysql_query($query_select) or die (mysql_error());
						while($hasil = mysql_fetch_object ($daftar)){
							echo "<img src='foto/".$hasil->foto."' width='120px' height='140px' />"; 
						}
						?>
					</td>
					<td width="150px" height="60px" align="center"><font face="arial" size="5"><b><?php echo "$_SESSION[nama]" ?></b></font></td>
				</tr>
				<tr>
					<td width="150px" align="center"><font face="arial"><i><?php echo "$_SESSION[level]" ?></i></font></td>
				</tr>
				<tr>
					<td width="150px" align="center" id="logout"><font face="arial"><a href="logout.php"><font color="grey">Logout</font></a></td>
				</tr>
			</table>
		</div>
	</div>
	<div id="menu">
		<div id="drop">
			<table width="100%" id="tablemenu">
				<tr>
					<td width="12%"><a href="utama.php"><font size="5">Home</font></a></td>
					<?php
						$q = mysql_query("select modul.nama_modul, modul.url from hak_akses, modul where hak_akses.level = '".$_SESSION["level"]."' and hak_akses.id_modul=modul.id_modul") or die (mysql_error());
			
						while($d = mysql_fetch_array($q)){
					?>
						<td width="18%"><a href = "<?php echo $d["url"]; ?>"><font size="5"><?php echo $d ["nama_modul"]; ?></font></a></td>
					<?php
						}
					?>
				</tr>
			</table>
		</div>
	</div>
	<div id="home">
		<div id="permohonan">
			<div class="fp_box5">
				<a href="lihat_permohonan.php"><img src="images/lihat_data.png" width="130px" height="100px"/></a>
				<h2><a href="lihat_permohonanan.php">Lihat Data Pasien</a></h2>
			</div>
			<div class="fp_box5">
				<a href="cetak_permohonan.php"><img src="images/print_data.png" width="130px" height="100px"/></a>
				<h2><a href="cetak_permohonan.php">Cetak Data Pasien</a></h2>
			</div>
		</div>
	</div>
	<div id="footer">
		<center><h4><font color="white">Copyright © 2017 RSU Sri Pamela!!!</font></h4></center>
	</div>
<?php
	}
	else
	{
	?>
		<script language="javascript"> alert ("Anda belum Login!");document.location.href="index.php";
		</script>
	<?php
	}
?>
</body>
</html>