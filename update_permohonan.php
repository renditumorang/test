<?php
include "koneksi.php";
		$no= $_POST['no'];
		$nama_perusahaan=$_POST['nama_perusahaan'];
		$jenis_contoh=$_POST['jenis_contoh'];
		$alamat=$_POST['alamat'];
		$tgl_masuk=$_POST['thn_masuk'].'-'.$_POST['bln_masuk'].'-'.$_POST['tgl_masuk1'];
		$tgl_selesai=$_POST['thn_selesai'].'-'.$_POST['bln_selesai'].'-'.$_POST['tgl_selesai1'];
		$std_pelayanan=$_POST['std_pelayanan'];
		$id_database=$_POST['id_database'];
	
	$myqry="UPDATE daftar SET nama_perusahaan='$nama_perusahaan', jenis_contoh='$jenis_contoh', alamat='$alamat',".
			"tgl_masuk='$tgl_masuk', ".
			"tgl_selesai='$tgl_selesai', std_pelayanan='$std_pelayanan' WHERE no='$no' LIMIT 1";
	mysql_query($myqry) or die(mysql_error());
	?>
		<script language="javascript">
		document.location.href = "lihat_permohonan.php";</script>
	<?php
?>