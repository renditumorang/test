<?php
	session_start();
	include "koneksi.php";
?>

<html>
<head>
	<title>.: Rekam Medis - Lihat Data Pasien :.</title>
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
		<div id="search">
			<form action="cari2.php" method="post">
				<fieldset>
                    <table>
						<tr> Silahkan pilih salah satu pencarian di bawah ini.</tr>
						<pre></pre>
						<tr>
							<td><input type="checkbox" name="bpjs"> No. BPJS </td><td></td>
							<td><pre>	: 	</pre></td>
							<td><input type="text" name="no_bpjs" size="30"></td>
						</tr>
						<tr>
							<td><input type="checkbox" name="rm"> No. Rekam Medik </td><td></td>
							<td><pre>	: 	</pre></td>
							<td><input type="text" name="no_rm" size="30"></td>
						</tr>
						<tr>
							<td><input type="checkbox" name="nama1"> Nama </td><td></td>
							<td><pre>	: 	</pre></td>
							<td><input type="text" name="nama" size="30"></td>
						</tr>
						<tr>
							<td><input type="checkbox" name="tgl"> Tanggal Lahir </td><td></td>
							<td><pre>	: 	</pre></td>
							<td><input type="date" name="tgl_lahir" size="30"></td>
						</tr>
						<tr>
						</tr>
					</table>
					<div id="buttonSearch">
						<input type="Image" src="images/button_search.png" width ="150px" height = "40px"/>
					</div>
				</fieldset>
			</form>
		</div>
	<div id="tambah_permohonan">
		<table border="1" id="tablelihat1" class="list">
			<tr align="center" id="trstyle1">
				<td> No. </td>
				<td> No. BPJS </td>
				<td> No. Rekam Medik </td>
				<td> Tanggal Registrasi </td>
				<td> Nama </td>
				<td> No. KTP </td>
				<td> Jenis Kelamin </td>
				<td> Tempat Lahir </td>
				<td> Tanggal Lahir </td>
				<td> Alamat </td>
				<td> No. Telepon </td>
				<td> Pekerjaan </td>
				<td colspan="2" class="center"> Aksi </td>
			</tr>
				<?php
					include "class_paging.php";
					$koneksi = mysql_connect("localhost","root","");
					$pilih_db = mysql_select_db ("medical_record");
					
					$p      = new Paging;
					$batas  = 10;
					$posisi = $p->cariPosisi($batas);
			
					$no=$_GET['no'];
					$query_select = mysql_query("SELECT * from data_pasien LIMIT $posisi,$batas") or die (mysql_error());
						$no=$posisi+1;
						while($data = mysql_fetch_array ($query_select))
						{
							echo"<tr>"?>
							<td align="center"> <input type="hidden" name="no" value="<?php echo  $data[no]?>"><?php echo $no ?> </td><?php
							echo"<td>".$data['no_bpjs']."</td><td>".$data['no_rm']."</td><td>".$data['tgl_regis']."</td><td>".$data['nama']."</td>
							<td>".$data['no_ktp']."</td><td>".$data['jenis_kelamin']."</td><td>".$data['tempat_lahir']."</td><td>".$data['tgl_lahir']."</td>
							<td>".$data['alamat']."</td><td>".$data['no_telp']."</td><td>".$data['pekerjaan']."</td>
							<td class=\"center\"><a href=\"edit_permohonan.php?no=$data[no]\"><img src='images/edit.png' width ='50px' height = '50px' /></a></td>
							<td class=\"center\"><a href=\"delete_permohonan.php?no=$data[no]\"><img src='images/hapus.png' width ='50px' height = '50px'/></a></td>
							</tr>";
						$no++;
						}
				?>
		</table>
			<?php
				$jmldata = mysql_num_rows(mysql_query("SELECT * FROM data_pasien"));
				$jmlhalaman  = $p->jumlahHalaman($jmldata, $batas);
				$linkHalaman = $p->navHalaman($_GET[halaman], $jmlhalaman);
				echo "<div class=\"pagination\"> $linkHalaman</div>";
			?>
		<br><br><a href="permohonan.php"><img src="images/button_back.png" width ="100px" height = "40px"></a>
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
	</div>
</body>
</html>