<?php
	session_start();
	include "koneksi.php";
	?>
<html>
<head>
	<title>.: Rekam Medis - Update Data Pasien :.</title>
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
	?>
	<div id="header">
		<div id="logo">
			<img src="images/img05.png" width="750px">
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
					<td width="150px" align="center" id="logout"><a href="logout.php"><font color="grey" face="arial">Logout</font></a></td>
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
			<?php
				include "koneksi.php";

				$no = $_GET['no'];
				$id_database=$_POST['id_database'];
				$qrykoreksi=mysql_query("select * from daftar_pasien where no='$no' LIMIT 1");
				$dataku=mysql_fetch_object($qrykoreksi);
				list($thn_masuk,$bln_masuk,$tgl_masuk1) = explode('-',$dataku->tgl_masuk);
				list($thn_selesai,$bln_selesai,$tgl_selesai1) = explode('-',$dataku->tgl_selesai);
			?>
			<h3>Update Data Pasien</h3>	
			<div id="container1">
							
			<form method="post" action="update_permohonan.php">
				<hr color ="#d1d4d3" size=1 width="95%" align="left"><br>
					<dl>
						<dd><input type="hidden" name="no" id="no"size="30" value="<?php echo $dataku->no?>" readonly=""></dd>
					</dl>
					<fieldset>
					<dl>
						<dt><label>Jenis Database</label></dt>
						<dt>:</dt>
						<dd><input type="text" name="jenis" id="jenis" size="30" value="<?php echo $dataku->nama_database?>" disabled></dd>
					</dl>
					<dl>
						<dt><label>Nama Perusahaan</label></dt>
						<dt>:</dt>
						<dd><input type="text" name="nama_perusahaan" id="nama_perusahaan" size="30" value="<?php echo $dataku->nama_perusahaan?>"></dd>
					</dl>
					<dl>
						<dt><label>Jenis Contoh</label></dt>
						<dt>:</dt>
						<dd><input type="text" name="jenis_contoh" size="30" value="<?php echo $dataku->jenis_contoh?>"></dd>
					</dl>
					<dl>
						<dt><label>Alamat</label></dt>
						<dt>:</dt>
						<dd><input type="text" name="alamat" size="30" value="<?php echo $dataku->alamat?>"></dd>
					</dl>
					<dl>
									<dt><label>Tanggal Masuk</label></dt>
									<dt>:</dt>
									<dd>
										<select name="tgl_masuk1" size="1">
										<?php
											for ($i=1;$i<=31;$i++){
												if($tgl_masuk1==$i) {
													echo "<option value=".$i." selected>".$i."</option>";
												}
												else{
													echo "<option value=".$i.">".$i."</option>";
												}
											}
										?>
										</select>
										<select name="bln_masuk" size="1">
										<?php
											$namabulan=array("","Januari","Pebruari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","November","Desember");
											for ($i=1;$i<=12;$i++){
												if($bln_masuk==$i) {
													echo "<option value=".$i." selected>".$namabulan[$i]."</option>";
												}
												else{
													echo "<option value=".$i.">".$namabulan[$i]."</option>";
												}
											}
										?>
										</select>
										<select name="thn_masuk" size="1" id="thn">
										<?php
											echo "<option value=".$thn_masuk.">".$thn_masuk."</option>";
											for ($i=1950;$i<=2013;$i++){
												if($thn_masuk==$i){
													echo "<option value=".$i." selected>".$i."</option>";
												}
												else{
													echo "<option value=".$i.">".$i."</option>";
												}
											}
										?>
										</select>
									</dd>
								</dl>
								<dl>
									<dt><label>Tanggal Selesai</label></dt>
									<dt>:</dt>
									<dd>
										<select name="tgl_selesai1" size="1">
										<?php
											for ($i=1;$i<=31;$i++){
												if($tgl_selesai1==$i) {
													echo "<option value=".$i." selected>".$i."</option>";
												}
												else{
													echo "<option value=".$i.">".$i."</option>";
												}
											}
										?>
										</select>
										<select name="bln_selesai" size="1">
										<?php
											$namabulan=array("","Januari","Pebruari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","November","Desember");
											for ($i=1;$i<=12;$i++){
												if($bln_selesai==$i) {
													echo "<option value=".$i." selected>".$namabulan[$i]."</option>";
												}
												else{
													echo "<option value=".$i.">".$namabulan[$i]."</option>";
												}
											}
										?>
										</select>
										<select name="thn_selesai" size="1" id="thn">
										<?php
											echo "<option value=".$thn_selesai.">".$thn_selesai."</option>";
											for ($i=1950;$i<=2013;$i++){
												if($thn_selesai==$i){
													echo "<option value=".$i." selected>".$i."</option>";
												}
												else{
													echo "<option value=".$i.">".$i."</option>";
												}
											}
										?>
										</select>
									</dd>
								</dl>
					<dl>
						<dt><label>Standar Pelayanan</label></dt>
						<dt>:</dt>
						<dd><input type="text" name="std_pelayanan" size="30" value="<?php echo $dataku->std_pelayanan?>"></dd>
					</dl>
					<dl>
						 <dt><br><input type="image" src="images/button_update.png" width ="100px" height = "40px"></dt>
							<dt><br><a href="lihat_permohonan.php"><img src="images/button_back.png" width ="100px" height = "40px"/></a></dt>
					</dl>
				</fieldset>
			</form>
		</div>
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