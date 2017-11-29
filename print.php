<?php
	session_start();
	include "koneksi.php";
?>
<head>
	<title>.: Rekam Medis - Cetak Data Pasien :.</title>
	<link rel="stylesheet" type="text/css" href="css/style.css" />
</head>
<?php
	if(isset($_SESSION["username"])){
		$bln_masuk=$_POST["bln_masuk"];
		$bln_selesai=$_POST["bln_selesai"];
		$kata2 = $_POST["nama_database"];
		$kata3=$_POST["tahun_masuk"].'-'.$_POST['bln_masuk'].'-'.$_POST['tgl_masuk1'];
		$kata4=$_POST["tahun_selesai"].'-'.$_POST['bln_selesai'].'-'.$_POST['tgl_selesai1'];
	
	switch($bln_masuk){
		case "1";
			$nama_bulan1 = 'Januari';
			break;
		case "2";
			$nama_bulan1 = 'Februari';
			break;
		case "3";
			$nama_bulan1 = 'Maret';
			break;
		case "4";
			$nama_bulan1 = 'April';
			break;
		case "5";
			$nama_bulan1 = 'Mei';
			break;
		case "6";
			$nama_bulan1 = 'Juni';
			break;
		case "7";
			$nama_bulan1 = 'Juli';
			break;
		case "8";
			$nama_bulan1 = 'Agustus';
			break;
		case  "9";
			$nama_bulan1 = 'September';
			break;
		case "10";
			$nama_bulan1 = 'Oktober';
			break;
		case "11";
			$nama_bulan1 = 'November';
			break;
		case "12";
			$nama_bulan1 = 'Desember';
			break;
		}
	switch($bln_selesai){
		case "1";
			$nama_bulan2 = 'Januari';
			break;
		case "2";
			$nama_bulan2 = 'Februari';
			break;
		case "3";
			$nama_bulan2 = 'Maret';
			break;
		case "4";
			$nama_bulan2 = 'April';
			break;
		case "5";
			$nama_bulan2 = 'Mei';
			break;
		case "6";
			$nama_bulan2 = 'Juni';
			break;
		case "7";
			$nama_bulan2 = 'Juli';
			break;
		case "8";
			$nama_bulan2 = 'Agustus';
			break;
		case  "9";
			$nama_bulan2 = 'September';
			break;
		case "10";
			$nama_bulan2 = 'Oktober';
			break;
		case "11";
			$nama_bulan2 = 'November';
			break;
		case "12";
			$nama_bulan2 = 'Desember';
			break;
	}
				
if(isset($kata2)){
	if($kata2 == "all"){
		if($kata2== "pasien bpjs"){
			$query = mysql_query ("SELECT * FROM data_pasien where tgl_masuk >= '$kata3' and tgl_masuk <= '$kata4'") or die (mysql_error());
			if(mysql_num_rows($query) > 0){
			?>
				<h3>Data <?php echo "$_POST[nama_database]" ?></h3>
				<h4>Dari Tanggal <?php echo "$_POST[tgl_masuk1]" ?> <?php echo "$nama_bulan1" ?> <?php echo "$_POST[tahun_masuk]" ?> Sampai Tanggal <?php echo "$_POST[tgl_selesai1]" ?> <?php echo "$nama_bulan2" ?> <?php echo "$_POST[tahun_selesai]" ?></h4>
				<table border="1" id="tablelihat1" class="list">
					<tr align="center" id="trstyle2">
						<td> No. BPJS </td>
						<td> No. Rekam Medik </td>
						<td> Tanggal Registrasi </td>
						<td> Nama </td>
						<td> No. KTP </td>
						<td> Jenis Kelamin </td>
						<td> Tempat Lahir </td>
						<td> Tanggal Lahir </td>
						<td> Status </td>
						<td> Agama </td>
						<td> Alamat </td>
						<td> Kelurahan/Desa </td>
						<td> Kecamatan </td>
						<td> Kota/Kabupaten </td>
						<td> Provinsi </td>
						<td> No. Telepon </td>
						<td> Pekerjaan </td>
						<td> Pendidikan </td>
						<td> Keterangan </td></tr>
			<?php
				$koneksi = mysql_connect("localhost","root","");
				$pilih_db = mysql_select_db ("daftar_permohonan_2012");
									
				$no=1;
				while($data = mysql_fetch_array ($query)){
					echo"<tr id=\"trstyle3\">"?>
						<td> <input type="hidden" name="no" value="<?php echo  $data[no]?>"><?php echo $no ?> </td><?php
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
			}
			else{
			?>
				<h4><i>Tidak ada data pasien!</i></h4>
			<?php
			}
		}
		else{
			if($kata1!=null){
				$query = mysql_query ("SELECT * FROM daftar_permohonan where nama_perusahaan LIKE '%".$kata1."%' and tgl_masuk >= '$kata3' and tgl_masuk <= '$kata4'") or die (mysql_error());
				if(mysql_num_rows($query) > 0){
				?>
					<h3>Data <?php echo "$_POST[nama_database]" ?>"</h3>
					<h4>Dari Tanggal <?php echo "$_POST[tgl_masuk1]" ?> <?php echo "$nama_bulan1" ?> <?php echo "$_POST[tahun_masuk]" ?> Sampai Tanggal <?php echo "$_POST[tgl_selesai1]" ?> <?php echo "$nama_bulan2" ?> <?php echo "$_POST[tahun_selesai]" ?></h4>
					<table border="1" id="tablelihat1" class="list">
						<tr align="center" id="trstyle2">
							<td> No. BPJS </td>
							<td> No. Rekam Medik </td>
							<td> Tanggal Registrasi </td>
							<td> Nama </td>
							<td> No. KTP </td>
							<td> Jenis Kelamin </td>
							<td> Tempat Lahir </td>
							<td> Tanggal Lahir </td>
							<td> Status </td>
							<td> Agama </td>
							<td> Alamat </td>
							<td> Kelurahan/Desa </td>
							<td> Kecamatan </td>
							<td> Kota/Kabupaten </td>
							<td> Provinsi </td>
							<td> No. Telepon </td>
							<td> Pekerjaan </td>
							<td> Pendidikan </td>
							<td> Keterangan </td>
						</tr>
				<?php
					$koneksi = mysql_connect("localhost","root","");
					$pilih_db = mysql_select_db ("daftar_permohonan_2012");
										
					$no=1;
					while($data = mysql_fetch_array ($query)){
						echo"<tr id=\"trstyle3\">"?>
							<td> <input type="hidden" name="no" value="<?php echo  $data[no]?>"><?php echo $no ?> </td><?php
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
				}
				else{
				?>
					<h4><i>Tidak ada data pasien!</i></h4>
				<?php
				}
			}
		}
	}
	else{
		if($kata1==null){
			$query = mysql_query ("SELECT * FROM daftar_permohonan where nama_database LIKE '%".$kata2."%' and tgl_masuk >= '$kata3' and tgl_masuk <= '$kata4'") or die (mysql_error());
			if(mysql_num_rows($query) > 0){
			?>
				<h3>Data <?php echo "$_POST[nama_database]" ?></h3>
				<h4>Dari Tanggal <?php echo "$_POST[tgl_masuk1]" ?> <?php echo "$nama_bulan1" ?> <?php echo "$_POST[tahun_masuk]" ?> Sampai Tanggal <?php echo "$_POST[tgl_selesai1]" ?> <?php echo "$nama_bulan2" ?> <?php echo "$_POST[tahun_selesai]" ?></h4>
				<table border="1" id="tablelihat1" class="list">
					<tr align="center" id="trstyle2">
						<td> No. BPJS </td>
							<td> No. Rekam Medik </td>
							<td> Tanggal Registrasi </td>
							<td> Nama </td>
							<td> No. KTP </td>
							<td> Jenis Kelamin </td>
							<td> Tempat Lahir </td>
							<td> Tanggal Lahir </td>
							<td> Status </td>
							<td> Agama </td>
							<td> Alamat </td>
							<td> Kelurahan/Desa </td>
							<td> Kecamatan </td>
							<td> Kota/Kabupaten </td>
							<td> Provinsi </td>
							<td> No. Telepon </td>
							<td> Pekerjaan </td>
							<td> Pendidikan </td>
							<td> Keterangan </td>
						</tr>
			<?php
				$koneksi = mysql_connect("localhost","root","");
				$pilih_db = mysql_select_db ("daftar_permohonan_2012");
									
				$no=1;
				while($data = mysql_fetch_array ($query)){
					echo"<tr id=\"trstyle3\">"?>
						<td> <input type="hidden" name="no" value="<?php echo  $data[no]?>"><?php echo $no ?> </td><?php
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
			}
			else{
			?>
				<h4><i>Tidak ada data pasien!</i></h4>
			<?php
			}
		}
		else{
			if($kata1!=null){
				$query = mysql_query ("SELECT * FROM daftar_permohonan where nama_perusahaan LIKE '%".$kata1."%' and nama_database LIKE '%".$kata2."%'and tgl_masuk >= '$kata3' and tgl_masuk <= '$kata4'") or die (mysql_error());
				if(mysql_num_rows($query) > 0){
				?>
					<h3>Data <?php echo "$_POST[nama_database]" ?>"</h3>
					<h4>Dari Tanggal <?php echo "$_POST[tgl_masuk1]" ?> <?php echo "$nama_bulan1" ?> <?php echo "$_POST[tahun_masuk]" ?> Sampai Tanggal <?php echo "$_POST[tgl_selesai1]" ?> <?php echo "$nama_bulan2" ?> <?php echo "$_POST[tahun_selesai]" ?></h4>
					<table border="1" id="tablelihat1" class="list">
						<tr align="center" id="trstyle2">
							<td> No. BPJS </td>
							<td> No. Rekam Medik </td>
							<td> Tanggal Registrasi </td>
							<td> Nama </td>
							<td> No. KTP </td>
							<td> Jenis Kelamin </td>
							<td> Tempat Lahir </td>
							<td> Tanggal Lahir </td>
							<td> Status </td>
							<td> Agama </td>
							<td> Alamat </td>
							<td> Kelurahan/Desa </td>
							<td> Kecamatan </td>
							<td> Kota/Kabupaten </td>
							<td> Provinsi </td>
							<td> No. Telepon </td>
							<td> Pekerjaan </td>
							<td> Pendidikan </td>
							<td> Keterangan </td>
						</tr>
				<?php
					$koneksi = mysql_connect("localhost","root","");
					$pilih_db = mysql_select_db ("daftar_permohonan_2012");
										
					$no=1;
					while($data = mysql_fetch_array ($query)){
						echo"<tr id=\"trstyle3\">"?>
							<td> <input type="hidden" name="no" value="<?php echo  $data[no]?>"><?php echo $no ?> </td><?php
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
				}
				else{
				?>
					<h4><i>Tidak ada data <?php echo "$_POST[nama_database]" ?></i></h4>
				<?php
				}
			}
		}
}
}
}
		?>
<script type="text/javascript" src="jquery-1.7.2.min.js"></script>
<script type="text/javascript">
window.print();
</script>					