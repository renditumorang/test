<?php
	include "koneksi.php";
	
	if($koneksi){
		$no_bpjs=$_POST['no_bpjs'];
		$no_rm=$_POST['no_rm'];
		$tgl_regis=$_POST['tgl_regis'];
		$nama=$_POST['nama'];
		$no_ktp=$_POST['no_ktp'];
		$jenis_kelamin=$_POST['jenis_kelamin'];
		$tempat_lahir=$_POST['tempat_lahir'];
		$tgl_lahir=$_POST['tgl_lahir'];
		$status=$_POST['status'];
		$agama=$_POST['agama'];
		$alamat=$_POST['alamat'];
		$kel_des=$_POST['kel_desa'];
		$kecamatan=$_POST['kecamatan'];
		$kota_kab=$_POST['kota_kab'];
		$provinsi=$_POST['provinsi'];
		$no_telp=$_POST['no_telp'];
		$pekerjaan=$_POST['pekerjaan'];
		$pendidikan=$_POST['pendidikan'];
		$keterangan=$_POST['keterangan'];
		
		$SQL ="insert into data_pasien values('$no_bpjs', '$no_rm', '$tgl_regis', '$nama', '$no_ktp', '$jenis_kelamin', '$tempat_lahir', '$tgl_lahir', '$status', '$agama', '$alamat', '$kel_des', '$kecamatan', '$kota_kab', '$provinsi', '$no_telp', '$pekerjaan', '$pendidikan', '$keterangan')";
		mysql_query ($SQL, $koneksi) or die ("Proses insert data gagal!");
		?>
		<script language="javascript"> alert ("Data Berhasil Terinput !");
		document.location.href = "data_pasien.php";</script>
		<?php
		}
?>
		
		