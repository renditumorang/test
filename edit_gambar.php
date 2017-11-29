<?php
	session_start();
	include "koneksi.php";
	?>
<html>
<head>
	<title>.: Kemenperin - Lihat Daftar Permohonan :.</title>
	<link rel="stylesheet" type="text/css" href="css/style.css" />
</head>
<body>
<?php
	if(isset($_SESSION["username"]))
	{
	?>
	<div id="header">
		<div id="logo">
			<img src="images/img03.png" width="450px;">
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
					<td width="150px" height="60px" align="center"><font face="calibri" size="5"><b><?php echo "$_SESSION[nama]" ?></b></font></td>
				</tr>
				<tr>
					<td width="150px" align="center"><i><?php echo "$_SESSION[level]" ?></i></td>
				</tr>
				<tr>
					<td width="150px" align="center" id="logout"><a href="logout.php"><font color="grey">Logout</font></a></td>
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
		<div id="permohonan4">
			<form enctype="multipart/form-data" method="post" action="upload_proses.php">
	<table align="center" border="0">
		<tr>
			<td colspan="2" align="center"><h3>Edit Foto Profil</h3></td>
		</tr>
		<tr>
			<td>Silahkan Tekan Tombol Browse Untuk Mencari Foto yang Ingin Diupload</td>
		</tr>
		<tr>
		<input type="hidden" name="ukuran_maks_file" value="500000">
			<td colspan="'2" align="center" height="50px"><input type="file" name="foto"></td>
		</tr>
		<tr>
			<td height="50px"><input type="submit" name="tombol" value="Insert"></td>
		</tr>
	</table>
</form>
		</div>
	</div>
	<div id="footer">
		<center><h4><font color="black">Copyright © 2014 Kementerian Perindustrian Republik Indonesia</font></h4></center>
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
