<?php
	include "koneksi.php";
	
	if($koneksi){
		$nama_perusahaan=$_POST['nama_perusahaan'];
		$jenis_contoh=$_POST['jenis_contoh'];
		$alamat=$_POST['alamat'];
		$tgl_masuk=$_POST['thn_masuk'].'-'.$_POST['bln_masuk'].'-'.$_POST['tgl_masuk1'];
		$tgl_selesai=$_POST['thn_selesai'].'-'.$_POST['bln_selesai'].'-'.$_POST['tgl_selesai1'];
		$std_pelayanan=$_POST['std_pelayanan'];
		$id_database=$_POST['jenis'];
		
		$SQL ="insert into daftar values( null, '$nama_perusahaan', '$jenis_contoh', '$alamat', '$tgl_masuk', '$tgl_selesai', '$std_pelayanan', '$id_database')";
		mysql_query ($SQL, $koneksi) or die ("Proses insert data gagal!");
		?>
		<script language="javascript">
		document.location.href = "lihat_permohonan.php";</script>
		<?php
		}
?>
		
		