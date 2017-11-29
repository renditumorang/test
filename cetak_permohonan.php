<?php
	session_start();
	include "koneksi.php";
	?>
<html>
<head>
	<title>.: Rekam Medis - Lihat Daftar Pasien :.</title>
	<link rel="stylesheet" type="text/css" href="css/style.css" />
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
	//wkwkkwkwk
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
		<div id="search1">
			<form action="print.php" method="post">
				<fieldset>
					<dl>
						<dt><label>Jenis Database</label></dt>
						<dt id = "a">:</dt>
						<dd><select name = "nama_database">
								<option selected>Pilih</option>
								<option value = "bpjs">Pasien BPJS</option>
								<option value = "non_bpjs">Pasien Non-BPJS</option>
							</select></dd>
					</dl>
					<dl>
						<dt><label>Tanggal Awal</label></dt>
						<dt id = "a">:</dt>
						<dd><select name = "tgl_masuk1" id = "tanggal">
								<option value = "1" selected> 1 </option>
								<?php
									for($i = 1 ; $i <= 31 ; $i ++){
										echo "<option value = \"$i\"> $i </option>";
									}
								?>
							</select>
							<select name = "bln_masuk" id = "bulan">		
								<option value = "1" selected>Januari</option>
								<option value = "2">Februari</option>
								<option value = "3">Maret</option>
								<option value = "4">April</option>
								<option value = "5">Mei</option>
								<option value = "6">Juni</option>
								<option value = "7">Juli</option>
								<option value = "8">Agustus</option>
								<option value = "9">September</option>
								<option value = "10">Oktober</option>
								<option value = "11">November</option>
								<option value = "12">Desember</option>
							</select>
							<select name = "tahun_masuk" id = "tahun">
								<option value = "2013"> 2013 </option>
								<option value = "2012" selected> 2012 </option>
								<?php
									for($i = 2011 ; $i >= 1990 ; $i --){
										echo "<option value = \"$i\"> $i </option>";
									}
								?>
							</select></dd>
						</dl>
						<dl>
							<dt><label>Tanggal Akhir</label></td>
							<dt id ="a">:</dt>
							<dd><select name = "tgl_selesai1" id = "tanggal">
								<?php
									for($i = 1 ; $i <= 31 ; $i ++){
										if($i==30){
										echo "<option value = \"$i\" selected> $i </option>";
										}
										else{
										echo "<option value = \"$i\"> $i </option>";
										}
									}
								?>
							</select>
							<select name = "bln_selesai" id = "bulan">		
									<option value = "1" selected>Januari</option>
									<option value = "2">Februari</option>
									<option value = "3">Maret</option>
									<option value = "4">April</option>
									<option value = "5">Mei</option>
									<option value = "6">Juni</option>
									<option value = "7">Juli</option>
									<option value = "8">Agustus</option>
									<option value = "9">September</option>
									<option value = "10">Oktober</option>
									<option value = "11">November</option>
									<option value = "12">Desember</option>
								</select>
								<select name = "tahun_selesai" id = "tahun">
									<option value = "2013"> 2013 </option>
									<option value = "2012" selected> 2012 </option>
									<?php
										for($i = 2011 ; $i >= 1990 ; $i --){
											echo "<option value = \"$i\"> $i </option>";
										}
									?>
								</select></dd>
						</dl>
							<dd colspan="3" height="100px">
							<input type="Image" src="images/button_print.png" width ="80px" height = "60px"> 
							<a href="permohonan.php"><img src="images/button_back.png" width ="100px" height = "40px"></a></dd>
						</dl>
					</fieldset>
				</form>
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