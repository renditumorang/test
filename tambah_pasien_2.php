<?php
	session_start();
	include "koneksi.php";
?>
<html>
<head>
	<title>.: Rekam Medis - Data Pasien :.</title>
	<link rel="stylesheet" type="text/css" href="css/style.css" />
	<script type="text/javascript" src="js/confirm.js"></script>
	<script type="text/javascript" src="js/validate2.js"></script>
	<link rel="stylesheet" href="jqtransform.css"/>
	<link rel="stylesheet" href="css/style-2.css"/>
	<script type="text/javascript" src="js/jquery-1.4.2.min.js" ></script>
	<script type="text/javascript" src="js/jquery.jqtransform.js" ></script>
	<script language="javascript">
		$(function(){
			$('form').jqTransform({
				imgPath:'img/'
			});
		});
	</script>
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
	<div id="tambah_permohonan">
		<h3>Registrasi Pasien non-BPJS</h3>
		<div id="container1">
			<hr color ="#d1d4d3" size=1 width="95%" align="left"><br>
			<form method="post" action="insert_data_2.php" name="form" onsubmit = "return cekForm()">
				<fieldset>
					<dl>
						<dt><label>No. Rekam Medis</label></dt>
						<dt id="a">:</dt>
						<dd><input type="int" name="no_rm" size="30"></dd>
					</dl>
					<dl>
						<dt><label>Tanggal Registrasi</label></dt>
						<dt id="a">:</dt>
						<dd><input type="date" name="tgl_regis" size="30"></dd>
					</dl>
					<dl>
						<dt><label>Nama Pasien</label></dt>
						<dt id="a">:</dt>
						<dd><input type="text" name="nama" size="30"></dd>
					</dl>
					<dl>
						<dt><label>No. KTP</label></td>
						<dt id="a">:</dt>
						<dd><input type="int" name="no_ktp" size="30"></dd>
					</dl>					
					<dl>
						<dt><label>Jenis Kelamin</label></td>
						<dt id="a">:</dt>
						<dd><input type="radio" name="jenis_kelamin" value="Pria">Pria
						    <input type="radio" name="jenis_kelamin" value="Wanita">Wanita</dd>
					</dl>
					<dl>
						<dt><label>Tempat Lahir</label></td>
						<dt id="a">:</dt>
						<dd><input type="text" name="tempat_lahir" size="30"></dd>
					</dl>
					<dl>
						<dt><label>Tanggal Lahir</label></td>
						<dt id="a">:</dt>
						<dd><input type="date" name="tgl_lahir" size="30"></dd>
					</dl>
					<dl>
						<dt><label>Status</label></td>
						<dt id="a">:</dt>
						<dd><input type="radio" name="status" value="Lajang">Lajang
						    <input type="radio" name="status" value="Menikah">Menikah</dd>
					</dl>
					<dl>
						<dt><label>Agama</label></td>
						<dt id="a">:</dt>
						<dt><select placeholder="Pilih Agama" name="agama" id="agama">
							<option selected="selected">Pilih</option>
							<option value="islam">Islam</option>
							<option value="kristen">Kristen</option>
							<option value="hindu">Hindu</option>
							<option value="buddha">Buddha</option>
							<option value="konghucu">Konghucu</option></select></dt>
					</dl>
					<dl>
						<dt><label>Alamat</label></td>
						<dt id="a">:</dt>
						<dd><textarea type="text" name="alamat" cols="32" rows="5"></textarea></dd>
					</dl>
					<dl>
						<dt><label>Kelurahan/Desa</label></dt>
						<dt id="a">:</dt>
						<dd><input type="text" name="kel_desa" size="30"></dd>
					</dl>
					<dl>
						<dt><label>Kecamatan</label></dt>
						<dt id="a">:</dt>
						<dd><input type="text" name="kecamatan" size="30"></dd>
					</dl>
					<dl>
						<dt><label>Kota/Kabupaten</label></td>
						<dt id="a">:</dt>
						<dd><input type="text" name="kota_kab" size="30"></dd>
					</dl>
					<dl>
						<dt><label>Provinsi</label></dt>
						<dt id="a">:</dt>
						<dd><input type="text" name="provinsi" size="30"></dd>
					</dl>
					<dl>
						<dt><label>No. Telepon</label></dt>
						<dt id="a">:</dt>
						<dd><input type="int" name="no_telp" size="30"></dd>
					</dl>
					<dl>
						<dt><label>Pekerjaan</label></dt>
						<dt id="a">:</dt>
						<dd><input type="text" name="pekerjaan" size="30"></dd>
					</dl>
					<dl>
						<dt><label>Pendidikan</label></dt>
						<dt id="a">:</dt>
						<dd><input type="text" name="pendidikan" size="30"></dd>
					</dl>
					<dl>
						<dt><label>Keterangan</label></dt>
						<dt id="a">:</dt>
						<dd><textarea type="text" name="keterangan" cols="32" rows="5"></textarea></dd>
					</dl>
					<dl>
                                <dt><input type="image" src="images/button_insert.png" width ="100px" height = "40px"></dt>
								<dt><a href="daftar_pasien.php"><img src="images/button_back.png" width ="100px" height = "40px" /></a></dt>
					</dl>
                  </fieldset>
			</form>
		</div>
		</div>
	</div>
	<div id="footer">
		<center><h4><font color="white">Copyright © 2017 RSU Sri Pamela</font></h4></center>
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